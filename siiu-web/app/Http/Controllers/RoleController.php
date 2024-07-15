<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use Exception;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:role.index')->only('index');
        $this->middleware('can:role.create')->only('create','store');
        $this->middleware('can:role.edit')->only('edit','update');
        $this->middleware('can:role.destroy')->only('destroy');
        $this->middleware('can:role.restore')->only('restore');
    }

    public function index()
    {
        $roles = Role::paginate();
        $rolesDelets = Role::onlyTrashed()->get();
        $permissions = Permission::all();


        return view('role.index', compact('roles', 'permissions', 'rolesDelets'))
            ->with('i', (request()->input('page', 1) - 1) * $roles->perPage());
    }

    
    public function create()
    {
        $role = new Role();
        return view('role.create', compact('role'));
    }

    
    public function store(Request $request)
    {

        // Validación de los datos
        $request->validate([
            'name' => 'required|unique:roles,name,' , // Validación del campo name como requerido y único en la tabla roles excluyendo el rol actual
        ], [
            'name.required' => 'El Role es requerido', // Mensaje de error si el campo name está vacío
            'name.unique' => 'El Role ya ha sido usado', // Mensaje de error si el campo name ya existe en la tabla roles

        ]);

        // Creación del nuevo rol
        $role = Role::create($request->all());

        // Redireccionamiento con mensaje de éxito
        return redirect()->route('role.index')->with('agregado', 'SI');

        // Redireccionamiento con mensaje de error


    }

   
    public function show($id)
    {
        $role = Role::find($id);

        return view('role.show', compact('role'));
    }

    
    public function edit($id)
    {
        $role = Role::findById($id);
        $permissions = Permission::all();
        $rolePermissions = $role->permissions->pluck('id')->toArray();

        return view('role.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    
    public function update(Request $request, $id)
    {

        // Validación de los datos
        $request->validate([
            'name' => 'required|unique:roles,name,' . $id, // Validación del campo name como requerido y único en la tabla roles excluyendo el rol actual

        ], [
            'name.required' => 'El Role es requerido', // Mensaje de error si el campo name está vacío
            'name.unique' => 'El Role ya ha sido usado', // Mensaje de error si el campo name ya existe en la tabla roles

        ]);

        // Buscar el rol y actualizar su nombre
        $role = Role::findById($id);
        $role->name = $request->name;
        $role->save();

        // Sincronizar permisos al rol
        $role->syncPermissions($request->permissions);

        // Redireccionamiento con mensaje de éxito
        return redirect()->route('role.index')->with('Actualizado', 'SI');
    }

    public function destroy($id)
    {

        if (Role::find($id)->delete()) {
            return redirect()->back()->with('eliminado', 'SI');
        } else {
            return redirect()->back()->with('eliminado', 'NO');
        }
    }

    public function restore($id)
    {
        $role = Role::withTrashed()->find($id);

        if ($role) {

            $role->restore();
            return redirect()->route('role.index')->with('Restaurado', 'SI');
        } else {
            return redirect()->route('role.index')->with('Restaurado', 'NO');
        }
    }
}
