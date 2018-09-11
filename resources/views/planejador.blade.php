@include('layouts.header')

<body>
    <section class="section">
        <div class="container">
            <table class="table is-narrow is-hoverable is-fullwidth">
                <thead>
                    <tr>
                        <th>Disciplina</th>
                        <th>Carga horária</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($disciplinas_grupo_ii as $disciplina)
                        <tr>
                            <td>{{ $disciplina->nome }}</td>
                            <td>{{ $disciplina->carga_horaria }}</td>
                        </tr>                        
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</body>
</html>