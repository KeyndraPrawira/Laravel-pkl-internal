<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    public function index()
    {
        
        $orders = Order::with('user')->latest()->get();
        $title = 'Hapus Pesanan!';
        $text = 'Apakah Anda yakin ingin menghapus pesanan ini?';
        confirmDelete($title, $text);

        return view('backend.order.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with('user', 'products')->findOrFail($id);
        return view('backend.order.show', compact('order'));
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        $order->products()->detach(); 
        toast('Pesanan berhasil dihapus.', 'success');
        return redirect()->route('backend.order.index');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,completed,cancel',
        ]);
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        toast ('Satus order berhasil diperbarui.', 'success');
        return back();
    }
}
