<?php

Route::group(['middleware' => 'auth:api'], function () {
	
	Route::get('/', '\Woodoocoder\LaravelMedia\Controllers\MediaController@index');
});
