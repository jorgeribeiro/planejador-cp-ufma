<p align="center">
    <img src="https://raw.githubusercontent.com/jorgimello/planejador-cp-ufma/master/public/img/logo1.png">
</p>

## Sobre

Aplicação feita para auxiliar estudantes do curso de Ciência da Computação da UFMA a decidir entre turmas de forma a cumprir a carga horária do curso.

O curso possui uma estrutura específica, onde até o 6º período o estudante possui n cadeiras obrigatórias a cumprir, e a partir daí precisa escolher entre um grupo de disciplinas eletivas de forma a cumprir a carga horária optativa. O sistema [SIGAA](https://sigaa.ufma.br) não descreve em detalhes quantas disciplinas faltam, mostrando apenas a quantidade de horas pendentes, o que pode gerar confusão.

## Motivação

O curso de Ciência da Computação da UFMA tem suas disciplinas divididas entre Obrigatórias, Grupo I (optativas) e Grupo II (também optativas). Todas as disciplinas obrigatórias precisam ser cursadas (2595h), enquanto são exigidas 720h do Grupo I e 225h do Grupo II, totalizando 3540h. O sistema SIGAA é dividido apenas entre carga horária obrigatória e carga horária optativa, não havendo separação entre disciplinas do Grupo I e Grupo II. Dependendo da escolha das disciplinas, o histórico pode informar errado a quantidade de horas pendentes para o aluno. Exemplo:

<p align="center">
    <img src="https://raw.githubusercontent.com/jorgimello/planejador-cp-ufma/master/imgs/horas.png">
</p>

Essa é a tabela que detalha as horas do meu histórico. As horas obrigatórias (cumpridas e pendentes) estão corretas, porém nas colunas de horas optativas e o total existem alguns erros: já cumpri as 225h do Grupo II, e somando todas as disciplinas que fiz, ultrapassei esse valor de horas (somou 255h). Ou seja, tenho 30h a mais que não deveriam ser contabilizadas (não importa se você tem 500h de disciplinas do Grupo II, apenas 225h serão contabilizadas. Mesma coisa vale para o Grupo I, o máximo é 720h). O SIGAA considera essas horas no cálculo das horas optativas, informando que devo 210h optativas, o que está errado. No momento de escrita desse README, devo 240h do Grupo I, logo, devo 30h a mais do que é informado (justamente porque o SIGAA considera aquelas 30h que fiz a mais do Grupo II). 

Com isso, essa aplicação foi pensada e desenvolvida pra ajudar os estudantes do curso a planejarem corretamente suas disciplinas, sem fazer horas a mais que não serão contabilizadas ou pensar que possui menos horas pendentes como informado pelo SIGAA. Veja a área de Dicas na aplicação pra ver algumas coisas que você pode fazer pra se graduar mais rápido.

## Tecnologias
- Laravel
- SQLite
- [Bulma](https://bulma.io/)
- git (pra fazer clone, commit, push etc e manter suas disciplinas salvas)

## Dependências
- PHP >= 5.6.4
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Composer

## Instalação
Instale o PHP com a versão mínima indicada nas Dependências. Instale também os módulos informados (caso não instale, provável que dê erro ao utilizar o Composer).
Em seguida, instale o gerenciador de dependências do PHP [Composer](https://getcomposer.org/). A instalação dele pode variar de sistema para sistema. No meu caso, rodando no Linux Mint (baseado no Debian), rodei
```
sudo apt install composer
```
e o composer pôde ser utilizado. Já em outros sistemas, pesquise um pouco e descubra. É necessário rodar o comando ```composer install``` dentro da pasta da aplicação, logo, é preciso que o comando esteja disponível na linha de comando.
É aconselhável ter também conhecimentos básicos de git, para que você mantenha suas alterações de disciplinas salvas em um repositório próprio e não perca nada do que já foi feito. Dá pra utilizar sem precisar salvar tudo em um repositório próprio, porém eu não aconselho.

## Steps de instalação
- Download ou ```git clone``` esse repositório
- Rode ```composer install``` dentro da pasta da aplicação
- Renomear ```.env.example``` para ```.env``` e colocar o caminho completo do arquivo database.sqlite, que se encontra dentro da basta database (```.env.example``` pode estar oculto)
- Rodar ```php artisan key:generate```

## Para rodar
- ```php artisan serve``` para rodar a aplicação
- Voilá! Rodando em ```localhost:8000```. Abra em qualquer browser.

## Erros e Pull Requests
Caso encontre algum erro, abra um tópico em [Issues](https://github.com/jorgimello/planejador-cp-ufma/issues) e eu verificarei. 
Sugestões e colaborações são bem vindas. Só abrir um tópico em [Pull requests](https://github.com/jorgimello/planejador-cp-ufma/pulls) e eu verifico a sugestão. Caso seu Pull request tenha sugestões de código, saiba que posso refatorá-lo pra se adequar ao padrão de código que sigo.

## Referências
- [COCOM - Coordenação de Ciência da Computação - UFMA](http://www.deinf.ufma.br/cocom/site/)
- [SIGAA](https://sigaa.ufma.br)
- Uma planilha [Cronograma](https://www.dropbox.com/s/o3acew4zcwwxzu4/Cronograma%20-%20Ci%C3%AAncia%20da%20Computa%C3%A7%C3%A3o.xlsx?dl=0) que roda pelos pendrives e emails do curso, que alguns usam pra ver as horas pendentes de cada grupo. Não sei quem foi o autor, se alguém souber é só me falar que dou os devidos créditos. Me ajudou e foi a principal inspiração pra eu desenvolver esse Planejador.
