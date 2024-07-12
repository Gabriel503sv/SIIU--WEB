@extends('layouts.user_type.auth')

@section('content')
<?php
$fechaActual = date("j M, Y"); // M: mes (e.g. Jan), j: día del mes (1-31), Y: año (4 dígitos)
?>


<div class="container">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card ">
                <div class="card-body">
                    <div class="lead">Usuarios </div>
                    <h2 class="card-title">{{ $userCount }}</h2>
                    <p class="small text-muted"> Hasta el <?= $fechaActual ?>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card ">
                <div class="card-body">
                    <div class="lead">Usuarios </div>
                    <h2 class="card-title">{{ $userCount }}</h2>
                    <p class="small text-muted"> Hasta el <?= $fechaActual ?>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card ">
                <div class="card-body">
                    <div class="lead">Usuarios </div>
                    <h2 class="card-title">{{ $userCount }}</h2>
                    <p class="small text-muted"> Hasta el <?= $fechaActual ?>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card ">
                <div class="card-body">
                    <div class="lead">Usuarios </div>
                    <h2 class="card-title">{{ $userCount }}</h2>
                    <p class="small text-muted"> Hasta el <?= $fechaActual ?>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card ">
                <div class="card-body">
                    <div class="lead">Usuarios </div>
                    <h2 class="card-title">{{ $userCount }}</h2>
                    <p class="small text-muted"> Hasta el <?= $fechaActual ?>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card ">
                <div class="card-body">
                    <div class="lead">Usuarios </div>
                    <h2 class="card-title">{{ $userCount }}</h2>
                    <p class="small text-muted"> Hasta el <?= $fechaActual ?>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card ">
                <div class="card-body">
                    <div class="lead">Usuarios </div>
                    <h2 class="card-title">{{ $userCount }}</h2>
                    <p class="small text-muted"> Hasta el <?= $fechaActual ?>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card ">
                <div class="card-body">
                    <div class="lead">Usuarios </div>
                    <h2 class="card-title">{{ $userCount }}</h2>
                    <p class="small text-muted"> Hasta el <?= $fechaActual ?>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card ">
                <div class="card-body">
                    <div class="lead">Usuarios </div>
                    <h2 class="card-title">{{ $userCount }}</h2>
                    <p class="small text-muted"> Hasta el <?= $fechaActual ?>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection