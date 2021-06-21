<?php

namespace App\Models;

use App\Models\Persona;
use App\Models\Encuentro;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonaEncuentro extends Model
{
    use HasFactory;
    protected $table = 'persona_encuentro';
    protected $fillable = ['persona_id','encuentro_id','tipo_observacion','observacion'];

}
