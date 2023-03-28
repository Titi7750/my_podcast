<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@1.*/css/pico.min.css">
    <title>Ajouter Podcast</title>
</head>

<body>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h1>Ajouter mon Podcast :</h1>
    <form action="{{ route('podcasts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <p>
            <label for="title">Titre</label>
            <input type="text" name="title" id="title">
            @error('title')
            <div>{{ $message }}</div>
        @enderror
        </p>
        <p>
            <label for="description">Description</label>
            <textarea type="text" name="description" id="description"></textarea>
            @error('description')
            <div>{{ $message }}</div>
        @enderror
        </p>
        <p>
            <label for="podcast">Fichier</label>
            <input type="file" name="podcast" id="podcast">
            @error('podcast')
            <div>{{ $message }}</div>
        @enderror
        </p>
        <button type="submit">Ajouter</button>
    </form>
</body>

</html>
