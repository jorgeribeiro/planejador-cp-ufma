<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Disciplina;

class Aluno extends Model
{
    protected $fillable = [
        'nome', 'matricula'
    ];

    // Todas as disciplinas do Aluno presentes em DisciplinaAluno
    public function disciplinas() {
        return $this->hasMany(DisciplinaAluno::class);
    }

    // Apenas as disciplinas com status Aprovado ou Matriculado presentes em DisciplinaAluno
    public function disciplinasAprovadasOuMatriculadas() {
        return $this->disciplinas()
        ->where('status', 'Aprovado')
        ->orWhere('status', 'Matriculado');
    }

    // Todas as disciplinas obrigatórias disponíveis (não aprovado ou não matriculado)
    public function disciplinasObrigatoriasDisponiveis() {
        return Disciplina::where('tipo', 'Obrigatória')
        ->whereNotIn('id', $this->disciplinasAprovadasOuMatriculadas()->pluck('disciplina_id'))
        ->orderBy('nome')
        ->get();
    }

    // Todas as disciplinas do grupo I disponíveis (não aprovado ou não matriculado)
    public function disciplinasGrupo1Disponiveis() {
        return Disciplina::where('tipo', 'Grupo I')
        ->whereNotIn('id', $this->disciplinasAprovadasOuMatriculadas()->pluck('disciplina_id'))
        ->orderBy('nome')
        ->get();
    }

    // Todas as disciplinas do grupo II disponíveis (não aprovado ou não matriculado)
    public function disciplinasGrupo2Disponiveis() {
        return Disciplina::where('tipo', 'Grupo II')
        ->whereNotIn('id', $this->disciplinasAprovadasOuMatriculadas()->pluck('disciplina_id'))
        ->orderBy('nome')
        ->get();
    }
}
