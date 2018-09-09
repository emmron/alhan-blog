<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta name="robots" content="{{ app()->env == 'production' ? 'index, follow' : 'noindex, nofollow' }}">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Blog</title>
    </head>
    <body>
        <a href="/">Home</a>
        @if (Auth::check())
        <a href="/posts/{{ $post->id }}/edit">Edit</a>
        @endif
        <h1>{{ $post->title }}</h1>
        <p>{!! $post->body !!}</p>
    </body>
</html>