@extends('master')
@section('title', 'Boletos')
@section('content')
    <div class="container mt-5 bg-white p-4">
        @if (session('msg'))
            <div class="col-md-12">
                <div class="alert alert-success text-center" style="border:solid rgb(149, 172, 152) 1px; width:100%;">
                    {{ session('msg') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            </div>
        @endif
        {{ session()->forget('msg') }}
        <h3 class="pb-4 text-dark text-center"><b>Cadastro Usuário</b></h3>
        <div class="mt-5">
            <form class="text-muted form-boleto" action="/cadastroUsuario/{name}/{email}" method="get">
                <label for="name" class="ml-3"><b>Nome Completo:</b></label>
                <div class="form-group col-md-12">
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <label for="name" class="ml-3"><b>Email:</b></label>
                <div class="form-group col-md-12">
                    <input type="email" class="form-control" id="email" name="email"  value="gabrielrhodden@gmail.com">
                </div>
                <label for="name" class="ml-3"><b>Senha:</b></label>
                <div class="form-group col-md-12">
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="col-md-12 pt-3 mt-3">
                    <button type="submit" class="btn btn-primary w-100 ">Cadastrar Usuário</button>
                </div>
            </form>
        </div>
    </div>
@endsection
