<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categories;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

         $product = Product::latest()->get();
         $category = Categories::latest()->get();
         

        $title = 'Hapus data!';
        $text = 'Apakah anda yakin ingin menghapus data ini?';
        confirmDelete($title, $text);
        return view('backend.product.index', compact('product','category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = Product::all();
        $category = Categories::all();
        return view ('backend.product.create', compact('category', 'product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required|numeric',
            'stock'  => 'required|numeric',
            'image' => 'required|image|mimes:jpg,png',
        ]);
        $product                = new Product();
        $product->name          = $request->name;
        $product->slug          = Str::slug($request->name, '-');
        $product->category_id   = $request->category_id;
        $product->price         = $request->price;
        $product->description   = $request->description;
        $product->stock         = $request->stock;
        if ($request->hasFile('image')) {
            $file       = $request->file('image');
            $randomName = Str::random(20) . '.' . $file->getClientOriginalExtension();
            $path       = $file->storeAs('products', $randomName, 'public');
            $product->image = $path;
        }
        $product->save();
        toast('Produk berhasil disimpan', 'success');
        return redirect()->route('backend.product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Categories::all();
        $product = Product::findOrFail($id);
        return view ('backend.product.show', compact('product', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $category = Categories::all();
        return view ('backend.product.edit', compact('product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        $category = Categories::all();
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->slug = Str::slug($request->name, '-');
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        if ($request->hasFile('image')) {
            //menghapus foto lama
            Storage::disk('public')->delete($product->image);

            $file = $request->file('image');
            $randomName = Str::random(20). '.'. $file->getClientOriginalExtension();
            $path = $file->storeAs('products', $randomName, 'public');
            $product->image = $path;
        }

        $product->save();
        return redirect()->route('backend.product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        toast('Data berhasil dihapus', 'success');
        return redirect()->route('backend.product.index');
    }
}
