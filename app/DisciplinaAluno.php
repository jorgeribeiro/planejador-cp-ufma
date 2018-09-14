<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DisciplinaAluno extends Model
{
    protected $table = 'disciplina_aluno';

    protected $fillable = [
        'periodo', 'status'
    ];

    public function aluno() {
        return $this->belongsTo(Aluno::class);
    }

    public function disciplina() {
        return $this->belongsTo(Disciplina::class);
    }

    public $timestamps = false;
}
