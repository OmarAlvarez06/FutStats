<?php

namespace App\Models;

use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encuentro extends Model
{
    use HasFactory;
    protected $fillable = ['equipo_local_id','equipo_visitante_id','fecha_hora','goles_local','goles_visitante'];
   
    public function personas(){
        return $this->belongsToMany(Persona::class);
    }
}
