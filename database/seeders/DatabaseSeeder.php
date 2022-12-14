<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(CategorySeeder::class);
        $this->call(SettingsSeeder::class);
        User::create([
            "name"=>"Shane Barron",
            "email"=>"cshanebarron@gmail.com",
            "password"=>\Hash::make('Rat9chet!')
        ]);

    }
}
