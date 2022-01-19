<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class HomeController extends Controller
{
    public function welcome()
    {

        if (auth('brand')->check()) {
            return Redirect('brand/home');
        }
        return Redirect('/home');
    }

    public function index(Request $request)
    {
        if (auth('brand')->check()) {
            return Redirect('brand/home');
        }
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

        $suggested = $this->paginate($suggested, 5);
        return view('home.index', ['posts' => $posts, 'suggests' => $suggested, 'productTypes' => $productTypes, 'isTopVoting' => $isTopVoting]);
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

    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}