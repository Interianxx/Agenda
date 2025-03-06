@extends('adminlte::page')

@section('title')
    {{ config('app.name') }}
@stop

@section('content_header')
    <div class="row align-items-center">
        <div class="col-6 d-flex">
            <h1 class="me-auto">
                Listado de Categorías
            </h1>
        </div>
        <div class="col-6 d-flex justify-content-end">
            <a href="{{ route('categories.create') }}" class="btn btn-sm btn-primary">
                Crear una Nueva Categoría
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

    @includeIf('categories.table')


@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    {{-- <script> console.log('Hi!'); </script> --}}
@stop