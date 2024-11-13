<?php

namespace Database\Seeders;

use App\Models\ComboPlan;
use App\Models\EligibilityCriteria;
use App\Models\Plan;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
        ]);

        Plan::factory(10)->create();
        ComboPlan::factory(10)
            ->has(Plan::factory()->count(3)) // Create 3 related Plan records
            ->create();
        EligibilityCriteria::factory(10)->create();
    }
}
