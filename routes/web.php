<?php

use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;





Route::get('/',[FrontendController::class, 'index'])->name('index');

Route::controller(FrontendController::class)->prefix('product/')->group(function(){
    Route::get('/{url}/{slug}','product_category')->name('product_category'); // category product
    Route::get('/fashion-and-clothing/man-fashion','sub_category_product')->name('sub_category_product'); // sub category product
    Route::get('/fashion-and-clothing/man-fashion/t-shirt','sub_sub_category_product')->name('sub_sub_category_product'); // sub category product
});


Route::controller(FrontendController::class)->prefix('product/purchese')->group(function(){
    Route::get('/fashion-and-clothing/man-fashion/t-shirt/xyz','purchese_product')->name('purchese_product'); // sub category product
});





















Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin_auth.php';
require __DIR__.'/backend.php';
