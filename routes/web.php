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


Route::get('/', 'CrudController@view');
Route::get('/view', 'CrudController@index');
Route::get('/view/{id}', 'CrudController@show')->name('posts.id');
Route::get('/create', 'CrudController@create')->name('posts.create');
Route::post('/create', array('uses'=>'CrudController@store'));
Route::get('/view/edit/{id}', 'CrudController@edit')->name('posts.modify');;
Route::put('view/edit/{id}', 'CrudController@update')->name('posts.update');
Route::get('/edit/{id}/delete', 'CrudController@destroy')->name('posts.delete');
