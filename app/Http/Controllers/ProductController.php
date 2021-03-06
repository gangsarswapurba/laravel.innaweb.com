<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Bus\DispatchesJobs;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProductController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        parent::__construct();
    }

    function index() {
        $products = DB::table('product')->get();

        return view('product.index', 
            [
                'products' => $products 
            ]
        );
    }

    function ubah($id) {
        $product = DB::table('product')
        ->where('id', '=', $id)
        ->get();

        return view('product.edit', 
            [
                'product' => $product 
            ]
        );
    }

    function create() {
        
        return view('product.edit');
    }

    function save(Request $request, $id = null) {

        $id = is_null( $id ) ? null : $id;

        $input = $request->input();

        // $validatedData = $request->validate([
        //     'nome' => 'required|unique:product',
        //     'sku' => 'required', 
        //     'preco' => 'required'
        // ]);
        
        $product = DB::table('product')
        ->updateOrInsert(
            [ 
                'id' => $id,
            ],
            [
                'id' => $id,
                'nome' => $input['nome'], 
                'sku' => $input['sku'], 
                'preco' => $input['preco'],
                'descricao' => $input['descricao'],
                'status' => 1
            ]
        );

        // return is_null( $id ) ? redirect('product') : back();
        return redirect('product');
    }

    function delete($id) {
        DB::table('product')
        ->where('id', '=', $id)
        ->delete();

        return back();
    }

}
