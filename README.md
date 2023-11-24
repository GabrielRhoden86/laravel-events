Trabalhando com Events e seus Listeners no Laravel.

 - Vantages: desacoplamento do código
 - Facilidade para chamar o evento em diferentes partes do codigo
 - Trabalhar com filas de maneira assicrona(em segundo plano)

1 - php artisan make:event EventNavegation
2 - php artisan make:listener ContadorNavegacao --event=EventNavegation
3 - Em app\Providers\EventServiceProvider.php adicione as classes:
    use App\Events\EventNavegation;
    use App\Listeners\UserNavigationListener;  e adicione o EventNavegation e NavigationListener no array listen
4 - construa um controller
5 - contrua uma rota
6 - criar a view para exibir os dados do evento e chama a rota do controller para executar o evento
7 - implement o contrutor da classe do events
8 - implement no handles o que deve ser executado no evento


----------------------------------FLUXO----------------------------------
VIEW -> ROUTE -> CONTROLLER(Encaminha para events através do dispacher)-----> 
EVENTS(aqui ocorre implentações no controller)--->LISTNER(executa através do handle o que o evento deve executatr)

----------------------------------Fila eventos-----------------------------------
implemente essa classe no listener 
implements ShouldQueue 
padrão no .env QUEUE_CONNECTION=database

 php artisan queue:table   //cria a tabela jobs 
 php artisan migrate       //implementa no db
 php artisan queue:work    //após 

 Obs: é possivel criar mais de um listener para um evento

Obs: Em produção execute event:cache e para limpar o cache event:clear

-------------------------------------------------#Queue #job #laravelQueue--------------------------------------------
1 - em config\queue.php
'default' => env('QUEUE_CONNECTION', 'sync') para isso: 'default' => env('QUEUE_CONNECTION', 'database')

2 -  criar tabelas jobs
php artisan queue:table

3 - php atisan migrate

4 - criar uma job
php artisan make:job EnviarEmailUser

5- Crie a view emails.blade.php

6 - criar um controller para cadastrar usuario do sistema
php artisan make:controller ControllerUser

7- implemente seu codigo no controller e no jobs

8 - php artisan queue:work database --tries=5
daemon:melhora performance de processamento (cpu)
--tries=5: tentativas após falha

obs: para visualizar a fila trabalhando é só cadastrar os usuários depois roda a fila->
php artisan queue:work database --tries=5
-------------------------------------------------Task Shedule----------------------------------------------------------
1 - crie um comando:
php artisan make:command Enviaremail

2 - é criado um arquivo em:
app\Console\Commands\Enviaremail.php


