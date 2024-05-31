<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StoresController;
use App\Http\Middleware\Authenticated;

Route::get('/', function(){
    return redirect()->route('users.login');
});

Route::name('users.')->group(function(){
    Route::get('/users/login',[UserController::class,'login'])->name('login');
    Route::get('/users/register',[UserController::class,'register'])->name('register');
    
    Route::get('/users/profile/catalogs',[ProductController::class,'getProducts'])->name('catalogs');
    
    Route::get('/users/profile/{username}',[UserController::class,'profile'])->name(('profile'));
    Route::get('/users/details/{id}',[UserController::class,'detailUser'])->name('details');

    Route::get('/users/logout',[UserController::class,'logout'])->name('logout');
});

Route::name('auth.')->group(function(){
    Route::post('/auth/register',[UserController::class,'userRegister']);
    Route::post('/auth/login',[UserController::class,'userLogin']);
});

Route::name('product.')->group(function(){
    Route::get('/product/update/{id}',[ProductController::class,'showUpdateProduct'])->name('showUpdateCatalog');
    Route::post('/product/add',[ProductController::class,'createProduct'])->name('addCatalog');
    Route::put('/product/update/{id}',[ProductController::class,'updateProduct'])->name('updateCatalog');
    Route::delete('/product/delete/{id}',[ProductController::class,'deleteProduct'])->name('deleteCatalog');
});


Route::name('stores.')->group(function(){
    Route::get('/stores/shops',[StoresController::class,'getShops'])->name('shops');
    Route::get('/stores/{id}',[StoresController::class,'getStores'])->name('stores');
    Route::post('/stores/add',[StoresController::class,'createStore'])->name('addStore');
});


