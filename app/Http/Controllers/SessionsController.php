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
        // TODO: registrar session
        return redirect('planejador');
    }

    public function destroy() {
        // TODO: destruir session
        return redirect('/');
    }
}
