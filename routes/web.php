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

Route::post('forget-password', 'AuthController@forgetPassword')->middleware('guest')->name('password.email');
Route::post('reset-password', 'AuthController@resetPassword')->middleware('guest')->name('password.update');



Route::middleware(['guest'])->group(function () {
    Route::post('login-action', 'AuthController@loginAction')->name('login-action');
    Route::post('register-action', 'AuthController@registerAction')->name('register-action');
});

Route::middleware(['auth'])->group(function () {
    Route::get('logout', 'AuthController@logout')->name('logout');
    // Route::get('job', 'FrontController@job')->name('job');
    Route::resource('job', 'JobController');
    Route::get('cancel/{id}', 'JobController@cancelPaypalPayment')->name('payment.cancel');
    Route::get('payment/success/{id}', 'JobController@successPaypalPayment')->name('payment.success');


    Route::put('job/{id}/refund', 'JobController@refund')->name('job.refund');


    Route::get('dashboard', 'FrontController@profile')->name('dashboard');
    Route::get('profile', 'FrontController@profile')->name('profile');
    Route::put('profile/update', 'FrontController@updateProfile')->name('profile.update');

    Route::get('blog', 'FrontController@blogs')->name('blog.index');
    Route::get('blog-category/{slug}', 'FrontController@blogByCategory')->name('blog-category.index');

    Route::get('blog/{slug}', 'FrontController@blog')->name('blog.show');
    Route::post('blog/{id}/comment/create', 'FrontController@add_comment')->name('blog.comment.create');

    Route::get('message', 'FrontController@message')->name('message');
    Route::post('message', 'FrontController@messageSend')->name('message.send');
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
        Route::put('job/{id}/release', 'JobController@release')->name('job.release');

        Route::resource('customer', 'CustomerController')->except(['store', 'destroy', 'create', 'edit']);
        Route::resource('blog', 'BlogController');
        Route::post('blog/delete/image', 'BlogController@image_delete');

        Route::resource('blog-category', 'BlogCategoryController');
    });
});