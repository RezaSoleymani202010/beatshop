<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
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

Route::prefix('admin')->group(function () {
    Route::get('/beats','\App\Http\Controllers\BeatController@index')->middleware('admin')->name('show_beats');
    Route::get('/create_beats','\App\Http\Controllers\BeatController@create')->middleware('admin')->name('create_beat');
    Route::get('/category/{category}','\App\Http\Controllers\CategoryController@show')->middleware('admin')->name('show_category');
    Route::get('/create_category','\App\Http\Controllers\CategoryController@create')->middleware('admin')->name('create_category');
    Route::post('/create_category','\App\Http\Controllers\CategoryController@store')->middleware('admin')->name('store_category');
    Route::post('/create_beat','\App\Http\Controllers\BeatController@store')->middleware('admin')->name('store_beat');
    Route::get('/beats/{beat}','\App\Http\Controllers\BeatController@show')->middleware('admin')->name('show_beat');
    Route::get('/edit_beat/{beat}','\App\Http\Controllers\BeatController@edit')->middleware('admin')->name('edit_beat');
    Route::put('/edit_beat/{beat}','\App\Http\Controllers\BeatController@update')->middleware('admin')->name('update_beat');
    Route::get('/delete_beat/{beat}','\App\Http\Controllers\BeatController@destroy')->middleware('admin')->name('delete_beat');
    Route::get('/search','\App\Http\Controllers\BeatController@search')->middleware('admin')->name('search');

});

Route::get('/home',[\App\Http\Controllers\Controller::class,'home'])->name('home');
Route::get('/users','\App\Http\Controllers\UserController@index')->name('users_list')->middleware('auth');
Route::get('/login','\App\Http\Controllers\Auth\LoginController@loginview')->name('login');

Route::post('/login','\App\Http\Controllers\Auth\LoginController@login')->name('login_store');
Route::get('/register', '\App\Http\Controllers\Auth\RegisterController@create')
    ->name('register_view');
Route::post('/register', '\App\Http\Controllers\Auth\RegisterController@register')
    ->name('register');
Route::get('/logout',[\App\Http\Controllers\Auth\AuthController::class,'logout'])->name('logout');



Route::get('/free_beats',[\App\Http\Controllers\Controller::class,'more_beats'])->name('more_beats');
Route::get('/dl/{beat}',[\App\Http\Controllers\BeatController::class,'download'])->name('download');
Route::view('ex','ex');
Route::view('/meshkat','meshkat');
