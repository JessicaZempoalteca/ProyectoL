<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Grupo;

class Estudiante extends Model
{
    protected $fillable = ['id, nombre', 'apelllidos', 'edad', 'email', 'telefono', 'grupo_id'];

    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'grupo_id');
    }
}
