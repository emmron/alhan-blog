<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta name="robots" content="{{ app()->env == 'production' ? 'index, follow' : 'noindex, nofollow' }}">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/app.css" class="rel">
        <title>Blog</title>
    </head>
    <body>
        <div class="page-container">
            <div class="post-container slide-up-container time-2">
                @if (Auth::check())
                <a href="/posts/{{ $post->id }}/edit">Edit</a>
                    @if (! $post->published)
                    <p style="background:yellow; padding: 10px;">DRAFT</p>
                    @endif
                @endif
                <h1 class="fade-in time-2">{{ $post->title }}</h1>
                <small class="fade-in time-3">{{ $post->date }}</small>
                <p class="fade-in time-3">{!! $post->body !!}</p>
            </div>
            <div class="header fade-in time-4">
                <div class="logo"><a href="/">alhan.co</a></div>
            </div>
        </div>
    </body>
</html>