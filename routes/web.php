<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\DashboardController;

Route::view('/','welcome');


Route::controller(ProductController::class)->group(function(){

    Route::get('products/create','create')
    ->name('products.create')
    // ->middleware('auth')
    ;

    Route::post('add_product', 'store');
});


// show pizza menu with search facility
Route::controller(ProductCategoryController::class)->group(function(){

    Route::get('products', 'index')->name('products.index');
    Route::get('products/search_results', 'searchResults')->name('products.search_results');
});

Auth::routes(
    // ['register' => false] // disable register link
);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
