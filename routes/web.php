<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\ProductController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::match(['get', 'post'], '/admin/banner/banners', [AdminController::class, 'show'])->name('admin.banners');
    Route::post('/admin/upload-temp-image', [AdminController::class, 'uploadTempImage']);

    Route::match(['get', 'post'], '/admin/banner/addbanner', [AdminController::class, 'store'])->name('admin.addbanner');


    //profile page 
    Route::get('admin/profile',[AdminController::class,'profile'])->name('admin.profile');

    //orders

    Route::get('admin/orders',[AdminController::class,'orders'])->name('admin.orders');
    //Products
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/admin/products/store', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/admin/products/show', [ProductController::class, 'show'])->name('admin.products.show');

});

Route::middleware(['auth', 'role:shop'])->group(function () {
    Route::get('/shop/dashboard', function () {
        return view('shop.dashboard');
    })->name('shop.dashboard');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');
});


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PageController::class, 'main'])->name('home');
Route::get('/shop', [PageController::class, 'shop'])->name('shop');
Route::get('/product/{id}', [PageController::class, 'productDetail'])->name('product.detail');

