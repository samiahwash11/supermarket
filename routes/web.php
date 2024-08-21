<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

 Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
    Route::get('/index', [ProductController::class, 'index'])->name('index');
    Route::get('/create', [ProductController::class, 'create'])->name('create');
    Route::post('/store', [ProductController::class, 'store'])->name('store');
    Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('edit');
    Route::any('/update/{product}', [ProductController::class, 'update'])->name('update');
    Route::get('/delete/{product}', [ProductController::class, 'destroy'])->name('delete');
    Route::get('/show/{product}', [ProductController::class, 'show'])->name('show');
    Route::get('/softDelete/{product}', [ProductController::class, 'softDelete'])->name('softDelete');
    Route::get('/trash', [ProductController::class, 'trashedProducts'])->name('trash');


});