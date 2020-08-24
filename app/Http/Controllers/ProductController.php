<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\DB;

class ProductController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function index() {
        $products = DB::table('product')->get();

        return view('product/index', [
            'products' => $products
        ]);
    }

    function ubah($id) {
        $product = DB::table('product')
        ->where('id', '=', $id)
        ->get();

        return view('product/edit', [
            'product' => $product   
        ]);
    }

    function create() {
        
        return view('product/edit');
    }

}
