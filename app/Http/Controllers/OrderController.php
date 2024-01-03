<?php

//EVENTS
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Events\OrderPlaced;
use App\Models\Product;
use Illuminate\Events\Dispatcher;

class OrderController extends Controller
{
    public function index()
    {
        return view('event');
    }

    public function placeOrder(Request $request, $id)
    {
        //Place the order and retrieve the order ID
        $produto = Product::find($id);


        OrderPlaced::dispatch($produto);

        //event(new OrderPlaced($produto, 'OrderSend'));
        //event(new OrderPlaced($produto, 'OrderSendDecrement'));

        $quantidadeProduto = $produto->quantidade; // Obtenha o valor do estoque antes de excluir
        $estoqueProduto = $produto->estoque;

        session(['msg' => 'Item excluído com sucesso!', 'quantidadeProduto' => $quantidadeProduto,'estoqueProduto' => $estoqueProduto]);

        // Redirecione de volta à página
        return redirect("/event");
    }

}
