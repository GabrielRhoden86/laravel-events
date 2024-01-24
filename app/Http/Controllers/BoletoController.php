<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use eduardokum\LaravelBoleto;
use Illuminate\Support\Facades\Log;
use App\Jobs\EmailsBoletos;
use Illuminate\Support\Facades\Queue;

class BoletoController extends Controller
{

    private $tituloPage;

    public function __construct()
    {
        $this->tituloPage = null;
    }

    public function viewBoleto()
    {
        $this->tituloPage = "Boletos";
        return view('boletos.boleto', ["titulo" => $this->tituloPage]);
    }

    public function gerarBoleto(Request $request)
    {
        $tipoContadorBoleto = $request->input('contadores');
        $inicioVencimento = $request->input('inicio');
        $inicioVencimentoFormat = $inicioVencimento.' 00:00:00.000';
        $fimVencimento  = $request->input('fim');
        $fimVencimentoFormat = $fimVencimento.' 00:00:00.000';
        $DataImpresaoBoleto = $request->input('inicioImprecao');
        $DataImpresaoBoletoFormat =  $DataImpresaoBoleto .' 00:00:00.000';

        //Profisionais
        $dadosBoletosPro = DB::select("SELECT * FROM `fila-laravel`.profissionais
        WHERE `Data Vencto` BETWEEN '$inicioVencimentoFormat' AND '$fimVencimentoFormat'
        AND `Tipo Registro` = 1
        AND `Codigo Barras` IS NOT NULL
        AND `Agencia/Cedente` = '3793/3646640'
        AND `Data Impressao` = '$DataImpresaoBoletoFormat'");

        // //Empresas
        // $dadosBoletosEmpr = DB::select("select a.*, b.*, c.* from SCF..SFNW11 a
        //                                 INNER JOIN SCF..SCDA02 b ON b.[Num. Registro] = a.[Num. Registro]
        //                                 INNER JOIN SCF..SCDA52 c ON c.[Num. Registro] = a.[Num. Registro]
        // 								where a.[Data Vencto] between '$inicio 00:00:00' and '$fim 00:00:00'
        //                                 and c.[Endereco Correspondencia] = 'SIM'
        //                                 and a.[Guia Cancelada] = 'NAO'
        //                                 AND a.[Tipo Registro] = 2
        //                                 and a.[Usuario] = 'WARDZIN'
        //                                 and a.[Codigo Barras] is not null
        // 								and a.[Agencia/Cedente] = '3793/3646640'
        //                                 and a.[Data Impressao] = '$impresao 00:00:00.000'
        //                                 ORDER BY a.[Nome] ASC");

        //dd($dadosBoletosPro);

        if ($tipoContadorBoleto == "profissionais") {
            $dadosBoletos = $dadosBoletosPro;
            $documento = 'CPF';
        }
        // else {
        //     $dadosBoletos = $dadosBoletosEmpr;
        //     $documento = 'CGC';
        // }

        $chunkSize = 40; // Tamanho de cada lote de destinatários
        $boletosChunks = array_chunk($dadosBoletos, $chunkSize);

        foreach ($boletosChunks as $boletosChunk) {
            foreach ($boletosChunk as $dados) {

                // $beneficiario = new \Eduardokum\LaravelBoleto\Pessoa(
                //     [
                //         'nome'      => 'CONSELHO REGIONAL DE CONTABILIDADE DO PARANÁ ',
                //         'endereco'  => 'RUA XV DE NOVEMBRO, 2987 - ALTO DA XV',
                //         'cep'       => '80045-340',
                //         'uf'        => 'PR',
                //         'cidade'    => 'CURITIBA',
                //         'documento' => '76.592.559/0001-10',
                //     ]
                // );

                // $pagador = new \Eduardokum\LaravelBoleto\Pessoa(
                //     [
                //         'nome'      => $dados->Nome,
                //         'endereco'  => 'R. XV de Novembro, 2987 - Alto da XV, Curitiba - PR',
                //         'bairro'    => 'Alto da XV',
                //         'cep'       => '80045-340',
                //         'uf'        => 'PR',
                //         'cidade'    => '80045-340',
                //         'documento' => 'Curitiba',
                //     ]
                // );

                //$boleto = new \Eduardokum\LaravelBoleto\Boleto\Banco\Caixa;
                $boleto = new \Eduardokum\LaravelBoleto\Boleto\Banco\Bb;
                //$boleto->setDataVencimento(new \Carbon\Carbon($dados->{'Data Vencto'}));
                  //  ->setValor($dados->{'Total guia'})
                    //->setNumero(066891.5) caixa
                    //->setNumero(3646640)
                    //->setNumeroDocumento($dados->{'Num. Registro'})
                     //->setPagador($pagador)
                     //->setBeneficiario($beneficiario)
                    //->setCarteira('17')
                    //->setAgencia('0373-5') caixa
                    //->setAgencia('3793')
                    //->setCodigoBoleto($dados->{'Codigo Barras'})
                    //->setNossoNumero($dados->{'Numero Guia Formatado'})
                    //->setCodigoCliente('066891-9') caixa
                    //->setCodigoCliente('3646640')
                    // ->setDescricaoDemonstrativo([$dados->{'Mensagem Formatada Reduzida'}])
                    // ->setInstrucoes([$dados->{'Mensagem Formatada Reduzida'}])
                    //->setLogo('/var/www/html/crcpr-boletos/public/storage/logo2-crcA.png');

                //$nomeArquivo = $dados->{'Numero Guia'};
                //$pdf = new \Eduardokum\LaravelBoleto\Boleto\Render\Pdf();
                ///$pdf->addBoleto($boleto);
                //dd($pdf);
                //$pdf->gerarBoleto($pdf::OUTPUT_DOWNLOAD);
               // $pdf->gerarBoleto($pdf::OUTPUT_SAVE, '/var/www/html/crcpr-boletos/storage' . DIRECTORY_SEPARATOR . 'boletos' . DIRECTORY_SEPARATOR . $nomeArquivo . '.pdf');

                //$pdfPath = '/var/www/html/crcpr-boletos/storage/boletos/' . $nomeArquivo . '.pdf';
                $userName = $dados->Nome;
                $userEmail = $dados->{'E-Mail'};

                EmailsBoletos::dispatch($userName, $userEmail)->onQueue('emailBoleto');

            }
        }

        return redirect('/boletos/boleto')->with('msg-boleto', true);
    }
}
