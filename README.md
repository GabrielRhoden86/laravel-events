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

----------------------------------Fila-----------------------------------
implemente essa classe no listener 
implements ShouldQueue 
padrão no .env QUEUE_CONNECTION=database

 php artisan queue:table   //cria a tabela jobs 
 php artisan migrate       //implementa no db
 php artisan queue:work    //após 

 Obs: é possivel criar mais de um listener para um evento

Obs: Em produção execute event:cache e para limpar o cache event:clear
