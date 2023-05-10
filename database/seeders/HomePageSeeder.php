<?php

namespace Database\Seeders;

use App\Models\HomePage;
use Illuminate\Database\Seeder;

class HomePageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HomePage::create([
            // hero section
            'hero_title' => 'Home Page',
            'hero_image' => 'https://picsum.photos/200/300',
            'hero_description' => 'lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.'
        ]);
    }
}
