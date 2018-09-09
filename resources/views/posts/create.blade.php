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
        <h1>Create Post</h1>
        {!! Form::open(['url' => 'posts/create']) !!}
            {!! Form::label('title', 'Post Title'); !!}
            <br>
            {!! Form::text('title'); !!}
            <br>
            {!! Form::label('body', 'Post Body'); !!}
            <br>
            {!! Form::textarea('body'); !!}
            <br>
            {!! Form::submit('Save Post'); !!}
        {!! Form::close() !!}
    </body>
</html>