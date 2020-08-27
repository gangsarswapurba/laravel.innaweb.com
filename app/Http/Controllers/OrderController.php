<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Bus\DispatchesJobs;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class OrderController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        parent::__construct();
    }

    function index() {
        $orders = DB::table('order')
        ->where('status', '=', 1)
        ->orderBy('id')
        ->get();

        return view('order.index', [
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

        return view('order.view', [
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
        
        return view('order.create', [
            'products' => $products
        ]);
    }

    function getProductById($id) {
        $product = DB::table('product')
        ->where('id', '=', $id)
        ->where('status', '=', 1)
        ->get();

        return $product;
    }

    function save(Request $request) {
        
        $products = $request->input('product');
        $ordered_products = [];

        foreach ($products as $key => $product_qtd){
            $order_price = 0;
            if($product_qtd){
                $product = $this->getProductById($key);
                $order_price = ($product[0]->preco * $product_qtd) + $order_price;
                $ordered_products[] = array
                (
                    'product_id' => $key,
                    'product_qtd' => $product_qtd,
                );
            }
        }
        
        $order_id = DB::table('order')->insertGetId(['data' => date("Y-m-d H:i:s")]);

        foreach ($ordered_products as $ordered_product){
            $referenced_data = array
            (
                'order_id' => $order_id,
                'product_id' => $ordered_product['product_id'],
                'product_qtd' => $ordered_product['product_qtd'],
            );
            DB::table('product_order')->insertGetId($referenced_data);
        }

        return redirect('order');
    }

    function delete($id) {
        DB::table('order')->where('id', '=', $id)->delete();

        return back();
    }
}
