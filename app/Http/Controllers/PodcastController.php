<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        return redirect()->route('dashboard')->with('message', 'Podcast supprimé');
    }

    public function edit($id)
    {
        $podcast = Podcast::findOrFail($id);
        return view('podcasts.edit', compact('podcast'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Podcast::whereId($id)->update($validated);

        return redirect()->route('dashboard')->with('message', 'Podcast modifié');
    }

    public function create()
    {
        return view('podcasts.create', ['podcasts' => new Podcast]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'podcast' => 'required',
        ]);


        $podcastPath = Storage::disk('public')->put('podcasts', $request->podcast);
        $imagePath = Storage::disk('public')->put('images', $request->image);
        
        auth()->user()->podcasts()->create([...$validated, 'podcast' => $podcastPath, 'image' => $imagePath]);

        return redirect()->route('dashboard')->with('message', 'Podcast créé');
    }
}
