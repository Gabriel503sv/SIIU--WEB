@extends('layouts.user_type.auth')

@section('content')
<div class="shadow-lg p-3 mb-5 bg-body rounded rounded-3 row ">
    <div class="col-4 text-center mx-auto">
        <img src="https://www.pavilionweb.com/wp-content/uploads/2017/03/man-300x300.png" width="200px">
        <h3 class="center">USUARIOS</h3>
    </div>
    <div class="col-4">

    </div>
    <div class="col-4 text-center mx-auto">
        <div class="py-5 ">
            <button type="button" class="btn btn-rounded btn-md btn-primary me-3 me-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Crear Usuario</button>
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
                            <label for="exampleInputEmail1" class="form-label">Nombre</label>
                            <input name="name" type="text" class="border-dark form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required min="30">
                            @error('name')
                            <small class="text-danger mt-1">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exampleInputEmail1" class="form-label">Correo Electronico</label>
                            <input name="email" type="email" class="border-dark form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            @error('email')
                            <small class="text-danger mt-1">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                            <input name="password" type="password" class="border-dark form-control" id="exampleInputPassword1" required>
                            @error('password')
                            <small class="text-danger mt-1">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exampleInputPassword1" class="form-label">Confirmar
                                contraseña</label>
                            <input name="password_confirmation" type="password" class="border-dark form-control" id="exampleInputPassword1">
                            @error('password_confirmation')
                            <small class="text-danger mt-1">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>


                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button type="submit text-center" class="btn  btn-primary  " style="--bs-btn-opacity: .5;">REGISTRAR</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
    <div class="shadow-lg p-3 mb-5 bg-body rounded rounded-3 ">
        <table id="example" class="table align-items-center mb-0" style="width:100% ">
            <thead class="table-primary ">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>ACCIONES</th>

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
            });

        });
    </script>
    
    @if (session('eliminado') == "SI")
    <script>
        Swal.fire(
            'Eliminado',
            'Usuario eliminado correctamente.',
            'success'
        )
    </script>
    @elseif (session('eliminado') == "NO")
    <script>
        Swal.fire(
            'Error',
            'Usuario No pudo ser eliminado ',
            'error'
        )
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