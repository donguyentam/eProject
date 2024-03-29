<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\FE\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/bedroom', [HomeController::class, 'bedroom'])->name('bedroom');

Route::get('/workroom', [HomeController::class, 'workroom'])->name('workroom');

Route::get('/diningroom', [HomeController::class, 'diningroom'])->name('diningroom');

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

Route::get('/category/{id}',[HomeController::class, 'category'])->name('category');

Route::post('/reset-password', [DashboardController::class, 'resetPasswordPost'])->name('resetPasswordPost');

Route::get('/logout', [DashboardController::class, 'logout'])->name('logout');

Route::get('/complete/{id}', [DashboardController::class, 'complete'])->name('complete');

Route::get('/blognews', [HomeController::class, 'blognews'])->name('blognews');

Route::post('/add-cart', [HomeController::class, 'addCart'])->name('addCart');

Route::post('/remove-cart-item', [HomeController::class, 'removeCartItem'])
            ->name('removeCartItem');

Route::get('/userprofile/{id}', [HomeController::class, 'userprofile'])->name('userprofile');

Route::post('/userprofile/{id}', [HomeController::class, 'updateuserprofile'])->name('updateuserprofile');

// Route::get('/AddCart/{id}', [HomeController::class, 'AddCart'])->name('AddCart');

// Route::get('/{any}/AddCart2/{id}', [HomeController::class, 'AddCart'])->name('AddCart');

Route::get('/clear-cart', [HomeController::class, 'clearCart'])->name('clearCart');

Route::get('/view-cart', [HomeController::class, 'viewCart'])->name('viewCart');

Route::post('/update-cart', [HomeController::class, 'updateCart'])->name('updateCart');

Route::get('/view-order', [HomeController::class, 'viewOrderHistory'])->name('viewOrderHistory');

Route::get('/DeleteItemCart/{id}', [HomeController::class, 'DeleteItemCart'])->name('DeleteItemCart');

Route::get('/deleteorders/{id}', [HomeController::class, 'deleteorders'])->name('deleteorders');

Route::get('/DeleteListItemCart/{id}', [HomeController::class, 'DeleteListItemCart'])->name('DeleteListItemCart');

Route::post('/SaveListItemCart/{id}/{quanty}', [HomeController::class, 'SaveListItemCart'])->name('SaveListItemCart');

Route::post('/SaveAll', [HomeController::class, 'SaveAll'])->name('SaveAll');

Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');

Route::get('/sort-by',[ProductController::class, 'sort_by'])->name('sort_by');

Route::post('/save-cart', [HomeController::class, 'saveCart'])->name('saveCart');
Route::get('/viewOrderInfo/{id}', [OrderController::class, 'viewOrderInfo'])->name('viewOrderInfo');

Route::get('/product-search', [HomeController::class, 'productSearch'])->name('productSearch');
Route::get('/itemSearch', [ProductController::class, 'itemSearch'])->name('itemSearch');

Route::group(['prefix'=>'product-search', 'as'=>'product-search.'], function() {
    Route::get('/filter',[ProductController::class, 'filter'])->name('filter');

});
Route::group(['middleware'=>'islogin'], function() {

    Route::get('/admin', [DashboardController::class, 'home'])->name('admin');

    Route::get('/logoutad', [DashboardController::class, 'logoutad'])->name('logoutad');

    Route::group(['middleware'=>'isadmin', 'prefix'=>'admin', 'as'=>'admin.'], function() {

        Route::resource('/product', ProductController::class);

        Route::resource('/order', OrderController::class);

        Route::get('/user', [ProductController::class, 'user'])->name('user');


        Route::get('/edituser/{id}', [ProductController::class, 'edituser'])->name('edituser');

        Route::post('/edituser/{id}', [ProductController::class, 'updateuser'])->name('updateuser');

        Route::get('/deleteproduct/{id}', [ProductController::class, 'deleteproduct'])->name('deleteproduct');

        Route::get('/deleteuser/{id}', [ProductController::class, 'deleteuser'])->name('deleteuser');

        Route::get('/edituser/{id}', [ProductController::class, 'edituser'])->name('edituser');

        Route::get('/viewOrderInfoAd/{id}', [OrderController::class, 'viewOrderInfoAd'])->name('viewOrderInfoAd');
        Route::get('/editOrders/{id}', [OrderController::class, 'editOrders'])->name('editOrders');

        Route::post('/editOrders/{id}', [OrderController::class, 'updateOrders'])->name('updateOrders');

        Route::get('/deleteOrders/{id}', [OrderController::class, 'deleteOrders'])->name('deleteOrders');

        Route::get('/searchUser', [ProductController::class, 'searchUser'])->name('searchUser');

        Route::get('/searchOrders', [OrderController::class, 'searchOrders'])->name('searchOrders');

        Route::get('/searchProductAdmin', [ProductController::class, 'searchProductAdmin'])->name('searchProduct');

        Route::get('/category',[HomeController::class, 'category'])->name('category');




    });

});


