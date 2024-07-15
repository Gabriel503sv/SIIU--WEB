@extends('layouts.user_type.auth')

@section('content')
<div class="shadow-lg p-3 mb-5 bg-body rounded rounded-3  ">
    <div class="row">
        <div class="col-4 text-center mx-auto">
            <img src="https://cdn-icons-png.flaticon.com/512/5151/5151145.png" width="200px">
            <h3 class="center">ROLES</h3>
        </div>
        <div class="col-4 text-center mx-auto"></div>
        <div class="col-md-4 d-flex justify-content-center align-items-center">

            <div class="py-5 ">
                <button type="button" class="btn btn-rounded btn-md btn-primary me-3 me-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Crear Role</button>
            </div>

        </div>
    </div>
</div>


<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Crear Role</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3 text-dark text-center" action="" method="POST" class="m-auto  w-form">
                    @csrf
                    <div class="col-md-12 mb-3">
                        <label for="name" class="form-label">role</label>
                        <input name="name" type="text" class="border-dark form-control @error('name') is-invalid @enderror" id="name" aria-describedby="nameHelp" required minlength="4" pattern="[A-Za-z\s]+" title="Ingrese solo letras y espacios" value="{{ old('name', $role->name ?? '') }}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button type="submit text-center" class="btn  btn-primary  " style="--bs-btn-opacity: .5;">REGISTRAR</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>

<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Roles</button>
        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Eliminados</button>
    </div>
</nav>
<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <div class="shadow-lg p-3 mb-5 bg-body rounded rounded-3 ">
            <table id="Principal" class="table align-items-center mb-0" style="width:100% ">
                <thead class="table-primary text-center">
                    <tr>
                        <th class="w-25">#</th>
                        <th class="w-50">ROLES</th>
                        <th class="w-15">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $key => $role)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $role->name }}</td>
                        <td>
                            <div class="row gx-3">

                                <div class="col">
                                    <a href="{{ route('role.edit', $role->id) }}" style="width: 100%" class="btn btn-green-600  mb-3"><i class='bx bxs-edit-alt'></i></a>
                                </div>
                                <div class="col">
                                    <form method="POST" class="formulario-eliminar" action="{{ route('role.destroy', $role->id) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button style="width: 100%" class="btn btn-red-800"><i class='bx bxs-trash'></i></button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        <div class="shadow-lg p-3 mb-5 bg-body rounded rounded-3 ">
            <table id="restaurar" class="table align-items-center mb-0" style="width:100% ">
                <thead class="table-primary text-center">
                    <tr>
                        <th >#</th>
                        <th >Role</th>
                        <th>Fecha Eliminación</th>
                        <th class="w-15">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rolesDelets as $key => $role)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->deleted_at }}</td>
                        <td>
                             <!-- Formulario para restaurar el role -->
                             <form action="{{ route('role.restore', $role->id) }}" class="formulario-restaurar" method="POST">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-cyan-800  mb-3" type="submit">Restaurar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

</div>

<script src="{{ asset('assets/js/Tablas/tablas.js') }}"></script>
<script src="{{ asset('assets/js/Roles/RolesIndex.js') }}"></script>

@if ($errors->any())
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Muestra el SweetAlert con el mensaje de error
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Role no se pudo crear'
        }).then(() => {
            // Después de cerrar el SweetAlert, abre el modal automáticamente
            var modal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
            modal.show();
        });
    });
</script>
@endif

@foreach (['agregado', 'eliminado', 'Actualizado', 'Restaurado'] as $sessionKey)
@if (session($sessionKey) == 'SI')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'success',
            title: '{{ ucfirst($sessionKey) }}',
            text: 'Usuario {{ strtolower($sessionKey) }} correctamente.'
        });
    });
</script>
@elseif (session($sessionKey) == 'NO')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Usuario no se pudo {{ strtolower($sessionKey) }}'
        });
    });
</script>
@endif
@endforeach


@endsection