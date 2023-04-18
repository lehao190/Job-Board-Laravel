<?php

namespace App\Repositories;

use App\Interfaces\JobRepositoryInterface;
use App\Models\Job;

class JobRepository implements JobRepositoryInterface {
    public function get($id) {
        return Job::find($id);
    }

    public function getAll() {
        return Job::get();
    }

    public function create(array $data) {}

    public function update($id, array $data) {}

    public function delete($id) {}
}
