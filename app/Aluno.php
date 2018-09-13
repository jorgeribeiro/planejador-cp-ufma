<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Disciplina;

class Aluno extends Model
{
    protected $fillable = [
        'nome', 'matricula'
    ];

    public function disciplinas() {
        return $this->hasMany(DisciplinaAluno::class);
    }

    // TODO: retornar todas NOT IN exceto status Reprovado|Cancelado
    public function disciplinasObrigatoriasDisponiveis() {
        return Disciplina::where('tipo', 'Obrigatória')
        ->whereNotIn('id', $this->disciplinas()->pluck('disciplina_id'))
        ->orderBy('nome')
        ->get();
    }

    public function disciplinasGrupo1Disponiveis() {
        return Disciplina::where('tipo', 'Grupo I')
        ->whereNotIn('id', $this->disciplinas()->pluck('disciplina_id'))
        ->orderBy('nome')
        ->get();
    }

    public function disciplinasGrupo2Disponiveis() {
        return Disciplina::where('tipo', 'Grupo II')
        ->whereNotIn('id', $this->disciplinas()->pluck('disciplina_id'))
        ->orderBy('nome')
        ->get();
    }
}
