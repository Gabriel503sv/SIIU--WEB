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
                    <img src="../assets/img/logos/Minerva6.png" alt="image" class="img-fluid" style="max-width: 60px; height: auto">
                  </div>
                  <h4 class="font-weight-bolder text-info text-gradient text-center" style="background-image: linear-gradient(120deg, #800000, #4b0000); color: white; border-color: transparent;">¡Bienvenido!</h4>
                </div>
                <div class="card-body pt-0">
                  <form role="form" method="" action="{{ url('dashboard') }}">
                    @csrf
                    <label>Correo</label>
                    <div class="mb-3">
                      <input type="email" class="form-control" name="email" id="email" placeholder="Correo" aria-label="Correo" aria-describedby="email-addon">
                      @error('email')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                      @enderror
                    </div>
                    <label>Contraseña</label>
                    <div class="mb-3">
                      <input type="Contraseña" class="form-control" name="password" id="password" placeholder="Contraseña" aria-label="Contraseña" aria-describedby="password-addon">
                      @error('password')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                      @enderror
                    </div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
                      <label class="form-check-label" for="rememberMe" >Recordar contraseña</label>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0" style="background-image: linear-gradient(120deg, #800000, #4b0000); color: white; border-color: transparent;">Ingresar</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                <small class="text-muted">¿Olvidaste tu contraseña? Restablece tu contraseña
                  <a href="/login/forgot-password" class="text-info text-gradient font-weight-bold" style="background-image: linear-gradient(120deg, #800000, #4b0000); color: white; border-color: transparent;">aquí</a>
                </small>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="oblique position-absolute vh-100 top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n10" style="background-image:url('../assets/img/Banner2.jpg')"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

@endsection
