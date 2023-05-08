<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HorariosAperturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('horarios_apertura')->insert([
            [
                'nombre_dia' => 'Lunes',
                'estado' => 'Cerrado',
                'h_abierto' => '12:00',
                'h_cerrado' => '15:00',
            ],
            [
                'nombre_dia' => 'Martes',
                'estado' => 'Cerrado',
                'h_abierto' => '12:00',
                'h_cerrado' => '15:00',
            ],
            [
                'nombre_dia' => 'Miércoles',
                'estado' => 'Cerrado',
                'h_abierto' => '12:00',
                'h_cerrado' => '15:00',
            ],
            [
                'nombre_dia' => 'Jueves',
                'estado' => 'Cerrado',
                'h_abierto' => '12:00',
                'h_cerrado' => '15:00',
            ],
            [
                'nombre_dia' => 'Viernes',
                'estado' => 'Abierto',
                'h_abierto' => '12:00',
                'h_cerrado' => '15:00',
            ],
            [
                'nombre_dia' => 'Sábado',
                'estado' => 'Abierto',
                'h_abierto' => '12:00',
                'h_cerrado' => '16:00',
            ],
            [
                'nombre_dia' => 'Domingo',
                'estado' => 'Abierto',
                'h_abierto' => '12:00',
                'h_cerrado' => '16:00',
            ]
        ]);
    }
}
