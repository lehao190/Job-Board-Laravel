<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JobLevel;

class JobLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JobLevel::factory()
            ->count(3)
            ->sequence(
                ['level' => 'Junior'],
                ['level' => 'Senior'],
                ['level' => 'Leader'],
            )
            ->create();
    }
}
