<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('login', 'Auth\LoginController@apilogin');

Route::get('pegawai', 'API\PegawaiController@index');
Route::get('pegawai/{pegawai}', 'API\PegawaiController@show');
Route::post('pegawai', 'API\PegawaiController@store');
Route::put('pegawai/{pegawai}', 'API\PegawaiController@update');
Route::delete('pegawai/{pegawai}', 'API\PegawaiController@destroy');


Route::get('aktivitas', 'API\AktivitasController@index');
Route::get('aktivitas/{aktivitas}', 'API\AktivitasController@show');
Route::post('aktivitas', 'API\AktivitasController@store');
Route::put('aktivitas/{aktivitas}', 'API\AktivitasController@update');
Route::delete('aktivitas/{aktivitas}', 'API\AktivitasController@destroy');