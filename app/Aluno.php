<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $fillable = [
        'nome', 'matricula'
    ];

    public function disciplinas() {
        return $this->hasMany(DisciplinaAluno::class);
    }
}
