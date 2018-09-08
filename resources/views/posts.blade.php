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
        <h1>All Posts</h1>
        <ul>
        @foreach ($posts as $post)
            <li>{{ $post->title }}</li>
        @endforeach
        </ul>
        <a href="/posts">See All Posts</a>
    </body>
</html>