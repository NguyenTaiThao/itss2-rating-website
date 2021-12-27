<?php

use App\Http\Controllers\Brand\DashboardController;
use App\Http\Controllers\Brand\ProfileController;
use App\Http\Controllers\Brand\UserController;
use App\Http\Controllers\Brand\Auth\LoginController as BrandLoginController;
use App\Http\Controllers\Brand\Auth\RegisterController as BrandRegisterController;
use App\Http\Controllers\Brand\Auth\ForgotPasswordController as BrandForgotPasswordController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
Route::get('/upgrade', function () {
    return view('upgrade.index');
})->name('upgrade');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('post.show');
Route::group(['middleware' => 'auth:user'], function () {
    Route::get('/posts/review/{post}', [PostController::class, 'review'])->name('post.review');
    Route::post('/posts/review/{post}', [PostController::class, '_review'])->name('post._review');
    Route::post('/comment', [CommentController::class, '_store'])->name('comment.reply');
});

Route::group(['prefix' => 'brand', 'as' => 'brand.'], function () {
    Route::get('login', [
        BrandLoginController::class, 'showLoginForm'
    ])->name('login');
    Route::post('login', [
        BrandLoginController::class, 'login'
    ]);
    Route::post('logout', [
        BrandLoginController::class, 'logout'
    ])->name('logout');

    // Password Reset Routes...
    Route::post('password/email', [
        BrandForgotPasswordController::class, 'sendResetLinkEmail'
    ])->name('password.email');
    Route::get('password/reset', [
        BrandForgotPasswordController::class, 'showLinkRequestForm'
    ])->name('password.request');
    Route::post('password/reset', [
        BrandForgotPasswordController::class, 'reset'
    ])->name('password.update');
    Route::get('password/reset/{token}', [
        BrandForgotPasswordController::class, 'showResetForm'
    ])->name('password.reset');

    // Registration Routes...
    Route::get('register', [
        BrandRegisterController::class, 'showRegistrationForm'
    ])->name('register');
    Route::post('register', [
        BrandRegisterController::class, 'register'
    ]);

    Route::group(['middleware' => ['auth:brand', 'brand']], function () {
        // Route::get('/home', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/home', function () {
            return Redirect::route('brand.post');
        })->name('dashboard');

        Route::resource('user', UserController::class, ['except' => ['show']]);

        Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::put('profile/password', [ProfileController::class, 'password'])->name('profile.password');

        Route::get('post-management', [PostController::class, 'index'])->name('post');
        Route::get('post/create', [PostController::class, 'create'])->name('post.create');
        Route::post('post/create', [PostController::class, '_create'])->name('post._create');
        Route::get('post/edit/{post}', [PostController::class, 'edit'])->name('post.edit');
        Route::post('post/edit/{post}', [PostController::class, '_edit'])->name('post._edit');
        Route::get('post/delete/{post}', [PostController::class, '_delete'])->name('post.delete');

        Route::get('review-management', [ReviewController::class, 'index'])->name('review');
        Route::get('spam-review-management', [ReviewController::class, 'spam'])->name('review.spam');
        Route::get('review/mark-as-spam/{review}', [ReviewController::class, 'markAsSpam'])->name('review.markAsSpam');
        Route::get('review/mark-as-unspam/{review}', [ReviewController::class, 'markAsUnspam'])->name('review.markAsUnspam');
        Route::get('review/delete/{review}', [ReviewController::class, 'delete'])->name('review.delete');

        Route::get('table-list', function () {
            return view('pages.tables');
        })->name('table');
    });
});