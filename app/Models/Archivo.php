<?php

namespace App\Models;

use App\Models\Sede;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;
    protected $fillable = ['sede_id','nombre','nombre_hash','mime'];

    public function sede(){
        return $this->belongsTo(Sede::class);
    }
}
