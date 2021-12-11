<?php

use App\Http\Controllers\V1\AdminController;
use App\Http\Controllers\V1\PostController;
use App\Http\Controllers\V1\AuthController;
use App\Http\Controllers\V1\BrandController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix("v1")->group(function () {
    Route::prefix('user')->group(function () {
        Route::post('login', [AuthController::class, 'login']);
        Route::middleware('auth:sanctum')->group(function () {
            Route::get('logout', [AuthController::class, 'logout']);
            Route::get('me', [AuthController::class, 'me']);
        });
    });
    Route::middleware('auth:sanctum')->group(function () {
        Route::resource("posts", PostController::class)->only(["index", 'destroy']);
        Route::resource("admins", AdminController::class)->only(["index", 'store', 'update', 'destroy']);
        Route::resource("brands", BrandController::class)->only(["index", 'update']);
        Route::post('brands/accept/{brand}', [BrandController::class, 'accept']);
        Route::post('brands/reject/{brand}', [BrandController::class, 'reject']);
    });
});