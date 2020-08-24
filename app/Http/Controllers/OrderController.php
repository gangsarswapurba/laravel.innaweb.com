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
        $orders = DB::table('order')
        ->where('status', '=', 1)
        ->orderBy('id')
        ->get();

        return view('order/index', [
            'orders' => $orders
        ]);
    }

    function view($id) {
        $products = DB::table('product')
        ->join('product_order', 'product_order.product_id', '=', 'product.id')
        ->join('order', 'product_order.order_id', '=', 'order.id')
        ->select('product.nome', 'product.sku', 'product.preco', 'product_order.product_qtd')
        ->orderBy('product.id')
        ->where('product_order.order_id', '=', $id)
        ->where('order.status', '=', 1)
        ->distinct()
        ->get();
        
        $order_total = 0;
        foreach ($products as $key => $product){
            $order_total = ($product->preco * $product->product_qtd) + $order_total;
        }

        return view('order/view', [
            'products' => $products, 
            'order_id' => $id,
            'total' => $order_total
        ]);
    }

    function create() {
        $products = DB::table('product')
        ->where('status', 1)
        ->orderBy('id')
        ->get();
        
        return view('order/create', [
            'products' => $products
        ]);
    }

    function save() {
        return 'on development';
    }
}
