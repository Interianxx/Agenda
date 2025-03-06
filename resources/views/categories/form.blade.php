<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method($method)

    <input type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id }}">
    {{--  --}}

    <div class="mb-3">
        <label for="name" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Nombre de la Categoría"
            value="{{ old('name', $category->name) }}" required>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Descripción</label>
        <textarea class="form-control" id="description" name="description" rows="3"
            placeholder="Descripción de la Categoría">{{ old('description', $category->description) }}</textarea>
    </div>


    <div class="mb-3">
        <button type="submit" class="btn btn-primary">
            {{ $method == 'POST' ? 'Crear' : 'Actualizar' }}
        </button>
    </div>

    {{-- Div para los errores --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    {{-- Div para los errores --}}
    {{--  --}}
</form>