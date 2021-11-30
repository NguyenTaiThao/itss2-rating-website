<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function welcome()
    {
        if (auth('user')->check()) {
            return Redirect('/home');
        }

        if (auth('brand')->check()) {
            return Redirect('brand/home');
        }

        return view('home.index');
    }

    public function index()
    {
        if (auth('brand')->check()) {
            return Redirect('brand/home');
        }
        return view('home.index');
    }
}
