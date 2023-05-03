<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Round::factory()->count(3)->hasTeams('2')->create();
    }
}
