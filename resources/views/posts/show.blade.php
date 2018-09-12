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
    <div class="content framed">
        <h1 class="mb-4">{{ $post->title }}</h1>
        <div class="small mb-4"><a href="#">Alhan Keser</a> 
        Posted <strong>{{ date('M d, Y', strtotime($post->created_at)) }}</strong>
        @if($post->updated_at != $post->created_at) 
            and updated <strong>{{ date('M d, Y', strtotime($post->updated_at)) }}</strong>
        @endif
    </div>
        <p>{!! $post->body !!}</p>
    </div>
@endsection
            
        