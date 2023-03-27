<?php
namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    public function run()
    {
        Setting::create([
            'site_name'=> 'Inteligencia', 
            'contact_email'=>'Inteligencia@mail.com', 
            'address'=>'Egypt, Alexandria'
        ]);
    }
}
