<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts.index');
    }

    public function show(Post $post)
    {
        return view('posts.show');
    }

    public function create(Request $request)
    {
        return view('posts.create');
    }

    public function update(Request $request, Post $post)
    {
        return view('posts.create', ['data' => $post]);
    }

    public function review(Request $request, Post $post)
    {
        return view('posts.review', ['date' => $post]);
    }
}
