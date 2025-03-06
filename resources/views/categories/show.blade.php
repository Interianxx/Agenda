@extends('adminlte::page')

@section('title')
	{{ config('app.name') }}
@stop

@section('content_header')
<div class="row align-items-center">
    <div class="col-6 d-flex">
        <h1 class="me-auto">
            Detalles de la Categoría
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
<div class="card">
    <div class="card-body">
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" readonly>
        </div>
        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea class="form-control" id="description" name="description" rows="3" readonly>{{ $category->description }}</textarea>
        </div>

        <form action="{{ route('categories.destroy', $category) }}" method="POST">

            @csrf
            @method('DELETE')

            <a class="btn btn-sm btn-warning" href="{{ route('categories.edit',$category) }}"><i
                    class="fas fa-edit"></i></a>

            <button type="submit" class="btn btn-sm btn-danger"
            onclick="return confirm('Estas Seguro?')"
            ><i class="fas fa-trash"></i></button>
        </form>
    </div>
@stop

@section('css')
	{{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
	{{-- <script> console.log('Hi!'); </script> --}}
@stop