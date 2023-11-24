<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>

<body>
    <div class="row" style="width:100%; margin-top:5%;">
        <div class="container text-center">
            <div class="col-md-2">
         {{-- @if (session('msg')) --}}
                <div class="alert alert-success" style="border:solid rgb(149, 172, 152) 1px; width:100%;">
                    <p>{{ session('msg') . ' Quantidade:' . session('quantidadeProduto') . ' Estoque:' . session('estoqueProduto') }}
                    </p>
                </div>
            </div>
            {{-- @endif --}}
            {{-- {{ session()->forget('msg') }} --}}
            <h3>Events</h3>
            <form action="/eventProcess/1" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">OK</button>
            </form>
        </div>
    </div>
</body>

</html>
