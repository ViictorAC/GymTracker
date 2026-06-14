<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreno extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'rutina_id', 'fecha', 'comentario'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rutina()
    {
        return $this->belongsTo(Rutina::class);
    }

    public function sets()
    {
        return $this->hasMany(EntrenoSet::class);
    }
}
