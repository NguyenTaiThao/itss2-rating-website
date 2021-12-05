<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Http\Requests\ReviewRequest;
use App\Models\Post;
use App\Models\ProductCategory;
use App\Models\Review;
use Carbon\Carbon;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = $request->user()->posts()->paginate(20);
        return view('posts.index', ['posts' => $posts])->with('success', 'Created successfully!');
    }

    public function show(Post $post)
    {
        $reviews = $post->reviews()->with('user')->orderBy('id', 'desc')->paginate(10);
        return view('posts.show', ['post' => $post, 'reviews' => $reviews]);
    }

    public function create()
    {
        $productTypes = ProductCategory::all();
        return view('posts.create', ['productTypes' => $productTypes]);
    }

    public function _create(PostRequest $request)
    {
        try {
            $path =  $request->file('image')->store('post-images', 'public');

            $data = $request->only((new Post())->getFillable());
            $data['img_url'] = $path;
            $data['user_id'] = Auth::user()->id;
            $data['created_at'] = Carbon::now();

            Post::insert($data);
            return Redirect::route('brand.post')->with('success', 'Created successfully!');
        } catch (\Exception  $error) {
            return Redirect::back()->with('error', 'Error during the creation!');
        }
    }

    public function edit(Post $post)
    {
        $productTypes = ProductCategory::all();
        return view('posts.edit', ['post' => $post, 'productTypes' => $productTypes]);
    }

    public function _edit(PostUpdateRequest $request, Post $post)
    {
        $data = $request->only((new Post())->getFillable());
        $path = $post->img_url;

        try {
            if ($request->hasFile('image')) {
                $path =  $request->file('image')->store('post-images', 'public');
            }

            $data['img_url'] = $path;
            $data['created_at'] = Carbon::now();

            Post::whereId($post->id)->update($data);

            return Redirect::back()->with('success', 'Updated successfully!');
        } catch (\Exception $error) {
            return Redirect::back()->with('error', 'Error during updation!');
        }
    }

    public function _delete(Post $post)
    {
        try {
            $post->delete();
            return Redirect::route('brand.post')->with('success', 'Deleted successfully!');
        } catch (\Exception $error) {
            dd($error);
            return Redirect::back()->with('error', 'Error during the deletion!');
        }
    }

    public function review(Post $post)
    {
        return view('posts.review', ['post' => $post]);
    }

    public function _review(ReviewRequest $request, $post)
    {
        $data = $request->only((new Review())->getFillable());
        $data['user_id'] = $request->user()->id;
        $data['post_id'] = $post;
        $data['created_at'] = Carbon::now();

        try {
            Review::insert($data);
            return Redirect::route('post.show', ['post' => $post])->with('success', 'Reviewed successfully!');
        } catch (\Exception $error) {
            return Redirect::back()->with('error', 'Error during the deletion!');
        }
    }
}
