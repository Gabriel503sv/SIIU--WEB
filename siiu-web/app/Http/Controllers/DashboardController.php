<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
    //
    public function index()
    {
        // Obtener el conteo de usuarios por rol
        $rolesCount = Role::withCount('users')->get();

        return view('dashboard.index', compact('rolesCount'));
    }
}
