<?php

Route::group(['middleware' => 'api'], function () {
	
	Route::get('/', '\Woodoocoder\LaravelMedia\Controllers\MediaController@index');
});