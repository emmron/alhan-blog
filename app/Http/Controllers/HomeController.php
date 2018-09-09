<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = \App\Post::where('published', 1)->get()->sortByDesc('updated_at')->forPage(1,10);
        return view('home', compact('posts'));
    }
}
