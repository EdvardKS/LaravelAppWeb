<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

    
        $this->call([
            RolsTableSeeder::class,
            UsersTableSeeder::class,
            CategorySeeder::class,
            ProductsSeeder::class,
            SettingSeeder::class,
            HorariosAperturaSeeder::class
        ]);
    }
}
