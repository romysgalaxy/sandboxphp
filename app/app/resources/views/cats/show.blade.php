<h1>Details du chat</h1>

<p><strong>ID:</strong> {{ $cat->id }}</p>
<p><strong>Nom:</strong> {{ $cat->name }}</p>
<p><strong>Image:</strong> <img src="{{ asset('storage/' . $cat->picture) }}" alt="{{ $cat->name }}" style="width: 200px"></p>
<p><strong>Race:</strong> {{ $cat->breed }}</p>
<p><strong>Age:</strong> {{ $cat->age }}</p>
<p><strong>Capacité:</strong> {{ $cat->ability }}</p>