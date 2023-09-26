<h1>Liste des Chats</h1>
<button><a href="/cats/create">Créer un chat</a></button>
<table>
    <thead>
        <th>ID</th>
        <th>Nom</th>
        <th>Image</th>
        <th>Race</th>
        <th>Age</th>
        <th>Capacité</th>
        <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cats as $cat)
        <tr>
            <td>{{ $cat->id }}</td>
            <td>{{ $cat->name }}</td>
            <td><img src="{{ asset('storage/' . $cat->picture) }}" alt="{{ $cat->name }}" style="width: 200px"></td>
            <td>{{ $cat->breed }}</td>
            <td>{{ $cat->age }}</td>
            <td>{{ $cat->ability }}</td>
            <td>
                <button><a href="{{ route('cats.show', $cat->id) }}">Voir</a></button>
                <button><a href="{{ route('cats.edit', $cat->id) }}">Modifier</a></button>
                <form action="{{ route('cats.destroy', $cat->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>