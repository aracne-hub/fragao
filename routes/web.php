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

Route::get('/', 'IndexController@index');
Route::get('/admin', 'IndexController@admin');

Auth::routes();

Route::get('/home', 'IndexController@admin');

Route::post('/lanche/{categoria}', 'LancheController@novo');
Route::patch('/lanche/{lanche}', 'LancheController@editar');
Route::delete('/lanche/{lanche}', 'LancheController@deletar');

Route::post('/categoria', 'CategoriaController@novo');
Route::patch('/categoria/{categoria}', 'CategoriaController@editar');
Route::delete('/categoria/{categoria}', 'CategoriaController@deletar');