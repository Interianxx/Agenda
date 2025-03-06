@extends('adminlte::page')

@section('title')
{{  config('app.name')}}
@stop

@section('content_header')
<div class="row align-items-center">
    <div class="col-6 d-flex">
        <h1 class="me-auto">
            Listado de Contactos
        </h1>
    </div>
    <div class="col-6 d-flex justify-content-end">
        <a href="{{ route('contacts.create') }}" class="btn btn-sm btn-primary">
            Crear un Nuevo Contacto
        </a>
    </div>
</div>
@stop

@section('content')

@if (session('sessionMessage'))
    <div class="alert alert-success text-center">
        {{ session('sessionMessage') }}
    </div>
@endif

@includeIf('contacts.table')

@stop

@section('css')
{{-- Add here extra stylesheets --}}
{{--
<link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
<script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop