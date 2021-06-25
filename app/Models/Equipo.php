<?php

namespace App\Models;

use App\Models\Persona;
use App\Models\Sede;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipo extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = ['nombre','fundacion','imagen','sede_id'];

    public function personas()
    {
        return $this->hasMany(Persona::class);
    }

    public function sede()
    {
        return $this->belongsTo(Sede::class);
    }

    public function getNombreAttribute($value){
        return strtoupper($value);
    }
}
