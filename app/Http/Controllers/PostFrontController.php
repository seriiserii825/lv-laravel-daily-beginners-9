<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostFrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::when(request('category_id'), function ($query) {
            $query->where('category_id', request('category_id'));
        })->get();
        return response()->json([
            'total' => $posts->count(),
            'posts' => $posts
        ], 200);
    }
}
