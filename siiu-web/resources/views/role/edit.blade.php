@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <h2>Editar Rol</h2>
    <form action="{{ route('role.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre del Rol</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $role->name }}" required>
        </div>
        <div class="form-group">
            <label>Permisos</label>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-5 g-3">
                @foreach ($permissions as $permission)
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->id }}" id="permission-{{ $permission->id }}" {{ in_array($permission->id, old('permissions', $rolePermissions)) ? 'checked' : '' }}>
                                <label class="form-check-label" for="permission-{{ $permission->id }}">
                                    {{ $permission->description }}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection