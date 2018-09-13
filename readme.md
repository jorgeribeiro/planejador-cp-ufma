# Planejador CP (UFMA)

## Sobre

Aplicação feita para auxiliar estudantes do curso de Ciência da Computação da UFMA a decidir entre turmas de forma a cumprir a carga horária do curso.

O curso possui uma estrutura específica, onde até o 6º período o estudante possui n cadeiras obrigatórias a cumprir, e a partir daí precisa escolher entre um grupo de disciplinas eletivas de forma a cumprir a carga horária optativa. O sistema [SIGAA](https://sigaa.ufma.br) não descreve em detalhes quantas disciplinas faltam, mostrando apenas a quantidade de horas pendentes, o que pode gerar confusão.

## Tecnologias
- PHP
- SQLite
- Laravel
- [Bulma](https://bulma.io/)

## Dependências
- PHP >= 5.6.4
- PHP SQLite
- Composer

## Instalação
Em construção... Porém é certeza que precisa do gerenciador de dependências de PHP [Composer](https://getcomposer.org/). Se estiver interessado pode adiantar a instalação. Com o PHP instalado, rode os comandos:
```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```
Após a instalação, adicione o composer ao PATH do sistema (para poder rodar o comando composer no terminal). Essa parte é diferente em cada sistema operacional, por isso não dá pra eu ensinar aqui. Pesquise um pouco e descubra como fazer.

## Salvando steps de instalação:
- git clone nesse repositório
- rode composer install dentro da pasta
- renomear .env.example para .env e colocar o caminho correto do arquivo database.sqlite
- rodar php artisan key:generate dentro da pasta
- php artisan serve para rodar a aplicação
- Voilá! Rodando em localhost:8000. Abra em qualquer browser.

## Referências
- [COCOM - Coordenação de Ciência da Computação - UFMA](http://www.deinf.ufma.br/cocom/site/)
- [SIGAA](https://sigaa.ufma.br)
