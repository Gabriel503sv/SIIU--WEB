@extends('layouts.user_type.guest')

@section('content')

  <section class="min-vh-100 mb-0">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 mx-3 border-radius-lg" style="background-image: url('../assets/img/curved-images/curved8.jpg');">
      <span class="mask bg-gradient-dark opacity-4"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
            <h1 class="text-white mb-0 mt-5">¡Bienvenido!</h1>
            <p class="text-lead text-white">¿Necesitas ayuda? ¡Estamos aquí para ayudarte!</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="card z-index-0">
            <div class="card-header text-center pb-1">
              <h5>Contáctenos</h5>
            </div>
            <div class="card-body pt-2">
              <form role="form text-left" method="POST" action="/register">
                @csrf
                <div class="mb-3">
                  <input type="text" class="form-control" placeholder="Nombre" name="name" id="name" aria-label="Name" aria-describedby="name" value="{{ old('name') }}">
                  @error('name')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-3">
                  <input type="email" class="form-control" placeholder="Email" name="email" id="email" aria-label="Email" aria-describedby="email-addon" value="{{ old('email') }}">
                  @error('email')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-1">
                  <textarea class="form-control" placeholder="Mensaje" name="message" id="message" aria-label="Message" aria-describedby="message-addon">{{ old('message') }}</textarea>
                  @error('message')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2" style="background-image: linear-gradient(120deg, #800000, #4b0000); color: white; border-color: transparent;">Enviar mensaje</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection

