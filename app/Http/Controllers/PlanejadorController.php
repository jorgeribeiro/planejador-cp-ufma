<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Aluno;
use App\Disciplina;
use App\DisciplinaAluno;

class PlanejadorController extends Controller
{

    public function index(Request $request) { 
        $aluno = Aluno::where('matricula', $request->session()->get('matricula'))->first();      
        if ($aluno) {
            $periodos_cursados = $aluno->periodosCursados();
            $disciplinas_cursadas = $aluno->disciplinas()->get();
            $carga_horaria_cumprida = $aluno->horasCumpridas();
            $carga_horaria_pendente = 3540 - $carga_horaria_cumprida;
            $horas_cumpridas_obrigatorias = $aluno->horasCumpridasObrigatorias();
            $horas_cumpridas_grupo_i = $aluno->horasCumpridasGrupo1();
            $horas_cumpridas_grupo_ii = $aluno->horasCumpridasGrupo2();            
            $horas_cumprindo_obrigatorias = $aluno->horasCumprindoObrigatorias();
            $horas_cumprindo_grupo_i = $aluno->horasCumprindoGrupo1();
            $horas_cumprindo_grupo_ii = $aluno->horasCumprindoGrupo2();
            $graduado = (2595 - $horas_cumpridas_obrigatorias) 
                        + (720 - $horas_cumpridas_grupo_i) 
                        + (225 - $horas_cumpridas_grupo_ii);
            return view('planejador', compact(
                'periodos_cursados',
                'disciplinas_cursadas',
                'carga_horaria_cumprida',
                'carga_horaria_pendente',
                'horas_cumpridas_obrigatorias',
                'horas_cumpridas_grupo_i',
                'horas_cumpridas_grupo_ii',                
                'horas_cumprindo_obrigatorias',
                'horas_cumprindo_grupo_i',
                'horas_cumprindo_grupo_ii',
                'graduado'
            ));
        } else {
            return redirect('/');
        }
    }

    public function aprovar(DisciplinaAluno $disciplina_aluno) {
        $disciplina_aluno->status = 'Aprovado';
        $disciplina_aluno->save();
        return redirect(url()->previous(). '#' . $disciplina_aluno->periodo);
    }

    public function reprovar(DisciplinaAluno $disciplina_aluno) {
        $disciplina_aluno->status = 'Reprovado';
        $disciplina_aluno->save();
        return redirect(url()->previous(). '#' . $disciplina_aluno->periodo);
    }

    public function matricular(DisciplinaAluno $disciplina_aluno) {
        $disciplina_aluno->status = 'Matriculado';
        $disciplina_aluno->save();
        return redirect(url()->previous(). '#' . $disciplina_aluno->periodo);
    }

    public function cancelar(DisciplinaAluno $disciplina_aluno) {
        $disciplina_aluno->status = 'Cancelado';
        $disciplina_aluno->save();
        return redirect(url()->previous(). '#' . $disciplina_aluno->periodo);
    }

    public function excluir(DisciplinaAluno $disciplina_aluno) {
        $disciplina_aluno->delete();
        return redirect(url()->previous(). '#' . $disciplina_aluno->periodo);
    }
    
}
