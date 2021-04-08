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

Route::get('/', 'FrontController@home')->name('/');
Route::get('home', 'FrontController@home')->name('home');
Route::get('testimonials', 'FrontController@testimonials')->name('testimonials');
Route::get('about-us', 'FrontController@aboutUs')->name('about-us');
Route::get('job', 'FrontController@job')->name('job');
Route::get('writer', 'FrontController@writer')->name('writer');