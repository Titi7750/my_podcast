<!DOCTYPE html>
<html lang="fr">

<body>
    <x-app-layout>
        <x-slot name="header">
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Modifier mon Podcast') }}
                </h2>
            </div>
        </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <form action="{{ route('podcasts.update', $podcast) }}" method="POST"
                            class="max-w-md mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label class="block text-gray-700 font-bold mb-2" for="image">Image de
                                    couverture</label>
                                <input
                                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    type="file" name="image" id="image" value="{{ $podcast->image }}"
                                    accept="image/*">
                                @error('image')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 font-bold mb-2" for="title">Titre</label>
                                <input
                                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    type="text" name="title" id="title" value="{{ $podcast->title }}">
                                @error('title')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 font-bold mb-2" for="description">Description</label>
                                <input
                                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    type="text" name="description" id="description"
                                    value="{{ $podcast->description }}">
                                @error('description')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 font-bold mb-2" for="podcast">Podcast</label>
                                <input
                                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    type="file" name="podcast" id="podcast" value="{{ $podcast->podcast }}"
                                    accept="audio/*">
                                @error('podcast')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="flex items-center justify-center">
                                <button
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                    type="submit">
                                    Modifier
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>

</html>
