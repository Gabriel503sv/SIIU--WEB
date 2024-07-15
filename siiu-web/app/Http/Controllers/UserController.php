<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Models\Departamento;
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
    public function __construct()
    {
        $this->middleware('can:user.index')->only('index');
        $this->middleware('can:user.create')->only('create','store');
        $this->middleware('can:user.edit')->only('edit','update');
        $this->middleware('can:user.destroy')->only('destroy');
        $this->middleware('can:user.restore')->only('restore');
    }

    public function index()
    {
        $users = User::paginate();
        $usersDelets = User::onlyTrashed()->get();
        $departamentos = Departamento::all();

        return view('user.index', compact('users', 'departamentos', 'usersDelets'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }


    public function create()
    {
        $user = new User();
        return view('user.create', compact('user'));
    }

   
    public function store(Request $request)
    {

        $request->validate([
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
            'name' => 'required',
            'departamento_id' => 'required|exists:departamentos,id',

        ], [
            'email.required' => 'El correo es requerido',
            'email.unique' => 'El correo ya ha sido usado',
            'password.required' => 'La contraseña es requerida',
            'password.min' => 'La contraseña debe tener 8 caracteres',
            'password_confirmation.required' => 'La confirmacion de la contraseña es requerida',
            'password.same' => 'La contraseñas no coinciden',
            'name.required' => 'el nombre es requerido',
            'departamento_id.required' => 'El departamento es requerido',
            'departamento_id.exists' => 'El departamento seleccionado no es válido',

        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'departamento_id' => $request->departamento_id,
        ])->assignRole('Usuario');
        
        return redirect()->route('user.index')->with('agregado', 'SI');
    }

    
    public function show($id)
    {
        $user = User::with('informacionPersonal')->find($id);

        return view('user.show', compact('user'));
    }

    
    public function edit($id)
    {
        $user = User::with('informacionPersonal')->find($id);
        $departamentos = Departamento::all();
        $roles = Role::all();
        $userRoles = $user->roles->pluck('id')->toArray();

        return view('user.edit', compact('user', 'roles', 'userRoles', 'departamentos'));
    }

   
    public function update(Request $request, User $user)
    {

        $request->validate([
            'email' => 'required|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8',
            'password_confirmation' => 'nullable|same:password',
            'name' => 'required',
            'departamento_id' => 'required|exists:departamentos,id',
            'apellidos' => 'required',
            'nombres' => 'required',
            'fecha_nacimiento' => 'required|date',
            'genero' => 'required',
            'dui' => 'required|unique:informacion_personals,dui,' . ($user->informacionPersonal ? $user->informacionPersonal->id : 'NULL') . ',user_id',
            'telefono' => 'required|unique:informacion_personals,telefono,' . ($user->informacionPersonal ? $user->informacionPersonal->id : 'NULL') . ',user_id',
        ], [
            'email.required' => 'El correo es requerido',
            'email.unique' => 'El correo ya ha sido usado',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres',
            'password_confirmation.same' => 'Las contraseñas no coinciden',
            'name.required' => 'El nombre es requerido',
            'departamento_id.required' => 'El departamento es requerido',
            'departamento_id.exists' => 'El departamento no es válido',
            'apellidos.required' => 'Los apellidos son requeridos',
            'nombres.required' => 'Los nombres son requeridos',
            'fecha_nacimiento.required' => 'La fecha de nacimiento es requerida',
            'fecha_nacimiento.date' => 'La fecha de nacimiento no es válida',
            'genero.required' => 'El género es requerido',
            'dui.required' => 'El DUI es requerido',
            'dui.unique' => 'El DUI ya ha sido usado',
            'telefono.required' => 'El teléfono es requerido',
            'telefono.unique' => 'El telefono ya ha sido usado',
        ]);

        $userData = $request->only('name', 'email', 'departamento_id');
        if ($request->filled('password')) {
            $userData['password'] = bcrypt($request->password);
        }
        $user->update($userData);

        $user->syncRoles($request->roles);

        $informacionPersonalData = $request->only('apellidos', 'nombres', 'fecha_nacimiento', 'genero', 'dui', 'telefono');
        $informacionPersonal = $user->informacionPersonal;
        if ($informacionPersonal) {
            $informacionPersonal->update($informacionPersonalData);
        } else {
            $informacionPersonalData['user_id'] = $user->id;
            InformacionPersonal::create($informacionPersonalData);
        }

        return redirect()->route('user.index')->with('Actualizado', 'SI');
    }

    public function destroy($id)
    {

        if (User::find($id)->delete()) {
            return redirect()->back()->with('eliminado', 'SI');
        } else {
            return redirect()->back()->with('eliminado', 'NO');
        }
    }

    public function restore($id)
    {
        $user = User::withTrashed()->find($id);

        if ($user) {
            $user->restore();
            return redirect()->back()->with('Restaurado', 'SI');
        } else {
            return redirect()->back()->with('Restaurado', 'NO');
        }
    }
}
