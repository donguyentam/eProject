<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\FE\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/product/{id}', [HomeController::class, 'productDetails'])
        ->name('productDetails');


Route::get('/login', [DashboardController::class, 'login'])->name('login');

Route::post('/login', [DashboardController::class, 'processLogin'])
                    ->name('processLogin');

Route::get('/register', [DashboardController::class, 'register'])->name('register');

Route::post('/register', [DashboardController::class, 'processRegister'])
                                        ->name('processRegister');


Route::get('/forget-password', [DashboardController::class, 'forgetPassword'])->name('forgetPassword');

Route::post('/forget-password', [DashboardController::class, 'forgetPasswordPost'])->name('forgetPasswordPost');

Route::get('/reset-password/{token}', [DashboardController::class, 'resetPassword'])->name('resetPassword');

Route::post('/reset-password', [DashboardController::class, 'resetPasswordPost'])->name('resetPasswordPost');

Route::get('/logout', [DashboardController::class, 'logout'])->name('logout');

Route::get('/blognews', [HomeController::class, 'blognews'])->name('blognews');

Route::get('/AddCart/{id}', [HomeController::class, 'AddCart'])->name('AddCart');

Route::get('/{any}/AddCart2/{id}', [HomeController::class, 'AddCart'])->name('AddCart');

Route::get('/clear-cart', [HomeController::class, 'clearCart'])->name('clearCart');

Route::get('/view-cart', [HomeController::class, 'viewCart'])->name('viewCart');

Route::post('/update-cart', [HomeController::class, 'updateCart'])->name('updateCart');

Route::get('/DeleteItemCart/{id}', [HomeController::class, 'DeleteItemCart'])->name('DeleteItemCart');

Route::get('/DeleteListItemCart/{id}', [HomeController::class, 'DeleteListItemCart'])->name('DeleteListItemCart');

Route::post('/SaveListItemCart/{id}/{quanty}', [HomeController::class, 'SaveListItemCart'])->name('SaveListItemCart');

Route::post('/SaveAll', [HomeController::class, 'SaveAll'])->name('SaveAll');

Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');

Route::post('/save-cart', [HomeController::class, 'saveCart'])->name('saveCart');

Route::get('/search',[ProductController::class,
	'searchProduct'

])->name('search');

Route::get('/product-search', [HomeController::class, 'productSearch'])->name('productSearch');

Route::group(['middleware'=>'islogin'], function() {

    Route::get('/admin', [DashboardController::class, 'home'])->name('admin');

    Route::group(['middleware'=>'isadmin', 'prefix'=>'admin', 'as'=>'admin.'], function() {

        Route::resource('/product', ProductController::class);

        Route::resource('/order', OrderController::class);

        Route::get('/user', [ProductController::class, 'user'])->name('user');


        Route::get('/edituser/{id}', [ProductController::class, 'edituser'])->name('edituser');

        Route::post('/edituser/{id}', [ProductController::class, 'updateuser'])->name('updateuser');

        Route::get('/deleteproduct/{id}', [ProductController::class, 'deleteproduct'])->name('deleteproduct');

        Route::get('/deleteuser/{id}', [ProductController::class, 'deleteuser'])->name('deleteuser');

        Route::get('/edituser/{id}', [ProductController::class, 'edituser'])->name('edituser');

        Route::get('/editOrders/{id}', [OrderController::class, 'editOrders'])->name('editOrders');

        Route::post('/editOrders/{id}', [OrderController::class, 'updateOrders'])->name('updateOrders');

        Route::get('/deleteOrders/{id}', [OrderController::class, 'deleteOrders'])->name('deleteOrders');

        Route::get('/searchUser', [ProductController::class, 'searchUser'])->name('searchUser');

        Route::get('/searchOrders', [OrderController::class, 'searchOrders'])->name('searchOrders');

        Route::get('/searchProduct', [ProductController::class, 'searchProduct'])->name('searchProduct');

    });
});


