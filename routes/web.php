<?php

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('posts', 'PostController@index');
Route::get('posts/{post}', 'PostController@show')->where('post', '[0-9]+');

Route::get('posts/create', 'PostController@create')->middleware('auth');
Route::post('posts/create', 'PostController@store')->middleware('auth');

Route::get('posts/{post}/edit', 'PostController@edit')
    ->where('post', '[0-9]+')
    ->middleware('auth');

Route::post('posts/{post}/edit', 'PostController@update')
    ->where('post', '[0-9]+')
    ->middleware('auth');