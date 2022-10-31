<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
->name('*', 'admin.news')
*/


Route::get('/admin', function () {return view('admin.index');})->name('admin.index');

Route::get('/post/{id}', 'App\Http\Controllers\PostController@show')->name('posts');

Route::delete('/admin/posts/deletecover/{id}', 'App\Http\Controllers\PostController@deletecover')->name('delete.cover');
Route::delete('/admin/posts/deleteimage/{id}', 'App\Http\Controllers\PostController@deleteimage')->name('delete.image');

Route::put('/admin/posts/update', 'App\Http\Controllers\PostController@update');

Route::resource('/admin/posts', 'App\Http\Controllers\PostController');



Route::resource('/admin/carousel', 'App\Http\Controllers\CarouselController');

Route::get('/', 'App\Http\Controllers\MainController@index')->name('home');

Route::get('/register', 'App\Http\Controllers\UserController@create')->name('register.create');
Route::post('/register', 'App\Http\Controllers\UserController@store')->name('register.store');


//Route::get('/admin/carousel', function () {
//    return view('welcome');
//});

//Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'], function (){
//    Route::get('/', 'App\Http\Controllers\CarouselController@index')->name('admin.index');
//    Route::resource('/carousel', 'CarouselController')->name('carousel');
//});
