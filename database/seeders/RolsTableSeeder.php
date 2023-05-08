<?php

namespace Database\Seeders;

use App\Models\Rol;
use Illuminate\Database\Seeder;

class RolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rols = [
            [
                'name'=>'Admin',
                'description'=>'Crud completo y eliminado definitivo'
            ],
            [
                'name'=>'Basic',
                'description'=>'Crud completo y eliminado lógico'
            ]
        ];

        foreach($rols as $rolData){
            Rol::create($rolData);
        }
    }
}
