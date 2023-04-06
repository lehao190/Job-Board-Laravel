<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthenticationController extends Controller
{
    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user) {
            return response([
                'message' => 'User not found!'
            ], 401);
        }

        if(!Hash::check($request->password, $user->password)) {
            return response([
                'message' => 'Password not correct!'
            ], 401);
        }

        $token = $user->createToken('authToken');

        return response([
            'user' => $user,
            'token' => $token->plainTextToken,
        ], 201);
    }

    public function register(Request $request) {
        $credentials = $request->validate([
            'name' => ['required', 'max: 15'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'user_type' => 'normal',
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('authToken');

        return response([
            'user' => $user,
            'token' => $token->plainTextToken,
        ], 201);
    }

    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();

        return response([
            'message' => 'Logout successfully!',
        ], 201);
    }
}
