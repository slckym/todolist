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

    Route::get('/', 'ListController@index')->name('home');
    Route::resource('list', 'ListController')->except([
        'edit', 'update', 'index', 'create'
    ]);
    Route::post('list/change', 'ListController@change')->name('list.change');


    Route::resource('item', 'ItemController')->except([
        'edit', 'update', 'show', 'index', 'create'
    ]);
    Route::get('item/completed/{id}', 'ItemController@completed')->name('item.completed');
    Route::get('item/pending/{id}', 'ItemController@pending')->name('item.pending');
    Route::post('item/change', 'ItemController@change')->name('item.change');
    Auth::routes();
