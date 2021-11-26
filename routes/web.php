<?php

use App\Http\Controllers\Brand\DashboardController;
use App\Http\Controllers\Brand\ProfileController;
use App\Http\Controllers\Brand\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'brand'], function () {
    Route::group(['as' => 'brand.'], function () {
        Auth::routes();
    });
    Route::group(['middleware' => 'auth:brand'], function () {
        Route::get('/home', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('user', UserController::class, ['except' => ['show']]);

        Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::put('profile/password', [ProfileController::class, 'password'])->name('profile.password');
        Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
        // Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
        // Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

        Route::get('upgrade', function () {
            return view('pages.upgrade');
        })->name('upgrade');
        Route::get('map', function () {
            return view('pages.maps');
        })->name('map');
        Route::get('icons', function () {
            return view('pages.icons');
        })->name('icons');
        Route::get('table-list', function () {
            return view('pages.tables');
        })->name('table');
    });
});
