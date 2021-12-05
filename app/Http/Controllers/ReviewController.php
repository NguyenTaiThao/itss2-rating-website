<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $reviews = $request->user()->activeReviews()->with(['user', 'post'])->orderBy('id', 'desc')->paginate(20);
        return view('reviews.index', ['reviews' => $reviews]);
    }

    public function spam(Request $request)
    {
        $reviews = $request->user()->spamReviews()->orderBy('id', 'desc')->paginate(20);
        return view('reviews.spam', ['reviews' => $reviews]);
    }

    public function markAsSpam(Review $review)
    {
        try {
            $review->is_spam = true;
            $review->save();
            return Redirect::back()->with('success', 'Marker as spam successfully!');
        } catch (\Exception $error) {
            return Redirect::back()->with('error', 'Error during the marking as spam!');
        }
    }
    
    public function delete(Review $review)
    {
        try {
            $review->delete();
            return Redirect::back()->with('success', 'Deleted successfully!');
        } catch (\Exception $error) {
            return Redirect::back()->with('error', 'Error during the deletion!');
        }
    }
}
