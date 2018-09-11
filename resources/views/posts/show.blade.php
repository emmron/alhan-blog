@extends('layouts.blog')

@section('admin-tools')
    <a href="/posts/{{ $post->id }}/edit">Edit</a>
        @if (! $post->published)
            <p style="background:yellow; padding: 10px;">DRAFT</p>
        @endif
@endsection

@section('content')
    <div class="container content-container post-container">
        <h1>{{ $post->title }}</h1>
        <small>{{ $post->updated_at }}</small>
        <p>{!! $post->body !!}</p>
    </div>
@endsection
            
        