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

Route::get('/', 'WebController@index')->name('index');

Route::get('create', 'WebController@goCreate')->name('create');

Route::group(['prefix'=>'meme'], function() {
    Route::get('all', 'WebController@all');
    Route::get('id/{id}', 'WebController@id');
    Route::get('page/{pageid}', 'WebController@page');
    Route::post('create', 'WebController@create')->name('createSubmit');
});

