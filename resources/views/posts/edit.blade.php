@extends('layouts.blog')

@section('title')
    Edit post
@endsection

@section('admin-tools')
    <a href="/p/{{ $post->slug }}" target="_blank">Open Post in Tab</a>
@endsection

@section('content')
<div class="framed">
    <h1>Edit Post</h1>
        
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
</div>
@endsection