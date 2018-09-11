<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    public function index()
    {
        // $posts = \App\Post::where('published', 1)->get()->sortByDesc('updated_at')->forPage(1,10);
        if(app()->env == 'local') { Cache::flush();}
        $posts = Cache::remember('posts-published', 22*60, function() {
            return \App\Post::where('published', 1)->get()->sortByDesc('updated_at')->forPage(1,10);
        });
        $css = Cache::remember('css', 22*60, function() {
            return Storage::disk('public')->get('/css/app.css');
        });
        return view('home', compact('posts', 'css'));
    }
}
