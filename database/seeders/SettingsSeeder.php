<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = new Settings();
        $setting->site_name = "SocialApparatus";
        $setting->site_description = "SocialApparatus Website";
        $setting->keywords = "social network, free script";
        $setting->home_page = "<h1>Your text here.</h1>";
        $setting->save();
    }
}
