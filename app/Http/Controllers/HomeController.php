<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = \App\Post::all()->sortByDesc('updated_at')->forPage(1,10);
        return view('home', compact('posts'));
    }
}
