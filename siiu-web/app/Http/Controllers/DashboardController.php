<?php

namespace App\Http\Controllers;

use App\Models\User;


class DashboardController extends Controller
{
    //
    public function index()
    {
        

       return view('dashboard.index');
        
    }

    public function Principal()
    {
        // Obtener el conteo de usuarios por rol
        $userCount = User::count();

       return view('dashboard.Permisos', compact('userCount'));
        
    }

    public function Secundario()
    {
        // Obtener el conteo de usuarios por rol
        $userCount = User::count();

       return view('dashboard.Secundario');
        
    }
}
