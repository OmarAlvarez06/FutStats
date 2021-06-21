<?php

namespace App\Models;

use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','ubicacion','imagen'];

    public function equipos()
    {
        return $this->hasMany(Equipo::class);
    }
}
