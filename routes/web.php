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
use Illuminate\Support\Facades\Route;

// Route url
Route::get('/', 'AdminController@dashboard');

// Route Dashboards
Route::get('dashboard', 'AdminController@dashboard');

// Route Components
Route::get('docs', 'AdminController@docs');
Route::get('myprofile', 'AdminController@mprofile');
Route::get('times', 'AdminController@times');
Route::get('task', 'TaskController@data');
Route::get('account', 'AdminController@account');
Route::post('update', 'AccountController@update');
Route::post('password', 'AccountController@password');
Route::post('savedoc', 'FilesController@savedoc');
Route::post('files', 'FilesController@files');
Route::view('bb', 'pages.bb');
Route::post('store' , 'TaskController@store');

// Registration routes...
Route::get('register', 'AuthenticationController@register');
Route::post('register', 'AuthenticationController@register');

Route::get('lock', 'LockScreenController@lock');
Route::get('plock', 'LockScreenController@viewLockScreen');
Route::post('unlock', 'LockScreenController@unlock');

//update accountSwitch1
//Route::auth(['verify' => true]);

//Auth::routes();
// Authentication routes...
Route::get('logon', 'AuthenticationController@login');
Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@register');
Route::get('logout', 'AuthController@logout');

Route::post('/auth-login/validate', 'Auth\LoginController@validate_api');
