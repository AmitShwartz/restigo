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

Route::get('/items','ItemController@indexView');

Route::get('/clients',function(){
    return view ('clients');
});
Route::get('/clients','ClientController@indexView');

Route::get('/diversities',function(){
    return view ('diversities');
});
Route::get('/diversities','DiversityController@indexView');
