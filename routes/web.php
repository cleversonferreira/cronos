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

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', 'CronosController@index')->name('dashboard');

// Cronos routes
Route::group(['prefix' => '/cronos'], function(){

    Route::get('create', 'CronosController@create')->name('create');
    Route::get('{id}', 'CronosController@view')->name('view');
    Route::get('edit/{id}', 'CronosController@edit')->name('edit');
    Route::put('update/{id}', 'CronosController@update')->name('update');
    Route::post('store', 'CronosController@store')->name('store');
    Route::get('delete/{id}', 'CronosController@destroy')->name('destroy');
});