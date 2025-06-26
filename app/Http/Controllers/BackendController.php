<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class BackendController extends Controller
{
    public function index(){
        return view('backend.index');
    }

    public function product(){
        return view('backend.product');
    }

    public function category(){
        return view('backend.category');
    }
}
