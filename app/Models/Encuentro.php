<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encuentro extends Model
{
    use HasFactory;
    protected $table = 'encuentros';
    protected $fillable = ['equipo_local_id','equipo_visitante_id','sede_id','observaciones','fecha_hora','resultado'];
}
