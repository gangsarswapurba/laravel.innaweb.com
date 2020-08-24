<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProductController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function index() {
        $products = DB::table('product')->get();

        return view('product/index', 
            [
                'products' => $products 
            ]
        );
    }

    function ubah($id) {
        $product = DB::table('product')
        ->where('id', '=', $id)
        ->get();

        return view('product/edit', 
            [
                'product' => $product 
            ]
        );
    }

    function create() {
        
        return view('product/edit');
    }

    function save() {
        
        // $product = DB::table('product')
        // ->updateOrInsert(
        //     [
        //         'nome' => 'jamal@innaweb.com', 
        //         'sku' => '007', 
        //         'descricao' => 'lorem ipsum',
        //         'preco' => '13',
        //         'status' => 1
        //     ]
        // );

        return view('product/index');
    }

    function delete($id) {
        DB::table('product')->where('id', '=', $id)->delete();

        return back();
    }

}
