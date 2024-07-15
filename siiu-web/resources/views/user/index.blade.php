@extends('layouts.user_type.auth')

@section('content')
<div class="shadow-lg p-3 mb-5 bg-body rounded rounded-3">
    <div class="row">
        <div class="col-md-4 text-center mx-auto">
            <img src="https://www.pavilionweb.com/wp-content/uploads/2017/03/man-300x300.png" width="200px">
            <h3 class="center">USUARIOS</h3>
        </div>
        <div class="col-md-4">

        </div>
        <div class="col-md-4 d-flex justify-content-center align-items-center">
            @can('user.create')
            <div>
                <button type="button" class="btn btn-rounded btn-md btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Crear Usuario</button>
            </div>
            @endcan
        </div>
    </div>
</div>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Crear Usuario</h1>
                <button type="button" class="btn-close bg-primary" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="row g-3 text-dark text-center" action="{{ route('user.store') }}" method="POST" class="m-auto w-form" onsubmit="return validateForm()">
                @csrf
                <div class="modal-body ">
                    <div class="col-md-12 mb-3">
                        <label for="name" class="form-label">Usuario</label>
                        <input name="name" type="text" class="border-dark form-control @error('name') is-invalid @enderror" id="name" aria-describedby="nameHelp" required minlength="8" value="{{ old('name', $user->name ?? '') }}">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input name="email" type="email" class="border-dark form-control @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp" required value="{{ old('email', $user->email ?? '') }}">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input name="password" type="password" class="border-dark form-control @error('password') is-invalid @enderror" id="password" required>
                        <input type="checkbox" onclick="togglePassword('password')"> Mostrar Contraseña
                        @error('password')
                        <small class="text-danger mt-1">
                            <strong>{{ $message }}</strong>
                        </small>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                        <input name="password_confirmation" type="password" class="border-dark form-control" id="password_confirmation" required>
                        <input type="checkbox" onclick="togglePassword('password_confirmation')"> Mostrar Contraseña
                    </div>

                    <div class="form-group ">
                        <label for="departamento_id" class="form-label">Departamento:</label>
                        <select class="form-control @error('departamento_id') is-invalid @enderror" id="departamento_id" name="departamento_id" required>
                            <option value="">Seleccione un departamento</option>
                            @foreach ($departamentos as $departamento)
                            <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                            @endforeach
                        </select>

                        @error('departamento_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" style="--bs-btn-opacity: .5;">REGISTRAR</button>

                </div>
            </form>

        </div>
    </div>
</div>

<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Usuarios</button>
        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Eliminados</button>

    </div>
</nav>
<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <div class="shadow-lg p-3 mb-5 bg-body rounded rounded-3 ">
            <table id="Principal" class="table align-items-center mb-0" style="width:100% ">
                <thead class="table-primary text-center">
                    <tr>
                        <th>#</th>
                        <th>Usuario</th>
                        <th>Correo</th>
                        <th>Departamento</th>
                        <th class="w-15">ACCIONES</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key => $user)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->departamento->nombre }}</td>
                        <td>
                            <div class="row gx-3">
                                <div class="col">
                                    <a href="{{ route('user.show', $user->id) }}" style="width: 100%" class="btn btn-cyan-800  mb-3"><i class='bx bxs-show'></i></a>
                                </div>
                                @can('user.edit')
                                <div class="col">
                                    <a href="{{ route('user.edit', $user->id) }}" style="width: 100%" class="btn btn-green-600  mb-3"><i class='bx bxs-edit-alt'></i></a>
                                </div>
                                @endcan
                                @can('user.destroy')
                                <div class="col">
                                    <form method="POST" class="formulario-eliminar" action="{{ route('user.destroy', $user->id) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button style="width: 100%" class="btn btn-red-800" @if ($user->id === Auth::user()->id) disabled @endif><i class='bx bxs-trash'></i></button>
                                    </form>
                                </div>
                                @endcan
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
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Fecha Eliminación</th>
                        <th class="w-10">Restaurar</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($usersDelets as $key => $user)
                    <tr>
                        <td class="text-center " scope="row">{{ $key + 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->deleted_at }}</td> <!-- Fecha de eliminación -->
                        <td>
                            @can('user.create')
                            <!-- Formulario para restaurar el usuario -->
                            <form action="{{ route('user.restore', $user->id) }}" class="formulario-restaurar" method="POST">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-cyan-800  mb-3" type="submit">Restaurar</button>
                            </form>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

        </div>
    </div>

</div>


<script src="{{ asset('assets/js/Tablas/tablas.js') }}"></script>
<script src="{{ asset('assets/js/Usuarios/UserIndex.js') }}"></script>


@if ($errors->any())
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Muestra el SweetAlert con el mensaje de error
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Usuario no se pudo crear'
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