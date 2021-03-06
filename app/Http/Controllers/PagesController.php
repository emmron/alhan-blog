<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

class PagesController extends Controller
{
    public function home(Request $request)
    {
        // $posts = \App\Post::where('published', 1)->get()->sortByDesc('updated_at')->forPage(1,10);
        // if(app()->env == 'local') { 
        //     Cache::flush();
        //     ResponseCache::clear();
        // }
        $posts = Cache::remember('posts-published', 22*60, function() {
            return \App\Post::where('published', 1)->get()->sortByDesc('created_at')->forPage(1,10);
        });
        $css = Cache::remember('css', 22*60, function() {
            return Storage::disk('public')->get('/css/app.css');
        });
        $amp = $request->query('amp') > 0 ? true : null;
        return view('home', compact('posts', 'css', 'amp'));
    }

    public function privacy() 
    {
        $css = Cache::remember('css', 22*60, function() {
            return Storage::disk('public')->get('/css/app.css');
        });
        return view('static.privacy', compact('css'));
    }
}
