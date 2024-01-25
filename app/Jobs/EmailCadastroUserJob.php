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

class EmailCadastroUserJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $usuario;

    public function __construct(User $usuario)
    {
        $this->usuario = $usuario;
    }

    public function handle(): void
    {
        try {
            Mail::send('emailCadastroUsuario', ['dados' => $this->usuario], function ($message) {
                $usuario_cadastrado = ucfirst($this->usuario->name);
                $message->from('gabrielrhodden@gmail.com');
                $message->to($this->usuario->email, $this->usuario->name)->subject("Bem-Vindo Sr(a) {$usuario_cadastrado} a Tech Sistems");
            });
            Log::info('Job executado com sucesso.');
        } catch (\Exception $e) {
            Log::error('Erro no job: ' . $e->getMessage());
            throw $e;
        }

    }
}
