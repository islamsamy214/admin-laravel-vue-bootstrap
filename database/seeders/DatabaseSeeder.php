<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            SettingSeeder::class,
            SeoSeeder::class,
            TeamSeeder::class,
            RoleSeeder::class,
            RoundSeeder::class,
            UserSeeder::class,
        ]);
    }
}
