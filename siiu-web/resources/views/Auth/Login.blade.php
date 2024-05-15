<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200;500;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"
        integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous" />

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <title>Login | SIIU</title>
</head>

<body class="bg-dark">
    <main class="login-design">
        <div class="waves">
            <img class="v45_104" src="{{ asset('img/v45_104.png') }}" alt="" />
            <h1 class="Txt1">SISTEMAS INFORMATICOS</h1>
        </div>
        <div class="login">
            <div class="login-data">
                <img class="v45_145" src="{{ asset('img/v45_145.png') }}" width="200px" height="200px" alt="" />
                <h1>Inicio de Sesión</h1>

                <form action="{{ route('login.verify') }}" method="POST" class="mb-5">
                    @csrf
                   

                    <div class="input-group">
                        <label class="input-fill">
                            <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" required>
                            <span class="input-label">Correo Electrónico</span>
                            <i class="fas fa-envelope"></i>
                        </label>
                    </div>
                    <div class="input-group">
                        <label class="input-fill">
                            <input name="password" type="password" class="form-control" id="exampleInputPassword1"
                                required>
                            <span class="input-label">Contraseña</span>
                            <i class="fas fa-lock"></i>
                        </label>
                    </div>
                    <input type="submit" value="Iniciar Sesión" class="btn-login" />
                </form>
                <h6 class="Name">SIIU</h6>
            </div>
        </div>
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

</body>

</html>