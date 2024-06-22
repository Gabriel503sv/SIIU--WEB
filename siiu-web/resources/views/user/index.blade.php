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
            <div>
                <button type="button" class="btn btn-rounded btn-md btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Crear Usuario</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Crear Usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3 text-dark text-center" action="" method="POST" class="m-auto  w-form">
                    @csrf
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">Usuario</label>
                        <input name="name" type="text" class="border-dark form-control @error('name') is-invalid @enderror" id="name" aria-describedby="nameHelp" required minlength="4" value="{{ old('name', $user->name ?? '') }}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input name="email" type="email" class="border-dark form-control @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp" value="{{ old('email', $user->email ?? '') }}">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input name="password" type="password" class="border-dark form-control @error('password') is-invalid @enderror" id="password" required>
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                        <input name="password_confirmation" type="password" class="border-dark form-control" id="password_confirmation">
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
                <th>#</th>
                <th>Usuario</th>
                <th>Email</th>
                <th class="w-25">ACCIONES</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($users as $key => $user)
            <tr>
                <th scope="row">{{ $key + 1 }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>



                <td>
                    <div class="row gx-3">
                        <div class="col">
                            <a href="{{ route('user.show', $user->id) }}" style="width: 100%" class="btn btn-info  mb-3"><i class='bx bxs-show'></i></a>
                        </div>
                        <div class="col">
                            <a href="{{ route('user.edit', $user->id) }}" style="width: 100%" class="btn btn-success  mb-3"><i class='bx bxs-edit-alt'></i></a>
                        </div>
                        <div class="col">
                            <form method="POST" class="formulario-eliminar" action="{{ route('user.destroy', $user->id) }}">
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
            language: {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": '<i class="fas fa-angle-double-left"></i>',
                    "sLast": '<i class="fas fa-angle-double-right"></i>',
                    "sNext": '<i class="fas fa-angle-right"></i>',
                    "sPrevious": '<i class="fas fa-angle-left"></i>'

                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad"
                }
            },
            dom: '<"top"Bf>rt<"bottom"lip><"clear">',
            buttons: [{
                    extend: 'excelHtml5',
                    text: '<i class="fas fa-file-excel"></i> Exportar a Excel',
                    titleAttr: 'Exportar a Excel',
                    className: 'btn btn-success'
                },
                {
                    extend: 'csvHtml5',
                    text: '<i class="fas fa-file-csv"></i> Exportar a CSV',
                    titleAttr: 'Exportar a CSV',
                    className: 'btn btn-info'
                },
                {
                    extend: 'pdfHtml5',
                    text: '<i class="fas fa-file-pdf"></i> Exportar a PDF',
                    titleAttr: 'Exportar a PDF',
                    className: 'btn btn-danger'
                }
            ]
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