<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
   
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders = DB::table('order')
        ->where('status', '=', 1)
        ->orderBy('id', 'desc')
        ->limit(10)
        ->get();

        return view('dashboard.index', ['orders' => $orders]);
    }
}
