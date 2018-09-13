<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DicasController extends Controller
{
    
    public function index(Request $request) {        
        if ($request->session()->get('matricula')) {            
            return view('dicas');
        } else {
            return redirect('/');
        }
    }

}
