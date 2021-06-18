<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonaEncuentro extends Model
{
    use HasFactory;

    protected $fillable = ['persona_id','encuentro_id','tipo_observacion','observacion'];

    public function persona()
    {
        return $this->hasMany(Persona::class);
    }

    public function encuentro()
    {
        return $this->hasMany(Encuentro::class);
    }

}
