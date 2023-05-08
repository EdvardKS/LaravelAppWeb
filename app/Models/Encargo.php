<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Encargo extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_apellidos', 'menu_id', 'detalles', 'hora_entrega', 'email', 'telefono', 'codigo_postal'
    ];


    public function product()
    {
        return $this->belongsTo(Product::class, 'menu_id');
    }
}
