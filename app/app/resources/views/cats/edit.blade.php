<h1>Modifier un Chat</h1>

<form method="POST" action="{{ route('cats.update', $cat->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="name">Nom du Chat:</label>
    <input type="text" name="name" id="name" value="{{ $cat->name }}" required>

    <label>Image du Chat:</label>
    <img src="{{ asset('storage/' . $cat->picture) }}" alt="Image actuelle du chat" width="100">

    <label for="new_picture">Nouvelle Image du Chat:</label>
    <input type="file" name="new_picture" id="new_picture">

    <label for="breed">Race du Chat:</label>
    <input type="text" name="breed" id="breed" value="{{ $cat->breed }}" required>

    <label for="age">Âge du Chat:</label>
    <input type="number" name="age" id="age" value="{{ $cat->age }}" required>

    <label for="ability">Capacité du Chat:</label>
    <textarea name="ability" id="ability" required>{{ $cat->ability }}</textarea>

    <button type="submit">Mettre à jour</button>
</form>