<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleEncuentro extends Model
{
    use HasFactory;

    protected $fillable = ['persona_id','encuentro_id','tipo_observacion','observacion'];
}
