<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $latestPosts = Post::latest()->take(6)->get();
        return view("frontend.index", compact("latestPosts"));
    }
}
