<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Ejercicio extends Model
{
    use HasFactory;
 
    protected $fillable = ['nombre'];
 
    public function musculos()
    {
        return $this->belongsToMany(Musculo::class, 'ejercicio_musculo')
                    ->withPivot('orden')
                    ->orderByPivot('orden');
    }
 
    public function rutinas()
    {
        return $this->belongsToMany(Rutina::class, 'ejercicio_rutina')
                    ->withPivot('sets', 'reps');
    }
}
 
