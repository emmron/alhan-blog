@extends('layouts.blog')

@section('title')
    Enterprise A/B Testing, Conversion Optimization (CRO)
@endsection

@section('description')
    A low-key blog that is sometimes about enterprise a/b testing and other things.
@endsection    

@section('admin-tools')
    <a href="/posts">Published</a>
    <a href="/posts/drafts">Drafts</a>
@endsection

@section('content')
        <div class="posts">
        @foreach ($posts as $post)
            <div class="content-container headline-container"><a class="plain" href="/p/{{ $post->slug }}"><h2>{{ $post->title }}</h2></a></div>
        @endforeach
        </div> 
@endsection