<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DisciplinaAluno extends Model
{
    protected $table = 'disciplina_aluno';

    protected $fillable = [
        'periodo', 'status'
    ];

    public $timestamps = false;
}
