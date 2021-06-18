<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','fundacion','imagen','sede_id'];

    public function persona()
    {
        return $this->hasMany(Persona::class);
    }

    public function sede()
    {
        return $this->belongsTo(Sede::class);
    }
}
