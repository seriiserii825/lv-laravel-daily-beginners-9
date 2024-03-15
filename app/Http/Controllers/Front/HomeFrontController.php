<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class HomeFrontController extends Controller
{
    public function index()
    {
        $categories = Category::has('posts')->get();       //
        $posts = Post::latest()->get();      //
        return response()->json([
            'categories' => $categories,
            'posts' => $posts
        ]);
    }
}
