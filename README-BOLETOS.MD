## 1 - BAIXE A LIB
composer require "eduardokum/laravel-boleto"

## 2 - CRIAR CONTROLLER 'BoletoController'
php artisan make:controller BoletoController

## 3 - PREENCHA OS DADOS DO 'BoletoContrapp'
vide \Http\Controllers\BoletoController.php

## 4 - CRIAR JOB
php artisan make:job EnviaBoletoEmail
