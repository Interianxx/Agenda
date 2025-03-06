<div>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Categoría</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Dirección</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($contacts as $contact)
                <tr>
                    <th scope="row">{{ $contact->id }}</th>
                    <td>{{ $contact->category->name }}</td>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->phone }}</td>
                    <td>{{ $contact->address }}</td>
       
                    <td>
                        <form action="{{ route('contacts.destroy', $contact) }}" method="POST" class="flex">

                            @csrf
                            @method('DELETE')

                            <a class="btn btn-sm btn-success" href="{{ route('contacts.show', $contact) }}"><i
                                    class="fas fa-eye"></i></a>
                            <a class="btn btn-sm btn-warning" href="{{ route('contacts.edit', $contact) }}"><i
                                    class="fas fa-edit"></i></a>

                            <button onclick="return confirm('Estas Seguro?')" type="submit"
                                class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $contacts->links() }}
</div>