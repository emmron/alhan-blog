@extends('layouts.blog')

@section('title')
    Create post
@endsection

@section('admin-tools')
            <a href="/posts">Published</a>
            <a href="/posts/drafts">Drafts</a>
@endsection

@section('content')
<div class="framed">
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
</div>
@endsection