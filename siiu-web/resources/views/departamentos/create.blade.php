@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <h1>Crear Departamento</h1>
    <form action="{{ route('departamentos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection