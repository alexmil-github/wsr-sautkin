<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::get('/admin', 'App\Http\Controllers\AdminController@index')->name('admin')->middleware('admin');

Route::resource('applications', 'App\Http\Controllers\ApplicationController')->middleware('auth');
Route::get('applications', 'App\Http\Controllers\ApplicationController@index')->name('all.application')->middleware('auth');
Route::post('applications', 'App\Http\Controllers\ApplicationController@store')->name('application.store')->middleware('auth');
Route::delete('applications/{id}', 'App\Http\Controllers\ApplicationController@destroy')->name('application.delete')->middleware('auth');


Route::get('/categories', 'App\Http\Controllers\CategoryController@index')->name('category.list')->middleware('admin');
Route::post('/categories', 'App\Http\Controllers\CategoryController@store')->name('category.store')->middleware('admin');
Route::delete('/categories/{id}', 'App\Http\Controllers\CategoryController@destroy')->name('category.delete')->middleware('admin');
Route::get('/categories/form', 'App\Http\Controllers\CategoryController@form')->name('category.page')->middleware('admin');






