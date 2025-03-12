<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Estudiante;

class Grupo extends Model
{
    protected $fillable = ['id, semestre', 'grupo', 'turno'];

    public function estudiantes()
    {
        return $this->hasMany(Estudiante::class, 'grupo_id');
    }
}
