<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController; 
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;

Route::get('/', [ProductController::class, 'index']);


Route::get('products/{id}/{category?}', [ProductController::class, 'detail']);

Auth::routes();


Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function () {

    Route::get('/', [AdminController::class, 'index'])->name('admin.index');

    Route::get('/categories', [CategoryController::class, 'table'])->name('admin.categories.table');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])
    ->name('admin.categories.destroy');

    Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products/store', [ProductController::class, 'store'])->name('admin.products.store');

    Route::get('/products', [ProductController::class, 'table'])->name('admin.products.table');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])
    ->name('admin.products.destroy');

    Route::get('/brands', [BrandController::class, 'table'])->name('admin.brands.table');
    Route::post('/brands/store', [BrandController::class, 'store'])->name('admin.brands.store');
    Route::get('/brands/create', [BrandController::class, 'create'])->name('admin.brands.create');
    Route::delete('/brands/{brand}', [BrandController::class, 'destroy'])
    ->name('admin.brands.destroy');

  
});