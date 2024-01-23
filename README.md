
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
3 -  php artisan tinker
pelo proprio tinker consigo atribuir um valor para variavel e se não bastasse consigo testar o email

 $sales = 150;
//=150                                                                                                                                                                                                       
 Mail::to('gabrielrhodden@gmail.com')->send(new App\Mail\DailyReport($sales));     
7- implemente seu codigo no controller e no jobs

8 - php artisan queue:work database --tries=5
daemon:melhora performance de processamento (cpu)
--tries=5: tentativas após falha

obs: para visualizar a fila trabalhando é só cadastrar os usuários depois roda a fila->
php artisan queue:work database --tries=5
-------------------------------------------------Task Shedule----------------------------------------------------------

1 - php artisan make:mail DailyReport --markdown=taskShedule.daily
criar um classe (DailyReport) para envio de email e --markdown=taskShedule.daily cria a view (daily.blade.php)

2 - crie uma variavel e passe para view o corpo email que sera um relatorio, nesse caso $sales

3 - php artisan tinker
pelo proprio tinker consigo atribuir um valor para variavel e se não bastasse consigo testar o email
 $sales = 150;        dd($sales) imprime o valor
 Mail::to('gabrielrhodden@gmail.com')->send(new App\Mail\DailyReport($sales));     

4 - php artisan make:command SendDailyReportEmail
crie o comando  em app/console/commands/    

defina: protected $signature = 'comand:report';
teste
php artisan help comand:report

ou 

protected $signature = 'send:report';
teste
php artisan help send:report

4 Na class SendDailyReportEmail extends Command
implemente:    

public function handle()
    {
        $sales = 2303;
        Mail::to('gabrielrhodden@gmail.com')->send(new DailyReport($sales));
    }
5 - php artisan send:report

6 - agendar disparo automatico do comando report
em  app\Console\Kernel.php

  protected $commands = [
        SendDailyReportEmail::class,
     ];

    protected function schedule(Schedule $schedule): void
    {
       $schedule->command(command:'send:report')->everyMinute();

    }

7 - php artisan schedule:run      
 Rodar o agendamento schedule      // php artisan schedule:list    listar tasks  

8 - wsl -d distribution --user root 
execute esse comando no powershell onde abrir a o linux

9 - crontab -e
implemente crontab
* * * * * cd /mnt/c/Users/gabriel.rhoden/Desktop/testes_gerais/laravel-events && php artisan schedule:run >> /dev/null 2>&1


10  - service cron start  // para verificar status:   service cron status

