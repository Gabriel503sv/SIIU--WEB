<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
    //
    public function index()
    {
        // Obtener el conteo de usuarios por rol
        $userCount = User::count();

        return view('dashboard.index', compact('userCount'));
    }
}
