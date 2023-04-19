<?php

namespace App\Repositories;

use App\Interfaces\JobRepositoryInterface;
use App\Models\Job;

class JobRepository implements JobRepositoryInterface {
    public function get($id) {
        return Job::join('users', 'users.id', '=', 'jobs.user_id')
        ->join('companies', 'users.id', '=', 'companies.user_id')
        ->join('employment_types', 'employment_types.id', '=', 'jobs.employment_type_id')
        ->join('job_levels', 'job_levels.id', '=', 'jobs.job_level_id')
        ->select(
            'jobs.*',
            'companies.id as company_id', 'companies.name as company_name',
            'companies.employees', 'companies.company_image', 'companies.headquarters_location',
            'employment_types.type',
            'job_levels.level'
        )
        ->find($id);
    }

    public function getAll() {
        return Job::join('users', 'users.id', '=', 'jobs.user_id')
        ->join('companies', 'users.id', '=', 'companies.user_id')
        ->join('employment_types', 'employment_types.id', '=', 'jobs.employment_type_id')
        ->join('job_levels', 'job_levels.id', '=', 'jobs.job_level_id')
        ->select(
            'jobs.*',
            'companies.id as company_id', 'companies.name as company_name',
            'companies.employees', 'companies.company_image', 'companies.headquarters_location',
            'employment_types.type',
            'job_levels.level'
        )
        ->latest()
        ->get();
    }

    public function create($data) {}

    public function update($id, $data) {}

    public function delete($id) {}
}
