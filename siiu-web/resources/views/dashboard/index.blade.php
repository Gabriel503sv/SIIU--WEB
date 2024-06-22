@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <div class="">
        <div class="row m-3">
            <div class="col-md-5  justify-content-center align-items-center shadow-lg p-3 mb-5 bg-body rounded rounded-3 ">
                <h3 class=" text-center">ROLES</h3>
                <table  class="table align-items-center mb-0">
                <thead class="table-primary text-center">
                    <tr>
                        <th>Rol</th>
                        <th>Número de Usuarios</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rolesCount as $role)
                    <tr>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->users_count }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            <div class="col-md-6 text-center mx-auto shadow-lg p-3 mb-5 bg-body rounded rounded-3">
            </div>
            <div class="col-md-12 d-flex justify-content-center align-items-center shadow-lg p-3 mb-5 bg-body rounded rounded-3">
            </div>
        </div>
    </div>
</div>
@endsection