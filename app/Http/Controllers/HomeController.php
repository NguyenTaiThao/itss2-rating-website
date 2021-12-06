<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

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

        $keyword = $request->get('keyword');
        $product_category_id = $request->get('product_category_id');
        
        $productTypes = ProductCategory::all();

        $posts = Post::when($product_category_id, function ($query, $product_category_id) {
            return $query->where('product_category_id', $product_category_id);
        })->when($keyword, function ($query, $keyword) {
            $formatedKeyword = '%' . implode('%', explode(' ', $keyword)) . '%';
            $query->where('title', 'LIKE', $formatedKeyword)->orWhere('content', 'LIKE', $formatedKeyword);
        })->orderBy('id', 'desc')->paginate(12);

        return view('home.index', ['posts' => $posts, 'productTypes' => $productTypes]);
    }
}
