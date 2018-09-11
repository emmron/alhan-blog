@extends('layouts.blog')

@section('content')
        @if (Auth::check())
            <a href="/posts">Published</a>
            <a href="/posts/drafts">Drafts</a>
        @endif
        <div class="posts">
        @foreach ($posts as $post)
            <div class="container headline-container"><a class="plain" href="/p/{{ $post->slug }}"><h2>{{ $post->title }}</h2></a></div>
        @endforeach
        </div> 
@endsection