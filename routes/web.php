<?php

use App\Http\Controllers\RegisterController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile/edit', function () {
    return view('profile.edit');
})->name('profile.edit');

Route::get('/user', function () {
    return view('users.index');
})->name('user.index');

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
