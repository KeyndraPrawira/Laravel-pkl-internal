<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::with('product')
                    ->where('user_id', auth()->id())
                    ->get();
        
        return view('cart', compact('cartItems'));
    }

    public function addToCart(Request $request, $id)
    {
        if (!Auth::check()) {
            //jika belum login, redirect dengan alert
            toast('Silakan login terlebih dahulu untuk menambahkan ke keranjang.', 'error');
            return redirect('/login');
        }

        $request->validate([
            'qty' => 'required|integer|min:1',
        ]);

        $cart = Cart::where('user_id', Auth::id())
                            ->where('product_id', $id)
                            ->first();

        if ($cart) {
            $cart->increment('qty', $request->qty);
        }else {
            Cart::create([
                'user_id'   => Auth::id(),
                'product_id'   => $id,
                'qty'   => $request->qty,

            ]);

        }
        toast('Produk berhasil ditambahkan ke keranjang.', 'success');
        return back();

    }

    public function updateCart(Request $request, $id)
    {
        $cartItem = Cart::with(
            'product'
        ) -> findOrFail($id);
        $request->validate([
            'qty' => 'required|integer|min:1'
        ]);

        $cartItem->qty = $request->qty;
        $cartItem->save();

        toast('Jumlah berhasil diperbarui.', 'success');
        return redirect()->route('cart.index');
        }
    public function remove($id){
        $cart = Cart::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $cart->delete();
        toast('Produk berhasil dihapus dari keranjang.', 'success');
        return redirect()->route('cart.index');
    }

    public function checkout()
    {
        $cartItems = Cart::with('product')->where('user_id', auth()->id())->get();
        if ($cartItems->isEmpty()) {
            toast('Keranjang kosong. Tidak bisa checkout', 'warning');
            return redirect()->route('cart.index');
        }

        //hitung total harga
        $total = $cartItems->sum(function ($item){
            return $item->qty * $item->product->price;
        });

        //Simpan Order
        $order = Order::create([
            'user_id' => auth()->id(),
            'order_code' => 'ORD-'. strtoupper(Str::random(8)),
            'total_price' => $total,
            'status' => 'pending',
        ]);

        //simpan detail order ke pivot 'order_product'
        foreach ($cartItems as $item) {
            //kurangi stock
            $product = Product::find($item->product_id);
            $product->stock -= $item->qty;
            $product->save();

            $order->products()->attach(($item->product_id), [
                'qty' => $item->qty,
                'price' => $item->product->price,
            ]);

            
        }
        toast('Checkout berhasil. Silakan tunggu konfirmasi pesanan.', 'success');
        return redirect()->route('order.index')->with('success');
    }
}
