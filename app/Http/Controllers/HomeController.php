<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
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

    public function index()
    {
        if (auth('brand')->check()) {
            return Redirect('brand/home');
        }
        $posts = Post::orderBy('id', 'desc')->paginate(12);
        return view('home.index', ['posts' => $posts]);
    }
}
