<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;
use App\Mail\DailyReport;
use Illuminate\Support\Facades\Mail;

class SendDailyReportEmail extends Command
{
    protected $signature = 'send:report';
    protected $description = 'Enviar relatorio diário de vendas';

    public function handle()
    {
        $sales = 2303;
        $date = date("Y/m/d H:i:s");
        Mail::to('gabrielrhodden@gmail.com')->send(new DailyReport($sales, $date));
    }
}
