<!DOCTYPE html>
<html lang="fr">

<body>
    <x-app-layout>
        <x-slot name="header">
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Les informations sur le podcast') }}
                </h2>
            </div>
        </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h1 class="text-3xl font-bold mb-4">{{ $podcast->title }}</h1>
                        <p class="mb-2">Descriptif : {{ $podcast->description }}</p>
                        <p class="mb-8">Posté le : {{ $podcast->created_at }}</p>

                        <form action="{{ route('podcasts.destroy', $podcast) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="inline-block px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-500 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:shadow-outline-blue active:bg-red-800">{{ __('Supprimer') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>

</html>
