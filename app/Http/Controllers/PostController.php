<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePost as StorePostRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use ResponseCache;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(app()->env == 'local') { Cache::flush(); ResponseCache::clear();}
        $posts = Cache::remember('posts-published', 22*60, function() {
            return Post::where('published', 1)->get()->sortByDesc('updated_at');
        });
        $css = Cache::remember('css', 22*60, function() {
            return Storage::disk('public')->get('/css/app.css');
        });
        return view('posts.index', compact('posts', 'css'));
    }

    /**
     * Display a listing of the resource in draft state.
     *
     * @return \Illuminate\Http\Response
     */
    public function drafts()
    {
        $posts = Post::where('published', 0)->get()->sortByDesc('updated_at');
        $css = Cache::remember('css', 22*60, function() {
            return Storage::disk('public')->get('/css/app.css');
        });
        return view('posts.index', compact('posts', 'css'));
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
        Cache::flush();
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
        if(app()->env == 'local') { Cache::flush();ResponseCache::clear();}
        // Post
        $cachePostKey = 'post_' . $slug;
        if (Cache::has($cachePostKey)) {
            $post = Cache::get($cachePostKey);
        }
        else {
            $post = Post::where('slug', $slug)->firstOrFail();
            $post_last_modified = Carbon::parse($post->updated_at)->toRfc7231String();
            $post->last_modified = $post_last_modified;
            Cache::put($cachePostKey, $post, 22*60);
        }
        // $post = Post::where('slug', $slug)->firstOrFail();
        if (! Auth::check() && ! $post->published) {
            abort(404);
        }

        // Inline CSS
        // $css = Storage::disk('public')->get('/css/app.css');
        $css = Cache::remember('css', 22*60, function() {
            return Storage::disk('public')->get('/css/app.css');
        });
        return response()
                ->view('posts.show', compact('post', 'css'))
                ->header('Cache-Control', 'cache, public, max-age=604800')
                ->header('Last-Modified', $post->last_modified);
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
        Cache::flush();
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
        Cache::flush();
        return redirect()->action('PostController@index');
    }
}
