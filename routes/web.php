<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\FE\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/product/{slug}', [HomeController::class, 'productDetails'])
        ->name('productDetails');


Route::get('/login', [DashboardController::class, 'login'])->name('login');

Route::post('/login', [DashboardController::class, 'processLogin'])
                    ->name('processLogin');

Route::get('/logout', [DashboardController::class, 'logout'])->name('logout');

Route::post('/add-cart', [HomeController::class, 'addCart'])->name('addCart');

Route::get('/clear-cart', [HomeController::class, 'clearCart'])->name('clearCart');

Route::get('/view-cart', [HomeController::class, 'viewCart'])->name('viewCart');

Route::post('/update-cart', [HomeController::class, 'updateCart'])->name('updateCart');

Route::post('/remove-cart-item', [HomeController::class, 'removeCartItem'])
            ->name('removeCartItem');

Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');

Route::post('/save-cart', [HomeController::class, 'saveCart'])->name('saveCart');

Route::group(['middleware'=>'islogin'], function() {

    Route::get('/admin', [DashboardController::class, 'home'])->name('admin');

    Route::group(['middleware'=>'isadmin', 'prefix'=>'admin', 'as'=>'admin.'], function() {

        Route::resource('/product', ProductController::class);

    });
});


