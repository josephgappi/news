<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Illuminate\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    public function login(Request $request) {
        // Validate the request data
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return response()->json(['message' => 'Login successful'], 200);
        } else {
            // Authentication failed...
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
    }
}
