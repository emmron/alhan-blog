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
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {!! Form::open(['url' => 'posts/create']) !!}
            {!! Form::label('title', 'Post Title'); !!}
            <br>
            {!! Form::text('title'); !!}
            <br>
            {!! Form::label('body', 'Post Body'); !!}
            <br>
            {!! Form::textarea('body'); !!}
            <br>
            {!! Form::label('published', 'Draft'); !!}
            {!! Form::radio('published', '0', 1); !!}
            <br>
            {!! Form::label('published', 'Published'); !!}
            {!! Form::radio('published', '1', 0); !!}
            <br>
            {!! Form::submit('Save Post'); !!}
        {!! Form::close() !!}
    </body>
</html>