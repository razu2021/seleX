<?php

use App\Http\Controllers\backend\admin\AdminController;
use App\Http\Controllers\product\productController;
use Illuminate\Support\Facades\Route;




Route::middleware('auth:admin')->group(function(){


Route::get('admin/dashboard',[AdminController::class, 'index'])->name('admin.dashboard');





Route::get('/product',[productController::class,'add'])->name('add_product');






});