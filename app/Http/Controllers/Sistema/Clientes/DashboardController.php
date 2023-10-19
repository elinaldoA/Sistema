<?php

namespace App\Http\Controllers\Sistema\Clientes;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:cliente');
    }
    public function index()
    {
        return redirect()->route('loja');
    }
}
