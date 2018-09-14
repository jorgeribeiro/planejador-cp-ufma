@include('layouts.header')

<body>
    <section class="section">
        <form method="POST" action="/adicionar_disciplinas">
            {{ csrf_field() }}
            <div class="columns">        
                <div class="column">
                    <div>
                        <p class="title is-5 has-text-link">Obrigatórias</p>
                    </div>                    
                    <table class="table is-narrow">
                        <thead>
                            <tr>
                                <th>Disciplina</th>
                                <th>Carga horária</th>
                                <th>Incluir disciplina</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($disciplinas_obrigatorias as $disciplina)
                            <tr>
                                <td>{{ $disciplina->nome }}</td>
                                <td>{{ $disciplina->carga_horaria }}h</td>
                                <td>
                                    <label class="checkbox">
                                        <input type="checkbox" name="disciplinas_selecionadas[]" value="{{ $disciplina->id }}">                                            
                                    </label>
                                </td>
                            </tr>                        
                            @endforeach
                        </tbody>
                    </table>
                    @if (count($disciplinas_obrigatorias) === 0)
                    <article class="message is-link">
                        <div class="message-body">
                            Parabéns! Você não tem mais nenhuma disciplina obrigatória pendente.
                        </div>
                    </article>
                    @endif
                </div>
                <div class="column">
                    <div>
                        <p class="title is-5 has-text-danger">Eletivas - Grupo I</p>
                    </div>
                    <table class="table is-narrow">
                        <thead>
                            <tr>
                                <th>Disciplina</th>
                                <th>Carga horária</th>
                                <th>Incluir disciplina</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($disciplinas_grupo_i as $disciplina)
                            <tr>
                                <td>{{ $disciplina->nome }}</td>
                                <td>{{ $disciplina->carga_horaria }}h</td>
                                <td>
                                    <label class="checkbox">
                                        <input type="checkbox" name="disciplinas_selecionadas[]" value="{{ $disciplina->id }}">                                            
                                    </label>
                                </td>
                            </tr>                        
                            @endforeach
                        </tbody>
                    </table>                    
                </div>
                <div class="column">
                    <div>
                        <p class="title is-5 has-text-primary">Eletivas - Grupo II</p>
                    </div>
                    <table class="table is-narrow">
                        <thead>
                            <tr>
                                <th>Disciplina</th>
                                <th>Carga horária</th>
                                <th>Incluir disciplina</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($disciplinas_grupo_ii as $disciplina)
                            <tr>
                                <td>{{ $disciplina->nome }}</td>
                                <td>{{ $disciplina->carga_horaria }}h</td>
                                <td>
                                    <label class="checkbox">
                                        <input type="checkbox" name="disciplinas_selecionadas[]" value="{{ $disciplina->id }}">                                            
                                    </label>
                                </td>
                            </tr>                        
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="column">
                    <div class="field">
                        <label class="label">Status</label>
                        <div class="control">
                            <div class="select">
                                <select name="status">
                                    <option value="Matriculado">Matriculado</option>
                                    <option value="Aprovado">Aprovado</option>
                                    <option value="Reprovado">Reprovado</option>
                                    <option value="Cancelado">Cancelado</option>                                                
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Ano</label>
                        <div class="control">
                        <input class="input" name="ano" type="text" value="{{ old('ano') }}" required>
                            <p class="help">2015, 2016, 2017, 2018, 2019...</p>
                        </div>                                          
                    </div>

                    <div class="field">
                        <label class="label">Semestre</label>
                        <div class="control">
                            <input class="input" name="semestre" type="text" value="{{ old('semestre') }}" required>
                            <p class="help">1 ou 2 (ou 4 no caso de cadeira de férias)</p>
                        </div>                                                            
                    </div>

                    <div class="field">
                        <div class="control">
                            <button type="submit" class="button is-success is-rounded is-fullwidth">
                                Adicionar disciplinas selecionadas
                            </button>
                        </div>
                    </div>                    

                    @if (session('message'))
                    <article class="message is-success">
                        <div class="message-body">
                            {{ session('message') }}
                        </div>
                    </article>
                    @endif

                    @if (count($errors))
                    <article class="message is-danger">
                        <div class="message-body">
                            <p>- Selecione pelo menos uma disciplina</p>
                            <p>- Ano precisa ter 4 números (ex: 2018)</p>
                            <p>- Semestre precisa ter 1 número (ex: 1)</p>
                        </div>
                    </article>
                    @endif

                    <article class="message is-dark">
                        <div class="message-body">
                            As disciplinas aproveitadas devem ser adicionadas em qualquer ano/semestre com status <strong>Aprovada</strong>.
                        </div>
                    </article>
                </div>
            </div>
        </form>
    </section>
</body>
</html>