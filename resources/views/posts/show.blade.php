<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta name="robots" content="{{ app()->env == 'production' ? 'index, follow' : 'noindex, nofollow' }}">
        <meta name="description" content="">
        <link rel="shortcut icon" href="data:image/x-icon;" type="image/x-icon"> 
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Blog</title>
        <link rel="preload" as="font" crossorigin="crossorigin" type="font/woff2" href="https://fonts.gstatic.com/s/lora/v12/0QIgMX1D_JOuO7HeNtxumtus-7w.woff2">
        <style>{!! $css !!}</style>
    </head>
    <body>
        <div class="page-container">
            <div class="post-container">
                @if (Auth::check())
                <a href="/posts/{{ $post->id }}/edit">Edit</a>
                    @if (! $post->published)
                    <p style="background:yellow; padding: 10px;">DRAFT</p>
                    @endif
                @endif
                <h1>{{ $post->title }}</h1>
                <small>{{ $post->updated_at }}</small>
                <p>{!! $post->body !!}</p>
            </div>
            <div class="header  time-4">
                <div class="logo"><a href="/">alhan.co</a></div>
            </div>
        </div>
    </body>
</html>