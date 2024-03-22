<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
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
        $posts_query = Post::when(request('category_id'), function ($query) {
            $query->where('category_id', request('category_id'));
        })->paginate(2);

        $posts = PostResource::collection($posts_query);

        return $posts;
    }
}
