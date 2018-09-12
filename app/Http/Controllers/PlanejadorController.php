<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Aluno;
use App\Disciplina;

class PlanejadorController extends Controller
{

    public function index(Request $request) {        
        if ($request->session()->get('matricula')) {            
            return view('planejador');
        } else {
            return redirect('/');
        }
    }
    
}
