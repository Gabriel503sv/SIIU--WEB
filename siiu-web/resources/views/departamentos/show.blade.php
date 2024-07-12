@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <h1>Detalles del Departamento</h1>
    <div class="card">
        <div class="card-header">
            <h2>{{ $departamento->nombre }}</h2>
        </div>
        <div class="card-body">
            <a href="{{ route('departamentos.index') }}" class="btn btn-primary">Volver</a>
        </div>
    </div>
</div>
@endsection