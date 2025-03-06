@extends('adminlte::page')

@section('title')
	{{ config('app.name') }}
@stop

@section('content_header')
<div class="row align-items-center">
    <div class="col-6 d-flex">
        <h1 class="me-auto">
            Crear una Nueva Categoría
        </h1>
    </div>
    <div class="col-6 d-flex justify-content-end">
        <a href="{{ route('categories.index') }}" class="btn btn-sm btn-primary">
            Cancelar / Volver al Listado
        </a>
    </div>
</div>
@stop

@section('content')
@includeIf('categories.form',[
    'action' => route('categories.store'),
    'method' => 'POST'
])
@stop

@section('css')
	{{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
	{{-- <script> console.log('Hi!'); </script> --}}
@stop