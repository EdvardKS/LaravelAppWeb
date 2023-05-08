<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            [
                'image'=>'menu_uno.jpg',
                'lugar'=>'home_uno_uno'
            ],
            [
                'image'=>'menu_dos.jpg',
                'lugar'=>'home_uno_dos'
            ],
            [
                'image'=>'menu_tres.jpg',
                'lugar'=>'home_uno_tres'
            ],
            [
                'image'=>'categoria_menu',
                'lugar'=>'home_dos_uno'
            ],
            [
                'image'=>'categoria_rustidera',
                'lugar'=>'home_dos_dos'
            ],
            [
                'image'=>'categoria_paella',
                'lugar'=>'home_dos_tres'
            ],
            [
                'image'=>'categoria_brasas',
                'lugar'=>'home_dos_cuatro'
            ]
        ];

        foreach($settings as $setting){
            Setting::create($setting);
        }
    }
}
