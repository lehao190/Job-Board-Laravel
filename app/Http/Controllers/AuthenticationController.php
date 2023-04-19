<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Interfaces\UserRepositoryInterface;

class AuthenticationController extends Controller
{

    private UserRepositoryInterface $userRepository;

    public function __construct(
        UserRepositoryInterface $userRepository
    ) {
        $this->userRepository = $userRepository;
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = $this->userRepository->getByEmail($request->email);

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
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $user = $this->userRepository->create($request);

        $token = $user->createToken('authToken');

        return response([
            'user' => $user,
            'token' => $token->plainTextToken,
        ], 201);
    }

    public function registerAsEmployer(Request $request) {
        $credentials = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:8'],
            'company_name' => ['required', 'unique:companies,name'],
            'location' => ['required'],
            'employees' => ['required']
        ]);

        $user = $this->userRepository->createEmployerUser($request);

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
