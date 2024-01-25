<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerTeste;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ControllerEmails;
use App\Http\Controllers\ControllerUser;
use App\Http\Controllers\BoletoController;
use App\Http\Controllers\ControllerAcesso;

//Login
Route::get('/', [ControllerAcesso::class, 'index']);


Route::get('/emailCadastroUsuario', function () {
    return view('emailCadastroUsuario');
})->name('emailCadastroUsuario');

//Rotas de envio events
Route::post('/eventProcess/{id}', [OrderController::class, 'placeOrder']);
Route::get('/event', [OrderController::class, 'index']);
Route::get('/event', [OrderController::class, 'index']);

Route::get('/cadastroUsuario', [ControllerEmails::class, 'cadastroUser']);
Route::get('/cadastroUsuario/{name}/{email}', [ControllerUser::class, 'saveUser']);

Route::post('/gerar-boleto', [BoletoController::class, 'gerarBoleto']);
Route::get('/boletos/boleto', [BoletoController::class, 'viewBoleto']);

