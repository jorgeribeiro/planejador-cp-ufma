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
                            {{ $disciplina_cursada->disciplina->nome }} [{{ $disciplina_cursada->disciplina->tipo }}] <strong>({{ $disciplina_cursada->status }})</strong>
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
                        <h4 class="title is-4">Carga horária total exigida</h4>
                        <h5 class="subtitle is-5">3540</h5>
                        <h4 class="title is-4">Carga horária total cumprida</h4>
                        <h5 class="subtitle is-5">{{ $carga_horaria_cumprida }}</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Carga horária Obrigatória</th>
                                    <th>Carga horária eletiva Grupo I</th>
                                    <th>Carga horária eletiva Grupo II</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Exigida</th>
                                    <td>2595</td>
                                    <td>720</td>
                                    <td>225</td>
                                </tr>
                                <tr>
                                    <th>Cumprida</th>
                                    <td>2595</td>
                                    <td>720</td>
                                    <td>225</td>
                                </tr>
                            </tbody>
                        </table>                                            
                    </div>
                </div>
            </div> 
    </section>
</body>
</html>