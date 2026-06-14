<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntrenoSet extends Model
{
    use HasFactory;

    protected $fillable = ['entreno_id', 'ejercicio_id', 'set_numero', 'peso', 'reps'];

    public function entreno()
    {
        return $this->belongsTo(Entreno::class);
    }

    public function ejercicio()
    {
        return $this->belongsTo(Ejercicio::class);
    }
}
