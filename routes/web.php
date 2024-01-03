<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::group(["middleware" => "auth"], function () {
    Route::prefix('category')->group(function () {
        Route::get('index', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('store', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('edit/{id}', [CategoryController::class, 'update'])->name('categories.update');
    });


    // Sub Categories Routes
    Route::prefix('subcategory')->group(function () {
        Route::get('index', [SubCategoryController::class, 'index'])->name('subcategories.index');
        Route::get('create', [SubCategoryController::class, 'create'])->name('subcategories.create');
        Route::post('store', [SubCategoryController::class, 'store'])->name('subcategories.store');
        Route::get('edit/{id}', [SubCategoryController::class, 'edit'])->name('subcategories.edit');
        Route::put('update/{id}', [SubCategoryController::class, 'update'])->name('subcategories.update');
    });


    // Products Routes
    Route::prefix('product')->group(function () {
        Route::get('index', [ProductController::class, 'index'])->name('products.index');
        Route::get('create', [ProductController::class, 'create'])->name('products.create');
        Route::post('store', [ProductController::class, 'store'])->name('products.store');
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('update/{id}', [ProductController::class, 'update'])->name('products.update');
        Route::get('getSubCategory', [ProductController::class, 'GetSubCategory'])->name('products.getsubcategory');
    });

});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





Route::get('/profile/edit', function () {
    return view('profile.edit');
})->name('profile.edit');

Route::get('/user', function () {
    return view('users.index');
})->name('user.index');

Route::get('/category', function () {
    return view('category.index');
})->name('category.index');

Route::get('/pages/icons', function () {
    return view('pages.icons');
})->name('pages.icons');

Route::get('/pages/maps', function () {
    return view('pages.maps');
})->name('pages.maps');

Route::get('/pages/notifications', function () {
    return view('pages.notifications');
})->name('pages.notifications');

Route::get('/pages/tables', function () {
    return view('pages.tables');
})->name('pages.tables');

Route::get('/pages/typography', function () {
    return view('pages.typography');
})->name('pages.typography');

Route::get('/pages/rtl', function () {
    return view('pages.rtl');
})->name('pages.rtl');

Route::get('/pages/upgrade', function () {
    return view('pages.upgrade');
})->name('pages.upgrade');
