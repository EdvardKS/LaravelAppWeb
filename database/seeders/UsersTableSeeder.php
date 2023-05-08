<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $users = [
            [
                'name' => 'Edu',
                'rol_id' => 1,
                'email' => 'edu@posiziona.eu',
                'password' => Hash::make('12345678')
            ],
            [
                'name' => 'Jorge',
                'rol_id' => 2,
                'email' => 'jorge@gmail.com',
                'password' => Hash::make('12345678')
            ]
        ];

        foreach ($users as $userData) {
            User::create($userData);
        }
    }
}
