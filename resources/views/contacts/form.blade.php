<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method($method)

    <input type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id }}">
    {{--  --}}

    <div class="mb-3">
        <label for="name" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Nombre del Contacto"
            value="{{ old('name', $contact->name) }}" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Email del Contacto"
            value="{{ old('email', $contact->email) }}" required>
    </div>

    <div class="mb-3">
        <label for="phone" class="form-label">Teléfono</label>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="Teléfono del Contacto"
            value="{{ old('phone', $contact->phone) }}" required>
    </div>

    <div class="mb-3">
        <label for="address" class="form-label">Dirección</label>
        <input type="text" class="form-control" id="address" name="address" placeholder="Dirección del Contacto"
            value="{{ old('address', $contact->address) }}" required>
    </div>
    
    <div class="mb-3">
        <label for="category_id" class="form-label">Categoría</label>
        <select type="text" class="form-control" id="category_id" name="category_id" placeholder="Dirección del Contacto"
            value="{{ old('category_id', $contact->category_id) }}" required>

            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ ($category->id==$contact->category_id)?'selected':'' }}>{{ $category->name }}</option>
            @endforeach
        </select>
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