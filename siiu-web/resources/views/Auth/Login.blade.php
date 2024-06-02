@extends('layouts.user_type.guest')

@section('content')
<main class="main-content  mt-0">
  <section>
    <div class="page-header min-vh-75">
      <div class="container">
        <div class="row">
          <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto vh-100">
            <div class="card card-plain mt-6">
              <div class="card-header pb-0 text-left bg-transparent">
                <div class="container-fluid d-flex justify-content-center">
                  <div style=" width: 200px;height: 200px;background-color: #6E0000;border-radius: 50%;">
                    <img src="../assets/img/logos/siu.png" alt="image" class="img-fluid">
                  </div>
                </div>
                <h4 class="font-weight-bolder text-info text-gradient text-center" style="background-image: linear-gradient(120deg, #800000, #4b0000); color: white; border-color: transparent;">¡Bienvenido a SIIU!</h4>
              </div>
              <div class="card-body pt-0">
                <form action="{{ route('login.verify') }}" method="POST" class="mb-5">
                  @csrf
                  <label>Correo</label>
                  <div class="mb-3">
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    @error('email')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                  </div>
                  <label>Contraseña</label>
                  <div class="mb-3">
                    <input name="password" type="password" class="form-control" id="exampleInputPassword1" required>
                    @error('password')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
                    <label class="form-check-label" for="rememberMe">Recordar contraseña</label>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0" style="background-image: linear-gradient(120deg, #800000, #4b0000); color: white; border-color: transparent;">Ingresar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="oblique position-absolute vh-100 top-0 h-100 d-md-block d-none me-n8">
              <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n10" style="background-image:url('../assets/img/Banner.png')"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>



<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session()->has('success'))
<script>
  Swal.fire({
    icon: 'success',
    title: 'Sesión cerrada correctamente',
    showConfirmButton: true,
  })
</script>
@endif
@error('invalid_credentials')
<script>
  Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'Usuario y contraseña invalida',

  })
</script>
@enderror
<script>
  $('.formulario-eliminar').submit(function(e) {
    e.preventDefault();

    Swal.fire({
      title: '¿Estas seguro?',
      text: "Este role se eliminara definitivamente",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, Eliminar!'
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )
      }
    })
  });
</script>

@endsection