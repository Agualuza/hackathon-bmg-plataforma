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

Route::get('/', 'HomeController@index');
Route::post('/login', 'HomeController@login');
Route::get('/logout', 'HomeController@logout');
Route::post('/logout', 'HomeController@logout');
Route::get('/conta', 'AccountController@index')->middleware('auth');
Route::get('/leitura', 'ReadController@index')->middleware('auth');
Route::post('/leitura', 'ReadController@index')->middleware('auth');
Route::get('/configuracao', 'SettingsController@index')->middleware('auth');
Route::post('/configuracao/save', 'SettingsController@save')->middleware('auth');
Route::get('/leitura/{id}', 'ReadController@post');
// Route::post('/index')->middleware('auth');