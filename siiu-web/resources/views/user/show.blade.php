@extends('layouts.user_type.auth')

@section('content')
<div class="container-md">

    <div class="shadow-lg p-3 mb-5  rounded rounded-3 ">
        <div class="bg-primary rounded rounded-3 p-2 m-2">
            <h4 class="text-white">INFORMACION USUARIO</h4>
        </div>
        <table class="table  table-borderless ">

            <tbody>
                <tr>
                    <th scope="row">USUARIO: </th>
                    <td>{{ $user->name }}</td>

                </tr>
                <tr>
                    <th scope="row">CORREO: </th>
                    <td>{{ $user->email }}</td>

                </tr>

            </tbody>
        </table>

    </div>

    <div class="shadow-lg p-3 mb-5  rounded rounded-3 ">
        <div class="bg-primary rounded rounded-3 p-2 m-2">
            <h4 class="text-white">INFORMACION GENERAL</h4>
        </div>
        <table class="table  table-borderless ">
            <tbody>
                <tr>
                    <th scope="row">APELLIDOS: </th>
                    <td>{{ $user->informacionPersonal->apellidos }}</td>
                </tr>
                <tr>
                    <th scope="row">NOMBRE: </th>
                    <td>{{ $user->informacionPersonal->nombres }}</td>
                </tr>
                <tr>
                    <th scope="row">FECHA NACIMIENTO: </th>
                    <td>{{ $user->informacionPersonal->fecha_nacimiento }}</td>
                </tr>
                <tr>
                    <th scope="row">GENERO: </th>
                    <td>{{ $user->informacionPersonal->genero }}</td>
                </tr>
                <tr>
                    <th scope="row">DUI: </th>
                    <td>{{ $user->informacionPersonal->dui }}</td>
                </tr>
                <tr>
                    <th scope="row">NACIONALIDAD: </th>
                    <td>{{ $user->informacionPersonal->nacionalidad }}</td>
                </tr>

            </tbody>
        </table>
    </div>
    <div class="shadow-lg p-3 mb-5  rounded rounded-3 ">
    <div class="bg-primary rounded rounded-3 p-2 m-2">
            <h4 class="text-white">NUMEROS</h4>
        </div>
        <table id="example" class="table align-items-center mb-0 text-center" style="width:100% ">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NUMERO</th>
                    <th>TIPO</th>


                </tr>
            </thead>
            <tbody>

                <tr>
                    <th scope="row">{{ 1 }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                </tr>

            </tbody>

        </table>
    </div>
</div>

@endsection