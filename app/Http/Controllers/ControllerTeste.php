<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerTeste extends Controller
{
    public function test()
    {
        return view('testes.testing');
    }
}
