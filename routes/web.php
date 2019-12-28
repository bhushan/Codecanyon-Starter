<?php

Route::get('/', function () {
	return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('user-settings', 'SettingController@userSettings')->name('user-settings');
Route::patch('user-settings', 'SettingController@patchUserSettings')->name('patch.user-settings');
Route::patch('user-password', 'SettingController@patchUserPassword')->name('patch.user-password');

Route::group([
	'as' => 'admin.',
	'middleware' => 'roles',
	'roles' => ['admin'],
], function () {
});
