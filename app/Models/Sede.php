<?php

namespace App\Models;

use App\Models\Equipo;
use App\Models\Archivo;
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

    public function archivos(){
        return $this->hasMany(Archivo::class);
    }

    public function getNombreAttribute($value){
        return strtoupper($value);
    }
}
