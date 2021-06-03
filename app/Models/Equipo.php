<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','fecha_creacion','imagen'];

    public function people()
    {
        return $this->hasMany(Persona::class);
    }
}
