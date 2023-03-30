<!DOCTYPE html>
<html lang="fr">

<body>
    <x-app-layout>
        <x-slot name="header">
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Créer un utilisateur') }}
                </h2>
            </div>
        </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <form action="{{ route('users.store') }}" method="POST"
                            class="max-w-md mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                            @csrf
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 font-bold mb-2">Prénom</label>
                                <input type="text" name="name" id="name"
                                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('image') border-red-500 @enderror">
                                @error('name')
                                    <div>{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                                <input type="email" name="email" id="email"
                                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('image') border-red-500 @enderror">
                                @error('email')
                                    <div>{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="password" class="block text-gray-700 font-bold mb-2">Mot de passe</label>
                                <input type="password" name="password" id="password"
                                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('image') border-red-500 @enderror">
                                @error('password')
                                    <div>{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="password_confirmation" class="block text-gray-700 font-bold mb-2">Confirmation du mot de passe</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('image') border-red-500 @enderror">
                                @error('password_confirmation')
                                    <div>{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex justify-center">
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Créer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>

</html>
