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
            // TeamSeeder::class,
            RoundSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
        ]);
    }
}
