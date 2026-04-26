<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/about', [AboutController::class, 'index'])->middleware(['auth'])->name('about');

    // Product routes
    Route::get('/product/export', [App\Http\Controllers\ProductController::class, 'export'])
        ->middleware('can:export-product')
        ->name('product.export');
        
    // Praktikum 4 - Verbal Routes
    Route::get('/product', [App\Http\Controllers\ProductController::class, 'index'])->name('product.index');
    Route::post('/product', [App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
    Route::get('/product/create', [App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
    Route::get('/product/{id}', [App\Http\Controllers\ProductController::class, 'show'])->name('product.show');
    Route::put('/product/update/{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('product.update');
    Route::get('/product/edit/{product}', [App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit');
    Route::delete('/product/delete/{id}', [App\Http\Controllers\ProductController::class, 'delete'])->name('product.delete');

    // Category Routes
    Route::resource('category', App\Http\Controllers\CategoryController::class)->middleware('can:admin');
});



require __DIR__.'/auth.php';
