<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerTeste;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ControllerEmails;
use App\Http\Controllers\ControllerUser;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/emails', function () {
    return view('emails');
})->name('emails');

Route::get('/testes/testing', [ControllerTeste::class, 'test']);

Route::post('/eventProcess/{id}', [OrderController::class, 'placeOrder']);
Route::get('/event', [OrderController::class, 'index']);

// Rotas de envio de email jobs
Route::get('/emails', [ControllerEmails::class, 'index']);
Route::get('/enviaEmail', [ControllerEmails::class, 'formMail']);
Route::get('/saveUserForm/{name}/{email}', [ControllerUser::class, 'saveUser']);




