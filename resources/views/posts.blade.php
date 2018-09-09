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
        <h1>All Posts</h1>
        <ul>
        @foreach ($posts as $post)
            <li><a href="posts/{{ $post->id }}">{{ $post->title }}</a></li>
        @endforeach
        </ul>
    </body>
</html>