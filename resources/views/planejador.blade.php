@include('layouts.header')

<body>
    <section class="section">
        <div class="columns">        
            <div class="column">
                <p class="title is-5 has-text-link">Disciplinas cursadas</p>  
                @foreach ($periodos_cursados as $periodo)
                <div class="card">
                    <div class="card-content">
                        <a name="{{ $periodo }}"></a>
                        <h4 class="title is-4 is-marginless">
                            {{ $periodo }}
                        </h4>
                        @foreach ($disciplinas_cursadas as $disciplina_cursada)
                            @if ($disciplina_cursada->periodo === $periodo)
                            {{ $disciplina_cursada->disciplina->nome }} ({{ $disciplina_cursada->disciplina->carga_horaria }}h) [{{ $disciplina_cursada->disciplina->tipo }}] <strong>({{ $disciplina_cursada->status }})</strong>
                            <div class="buttons has-addons is-marginless">
                                <a class="button is-small has-text-success" href="/aprovar/{{ $disciplina_cursada->id }}">Aprovado</a>
                                <a class="button is-small has-text-danger" href="/reprovar/{{ $disciplina_cursada->id }}">Reprovado</a>
                                <a class="button is-small has-text-link" href="/matricular/{{ $disciplina_cursada->id }}">Matriculado</a>
                                <a class="button is-small has-text-info" href="/cancelar/{{ $disciplina_cursada->id }}">Cancelado</a>
                                <a class="button is-small" href="/excluir/{{ $disciplina_cursada->id }}">Excluir</a>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                @endforeach
                @if (count($disciplinas_cursadas) === 0)
                    <article class="message is-info">
                        <div class="message-body">
                            Nenhuma disciplina incluída. Adicione algumas em <a href="/disciplinas">Disciplinas</a>.
                        </div>
                    </article>
                @endif
            </div>
            <div class="column">
                <p class="title is-5 has-text-danger">Cálculo de horas</p>
                <div class="card">
                    <div class="card-content">
                        @if ($graduado === 0)
                        <article class="message is-info">
                            <div class="message-header">
                                <p>Parabéns!</p>
                            </div>
                            <div class="message-body">
                                Você acaba de completar todas as suas horas. Isso quer dizer que você concluiu o curso!
                                Obrigado por utilizar essa aplicação e espero que você também utilize seu conhecimento e tempo 
                                para desenvolver coisas úteis para as pessoas. Use seu talento para fazer coisas boas e que podem 
                                ajudar quem precisa.<br>
                                Um futuro brilhante o espera! Sucesso na sua carreira.
                            </div>
                        </article>                       
                        @endif                    
                        <table class="table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Carga horária Obrigatória</th>
                                    <th>Carga horária eletiva Grupo I</th>
                                    <th>Carga horária eletiva Grupo II</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Exigida</th>
                                    <td>2595</td>
                                    <td>720</td>
                                    <td>225</td>
                                    <td>3540</td>
                                </tr>
                                <tr>
                                    <th>Cumprida</th>
                                    <td>{{ $horas_cumpridas_obrigatorias }}</td>
                                    <td>{{ $horas_cumpridas_grupo_i }}</td>
                                    <td>{{ $horas_cumpridas_grupo_ii }}</td>
                                    <td>{{ $horas_cumpridas_obrigatorias + $horas_cumpridas_grupo_i + $horas_cumpridas_grupo_ii }}</td>
                                </tr>
                                <tr>
                                    <th>Pendente</th>
                                    <td>{{ 2595 - $horas_cumpridas_obrigatorias }}</td>
                                    <td>{{ 720 - $horas_cumpridas_grupo_i }}</td>
                                    <td>{{ 225 - $horas_cumpridas_grupo_ii }}</td>
                                    <td>{{ (2595 - $horas_cumpridas_obrigatorias) 
                                            + (720 - $horas_cumpridas_grupo_i) 
                                            + (225 - $horas_cumpridas_grupo_ii) }}
                                    </td>
                                </tr>
                                @if ($graduado !== 0)                                                                    
                                <tr>
                                    <th>Cursando</th>
                                    <td>{{ $horas_cumprindo_obrigatorias }}</td>
                                    <td>{{ $horas_cumprindo_grupo_i }}</td>
                                    <td>{{ $horas_cumprindo_grupo_ii }}</td>
                                    <td>{{ $horas_cumprindo_obrigatorias 
                                            + $horas_cumprindo_grupo_i 
                                            + $horas_cumprindo_grupo_ii }}
                                    </td>
                                </tr>                                
                                <tr>
                                    <th>Pendente ao fim do semestre</th>
                                    <td>{{ (2595 - $horas_cumpridas_obrigatorias - $horas_cumprindo_obrigatorias) < 0 ? 0 : 2595 - $horas_cumpridas_obrigatorias - $horas_cumprindo_obrigatorias }}</td>
                                    <td>{{ (720 - $horas_cumpridas_grupo_i - $horas_cumprindo_grupo_i) < 0 ? 0 : 720 - $horas_cumpridas_grupo_i - $horas_cumprindo_grupo_i }}</td>
                                    <td>{{ (225 - $horas_cumpridas_grupo_ii - $horas_cumprindo_grupo_ii) < 0 ? 0 : 225 - $horas_cumpridas_grupo_ii - $horas_cumprindo_grupo_ii }}</td>
                                    <td>{{ ((2595 - $horas_cumpridas_obrigatorias - $horas_cumprindo_obrigatorias) 
                                            + (720 - $horas_cumpridas_grupo_i - $horas_cumprindo_grupo_i) 
                                            + (225 - $horas_cumpridas_grupo_ii - $horas_cumprindo_grupo_ii)) < 0 ? 0 : 
                                                (2595 - $horas_cumpridas_obrigatorias - $horas_cumprindo_obrigatorias) 
                                                + (720 - $horas_cumpridas_grupo_i - $horas_cumprindo_grupo_i) 
                                                + (225 - $horas_cumpridas_grupo_ii - $horas_cumprindo_grupo_ii) }}
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>                                            
                    </div>
                </div>
            </div> 
    </section>
</body>
</html>