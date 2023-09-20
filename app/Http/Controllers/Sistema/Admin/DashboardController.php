<?php

namespace App\Http\Controllers\Sistema\Admin;

use App\Http\Controllers\Controller;
use App\Models\Empresas;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $empresas = Empresas::count();
        $widget = [
            'empresas' => $empresas
        ];
        return view('Sistema.Admin.dashboard', compact('widget'), ['empresas' => $empresas]);
    }
}
