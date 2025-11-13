<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController; // ✅ agrega esta línea
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;

Route::get('/', [ProductController::class, 'index']);


Route::get('products/{id}/{category?}', [ProductController::class, 'detail']);

Auth::routes();


Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function () {

    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/categories', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('admin.categories.store');

    Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products/store', [ProductController::class, 'store'])->name('admin.products.store');

    Route::get('/products', [ProductController::class, 'table'])->name('admin.products.table');
});