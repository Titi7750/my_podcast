<!DOCTYPE html>
<html lang="fr ">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
    <title>Les Podcasts</title>
</head>

<body>
    <div
        class="bg-white dark:bg-gray-800 shadow relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-900 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="font-semibold text-white hover:text-gray-400 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="font-semibold text-white hover:text-gray-400 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Connexion</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 font-semibold text-white hover:text-gray-400 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">S'incrire</a>
                    @endif
                @endauth
            </div>
        @endif
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        @if (session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                        <ul class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                            @foreach ($podcasts as $podcast)
                                <li class="bg-white rounded-lg shadow-md p-4">
                                    @if ($podcast->image)
                                        <img class="w-full h-64 object-cover object-center rounded-lg mb-4"
                                            src="{{ 'storage/' . $podcast->image }}" alt="{{ $podcast->title }}">
                                    @endif

                                    <h2 class="text-xl font-bold mb-4">{{ $podcast->title }}</h2>

                                    <p class="mb-2">Descriptif : {{ $podcast->description }}</p>
                                    
                                    @if ($podcast->podcast)
                                        <audio class="my-6 pr-12" controls>
                                            <source src="{{ 'storage/' . $podcast->podcast }}"
                                                type="{{ Storage::mimeType($podcast->podcast) }}">
                                        </audio>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
