<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class FrontendController extends Controller
{
    public function index(){
        $latestPosts = Post::latest()->take(6)->get();
        return view("frontend.index", compact("latestPosts"));
    }

    public function main($url){
        $category = Category::where(['url' => $url]);
        if($category->exists()){
            return $this->actionCategory($category->first());
        }

        $post = Post::where(['url' => $url]);
        if($post->exists()){
            return $this->actionPost($post->first());
        }

        abort(404);
    }

    public function actionCategory($category){
        return view('frontend.category', compact('category'));
    }
    public function actionPost($post){
        return view('frontend.post', compact('post'));
    }
}
