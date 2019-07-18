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


Route::group(['middleware' => 'auth'], function () {

    Route::get('/profile', 'PrincipalController@getPerfilUsuario');

    Route::get('/addMinecraftServer', 'PrincipalController@getAddMinecraftServer');

    Route::get('/serverList', 'DBController@getMyServerList');

    Route::post('/saveMinecraftServer', 'DBController@postSaveMinecraftServer');

    Route::get('/selectMinecraftServer/{serverName}', 'DBController@getSelectMinecraftServer');

    Route::post('/sendCommand', 'MinecraftRconController@PostSendCommand');
});

Auth::routes();


//GET /login -> get /home
Route::redirect('/home', '/');
//Route::get('/home', 'HomeController@index')->name('home');
