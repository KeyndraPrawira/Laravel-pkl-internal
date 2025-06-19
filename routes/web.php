<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('about', function(){
    return 'ini halaman about';
});

Route::get('profile', function (){
    return view('profile');
});

Route::get('produk/{namaProduk}', function($p)
{
    return 'Saya Membeli ' . $p;
}
);

Route::get('kategori/{namaKategori}', function($kategori){
    return view('kategori', compact('kategori'));
});


Route::get('search/{keyword?}', function($keyword = null){
    return view('search', compact('keyword'));
});

Route::get('promo/{barang?}/{kode?}', function($barang = null, $kode = null){
    return view('promo', compact('barang', 'kode'));
});

//Route Buku
Route::get('buku', [MyController::class, 'index']);

//tambah buku
Route :: get ('buku/create', [MyController::class, 'create']);
Route::post('buku', [MyController::class, 'store']);

//show buku
Route::get('buku/{id}', [MyController::class, 'show']);

//edit buku
Route::get('buku/{id}/edit', [MyController::class, 'edit']);
Route::put('buku/{id}', [MyController::class, 'update']);

//delete buku
Route::delete('buku/{id}', [MyController::class, 'destroy']);


