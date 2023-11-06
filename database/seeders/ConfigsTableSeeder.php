<?php

namespace Database\Seeders;

use App\Models\Config;
use Illuminate\Database\Seeder;

class ConfigsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Config::create([
            'currency' => 'USD $',
            'currency_iso' => 'USD',
            'currency_simbol' => '$',
            'email' => 'oszarata@szystems.com',
        ]);
    }
}
