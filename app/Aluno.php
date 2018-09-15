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

    // Apenas as disciplinas com status Aprovado ou Matriculado
    public function disciplinasAprovadasOuMatriculadas() {
        return $this->disciplinas()
        ->whereIn('status', ['Aprovado', 'Matriculado']);
    }

    // Apenas as disciplinas com status Aprovado
    public function disciplinasAprovadas() {
        return $this->disciplinas()
        ->where('status', 'Aprovado');
    }

    // Períodos cursados (distinct)
    public function periodosCursados() {
        return $this->disciplinas()
        ->select('periodo')
        ->distinct()
        ->orderBy('periodo')
        ->get()
        ->pluck('periodo');
    }

    public function horasCumpridasObrigatorias() {
        $horas_obrigatoria = Disciplina::whereIn('id', $this->disciplinasAprovadas()->pluck('disciplina_id'))
        ->where('tipo', 'Obrigatória')
        ->sum('carga_horaria');
        if ($horas_obrigatoria > 2595) {
            return 2595;
        } else {
            return $horas_obrigatoria;
        }
    }

    public function horasCumpridasGrupo1() {
        $horas_grupo_i = Disciplina::whereIn('id', $this->disciplinasAprovadas()->pluck('disciplina_id'))
        ->where('tipo', 'Grupo I')
        ->sum('carga_horaria');
        if ($horas_grupo_i > 720) { 
            return 720;
        } else {
            return $horas_grupo_i;
        }
    }

    public function horasCumpridasGrupo2() {
        $horas_grupo_ii = Disciplina::whereIn('id', $this->disciplinasAprovadas()->pluck('disciplina_id'))
        ->where('tipo', 'Grupo II')
        ->sum('carga_horaria');
        if ($horas_grupo_ii > 225) { 
            return 225;
        } else {
            return $horas_grupo_ii;
        }
    }

    // Soma das horas cumpridas de disciplinas aprovadas
    public function horasCumpridas() {        
        return $this->horasCumpridasObrigatorias() + $this->horasCumpridasGrupo1() + $this->horasCumpridasGrupo2();
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
