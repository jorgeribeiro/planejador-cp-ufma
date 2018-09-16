<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bulma.min.css') }}"/>

        <title>Planejador CP (UFMA)</title>        
    </head>
    <body>
        <div class="container">
            <section class="section">
                <div class="box has-background-light">
                    <div class="has-text-centered"><img src="{{ asset('img/logo1.png') }}"></div>                    
                    <nav class="level">
                        <div class="level-item">
                            <div>
                                <p class="title">Bem vindo!</p>
                                <p class="heading">Essa aplicação foi desenvolvida para auxiliar estudantes<br> de Ciência da Computação da Universidade Federal do Maranhão, de forma a <br> planejar as disciplinas a serem cursadas e completar a carga horária do curso.
                                </p>
                                <p class="heading">Para começar, preencha seu nome e matrícula nos campos ao lado.
                                </p>
                            </div>
                        </div>
                        <div class="level-item">
                            <form method="POST" action="/login">
                                {{ csrf_field() }}
                                <div class="field">
                                    <label class="label">Nome</label>
                                    <div class="control">
                                        <input class="input" type="text" name="nome" autofocus required>
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Matrícula</label>
                                    <div class="control">
                                        <input class="input" type="text" name="matricula" required>
                                    </div>
                                </div>
                                <div class="field is-pulled-right">
                                    <div class="control">
                                        <button type="submit" class="button is-link">
                                            Entrar
                                        </button>
                                    </div>
                                </div>
                            </form>                        
                        </div>
                    </nav>
                </div>
            </section>
            <footer class="footer">
                <div class="content has-text-centered">
                    <p class="has-text-link">
                        Planejador CP foi feito por Jorge Ribeiro.
                    </p>
                    <p>
                        <a target="_blank" href="https://www.linkedin.com/in/joorgeribeeiro/">
                            <i class="fab fa-linkedin-in fa-2x"></i>
                        </a>
                        &nbsp;
                        <a target="_blank" href="https://github.com/jorgimello">
                            <i class="fab fa-github fa-2x"></i>
                        </a>
                        &nbsp;
                        <a target="_blank" href="https://www.facebook.com/joorgeribeeiro">
                            <i class="fab fa-facebook fa-2x"></i>
                        </a>
                    </p>
                </div>
            </footer>
        </div>
    </body>
</html>
