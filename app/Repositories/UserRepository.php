<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Hash;
use App\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface {
    public function get($id) {
        return User::find($id);
    }

    public function getByEmail($email) {
        return User::where('email', $email)->first();
    }

    public function getAll() {
        return User::get();
    }

    public function create($data) {
        return User::create([
            'name' => $data->name,
            'user_type' => 'normal',
            'email' => $data->email,
            'password' => Hash::make($data->password),
        ]);
    }

    public function update($id, $data) {}

    public function delete($id) {}
}
