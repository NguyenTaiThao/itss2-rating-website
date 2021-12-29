<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller
{
    public function _store(CommentRequest $request)
    {
        $data = $request->only(['user_id', 'review_id', 'content']);
        $data['user_id'] = Auth::id();
        try {
            Comment::insert($data);
            return Redirect::back();
        } catch (\Exception $err) {
            dd($err);
        }
    }

    public function _storeAdmin(CommentRequest $request)
    {
        $data = $request->only(['user_id', 'review_id', 'content']);
        try {
            Comment::insert($data);
            return Redirect::back();
        } catch (\Exception $err) {
            dd($err);
        }
    }
}