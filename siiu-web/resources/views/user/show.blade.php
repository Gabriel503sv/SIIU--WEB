@extends('layouts.user_type.auth')

@section('content')
<div class="container-md">

    <div class="shadow-lg p-3 mb-5 rounded rounded-3">
        <div class="bg-primary rounded rounded-3 p-2 m-2">
            <h4 class="text-white">INFORMACION USUARIO</h4>
        </div>
        <table class="table table-borderless">
            <tbody>
                <tr>
                    <th scope="row">USUARIO:</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th scope="row">CORREO:</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th scope="row">Departamento:</th>
                    <td>{{ $user->departamento ? $user->departamento->nombre : 'No disponible' }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="shadow-lg p-3 mb-5 rounded rounded-3">
        <div class="bg-primary rounded rounded-3 p-2 m-2">
            <h4 class="text-white">INFORMACION GENERAL</h4>
        </div>
        <table class="table table-borderless">
            <tbody>
                <tr>
                    <th scope="row">APELLIDOS:</th>
                    <td>@isset($user->informacionPersonal->apellidos) {{ $user->informacionPersonal->apellidos }} @else No disponible @endisset</td>
                </tr>
                <tr>
                    <th scope="row">NOMBRE:</th>
                    <td>@isset($user->informacionPersonal->nombres) {{ $user->informacionPersonal->nombres }} @else No disponible @endisset</td>
                </tr>
                <tr>
                    <th scope="row">FECHA NACIMIENTO:</th>
                    <td>@isset($user->informacionPersonal->fecha_nacimiento) {{ $user->informacionPersonal->fecha_nacimiento }} @else No disponible @endisset</td>
                </tr>
                <tr>
                    <th scope="row">GENERO:</th>
                    <td>@isset($user->informacionPersonal->genero) {{ $user->informacionPersonal->genero }} @else No disponible @endisset</td>
                </tr>
                <tr>
                    <th scope="row">DUI:</th>
                    <td>@isset($user->informacionPersonal->dui) {{ $user->informacionPersonal->dui }} @else No disponible @endisset</td>
                </tr>
                <tr>
                    <th scope="row">TELEFONO:</th>
                    <td>@isset($user->informacionPersonal->telefono) {{ $user->informacionPersonal->telefono }} @else No disponible @endisset</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection