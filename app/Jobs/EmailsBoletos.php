<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class EmailsBoletos implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $userName;
    protected $userEmail;

    public function __construct($userName, $userEmail)
    {
        $this->userName = $userName;
        $this->userEmail = $userEmail;
    }

    public function handle(): void
    {
        try {
            Mail::send('/boletos/boletosProfissionais', ['dados' => $this->userName], function ($message) {
                $usuario_cadastrado = ucfirst($this->userName);
                $message->from('gabrielrhodden@gmail.com');
                $message->to($this->userEmail, $this->userName)->subject("Bem-Vindo Sr(a) {$usuario_cadastrado} segue o boleto:");
            });
            Log::info('Job Boletos executado com sucesso.');
        } catch (\Exception $e) {
            Log::error('Erro no job: ' . $e->getMessage());
            throw $e;
        }
    }
}
