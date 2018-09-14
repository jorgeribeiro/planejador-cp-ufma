<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function() {
    return view('home');
});

Route::get('/dicas', 'DicasController@index');

Route::get('/planejador', 'PlanejadorController@index');

Route::get('/aprovar/{disciplina_aluno}', 'PlanejadorController@aprovar');

Route::get('/reprovar/{disciplina_aluno}', 'PlanejadorController@reprovar');

Route::get('/matricular/{disciplina_aluno}', 'PlanejadorController@matricular');

Route::get('/cancelar/{disciplina_aluno}', 'PlanejadorController@cancelar');

Route::get('/excluir/{disciplina_aluno}', 'PlanejadorController@excluir');

Route::get('/disciplinas', 'DisciplinasController@index');

Route::post('/adicionar_disciplinas', 'DisciplinasController@store');

Route::post('/login', 'SessionsController@store');

Route::get('/logout', 'SessionsController@destroy');
