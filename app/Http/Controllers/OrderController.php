<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\DB;

class OrderController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function index() {
        $orders = DB::table('order')->get();

        return view('order', ['orders' => $orders]);
    }

    function view($id) {
        $products = DB::table('product')
        ->join('product_order', 'product_order.product_id', '=', 'product.id')
        // ->join('order', 'product_order.order_id', '=', 'order.id')
        // ->select('product.nome', 'product.sku', 'product.preco', 'product_order.product_qtd')
        // ->orderBy('product.id')
        ->select('*')
        ->where('product_order.order_id', '=', $id)
        // ->where('order.status', '=', 1)
        ->distinct()
        ->get();
        
        $order_total = 0;
        foreach ($products as $key => $product){
            $order_total = ($product->preco * $product->product_qtd) + $order_total;
        }

        return view('orderview', [
            'products' => $products, 
            'order_id' => $id,
            'total' => $order_total
        ]);
    }
}
