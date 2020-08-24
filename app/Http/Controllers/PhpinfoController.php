<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhpinfoController extends Controller
{
    function index() {
        return view('phpinfo');
    }
}
