<?php

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

Auth::routes(['verify' => true]);

Route::namespace('Backoffice')->group(function () {
    Route::prefix('account')->group(function () {
        $this->get('/', 'Auth\LoginController@showLoginForm');

        // Authentication Routes...
        $this->get('/login', 'Auth\LoginController@showLoginForm')->name('backoffice.login');
        $this->post('/login', 'Auth\LoginController@login');
        $this->post('/logout', 'Auth\LoginController@logout')->name('backoffice.logout');

        // Password Reset Routes...
        $this->get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('backoffice.password.request');
        $this->post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('backoffice.password.email');
        $this->get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('backoffice.password.reset');
        $this->post('/password/reset', 'Auth\ResetPasswordController@reset')->name('backoffice.password.update');
    });

    Route::middleware('auth:backoffice')->group(function () {
        Route::get('/dashboard', 'HomeController@index')->name('backoffice.dashboard');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
});
