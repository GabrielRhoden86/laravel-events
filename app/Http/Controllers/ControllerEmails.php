<?php
//JOB
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ControllerEmails extends Controller
{
    private $tituloPage;

    public function __construct()
    {
        $this->tituloPage = null;
    }

    public function cadastroUser()
    {
        $this->tituloPage = "Cadastro Usuário";
        return view('cadastroUsuario', ["titulo" => $this->tituloPage]);
    }

}
