<?php

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('privacy', function() {
    $css = Cache::remember('css', 22*60, function() {
        return Storage::disk('public')->get('/css/app.css');
    });
    return view('static.privacy', compact('css'));
});

Route::get('posts', 'PostController@index');
Route::get('p/{slug}', 'PostController@show');


Route::get('posts/drafts', 'PostController@drafts')->middleware('auth');
Route::get('posts/create', 'PostController@create')->middleware('auth');
Route::post('posts/create', 'PostController@store')->middleware('auth');

Route::get('posts/{post}/edit', 'PostController@edit')
    ->where('post', '[0-9]+')
    ->middleware('auth');

Route::post('posts/{post}/edit', 'PostController@update')
    ->where('post', '[0-9]+')
    ->middleware('auth');

Route::get('posts/{post}/destroy', 'PostController@destroy')
    ->where('post', '[0-9]+')
    ->middleware('auth');