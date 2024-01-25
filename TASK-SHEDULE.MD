-------------------------------------------------TASK SHEDULE-----------------------------------------------------
Indicados tarefas periodizadas ex: a cada 5 min, 1h, 10h e etc. pode ser utizada junto com o cron

## 1 - php artisan make:mail DailyReport --markdown=taskShedule.daily
criar um classe (DailyReport) para envio de email e --markdown=taskShedule.daily cria a view (daily.blade.php)

## 2 - crie uma variavel e passe para view o corpo email que sera um relatorio, nesse caso $sales

## 3 - php artisan make:command SendDailyReportEmail
crie o comando  em app/console/commands/

defina: protected $signature = 'comand:report';
teste
php artisan help comand:report
ou

protected $signature = 'send:report';

teste
php artisan help send:report

## 5 Na class SendDailyReportEmail extends Command
implemente:

public function handle()
    {
        $sales = 2303;
        Mail::to('gabrielrhodden@gmail.com')->send(new DailyReport($sales));
    }
## 6 - php artisan send:report

## 7 - agendar disparo automatico do comando report
em  app\Console\Kernel.php

  protected $commands = [
        SendDailyReportEmail::class,
     ];

    protected function schedule(Schedule $schedule): void
    {
       $schedule->command(command:'send:report')->everyMinute();

    }

## 8 - php artisan schedule:run
 Rodar o agendamento schedule      // php artisan schedule:list    listar tasks

## 8 - wsl -d distribution --user root
execute esse comando no powershell onde abrir a o linux

## 9 - crontab -e
implemente crontab
* * * * * cd /path-seu-sistema/laravel-events && php artisan schedule:run >> /dev/null 2>&1

## 10  - service cron start
 para verificar status:   service cron status
