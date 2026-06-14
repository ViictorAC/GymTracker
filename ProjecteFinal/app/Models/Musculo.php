<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musculo extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    public function ejercicios()
    {
        return $this->belongsToMany(Ejercicio::class, 'ejercicio_musculo');
    }
}
