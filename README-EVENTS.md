----------------------------------Events-----------------------------------------------
Trabalhando com Events e seus Listeners no Laravel.

## Quando usar eventos em Laravel:
    Quando você deseja desacoplar componentes da sua aplicação.
    Para realizar ações específicas em resposta a eventos.

## Exemplo prático:
    Suponha que você queira enviar um e-mail de boas-vindas sempre que um novo usuário for registrado. 
    Você pode disparar um evento quando o usuário for registrado e ter um ouvinte (listener) que envia o e-mail em resposta a esse evento.
    Diferente do Job que é para tarefas mais longas o Events é para algo simples e especifico.

 ## Vantages: desacoplamento do código
 ## Facilidade para chamar o evento em diferentes partes do codigo

## 1 - php artisan make:event EventNavegation
## 2 - php artisan make:listener ContadorNavegacao --event=EventNavegation
## 3 - Em app\Providers\EventServiceProvider.php adicione as classes:
    use App\Events\EventNavegation;
    use App\Listeners\UserNavigationListener;  e adicione o EventNavegation e NavigationListener no array listen

## 4 - construa um controller
## 5 - contrua uma rota
## 6 - criar a view para exibir os dados do evento e chama a rota do controller para executar o evento
## 7 - implement o contrutor da classe do events
## 8 - implement no handles o que deve ser executado no evento

    FLUXO:
    VIEW -> ROUTE -> CONTROLLER(Encaminha para events através do dispacher)-----> 
    EVENTS(aqui ocorre implentações no controller)--->LISTNER(executa através do handle o que o evento deve executatr)
