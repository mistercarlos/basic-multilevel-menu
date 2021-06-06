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

Route::get('signup', 'App\Http\Controllers\PageController@signup')->name('signup');
Route::get('signin', 'App\Http\Controllers\PageController@signin')->name('signin');

Route::post('register', 'App\Http\Controllers\UserController@register')->name('register');
Route::post('login', 'App\Http\Controllers\UserController@login')->name('login');
Route::post('logout', 'App\Http\Controllers\UserController@logout')->name('logout');


Route::get('/', 'App\Http\Controllers\PageController@home')->name('home');

Route::get('/admin', 'App\Http\Controllers\PageController@admin')->name('admin');    
Route::get('menu/index', 'App\Http\Controllers\PageController@menu_index')->name('menu.index');
Route::get('menu/create', 'App\Http\Controllers\PageController@menu_create')->name('menu.create');
Route::post('menu/store', 'App\Http\Controllers\PageController@menu_store')->name('menu.store');
