<?php
//JOB
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ControllerEmails extends Controller
{
    public function index()
    {
       return view('emails');
    }

    public function formMail()
    {
        return view("enviaEmail");
    }

}
