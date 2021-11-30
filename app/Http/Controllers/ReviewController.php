<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(Review $model)
    {
        $data = false;
        return view('reviews.index', ['is_spam' => $data]);
    }

    public function spam(Review $model)
    {
        $data = true;
        return view('reviews.spam', ['is_spam' => $data]);
    }
}
