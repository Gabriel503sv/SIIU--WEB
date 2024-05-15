<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    //

    public function login(){
        return view('Auth.login');
    }

    public function loginverify(request $request){
        if(Auth::attempt(['email'=>$request->email,'password' => $request->password])){
            return redirect()->route('dashboard');
        }
        return back()->withErrors(['invalid_credentials'=>'Usuario y contraseña invalida'])->withInput();
    }

    public function signOut(Request $request,Redirect $redirect){
        Auth::logout();
        

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success',"session cerrada correctamente");
    }
}
