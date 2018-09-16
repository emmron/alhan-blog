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
        <div class="mb-4">This blog is about enterprise a/b testing, web development, machine learning and cycling.</div>
        <div class="list flex-wrap">
        @foreach ($posts as $post)
            <div class="framed list-item"><a href="/p/{{ $post->slug }}"><h3>{{ $post->title }}</h3></a></div>
        @endforeach
        </div> 
@endsection