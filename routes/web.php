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

Route::get('/', 'PrincipalController@getIndex');

Route::get('/mgp', 'PrincipalController@getMinecraftGenerateProperties');

Route::get('/profile', 'PrincipalController@getPerfilUsuario');

Route::get('/addMinecraftServer', 'PrincipalController@getAddMinecraftServer');

Route::post('/saveMinecraftServer', 'PrincipalController@saveMinecraftServer');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
