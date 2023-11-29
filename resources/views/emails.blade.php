<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss'])
    <title>E-mails</title>
</head>
<<<<<<< HEAD
 <body>
  <h3 class="text-center mt-5">E-mail Queue</h3>
    <h4 clas="text-center col-md-2"><?php echo  date('Y/m/d H:i:s');?></h4>
 </body>
=======

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

>>>>>>> 0676598b811606f076570f160bf10c93d67ee3ff
</html>



<<<<<<< HEAD
=======
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
>>>>>>> 0676598b811606f076570f160bf10c93d67ee3ff
