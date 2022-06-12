<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\ShoppingCartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => '/','middleware' => 'checkLogin'], function () {
    Route::get('/', function () {
        return view('index');
    })->name('home');

    Route::group(['prefix' => 'products'],function (){
        Route::get('/nike',function (){
            return view('users.pages.products.nike');
        })->name('products_nike');

        Route::get('/adidas',function (){
            return view('users.pages.products.adidas');
        })->name('products_adidas');

        Route::get('/vans',function (){
            return view('users.pages.products.vans');
        })->name('products_vans');
    });
    Route::get('shoppingCart',[ShoppingCartController::class,'indexShoppingCart'])->name('shoppingCart');
    Route::post('addProductCart',[ShoppingCartController::class,'addProductCart'])->name('addProductCart');
    Route::post('checkout',[ShoppingCartController::class,'checkout'])->name('checkout');
    Route::post('/product-details',[ProductController::class,'showProductDetails'])->name('productsDetails');
});


Route::group(['prefix' => 'account','middleware' => 'checkLogout'], function () {
    Route::get('/login', function () {
        return view('login');
    })->name('login');

    Route::get('/register', function () {
        return view('register');
    })->name('register');
});

Route::group(['prefix' => 'user'], function () {
    Route::post('/createUser', [UserController::class, 'createUser'])->name('createUser');
    Route::post('/loginUser', [UserController::class, 'loginUser'])->name('loginUser');
    Route::get('/logoutUser', [UserController::class, 'logoutUser'])->name('logoutUser');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/',[AdminController::class,'index'])->name('adminIndex');
    Route::get('/showUsers',[AdminController::class,'showUsersAdmin'])->name('showUsersAdmin');
    Route::post('/showUserSearch',[AdminController::class,'searchUserAdmin'])->name('searchUserAdmin');
    Route::post('/showProductSearch',[AdminController::class,'searchProductAdmin'])->name('searchProductAdmin');
    Route::get('/showProducts',[AdminController::class,'showProductsAdmin'])->name('showProductsAdmin');
    Route::get('/view-add-product',[AdminController::class,'viewAddProduct'])->name('viewAddProduct');
    Route::post('/addProduct',[AdminController::class,'addProduct'])->name('addProduct');
    Route::post('/updateProduct',[AdminController::class,'requestProduct'])->name('requestProduct');
    Route::post('/updateProducts',[AdminController::class,'updateProduct'])->name('updateProduct');
    Route::get('/wait-accept-cart',[AdminController::class,'showListCart'])->name('showListCart');
    Route::post('/accept-cart',[AdminController::class,'acceptCart'])->name('acceptCart');
    Route::post('/cancel-cart',[AdminController::class,'cancelCart'])->name('cancelCart');

    Route::group(['prefix' => '/ajax'],function (){
        Route::post('/deleteUser',[AdminController::class,'deleteUser'])->name('deleteUser');
        Route::post('/deleteProduct',[AdminController::class,'deleteProduct'])->name('deleteProduct');
    });
});















