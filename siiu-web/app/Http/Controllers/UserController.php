<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Models\InformacionPersonal;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate();
        $rolesCount = Role::withCount('users')->get(); // Obtener roles con el conteo de usuarios
    
        return view('user.index', compact('users', 'rolesCount'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = new User();
        return view('user.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|unique:users,email',
                'password' => 'required|min:8',
                'password_confirmation' => 'required|same:password',
                'name' => 'required',

            ], [
                'email.required' => 'El correo es requerido',
                'email.unique' => 'El correo ya ha sido usado',
                'password.required' => 'La contraseña es requerida',
                'password.min' => 'La contraseña debe tener 8 caracteres',
                'password_confirmation.required' => 'La confirmacion de la contraseña es requerida',
                'password.same' => 'La contraseñas no coinciden',
                'name.required' => 'el nombre es requerido'
            ]);




            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
            return redirect()->route('users.index')->with('agregado', 'SI');
        } catch (Exception $e) {

            return redirect()->route('users.index')->with('agregado', 'NO');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::with('informacionPersonal')->find($id);

        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::with('informacionPersonal')->find($id);
        $roles = Role::all();
        $userRoles = $user->roles->pluck('id')->toArray();

        return view('user.edit', compact('user', 'roles', 'userRoles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        try {

            // Validar los datos de entrada
            $request->validate([
                'email' => 'required|unique:users,email,' . $user->id,
                'password' => 'nullable|min:8',
                'password_confirmation' => 'nullable|same:password',
                'name' => 'required',
                'apellidos' => 'required',
                'nombres' => 'required',
                'fecha_nacimiento' => 'required|date',
                'genero' => 'required',
                'dui' => 'required',
                'nacionalidad' => 'required'
            ], [
                'email.required' => 'El correo es requerido',
                'email.unique' => 'El correo ya ha sido usado',
                'password.min' => 'La contraseña debe tener al menos 8 caracteres',
                'password_confirmation.same' => 'Las contraseñas no coinciden',
                'name.required' => 'El nombre es requerido',
                'apellidos.required' => 'Los apellidos son requeridos',
                'nombres.required' => 'Los nombres son requeridos',
                'fecha_nacimiento.required' => 'La fecha de nacimiento es requerida',
                'fecha_nacimiento.date' => 'La fecha de nacimiento no es válida',
                'genero.required' => 'El género es requerido',
                'dui.required' => 'El DUI es requerido',
                'nacionalidad.required' => 'La nacionalidad es requerida'
            ]);

            // Actualizar el usuario
            $userData = $request->only('name', 'email');
            if ($request->filled('password')) {
                $userData['password'] = bcrypt($request->password);
            }
            $user->update($userData);

            // Asignar roles al usuario
            $user->syncRoles($request->roles);

            // Actualizar la información personal
            $informacionPersonalData = $request->only('apellidos', 'nombres', 'fecha_nacimiento', 'genero', 'dui', 'nacionalidad');
            $informacionPersonal = $user->informacionPersonal;
            if ($informacionPersonal) {
                $informacionPersonal->update($informacionPersonalData);
            } else {
                $informacionPersonalData['user_id'] = $user->id;
                InformacionPersonal::create($informacionPersonalData);
            }

            // Confirmar la transacción


            return redirect()->route('user.index')->with('Actualizado', 'SI');
        } catch (Exception $e) {
            // Revertir la transacción en caso de error

            return redirect()->route('users.index')->with('Actualizado', 'NO');
        }
    }

    public function destroy($id)
    {

        if (User::find($id)->delete()) {
            return redirect()->back()->with('eliminado', 'SI');
        } else {
            return redirect()->back()->with('eliminado', 'NO');
        }
    }
}
