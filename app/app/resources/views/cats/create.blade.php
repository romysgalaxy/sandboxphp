<h1>Créer un Nouveau Chat</h1>

<form method="POST" action="{{ route('cats.store') }}" enctype="multipart/form-data">
    @csrf
    <label for="name">Nom du Chat:</label>
    <input type="text" name="name" id="name" required>

    <label for="picture">Image du Chat:</label>
    <input type="file" name="picture" id="picture" required>

    <label for="breed">Race du Chat:</label>
    <input type="text" name="breed" id="breed" required>

    <label for="age">Âge du Chat:</label>
    <input type="number" name="age" id="age" required>

    <label for="ability">Capacité du Chat:</label>
    <textarea name="ability" id="ability" required></textarea>

    <button type="submit">Créer</button>
</form>