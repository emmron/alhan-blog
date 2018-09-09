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
        <h1>Edit Post</h1>
        <a href="/p/{{ $post->slug }}" target="_blank">Open Post in Tab</a>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {!! Form::open() !!}
            {!! Form::text('id', $post->id,['hidden' => 'true']); !!}
            {!! Form::label('title', 'Post Title'); !!}
            <br>
            {!! Form::text('title', $post->title ); !!}
            <br>
            {!! Form::label('body', 'Post Body'); !!}
            <br>
            {!! Form::textarea('body', $post->body); !!}
            <br>
            {!! Form::label('published', 'Draft'); !!}
            {!! Form::radio('published', '0', !$post->published); !!}
            <br>
            {!! Form::label('published', 'Published'); !!}
            {!! Form::radio('published', '1', $post->published); !!}
            <br>
            <br>
            {!! Form::submit('Save Post'); !!}
        {!! Form::close() !!}
        <a href="/posts/{{ $post->id }}/destroy">Delete Post</a>
    </body>
</html>