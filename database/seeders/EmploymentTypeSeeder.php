<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EmploymentType;

class EmploymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EmploymentType::factory()
            ->count(2)
            ->sequence(
                ['type' => 'Full-Time'],
                ['type' => 'Part-Time'],
            )
            ->create();
    }
}
