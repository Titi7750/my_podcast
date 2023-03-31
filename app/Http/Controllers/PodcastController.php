<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use Illuminate\Support\Facades\Gate;
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
        Gate::authorize('podcast', $podcast);

        return view('podcasts.show', ['podcast' => $podcast]);
    }

    public function destroy(string $id)
    {
        Podcast::destroy($id);

        return redirect()->route('podcasts.my_podcasts')->with('message', 'Podcast supprimé');
    }

    public function edit(Podcast $podcast)
    {
        Gate::authorize('podcast', $podcast);

        $podcast->id;
        return view('podcasts.edit', ['podcast' => $podcast]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $podcastPath = null;
        if ($request->hasFile('podcast')) {
            $podcastPath = Storage::disk('public')->put('podcasts', $request->podcast);
        }

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = Storage::disk('public')->put('images', $request->image);
        }

        if ($podcastPath === null) {
            $podcastPath = Podcast::where('id', $id)->first()->podcast;
        }

        if ($imagePath === null) {
            $imagePath = Podcast::where('id', $id)->first()->image;
        }

        Podcast::where('id', $id)->update([...$validated, 'podcast' => $podcastPath, 'image' => $imagePath]);

        return redirect()->route('podcasts.my_podcasts')->with('message', 'Podcast modifié');
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

        return redirect()->route('podcasts.my_podcasts')->with('message', 'Podcast créé');
    }
}
