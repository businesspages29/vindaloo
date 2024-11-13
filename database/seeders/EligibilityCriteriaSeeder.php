<?php

namespace Database\Seeders;

use App\Models\EligibilityCriteria;
use Illuminate\Database\Seeder;

class EligibilityCriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EligibilityCriteria::factory(100)->create();
    }
}
