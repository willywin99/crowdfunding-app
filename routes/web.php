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

use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\VerifyEmail;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/route-1', function() {
    return 'masuk route-1';
})->middleware(['auth', 'email_verified']);

Route::get('/route-2', function() {
    return 'masuk route-2';
})->middleware(['auth', 'email_verified', 'admin']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
