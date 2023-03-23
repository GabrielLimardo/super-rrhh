<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials)) {
            $user = $request->user();
            $token = $user->createToken('TokenName')->accessToken;

            return response()->json(['token' => $token]);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
}
