<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $podcast->title }}</title>
</head>

<body>
    <h1>{{ $podcast->title }}</h1>
    <p>Descriptif : {{ $podcast->description }}</p>
    <p>Posté le : {{ $podcast->created_at }}</p>

    <form action="{{ route('podcasts.destroy', $podcast) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Supprimer</button>
    </form>
</body>

</html>
