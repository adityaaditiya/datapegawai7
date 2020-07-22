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

Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/list', 'HomeController@getData')->name('pegawai.list');
Route::resource('/pegawai', 'HomeController')->except('index');


Route::get('/aktivitas', 'AktivitasController@index')->name('aktivitas');
Route::get('/lis', 'AktivitasController@getData')->name('aktivitas.lis');
Route::resource('/aktivitas', 'AktivitasController')->except('index');
