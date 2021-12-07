<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Get current user info
     */
    public function me(Request $request)
    {
        return $request->user();
    }

    /**
     * Login.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        if (!Auth::guard('api')->attempt($credentials)) {
            return response()->json(['error' => 'wrong email or password, authentication failed'], 401);
        }
        $user = Auth::guard('api')->user();

        $scope = [];
        $token = $request->user('api')->createToken('Access Token', $scope)->plainTextToken;
        return response()->json(['success' => true, 'access_token' => $token, 'user' => $user]);
    }

    /**
     * Logout.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json('ok');
    }
}
