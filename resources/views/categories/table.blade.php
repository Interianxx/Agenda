<div>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripción</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($categories as $category)
                <tr>
                    <th scope="row">{{ $category->id }}</th>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST">

                            @csrf
                            @method('DELETE')

                            <a class="btn btn-sm btn-success" href="{{ route('categories.show', $category) }}"><i
                                    class="fas fa-eye"></i></a>
                            <a class="btn btn-sm btn-warning" href="{{ route('categories.edit', $category) }}"><i
                                    class="fas fa-edit"></i></a>

                            <button onclick="return confirm('Estas Seguro?')" type="submit"
                                class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $categories->links() }}
</div>