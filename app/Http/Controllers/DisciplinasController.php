<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Aluno;
use App\Disciplina;
use App\DisciplinaAluno;

class DisciplinasController extends Controller
{

    public function index(Request $request) {
        if ($request->session()->get('matricula')) {
            $disciplinas_obrigatorias = Disciplina::where('tipo', 'Obrigatória')->orderBy('nome')->get();
            $disciplinas_grupo_i = Disciplina::where('tipo', 'Grupo I')->orderBy('nome')->get();
            $disciplinas_grupo_ii = Disciplina::where('tipo', 'Grupo II')->orderBy('nome')->get();
            return view('disciplinas', compact(
                'disciplinas_obrigatorias', 
                'disciplinas_grupo_i', 
                'disciplinas_grupo_ii'
            ));
        } else {
            return redirect('/');
        }
    }

    public function store(Request $request) {
        $disciplinas_obrigatorias_selecionadas = $request->disciplinas_obrigatorias_selecionadas;
        $disciplinas_grupo_i_selecionadas = $request->disciplinas_grupo_i_selecionadas;
        $disciplinas_grupo_ii_selecionadas = $request->disciplinas_grupo_ii_selecionadas;
        foreach ($disciplinas_obrigatorias_selecionadas as $disciplina) {
            $disciplina_aluno = new DisciplinaAluno;
            $disciplina_aluno->periodo($request->ano);
            $disciplina_aluno->status($request->status);
            $disciplina_aluno->aluno_id($request->session()->get('aluno_id'));
            $disciplina_aluno->disciplina_id($disciplina);
            $disciplina_aluno->save();
        }
        return redirect();
    }
    
}
