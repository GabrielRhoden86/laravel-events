<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Throwable;

class EnviarEmailUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $usuario;

    public function __construct(User $usuario)
    {
        $this->usuario = $usuario;
    }

    public function handle(): void
    {
        //Lógica para enviar o e-mail
        Mail::send('emails', ['dados' => $this->usuario], function ($message) {
            $usuario_cadastrado = ucfirst($this->usuario->name);
            $message->from('gabrielrhodden@gmail.com');
            $message->to($this->usuario->email, $this->usuario->name)->subject("Bem-Vindo Sr(a) {$usuario_cadastrado} a Tech Sistems");
        });
    }

    public function failed(Throwable $exception)
    {
        Log::error("Falha ao enviar e-mail para {$this->usuario->email}: {$exception->getMessage()}");
    }
}
