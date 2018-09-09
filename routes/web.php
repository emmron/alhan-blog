<?php

Route::get('/', 'HomeController@index');

Route::get('/posts', 'PostController@index');
Route::get('/posts/{post}', 'PostController@show');