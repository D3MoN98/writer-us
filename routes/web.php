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
Route::get('writer', 'FrontController@writer')->name('writer');



Route::middleware(['guest'])->group(function () {
    Route::post('login-action', 'AuthController@loginAction')->name('login-action');
    Route::post('register-action', 'AuthController@registerAction')->name('register-action');
});

Route::middleware(['auth'])->group(function () {
    Route::get('logout', 'AuthController@logout')->name('logout');
    // Route::get('job', 'FrontController@job')->name('job');
    Route::resource('job', 'JobController');

    Route::get('dashboard', 'FrontController@profile')->name('dashboard');
    Route::get('profile', 'FrontController@profile')->name('profile');
    Route::put('profile/update', 'FrontController@updateProfile')->name('profile.update');
});


Route::namespace('Admin')->prefix('admin/')->name('admin.')->group(function () {

    Route::middleware(['guest'])->group(function () {
        Route::get('login', 'AuthController@login')->name('login');
        Route::post('login-action', 'AuthController@loginAction')->name('login-action');
    });

    Route::middleware(['admin'])->group(function () {
        Route::get('dashboard', 'AuthController@dashboard')->name('dashboard');
        Route::resource('writer', 'WriterController');
        Route::resource('job', 'JobController')->except(['store', 'destroy', 'create']);
    });
});