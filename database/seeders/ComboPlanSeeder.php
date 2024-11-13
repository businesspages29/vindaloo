<?php

namespace Database\Seeders;

use App\Models\ComboPlan;
use Illuminate\Database\Seeder;

class ComboPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ComboPlan::factory(100)->create();
    }
}
