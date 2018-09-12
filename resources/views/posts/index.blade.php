@extends('layouts.blog')

@section('title')
    All blog posts about Enterprise A/B Testing
@endsection

@section('description')
    All blog posts on one page.
@endsection  

@section('admin-tools')
            <a href="/posts">Published</a>
            <a href="/posts/drafts">Drafts</a>
@endsection

@section('content')
        <div class="list">
        @foreach ($posts as $post)
            <div class="container content-container headline-container"><a class="plain" href="/p/{{ $post->slug }}"><h2>{{ $post->title }}</h2></a></div>
        @endforeach
        </div> 
@endsection