<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController; // ✅ agrega esta línea
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;

Route::get('/', [ProductController::class, 'index']);


Route::prefix('products')->controller(ProductController::class)->group(function () {

    Route::get('/', 'index');
    Route::get('/create', 'create');
    Route::get('/{id}/{category?}', 'detail');
});

Auth::routes();


Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function(){

    Route::get('/',[AdminController::class ,'index'])-> name('admin.index');
    Route::get('/categories',[CategoryController ::class, 'create'])-> name('admin.categories.create');
    Route::post('/categories/store',[CategoryController ::class, 'store'])-> name('admin.categories.store');



});