<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\OrderController as BackendOrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Middleware\Admin;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ReviewController;
use GuzzleHttp\Middleware;

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

Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/product', [FrontendController::class, 'product'])->name('product.index');
Route::get('/product/{product}', [FrontendController::class, 'singleProduct'])->name('product.show');
Route::get('/product/category/{slug}', [FrontendController::class, 'filterByCategory'])->name('product.filter');
Route::get('/search',[FrontendController::class, 'search'])->name('product.search');
Route::get('/about', [FrontendController::class, 'about'])->name('about');

//cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/add-to-cart/{product}', [CartController::class, 'addToCart'])->name('cart.add');
Route::put('/cart/update/{id}', [CartController::class, 'updateCart'])->name('cart.diupdate');
Route::delete('/card/{id}', [CartController::class, 'remove'])->name('cart.remove');


//order
Route::get('/checkout',[CartController::class, 'checkout'])->name('cart.checkout');
Route::get('/order', [OrdersController::class, 'index'])->name('order.index');
Route::get('/order/{id}', [OrdersController::class, 'show'])->name('order.show');

//review
Route::post('/product/{product}/review', [ReviewController::class, 'store'])->name('review.store');

// Route::get('/', function () {
//     return view('layouts.frontend');
// });



// Route::get('about', function(){
//     return 'ini halaman about';
// });

// Route::get('profile', function (){
//     return view('profile');
// });

// Route::get('produk/{namaProduk}', function($p)
// {
//     return 'Saya Membeli ' . $p;
// }
// );

// Route::get('kategori/{namaKategori}', function($kategori){
//     return view('kategori', compact('kategori'));
// });


// Route::get('search/{keyword?}', function($keyword = null){
//     return view('search', compact('keyword'));
// });

// Route::get('promo/{barang?}/{kode?}', function($barang = null, $kode = null){
//     return view('promo', compact('barang', 'kode'));
// });

// //Route Buku
// Route::get('buku', [MyController::class, 'index']);

// //tambah buku
// Route :: get ('buku/create', [MyController::class, 'create']);
// Route::post('buku', [MyController::class, 'store']);

// //show buku
// Route::get('buku/{id}', [MyController::class, 'show']);

// //edit buku
// Route::get('buku/{id}/edit', [MyController::class, 'edit']);
// Route::put('buku/{id}', [MyController::class, 'update']);

// //delete buku
// Route::delete('buku/{id}', [MyController::class, 'destroy']);


//import Admin Middleware
use illuminate\Support\Facades\Auth;
use Monolog\Handler\RotatingFileHandler;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




//route untuk backend
Route::group(['prefix' => 'admin','as' => 'backend.', 'middleware' =>['auth', Admin::class]],function (){
    Route::get('/', [BackendController::class, 'index']);
    Route::resource('/category', CategoryController::class);
    Route::resource('/product', ProductController::class);
    Route::resource('/orders', BackendOrderController::class);

   Route::put('/orders/{id}/status', [BackendOrderController::class, 'updateStatus'])->name('orders.updateStatus');
} 

);

