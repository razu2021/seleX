<?php

use App\Http\Controllers\backend\admin\AdminController;
use Illuminate\Support\Facades\Route;




Route::middleware('auth:admin')->group(function(){


Route::get('admin/dashboard',[AdminController::class, 'index'])->name('admin.dashboard');


});