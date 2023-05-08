<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable =['id', 'name', 'description','image'];
    protected $dates = ['deleted_at'];

    public function productos() : HasMany
    {
        return $this->hasMany(Product::class);
    }
}