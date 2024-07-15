<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    //

    public function login()
    {
        return view('Auth.Login');
    }

    public function loginVerify(Request $request)
    {
        // Validación de la solicitud
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'El correo es requerido',
            'email.email' => 'Debe ser un correo válido',
            'password.required' => 'La contraseña es requerida',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['invalid_credentials' => 'Usuario y contraseña inválidos'])->withInput();
    }

    public function signOut(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Sesión cerrada correctamente');
    }
}
