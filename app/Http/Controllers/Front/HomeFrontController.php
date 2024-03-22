<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Category;
use App\Models\Post;

class HomeFrontController extends Controller
{
    public function index()
    {
        $categories = Category::has('posts')->get();       //
        $posts = PostResource::collection(Post::paginate(4));      //
        return response()->json([
            'categories' => $categories,
            'posts' => $posts
        ]);
    }
}
