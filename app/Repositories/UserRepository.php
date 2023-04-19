<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Hash;
use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use App\Models\Company;

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

    public function createEmployerUser($data) {
        $user = User::create([
            'name' => $data->name,
            'user_type' => 'employer',
            'email' => $data->email,
            'password' => Hash::make($data->password),
        ]);

        Company::create([
            'name' => $data->company_name,
            'headquarters_location' => $data->location,
            'employees' => $data->employees,
            'user_id' => $user->id
        ]);

        return $user;
    }

    public function update($id, $data) {}

    public function delete($id) {}
}
