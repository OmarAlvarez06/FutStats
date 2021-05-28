<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonaEquipo extends Model
{
    use HasFactory;

    protected $table = 'personas_equipos';
    protected $fillable = ['id_persona','id_equipo','fecha_inicio','fecha_cierre'];

}
