<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use Illuminate\Http\Request;

class PodcastController extends Controller
{
    public function index()
    {
        $podcasts = Podcast::all();
        return view('podcasts.index', ['podcasts' => $podcasts]);
    }

    public function MyPodcasts()
    {
        $podcasts = Podcast::where('user_id', auth()->user()->id)->get();
        return view('podcasts.my_podcasts', ['podcasts' => $podcasts]);
    }

    public function show(Podcast $podcast)
    {
        return view('podcasts.show', ['podcast' => $podcast]);
    }

    public function destroy(string $id)
    {
        Podcast::destroy($id);

        return redirect()->route('podcasts.index')->with('message', 'Podcast supprimé');
    }

    public function edit($id)
    {
        $user = Podcast::findOrFail($id);
        return view('podcasts.edit', compact('podcast'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Podcast::whereId($id)->update($validated);

        return redirect()->route('podcasts.index')->with('message', 'Podcast modifié');
    }

    public function create()
    {
        return view('podcasts.create', ['user' => new Podcast]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Podcast::create($validated);

        return redirect()->route('podcasts.index')->with('message', 'Podcast créé');
    }
}
