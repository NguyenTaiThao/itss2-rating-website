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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class PostController extends Controller
{
    // public function index(Request $request)
    // {
    //     $posts = $request->user()->posts()->paginate(20);
    //     return view('posts.index', ['posts' => $posts]);
    // }
    public function index(Request $request)
    {

        $suggested = null;
        $isTopVoting = false;
        $keyword = $request->get('keyword');
        $product_category_id = $request->get('product_category_id');

        $productTypes = ProductCategory::all();

        $posts = Post::when($product_category_id, function ($query, $product_category_id) {
            return $query->where('product_category_id', $product_category_id);
        })->when($keyword, function ($query, $keyword) {
            $formatedKeyword = '%' . implode('%', explode(' ', $keyword)) . '%';
            $query->where('title', 'LIKE', $formatedKeyword)->orWhere('content', 'LIKE', $formatedKeyword);
        })->orderBy('id', 'desc')->paginate(12);

        if ($request->user()) {
            $suggested = $this->suggesting($request->user());
        }

        if (!$suggested) {
            $suggested = Post::all();
            $suggested = $suggested->sortByDesc('rating_time');
            $isTopVoting = true;
        }

        $suggested = $this->paginate($suggested, 10);
        return view('posts.index', ['posts' => $posts, 'suggests' => $suggested, 'productTypes' => $productTypes, 'isTopVoting' => $isTopVoting]);
    }

    private function suggesting($user)
    {
        $data1 = null;
        $data2 = null;

        $interestedBrands = $user->interestedBrands;
        $interestedProductCategories = $user->interestedProductCategories;

        if (!$interestedBrands && !$interestedProductCategories) {
            return null;
        }

        if (count($interestedBrands) > 0) {
            $data1 =  $user->interestedBrands()->with('posts')->get();
            $data1 = $data1->map(function ($value) {
                return $value->posts;
            })->flatten();
        }

        if (count($interestedProductCategories) > 0) {
            $data2 = $user->interestedProductCategories()->with('posts')->get();
            $data2 = $data2->map(function ($value) {
                return $value->posts;
            })->flatten();
        }

        $data1 = $data1 ? $data1 : collect([]);
        $data2 = $data2 ? $data2 : collect([]);

        $data = $data1->concat($data2)->sortByDesc('rating_point')->values();

        return $data;
    }

    public function show(Request $request, Post $post)
    {
        $star = $request->get('star_filter');

        $reviews = $post->reviews()->when($star, function ($query, $star) use ($post) {
            return $query->where('rating', $star);
        })->with('user')->orderBy('id', 'desc')->paginate(10);

        return view('posts.show', ['post' => $post, 'reviews' => $reviews]);
    }

    public function showBrand(Request $request, Post $post)
    {
        $star = $request->get('star_filter');

        $reviews = $post->reviewsAll()->when($star, function ($query, $star) use ($post) {
            return $query->where('rating', $star);
        })->with('user')->orderBy('id', 'desc')->paginate(10);

        return view('posts.show_admin', ['post' => $post, 'reviews' => $reviews]);
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
            return Redirect::route('brand.post')->with('成功', '作成が成功しました!');
        } catch (\Exception  $error) {
            return Redirect::back()->with('エラー', '作成はエラーになりました!');
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

            return Redirect::route('brand.post.show', ['post' => $post->id]);
        } catch (\Exception $error) {
            return Redirect::back()->with('エラー', '更新はエラーになりました!');
        }
    }

    public function _delete(Post $post)
    {
        try {
            $post->delete();
            return Redirect::route('brand.post')->with('成功', '削除が成功しました!');
        } catch (\Exception $error) {
            dd($error);
            return Redirect::back()->with('エラー', '削除はエラーになりました!');
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
            return Redirect::route('post.show', ['post' => $post])->with('成功', 'レビュー投稿が成功しました!');
        } catch (\Exception $error) {
            return Redirect::back()->with('エラー', 'レビュー投稿はエラーになりました!');
        }
    }

    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}