@extends('layouts.blog')

@section('title'){{ $post->title }}@endsection

@section('description')@php echo explode('. ', $post->body)[0] . '.'; @endphp@endsection  

@section('admin-tools')
    <a href="/posts/{{ $post->id }}/edit">Edit</a>
    @if (! $post->published)
        <p style="background:yellow; padding: 10px;">DRAFT</p>
    @endif
@endsection

@section('content')
    <div class="container content-container post-container">
        <h1>{{ $post->title }}</h1>
        <small><a href="#">Alhan Keser</a> 
        Posted <strong>{{ date('M d, Y', strtotime($post->created_at)) }}</strong>
        @if($post->updated_at != $post->created_at) 
            and updated <strong>{{ date('M d, Y', strtotime($post->updated_at)) }}</strong>
        @endif
        </small>
        <p>{!! $post->body !!}</p>
    </div>
@endsection
            
        