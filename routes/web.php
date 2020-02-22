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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'home', 'middleware' => ['auth']], function () {
    Route::get('/actives', 'HomeController@index')->name('home.index');
    Route::get('/create', 'HomeController@create')->name('home.create');
    Route::get('/create/address', 'HomeController@createAddress')->name('create.address');
});

Route::group(['prefix' => 'ajax'], function () {
    Route::get('/addresses', 'ajaxController@addresses');
    Route::get('/floors', 'ajaxController@floors');
    Route::get('/objects', 'ajaxController@objects');
    Route::get('/object/{id}', 'ajaxController@object');
    Route::get('/filters', 'ajaxController@filters');

    Route::post('/create/address', 'ajaxController@createAddress');
    Route::post('/delete/address', 'ajaxController@deleteAddress');
});