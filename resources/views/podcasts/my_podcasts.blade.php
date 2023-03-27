<!DOCTYPE html>
<html lang="fr ">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Les Podcasts</title>
</head>

<body>
    <h1>Mes podcasts :</h1>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <ul>
        @foreach ($podcasts as $podcast)
            <li><a href="{{ route('podcasts.show', $podcast) }}">{{ $podcast->title }}</a></li>
            <li><a href="{{ route('podcasts.edit', $podcast) }}">Modifier</a></li>
        @endforeach
    </ul>
    <a href="{{ route('podcasts.create') }}">Ajouter mon podcast</a>
</body>

</html>
