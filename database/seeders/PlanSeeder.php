<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([
            'slug' => 'monthly',
            'price' => 999, //9.00
            'duration_in_days' => 30,
        ]);

        Plan::create([
            'slug' => 'semiannual',
            'price' => 5399, //53.99
            'duration_in_days' => 365,
        ]);

        Plan::create([
            'slug' => 'yearly',
            'price' => 8999, //89.99
            'duration_in_days' => 365,
        ]);
    }
}
