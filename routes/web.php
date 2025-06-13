<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\LoginController;

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

Route::get('/', [PageController::class, 'main']);
Route::get('/shop', [PageController::class, 'shop'])->name('shop');
