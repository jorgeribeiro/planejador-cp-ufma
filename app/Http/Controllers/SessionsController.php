<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Aluno;

class SessionsController extends Controller
{

    public function store(Request $request) {
        $aluno = Aluno::where('matricula', $request->matricula)->first();
        if (!$aluno) {
            $aluno = new Aluno;
            $aluno->nome = $request->nome;
            $aluno->matricula = $request->matricula;
            $aluno->save();
        }
        $request->session()->put('aluno_id', $aluno->id);
        $request->session()->put('nome', $aluno->nome);
        $request->session()->put('matricula', $aluno->matricula);
        return redirect('planejador');
    }

    public function destroy(Request $request) {
        $request->session()->flush();
        return redirect('/');
    }

}
