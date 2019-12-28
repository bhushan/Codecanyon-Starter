<?php

Route::get('/', function () {
	return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
	'as' => 'admin.',
	'middleware' => 'roles',
	'roles' => ['admin'],
], function () {
});
