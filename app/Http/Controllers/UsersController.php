<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }

    public function show(User $user)
    {
        return view('users.show', ['user' => $user]);
    }

    public function destroy(string $id)
    {
        User::destroy($id);

        return redirect()->route('users.index')->with('message', 'Utilisateur supprimé');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email'],
        ]);

        User::whereId($id)->update($validated);

        return redirect()->route('users.index')->with('message', 'Utilisateur modifié');
    }

    public function create()
    {
        return view('users.create', ['user' => new User]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', Password::min(8), Password::min(8)->letters(), Password::min(8)->mixedCase(), Password::min(8)->numbers(), Password::min(8)->symbols()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect()->route('users.index')->with('message', 'Utilisateur créé');
    }
}
