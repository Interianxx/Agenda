@extends('adminlte::page')

@section('title')
    {{ config('app.name') }}
@stop

@section('content_header')
<div class="row align-items-center">
    <div class="col-6 d-flex">
        <h1 class="me-auto">
            Detalles del Contacto
        </h1>
    </div>
    <div class="col-6 d-flex justify-content-end">
        <a href="{{ route('contacts.index') }}" class="btn btn-sm btn-primary">
            Cancelar / Volver al Listado
        </a>
    </div>
</div>
@stop

@section('content')
    <!-- Solo cargamos la vista si el acceso es permitido. De lo contrario, nada se mostrará -->
    @if(isset($accessDenied) && $accessDenied)
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    title: 'Acceso Denegado',
                    text: 'No tienes acceso a este contacto.',
                    icon: 'error',
                    confirmButtonText: 'Aceptar'
                }).then(() => {
                    window.location.href = '{{ route('contacts.index') }}';  // Redirigir al listado de contactos
                });
            });
        </script>
    @else
        <!-- Si el acceso está permitido, mostramos los detalles del contacto -->
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <label for="user_id" class="form-label">Creado Por:</label>
                    <input type="text" class="form-control" id="user_id" user_id="user_id" placeholder="Nombre del Contacto"
                        value="{{ old('user_id', $contact->user->name) }}" readonly>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nombre del Contacto"
                        value="{{ old('name', $contact->name) }}" readonly>
                </div>
            
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email del Contacto"
                        value="{{ old('email', $contact->email) }}" readonly>
                </div>
            
                <div class="mb-3">
                    <label for="phone" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Teléfono del Contacto"
                        value="{{ old('phone', $contact->phone) }}" readonly>
                </div>
            
                <div class="mb-3">
                    <label for="address" class="form-label">Dirección</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Dirección del Contacto"
                        value="{{ old('address', $contact->address) }}" readonly>
                </div>
                
                <div class="mb-3">
                    <label for="category_id" class="form-label">Categoría</label>
                    <input type="text" class="form-control" id="category_id" name="category_id" placeholder="Categoría del Contacto"
                        value="{{ old('category_id', $contact->category->name) }}" readonly>
                </div>

                <form action="{{ route('contacts.destroy', $contact) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <a class="btn btn-sm btn-warning" href="{{ route('contacts.edit',$contact) }}"><i class="fas fa-edit"></i></a>

                    <button type="submit" class="btn btn-sm btn-danger"
                        onclick="return confirm('Estas Seguro?')"
                    ><i class="fas fa-trash"></i></button>
                </form>
            </div>
        </div>
    @endif
@stop

@section('js')
    <!-- Asegúrate de que SweetAlert2 esté cargado correctamente -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@stop
