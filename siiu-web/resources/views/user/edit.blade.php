@extends('layouts.user_type.auth')

@section('content')


<div class="container-md">
    <div class="card text-center">
        <div class="card-header bg-primary">
            <H2 class="text-center text-white ">INFORMACION DEL USUARIO</H2>
        </div>
        <div class="card-body">
            <form class="row g-3 text-dark text-center needs-validation" action="{{ route('user.update', $user->id) }}" method="POST" id="updateForm" novalidate>
                @csrf
                @method('PUT')
                <div class="col-md-4 mb-3">
                    <label for="name" class="form-label">Usuario</label>
                    <input name="name" type="text" class="border-dark form-control @error('name') is-invalid @enderror" id="name" aria-describedby="nameHelp" required minlength="6" pattern="[a-zA-Z]+" value="{{ old('name', $user->name) }}">
                    <div class="invalid-feedback">El nombre debe tener al menos 6 caracteres y solo puede contener letras.</div>
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input name="email" type="email" class="border-dark form-control @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp" value="{{ old('email', $user->email) }}" required>
                    <div class="invalid-feedback">Por favor, introduce un correo electrónico válido.</div>
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="departamento_id">Departamento</label>
                    <select name="departamento_id" id="departamento_id" class="form-control @error('departamento_id') is-invalid @enderror" required>
                        <option value="">Seleccione un departamento</option>
                        @foreach($departamentos as $departamento)
                        <option value="{{ $departamento->id }}" {{ $user->departamento_id == $departamento->id ? 'selected' : '' }}>
                            {{ $departamento->nombre }}
                        </option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">Por favor, selecciona un departamento.</div>
                    @error('departamento_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="password" class="form-label">Contraseña (opcional)</label>
                    <input name="password" type="password" class="border-dark form-control @error('password') is-invalid @enderror" id="password" minlength="8" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{8,}$">
                    <div class="invalid-feedback">La contraseña debe tener al menos 8 caracteres, incluir letras mayúsculas y minúsculas, números y caracteres especiales, y no debe contener espacios en blanco.</div>
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                    <input name="password_confirmation" type="password" class="border-dark form-control" id="password_confirmation">
                    <div class="invalid-feedback">Las contraseñas no coinciden.</div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="apellidos" class="form-label">Apellidos</label>
                    <input name="apellidos" type="text" class="border-dark form-control @error('apellidos') is-invalid @enderror" id="apellidos" value="{{ old('apellidos', $user->informacionPersonal->apellidos ?? '') }}" required minlength="6" pattern="[a-zA-Z]+" title="El apellido debe tener al menos 6 caracteres y solo letras.">
                    <div class="invalid-feedback">El apellido debe tener al menos 6 caracteres y solo puede contener letras.</div>
                    @error('apellidos')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="nombres" class="form-label">Nombres</label>
                    <input name="nombres" type="text" class="border-dark form-control @error('nombres') is-invalid @enderror" id="nombres" value="{{ old('nombres', $user->informacionPersonal->nombres ?? '') }}" required minlength="6" pattern="[a-zA-Z]+" title="El nombre debe tener al menos 6 caracteres y solo letras.">
                    <div class="invalid-feedback">El nombre debe tener al menos 6 caracteres y solo puede contener letras.</div>
                    @error('nombres')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                    <input name="fecha_nacimiento" type="date" class="border-dark form-control @error('fecha_nacimiento') is-invalid @enderror" id="fecha_nacimiento" value="{{ old('fecha_nacimiento', $user->informacionPersonal->fecha_nacimiento ?? '') }}" required>
                    <div class="invalid-feedback">Debes tener al menos 16 años.</div>
                    @error('fecha_nacimiento')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="genero" class="form-label">Género</label>
                    <select name="genero" class="border-dark form-control @error('genero') is-invalid @enderror" id="genero" required>
                        <option value="">Seleccione una opción</option>
                        <option value="Masculino" {{ old('genero', $user->informacionPersonal->genero ?? '') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                        <option value="Femenino" {{ old('genero', $user->informacionPersonal->genero ?? '') == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                        <option value="Otro" {{ old('genero', $user->informacionPersonal->genero ?? '') == 'Otro' ? 'selected' : '' }}>Otro</option>
                    </select>
                    <div class="invalid-feedback">Por favor, selecciona un género.</div>
                    @error('genero')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="dui" class="form-label">DUI</label>
                    <input name="dui" type="text" class="border-dark form-control @error('dui') is-invalid @enderror" id="dui" value="{{ old('dui', $user->informacionPersonal->dui ?? '') }}" required pattern="\d{8}-\d" title="El DUI debe tener el formato 00000000-0.">
                    <div class="invalid-feedback">El DUI debe tener el formato 00000000-0.</div>
                    @error('dui')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input name="telefono" type="text" class="border-dark form-control @error('telefono') is-invalid @enderror" id="telefono" value="{{ old('telefono', $user->informacionPersonal->telefono ?? '') }}" required pattern="\d{4}-\d{4}" title="El teléfono debe tener el formato 0000-0000.">
                    <div class="invalid-feedback">El teléfono debe tener el formato 0000-0000.</div>
                    @error('telefono')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <h3>Roles</h3>
                    <hr>
                    <div class="row">
                        @foreach ($roles as $index => $role)
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input role-checkbox" type="radio" name="roles[]" value="{{ $role->id }}" id="role-{{ $role->id }}" {{ in_array($role->id, old('roles', $userRoles)) ? 'checked' : '' }}>
                                <label class="form-check-label" for="role-{{ $role->id }}">
                                    {{ $role->name }}
                                </label>
                            </div>
                        </div>
                        @if ($index % 2 == 1)
                    </div>
                    <div class="row">
                        @endif
                        @endforeach
                    </div>
                    <div class="invalid-feedback">Por favor, selecciona exactamente un rol.</div>
                </div>

                <div class="d-grid gap-2 col-6 mx-auto">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
        <div class="card-footer text-muted">
            2 days ago
        </div>
    </div>


</div>



<script src="{{ asset('assets/js/Usuarios/UserEdit.js') }}"></script>



@endsection