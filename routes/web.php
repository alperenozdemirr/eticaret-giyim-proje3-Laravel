<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('bekci/')->group(function (){
    Route::get('index',[\App\Http\Controllers\Backend\DefaultController::class,'indexPage'])->name('bekci.index');
    Route::get('user-lists',[\App\Http\Controllers\Backend\UserController::class,'lists'])->name('bekci.userList');
    Route::get('user/detail-code00{id}',[\App\Http\Controllers\Backend\UserController::class,'userDetails'])->name('bekci.userDetail','id');
    Route::post('changeType',[\App\Http\Controllers\Backend\UserController::class,'changeType'])->name('bekci.changeType');
    Route::post('changeStatus',[\App\Http\Controllers\Backend\UserController::class,'changeStatus'])->name('bekci.changeStatus');
    Route::post('user/search',[\App\Http\Controllers\Backend\UserController::class,'search'])->name('bekci.userSearch');
    Route::get('user/delete/code00{id}',[\App\Http\Controllers\Backend\UserController::class,'delete'])->name('bekci.userDelete','id');
});

Route::get('/',[\App\Http\Controllers\Frontend\DefaultController::class,'indexPage'])->name('index');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
