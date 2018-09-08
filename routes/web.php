<?php

Route::get('/', 'HomeController@index');

Route::get('/posts', 'PostController@index');