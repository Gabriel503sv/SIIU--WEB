@extends('layouts.user_type.auth')

@section('content')


<div class="container-md">
    <div class="shadow-lg p-3 mb-5  rounded rounded-3 bg-primary ">
        <h2 class="text-center text-white">EDITAR USUARIO</h2>
    </div>
    <div class="shadow-lg p-3 mb-5 bg-body rounded rounded-3">
        <br>
        <H2 class="text-center">INFORMACION DEL USUARIO</H2>
        <br>
        <hr><br>

        <form class="row g-3 text-dark text-center" action="{{ route('user.update', $user->id) }}" method="POST" class="m-auto w-form">
            @csrf
            @method('PUT')
            <div class="col-md-6 mb-3">
                <label for="name" class="form-label">Usuario</label>
                <input name="name" type="text" class="border-dark form-control @error('name') is-invalid @enderror" id="name" aria-describedby="nameHelp" required minlength="4" value="{{ old('name', $user->name ?? '') }}">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input name="email" type="email" class="border-dark form-control @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp" value="{{ old('email', $user->email ?? '') }}">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input name="password" type="password" class="border-dark form-control @error('password') is-invalid @enderror" id="password">
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                <input name="password_confirmation" type="password" class="border-dark form-control" id="password_confirmation">
            </div>
            <div class="col-md-6 mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input name="apellidos" type="text" class="border-dark form-control @error('apellidos') is-invalid @enderror" id="apellidos" value="{{ old('apellidos', $user->informacionPersonal->apellidos ?? '') }}">
                @error('apellidos')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="nombres" class="form-label">Nombres</label>
                <input name="nombres" type="text" class="border-dark form-control @error('nombres') is-invalid @enderror" id="nombres" value="{{ old('nombres', $user->informacionPersonal->nombres ?? '') }}">
                @error('nombres')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                <input name="fecha_nacimiento" type="date" class="border-dark form-control @error('fecha_nacimiento') is-invalid @enderror" id="fecha_nacimiento" value="{{ old('fecha_nacimiento', $user->informacionPersonal->fecha_nacimiento ?? '') }}">
                @error('fecha_nacimiento')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="genero" class="form-label">Género</label>
                <input name="genero" type="text" class="border-dark form-control @error('genero') is-invalid @enderror" id="genero" value="{{ old('genero', $user->informacionPersonal->genero ?? '') }}">
                @error('genero')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="dui" class="form-label">DUI</label>
                <input name="dui" type="text" class="border-dark form-control @error('dui') is-invalid @enderror" id="dui" value="{{ old('dui', $user->informacionPersonal->dui ?? '') }}">
                @error('dui')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="nacionalidad" class="form-label">Nacionalidad</label>
                <input name="nacionalidad" type="text" class="border-dark form-control @error('nacionalidad') is-invalid @enderror" id="nacionalidad" value="{{ old('nacionalidad', $user->informacionPersonal->nacionalidad ?? '') }}">
                @error('nacionalidad')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
                <button type="submit" class="btn btn-primary" style="--bs-btn-opacity: .5;">Guardar</button>
            </div>
        </form>
    </div>
</div>


@if (session('Actualizado') == 'SI')
<script>
    Swal.fire(
        'Agregado',
        'Usuario Actualizado correctamente.',
        'success'
    )
</script>
@elseif (session('Actualizado') == 'NO')
<script>
    Swal.fire(
        'Error',
        'Usuario no se pudo Actualizar',
        'error'
    )
</script>
@endif

@endsection