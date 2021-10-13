<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            return response()->json(
                [
                    'message' => 'The given data is invalid.',
                    'errors' => [
                        'password' => 'Invalid credentials.',
                    ],
                ],
                422
            );
        }

        $user = User::whereEmail($credentials['email'])->first();
        $authToken = $user->createToken('auth-token')->plainTextToken;

        return response()->json(['access_token' => $authToken]);
    }
}
