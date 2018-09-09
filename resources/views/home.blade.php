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
        <h1>Blog Home (Demo)</h1>
        <ul>
        @foreach ($posts as $post)
            <li><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></li>
        @endforeach
        </ul>
        <a href="/posts">See All Posts</a>
    </body>
</html>