<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\ProductCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laravel\Ui\Presets\React;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = $request->user()->posts()->paginate(20);
        return view('posts.index', ['posts' => $posts]);
    }

    public function show(Post $post)
    {
        return view('posts.show');
    }

    public function create(Request $request)
    {
        $productTypes = ProductCategory::all();
        return view('posts.create', ['productTypes' => $productTypes]);
    }

    public function _create(PostRequest $request)
    {
        $path =  $request->file('image')->store('post-images', 'public');

        $data = $request->only((new Post())->getFillable());
        $data['img_url'] = $path;
        $data['user_id'] = Auth::user()->id;
        $data['created_at'] = Carbon::now();

        Post::insert($data);
        return Redirect::route('brand.post');
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
