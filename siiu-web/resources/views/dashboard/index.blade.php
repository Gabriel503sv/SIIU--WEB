@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <div class="">
        <div class="row m-3">
            <div class="col-md-5  justify-content-center align-items-center shadow-lg p-3 mb-5 bg-body rounded rounded-3 ">
                <h3 class=" text-center">Usuarios</h3>
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead class="table-primary text-center">
                            <tr>
                                
                                <th>Número de Usuarios</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            <tr class="text-center  "> 
                                <td class="h4" >{{ $userCount }}</td>
                            </tr>
                           
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6 text-center mx-auto shadow-lg p-3 mb-5 bg-body rounded rounded-3">
            </div>
            <div class="col-md-12 d-flex justify-content-center align-items-center shadow-lg p-3 mb-5 bg-body rounded rounded-3">
            </div>
        </div>
    </div>
</div>
@endsection