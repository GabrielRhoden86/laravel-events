@extends('master')
@section('title', 'Boletos')
@section('content')

    <div class="container bg-white p-4 mt-5">
        @if (session('msg-boleto'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <p><b>Boleto gerado com sucesso!</b></p>
            </div>
            {{ session('msg-boleto') == false }}
        @endif
        <h3 class="pb-4 text-dark text-center"><b>Gerar Boleto</b></h3>
        <form action="/gerar-boleto" method="POST" class="text-muted form-boleto">
            @csrf
            <label for="contadores" class="ml-3"><b>Boletos:</b></label>
            <div class="form-group col-md-12">
                <select name="contadores" class="form-control" id="contadores">
                    <option value="profissionais">Profissionais</option>
                    <option value="empresas">Empresas</option>
                </select>
            </div>

            <label for="inicioImprecao" class="ml-3"><b>Data de Impressão:</b></label>
            <div class="form-group col-md-12">
                <input type="date" class="form-control" id="inicioImprecao" name="inicioImprecao">
            </div>

            <label for="inicio" class="ml-3"><b>Data de Vencimento:</b></label>
            <div class="form-group col-md-12">
                <input type="date" class="form-control" id="inicio" name="inicio">
            </div>
            <div class="form-group col-md-12">
                <input type="date" class="form-control " id="fim" name="fim">
            </div>
            <div class="col-md-12 pt-3 mt-3">
                <button type="submit" class="btn btn-primary w-100 ">Gerar Boleto</button>
            </div>
        </form>
    </div>
@endsection



