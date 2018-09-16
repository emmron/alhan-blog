@extends('layouts.blog')

@section('title'){{ $post->title }}@endsection

@section('description')@php echo explode('. ', $post->body)[0] . '.'; @endphp@endsection  

@section('admin-tools')
    <a id="editLink" href="/posts/{{ $post->id }}/edit">Edit</a>
    @if (! $post->published)
        <p style="background:yellow; padding: 10px;">DRAFT</p>
    @endif
@endsection

@if (! Auth::check())
    @section('content')
        <div class="content framed">
            <h1 class="mb-4">{{ $post->title }}</h1>
            <div class="small mb-4"> 
            Posted <strong>{{ date('M d, Y', strtotime($post->created_at)) }}</strong>
            by <a href="#">Alhan Keser</a>
            @if($post->updated_at != $post->created_at) 
                and updated <strong>{{ date('M d, Y', strtotime($post->updated_at)) }}</strong>
            @endif
            </div>
            <div>{!! html_entity_decode($post->body) !!}</div>
        </div>
    @endsection
@endif
            

@section('content-editable')
    <div class="content framed editor-preview">
        <h1 class="mb-4">@{{ post.title }}</h1>
        <div class="small mb-4"> 
        Posted <strong>{{ date('M d, Y', strtotime($post->created_at)) }}</strong>
        by <a href="#">Alhan Keser</a>
        @if($post->updated_at != $post->created_at) 
            and updated <strong>{{ date('M d, Y', strtotime($post->updated_at)) }}</strong>
        @endif
        </div>
        <div v-html="post.body"></div>
    </div>
@endsection

@section('footer-scripts')
    @isset($post) 
        <script>
            localStorage.setItem('post_{{ $post->id }}', JSON.stringify({!! $post->toJSON() !!}));
            var post = JSON.parse(localStorage.getItem('post_{{ $post->id }}'));
            var isEditor = false;
        </script>
    @endisset
@endsection