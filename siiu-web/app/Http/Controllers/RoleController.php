<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use Exception;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

/**
 * Class RoleController
 * @package App\Http\Controllers
 */
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::paginate();

        $permissions = Permission::all();


        return view('role.index', compact('roles', 'permissions'))
            ->with('i', (request()->input('page', 1) - 1) * $roles->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $role = new Role();
        return view('role.create', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validación de los datos
            $request->validate([
                'name' => 'required', // Validación del campo name como requerido y único en la tabla roles
                
            ], [
                'name.required' => 'El Role es requerido', // Mensaje de error si el campo name está vacío
                
            ]);

            // Creación del nuevo rol
            $role = Role::create($request->all());          

            // Redireccionamiento con mensaje de éxito
            return redirect()->route('role.index')->with('agregado', 'SI');
        } catch (Exception $e) {
            // Redireccionamiento con mensaje de error
            return redirect()->route('role.index')->with('agregado', 'NO');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $role = Role::find($id);

        return view('role.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $role = Role::findById($id);
        $permissions = Permission::all();
        $rolePermissions = $role->permissions->pluck('id')->toArray();

        return view('role.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
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
            return redirect()->route('role.index')->with('actualizado', 'SI');
        } catch (Exception $e) {
            // Redireccionamiento con mensaje de error
            return redirect()->route('role.index')->with('actualizado', 'NO');
        }
    }

    public function destroy($id)
    {
        Role::find($id)->delete();

        return redirect()->route('role.index')
            ->with('success', 'Role deleted successfully');
    }
}
