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

    Route::get('category-list',[\App\Http\Controllers\Backend\CategoryController::class,'lists'])->name('bekci.categoryList');
    Route::get('new-category',[\App\Http\Controllers\Backend\CategoryController::class,'addPage'])->name('bekci.newCategoryPage');
    Route::post('new-category',[\App\Http\Controllers\Backend\CategoryController::class,'add'])->name('bekci.newCategory');
    Route::get('category/delete/{id}',[\App\Http\Controllers\Backend\CategoryController::class,'delete'])->name('bekci.categoryDelete','id');
    Route::get('category/update/code00{id}',[\App\Http\Controllers\Backend\CategoryController::class,'updatePage'])->name('bekci.categoryUpdatePage','id');
    Route::post('category-update',[\App\Http\Controllers\Backend\CategoryController::class,'update'])->name('bekci.categoryUpdate');

    Route::get('product-list',[\App\Http\Controllers\Backend\ProductController::class,'lists'])->name('bekci.productList');
    Route::post('product/search',[\App\Http\Controllers\Backend\ProductController::class,'search'])->name('bekci.productSearch');
    Route::get('new-product',[\App\Http\Controllers\Backend\ProductController::class,'addPage'])->name('bekci.productAddPage');
    Route::post('new-product',[\App\Http\Controllers\Backend\ProductController::class,'add'])->name('bekci.productAdd');
    Route::get('product/images/code00{id}',[\App\Http\Controllers\Backend\ProductController::class,'imagesPage'])->name('bekci.productImages','id');
    Route::post('product/images',[\App\Http\Controllers\Backend\ProductController::class,'images'])->name('bekci.productImagesPost');
    Route::get('product/delete/code0{image}-{product}',[\App\Http\Controllers\Backend\ProductController::class,'imageDelete'])->name('bekci.imageDelete',['image','delete']);
    Route::get('product/delete/code00{id}',[\App\Http\Controllers\Backend\ProductController::class,'delete'])->name('bekci.productDelete','id');
    Route::post('product/image/order-change',[\App\Http\Controllers\Backend\ProductController::class,'orderChange'])->name('bekci.imageOrder');
    Route::get('product/update/code00{id}',[\App\Http\Controllers\Backend\ProductController::class,'updatePage'])->name('bekci.productUpdatePage','id');
    Route::post('product/update',[\App\Http\Controllers\Backend\ProductController::class,'update'])->name('bekci.productUpdate');
});

Route::get('/',[\App\Http\Controllers\Frontend\DefaultController::class,'indexPage'])->name('index');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
