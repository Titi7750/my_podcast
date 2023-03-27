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
    <h1>Ajouter mon Podcast :</h1>
    <form action="{{ route('podcasts.store') }}" method="POST">
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
            <textarea type="textarea" name="description" id="description"> </textarea>
            @error('description')
            <div>{{ $message }}</div>
        @enderror
        </p>
        <p>
            <label for="file">Fichier</label>
            <input type="file" name="file" id="file">
            @error('file')
            <div>{{ $message }}</div>
        @enderror
        </p>
        <button type="submit">Ajouter</button>
    </form>
</body>

</html>
