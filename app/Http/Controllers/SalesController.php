<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    
    function lastMonth() {
        $products = DB::table('product')
        ->join('product_order', 'product_order.product_id', '=', 'product.id')
        ->join('order', 'product_order.order_id', '=', 'order.id')
        ->select('order.data as tanggal', 'product_order.order_id', 'product.nome as nama', 'product.sku', 'product.preco as harga', 'product_order.product_qtd as quantity')
        ->orderBy('order.id')
        ->where('order.status', '=', 1)
        ->whereBetween('data', [date('Y-m-01'), date('Y-m-t')])
        ->distinct()
        ->get();

        $orders = [];
        foreach ($products as $key => $product){
            $date = new DateTime($product->tanggal);
            $theDate = intval($date->format('d'));

            if (isset($orders[$theDate])) {
                $orders[$theDate] += $product->quantity;
            } else {
                $orders[$theDate] = $product->quantity;
            }

        }

        return $orders;
    }
}
