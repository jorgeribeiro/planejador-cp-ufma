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
            return view('planejador', compact(
                'periodos_cursados',
                'disciplinas_cursadas',
                'carga_horaria_cumprida'
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
