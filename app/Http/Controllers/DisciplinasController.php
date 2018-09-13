<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Aluno;
use App\Disciplina;
use App\DisciplinaAluno;

class DisciplinasController extends Controller
{

    public function index(Request $request) {
        $aluno = Aluno::where('matricula', $request->session()->get('matricula'))->first();
        if ($aluno) {
            $disciplinas_obrigatorias = $aluno->disciplinasObrigatoriasDisponiveis();
            $disciplinas_grupo_i = $aluno->disciplinasGrupo1Disponiveis();
            $disciplinas_grupo_ii = $aluno->disciplinasGrupo2Disponiveis();
            
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
        $this->validate($request, [
            'ano' => 'required|min:4|max:4',
            'semestre' => 'required|min:1|max:1',
            'disciplinas_selecionadas' => 'required|array'
        ]);

        $disciplinas_selecionadas = $request->disciplinas_selecionadas;
        foreach ($disciplinas_selecionadas as $disciplina) {
            $disciplina_aluno = new DisciplinaAluno;
            $disciplina_aluno->periodo = $request->ano . '.' . $request->semestre;
            $disciplina_aluno->status = $request->status;
            $disciplina_aluno->aluno_id = $request->session()->get('aluno_id');
            $disciplina_aluno->disciplina_id = $disciplina;
            $disciplina_aluno->save();
        }
        return back()->with('message', 'Disciplina(s) adicionada(s) com sucesso!');
    }
    
}
