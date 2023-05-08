<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HorariosApertura extends Model
{
    use HasFactory;

    protected $table = 'horarios_apertura';

    protected $fillable = [
        'nombre_dia',
        'estado',
        'h_abierto',
        'h_cerrado',
    ];
}
