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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/homepage', function () {
    return view('homepage');
});

Route::get('/login/responsable', 'Auth\LoginController@showResponsableLoginForm')->name('login.responsable');
Route::get('/login/membre', 'Auth\LoginController@showMembreLoginForm')->name('login.membre');
Route::post('/login/responsable', 'Auth\LoginController@responsableLogin');
Route::post('/login/membre', 'Auth\LoginController@membreLogin');

