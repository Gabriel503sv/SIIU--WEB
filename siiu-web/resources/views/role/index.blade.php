@extends('layouts.user_type.auth')

@section('content')
<div class="shadow-lg p-3 mb-5 bg-body rounded rounded-3  ">
    <div class="col-4 text-center mx-auto">
        <img src="https://cdn-icons-png.flaticon.com/512/5151/5151145.png" width="200px">
        <h3 class="center">ROLES</h3>
    </div>
    
    <div class="col-4 text-center mx-auto">
        
        <div class="py-5 ">
            <button type="button" class="btn btn-rounded btn-md btn-primary me-3 me-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Crear Role</button>
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
                        <input name="name" type="text" class="border-dark form-control @error('name') is-invalid @enderror" id="name" aria-describedby="nameHelp" required minlength="4" value="{{ old('name', $role->name ?? '') }}">
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
<div class="shadow-lg p-3 mb-5 bg-body rounded rounded-3 ">
    <table id="example" class="table align-items-center mb-0" style="width:100% ">
        <thead class="table-primary text-center">
            <tr>
                <th class="w-25">#</th>
                <th class="w-50">ROLES</th>
                <th class="w-25">ACCIONES</th>


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
                            <a href="{{ route('role.edit', $role->id) }}" style="width: 100%" class="btn btn-success  mb-3"><i class='bx bxs-edit-alt'></i></a>
                        </div>
                        <div class="col">
                            <form method="POST" class="formulario-eliminar" action="{{ route('role.destroy', $role->id) }}">
                                @method('DELETE')
                                @csrf
                                <button style="width: 100%" class="btn btn-danger"><i class='bx bxs-trash'></i></button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>


<script>
    $(document).ready(function() {
        $('#example').DataTable({
            responsive: true,
        });

    });
</script>

@if (session('agregado') == "SI")
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire(
            'Agregado',
            'Usuario Agregado correctamente.',
            'success'
        )
    });
</script>
@elseif (session('agregado') == "NO")
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire(
            'Error',
            'Usuario No agregado',
            'error'
        )
    });
</script>
@endif

@if (session('eliminado') == "SI")
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire(
            'Eliminado',
            'Usuario eliminado correctamente.',
            'success'
        )
    });
</script>
@elseif (session('eliminado') == "NO")
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire(
            'Error',
            'Usuario No pudo ser eliminado ',
            'error'
        )
    });
</script>
@endif

@if (session('Actualizado') == 'SI')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire(
            'Agregado',
            'Usuario Actualizado correctamente.',
            'success'
        );
    });
</script>
@elseif (session('Actualizado') == 'NO')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire(
            'Error',
            'Usuario no se pudo Actualizar',
            'error'
        );
    });
</script>
@endif


<script>
    $('.formulario-eliminar').submit(function(e) {
        e.preventDefault();

        Swal.fire({
            title: '¿Estas seguro?',
            text: "Este Usuario se eliminara definitivamente",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        })
    });
</script>


@endsection