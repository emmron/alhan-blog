@extends('layouts.blog')

@section('content')
    <div class="container post-container">
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
@endsection
            
        