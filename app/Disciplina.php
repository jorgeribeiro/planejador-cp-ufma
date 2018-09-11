<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    protected $fillable = [
        'nome', 'carga_horaria', 'tipo'
    ];

    public $timestamps = false;
}
