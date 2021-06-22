<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EncuentroPersona extends Model
{
    use HasFactory;
    protected $table = 'encuentro_persona';
    protected $fillable = ['persona_id','encuentro_id','tipo_observacion','observacion'];

}
