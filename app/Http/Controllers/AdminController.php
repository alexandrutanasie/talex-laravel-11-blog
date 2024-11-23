<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        return view("admin.dashboard");
    }

    public function categories(){
        $categories = Category::all();

        return view("admin.category", compact('categories'));
    }
}
