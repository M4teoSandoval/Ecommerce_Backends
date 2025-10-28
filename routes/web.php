<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController; // ✅ agrega esta línea
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController; 

Route::get('/', [ProductController::class, 'index']);


Route::prefix('products')->controller(ProductController::class)->group(function () {

    Route::get('/', 'index');
    Route::get('/create', 'create');
    Route::get('/{id}/{category?}', 'detail');
});

Auth::routes();


Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('admin')->controller(AdminController::class)->group(function(){

    Route::get('/', 'index')-> name('admin.index');



});