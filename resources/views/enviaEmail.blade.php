<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Save User Form</title>
    @vite(['resources/sass/app-mail.scss'])
</head>

<body>
    <div class="container mt-5">
        @if (session('msg'))
            <div class="col-md-12">
                <div class="alert alert-success text-center" style="border:solid rgb(149, 172, 152) 1px; width:100%;">
                    {{ session('msg') }}
                </div>
            </div>
        @endif
        {{ session()->forget('msg') }}
        <div class="d-flex justify-content-center mt-5">
            <form action="/saveUserForm/{name}/{email}" method="get">
                <input type="text" name="name" placeholder="Digite o nome" required>
                <input type="email" name="email" value="gabrielrhodden@gmail.com" required>
                <button type="submit" class="btn btn-primary p-1 mb-1">Salvar Usuário</button>
            </form>
        </div>
    </div>
</body>

</html>
