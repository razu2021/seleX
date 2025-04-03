<?php

use App\Http\Controllers\backend\admin\AdminController;
use App\Http\Controllers\backend\category\categoryController;
use Illuminate\Support\Facades\Route;



/**================   Admin auth middleware route protection ============ */
Route::middleware('auth:admin')->group(function(){
/**================   Admin auth middleware route protection ============ */

Route::get('admin/dashboard',[AdminController::class, 'index'])->name('admin.dashboard');



/** -------  optimization  clear code ------- */
Route::get('admin/dashboard/cc',function(){
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return " Optimize Clear Successfuly ! ";

});





/**-------------  category route is here ------- */
Route::controller(categoryController::class)->prefix('admin/dashboard/category/')->name('category.')->group(function(){
    Route::get('all','index')->name('all');
    Route::get('add','add')->name('add');
    Route::get('view/{id}/{slug}','view')->name('view');
    Route::get('edit','edit')->name('edit');
    Route::post('submit','insert')->name('submit');
    Route::post('update','update')->name('update');
    Route::get('softdelet','softdelet')->name('softdelet');
    Route::get('restore','restore')->name('restore');
    Route::get('delete','delete')->name('delete');
});























































/**================   Admin auth middleware route protection ============ */
});
/**================   Admin auth middleware route protection ============ */