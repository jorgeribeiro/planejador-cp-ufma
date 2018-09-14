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
- php-pear php-fpm php-dev php-zip php-curl php-xmlrpc php-gd php-mysql php-mbstring php-xml libapache2-mod-php (pesquise um pouco como instalar esses módulos)
- Composer

## Instalação
Em construção... Porém é certeza que precisa do gerenciador de dependências de PHP [Composer](https://getcomposer.org/). Se estiver interessado pode adiantar a instalação. Existem diversas formas de instalar o composer. No meu caso, rodando no Linux Mint (baseado no Debian), rodei

```
sudo apt install composer
```
e o composer pôde ser utilizado. Já em outros sistemas, pesquise um pouco e descubra. É necessário rodar o comando ```composer install``` dentro da pasta da aplicação, logo, é preciso que o comando esteja disponível na linha de comando.

## Steps de instalação:
- ```git clone``` nesse repositório
- rode ```composer install``` dentro da pasta
- renomear .env.example para .env e colocar o caminho correto do arquivo database.sqlite
- rodar ```php artisan key:generate``` dentro da pasta
- ```php artisan serve``` para rodar a aplicação
- Voilá! Rodando em localhost:8000. Abra em qualquer browser.

## Referências
- [COCOM - Coordenação de Ciência da Computação - UFMA](http://www.deinf.ufma.br/cocom/site/)
- [SIGAA](https://sigaa.ufma.br)
