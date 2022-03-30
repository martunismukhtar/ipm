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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('user', 'App\Http\Controllers\UserController@index');
Route::get('daftar-pekerjaan', 'App\Http\Controllers\ProfileController@listPekerjaan');
Route::get('daftar-tahun-lahir', 'App\Http\Controllers\ProfileController@listTahunLahir');
Route::get('daftar-bulan-lahir', 'App\Http\Controllers\ProfileController@listBulanLahir');

Route::post('filter', 'App\Http\Controllers\ProfileController@filter');
Route::post('checkout', 'App\Http\Controllers\ProfileController@checkout');
Route::get('profile/{pekerjaan}/{tahun}/{bulan}', 'App\Http\Controllers\ProfileController@show');
    // ->where(['pekerjaan'=>'[aA-zZ]+', 'tahun'=>'[0-9]+', 'bulan'=>'[0-9]+']);
Route::post('profile', 'App\Http\Controllers\ProfileController@store');
Route::put('profile/{id}', 'App\Http\Controllers\ProfileController@update')
    ->where('id', '[0-9]+');
Route::delete('profile/{id}', 'App\Http\Controllers\ProfileController@destroy')
    ->where('id', '[0-9]+');