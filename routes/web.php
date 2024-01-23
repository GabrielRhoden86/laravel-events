<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerTeste;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ControllerEmails;
use App\Http\Controllers\ControllerUser;
use App\Http\Controllers\BoletoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/emails', function () {
    return view('emails');
})->name('emails');

Route::get('/testes/testing', [ControllerTeste::class, 'test']);

//Rotas de envio de email envio
Route::post('/eventProcess/{id}', [OrderController::class, 'placeOrder']);

Route::get('/event', [OrderController::class, 'index']);
Route::get('/event', [OrderController::class, 'index']);

//Rotas de envio de email jobs
Route::get('/emails', [ControllerEmails::class, 'index']);
Route::get('/enviaEmail', [ControllerEmails::class, 'formMail']);
Route::get('/saveUserForm/{name}/{email}', [ControllerUser::class, 'saveUser']);

Route::post('/gerar-boleto', [BoletoController::class, 'gerarBoleto']);
Route::get('/boletos/boleto', [BoletoController::class, 'viewBoleto']);

