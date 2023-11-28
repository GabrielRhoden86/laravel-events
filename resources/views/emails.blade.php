<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app-mail.scss'])
    <title>E-mails</title>
</head>

<?php
     [$microseconds, $seconds] = explode(' ', microtime());
     $milliseconds = round($microseconds * 1000);
     $formattedDateTime = date('Y/m/d H:i:s') . ' Milliseconds:' . sprintf('%03d', $milliseconds);
?>

<body>
    <h3 class="text-center mt-5">E-mail Laravel - Queue</h3>
    <div class="container bg-light mt-3 text-muted">
        <div class="d-flex justify-content-center">
        <h4><b><?php echo $formattedDateTime?></b></h4>
        </div>
    </div>
</body>

</html>



{{-- <h1 id="relogio"></h1>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        exibirRelogio();
        setInterval(exibirRelogio, 1000); // Atualizar a cada segundo (1000 milissegundos)
    });

    function exibirRelogio() {
        const elementoRelogio = document.getElementById("relogio");
        const dataAtual = new Date();

        const horas = pad(dataAtual.getHours());
        const minutos = pad(dataAtual.getMinutes());
        const segundos = pad(dataAtual.getSeconds());

        const formatoRelogio = `${horas}:${minutos}:${segundos}`;
        elementoRelogio.innerText = formatoRelogio;
    }

    function pad(valor) {
        return valor < 10 ? "0" + valor : valor;
    }
</script> --}}
