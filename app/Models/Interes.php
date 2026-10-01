<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Interes extends Model
{
    use HasFactory;

    protected $table = 'interes';

    protected $fillable = ['nombre', 'descripcion'];

    public function personas()
    {
        return $this->belongsToMany(
            Persona::class,
            'interes_persona',
            'interes_id',
            'persona_id'
        );
    }
}