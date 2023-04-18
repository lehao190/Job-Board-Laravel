<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface {
    public function get($id) {
        return User::find($id);
    }

    public function getAll() {
        return User::get();
    }

    public function create(array $data) {}

    public function update($id, array $data) {}

    public function delete($id) {}
}
