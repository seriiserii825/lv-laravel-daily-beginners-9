<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class HomeFrontController extends Controller
{
    public function index()
    {
        $categories = Category::all();       //
        $posts = Post::when(request('category_id'), function ($query) {
            $query->where('category_id', request('category_id'));
        })->get();
        return response()->json([
            'categories' => $categories,
            'posts' => $posts
        ]);
    }
}
