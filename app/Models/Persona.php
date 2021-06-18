<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','edad','sexo','rol','imagen','equipo_id'];

    public function equipo(){
        return $this->belongsTo(Equipo::class);
    }
}
