<?php
//JOB
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ControllerAcesso extends Controller
{
    private $tituloPage;

    public function __construct()
    {
        $this->tituloPage = null;
    }

    public function index()
    {
        $this->tituloPage = "Login";
        return view('/login', ["titulo" => $this->tituloPage]);
    }

}
