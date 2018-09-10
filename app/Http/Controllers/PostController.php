<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePost as StorePostRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('published', 1)->get()->sortByDesc('updated_at');
        return view('posts.index', compact('posts'));
    }

    /**
     * Display a listing of the resource in draft state.
     *
     * @return \Illuminate\Http\Response
     */
    public function drafts()
    {
        $posts = Post::where('published', 0)->get()->sortByDesc('updated_at');
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->only('title', 'body', 'published');
        $data['slug'] = str_slug($data['title'], '-');
        $post = Post::create($data);
        return redirect()->action('PostController@show', ['slug' => $post->slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // Post
        $post = Post::where('slug', $slug)->firstOrFail();
        if (! Auth::check() && ! $post->published) {
            abort(404);
        }

        // Date
        $carbon = Carbon::now();
        $date = $carbon->parse($post->updated_at);
        $post->date = $date;

        // Inline CSS
        $css = Storage::get('/css/app.css');

        return view('posts.show', compact('post', 'css'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, Post $post)
    {
        $data = $request->only('title', 'body', 'published');
        $post->update($data);
        return redirect()->action('PostController@show', ['slug' => $post->slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->action('PostController@index');
    }
}
