<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $product = Product::select('id', 'name', 'slug', 'description', 'price', 'stock')
        ->latest()->get();
        return response()->json([

            //buat response terlebih dahulu
            $res = [
                'success' => true,
                'data' => $product,
                'message' => 'List Products',
                'data' => $product,
            ]
            ]);

            return response()->json($res, 200);
    }
    public function show($id){
        $product = Product::find($id);
        if (!$product) {
            $res = [
                'success' => false,
                'message' => 'Product Not Found',
            ];
        }

        $res = [
            'success' => true,
            'data' => $product,
            'message' => 'Product Detail',
        ];
        return response()->json($res, 200);
    }
}
