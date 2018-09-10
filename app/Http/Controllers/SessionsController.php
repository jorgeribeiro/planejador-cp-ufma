<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Aluno;

class SessionsController extends Controller
{

    public function store() {
        $aluno = DB::table('alunos')->where('matricula', request('matricula'))->first();
        if (!$aluno) {
            $aluno = Aluno::create([
                'nome' => request('nome'),
                'matricula' => request('matricula')
            ]);
        }        
        return redirect('planejador');
    }

    public function destroy() {

    }
}
