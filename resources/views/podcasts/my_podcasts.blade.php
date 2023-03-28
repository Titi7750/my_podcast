<!DOCTYPE html>
<html lang="fr ">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Les Podcasts</title>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Mes podcasts') }}
                </h2>
                <a class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight hover:underline"
                    href="{{ route('podcasts.create') }}">Ajouter mon podcast
                </a>
            </div>
        </x-slot>
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
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
                                    {{-- <img src="{{ Storage::url('app/public/' . $podcast->image) }}" alt="image du podcast"
                                        class="w-32 h-32 object-cover"> --}}
                                    <a href="{{ route('podcasts.show', $podcast) }}"
                                        class="block text-lg font-semibold text-slate-900 hover:text-blue-700">{{ $podcast->title }}</a>
                                    <audio class="my-6 pr-12" controls>
                                        <source src="{{ Storage::url('app/public/' . $podcast->podcast) }}"
                                            type="audio/*">
                                    </audio>
                                    <a href="{{ route('podcasts.edit', $podcast) }}"
                                        class="inline-block px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-500 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">{{ __('Modifier') }}</a>
                                    <a href="{{ route('podcasts.show', $podcast) }}"
                                        class="inline-block px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-500 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">{{ __('Informations') }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>

</html>
