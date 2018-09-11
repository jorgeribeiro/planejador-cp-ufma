<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Aluno;
use App\Disciplina;

class PlanejadorController extends Controller
{

    public function index(Request $request) {
        $aluno = Aluno::where('matricula', $request->session()->get('matricula'))->first();
        if ($aluno) {
            $disciplinas_obrigatorias = Disciplina::where('tipo', 'Obrigatória')->get();
            $disciplinas_grupo_i = Disciplina::where('tipo', 'Grupo I')->get();
            $disciplinas_grupo_ii = Disciplina::where('tipo', 'Grupo II')->get();
            return view('planejador', compact(
                'aluno',
                'disciplinas_obrigatorias', 
                'disciplinas_grupo_i', 
                'disciplinas_grupo_ii'
            ));
        } else {
            return redirect('/');
        }
    }
    
}
