<?php

namespace App\Models;

use App\Models\Equipo;
use App\Models\Encuentro;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Persona extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['nombre','edad','sexo','rol','imagen','equipo_id'];

    public function equipo(){
        return $this->belongsTo(Equipo::class);
    }

    public function encuentros(){
        return $this->belongsToMany(Encuentro::class)->withPivot(['tipo_observacion','observacion'])->withTimestamps();

    }

    public function getNombreAttribute($value){
        return strtoupper($value);
    }
}
