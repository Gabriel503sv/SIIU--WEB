@extends('layouts.user_type.auth')

@section('content')
    @if(auth()->user()->can('dashboard'))
        <script>window.location = "{{ route('Permisos') }}";</script>
    @else
        <script>window.location = "{{ route('Secundario') }}";</script>
    @endif
@endsection