<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('podcasts.create', ['podcasts' => new Podcast]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'podcast' => 'required',
        ]);

        $request->request->add(['user_id' => Auth::id()]);

        $podcastPath = null;
        if ($request->hasFile('podcast')) {
            $podcastPath = $request->file('podcast')->storeAs(
                'podcasts',
                Auth::id() . '.' . $request->file('podcast')->getClientOriginalExtension(),
                'public',
            );
        }

        Podcast::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id,
            'podcast' => $podcastPath,
        ]);

        return redirect()->route('dashboard')->with('message', 'Podcast créé');
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'title' => 'required',
    //         'description' => 'required',
    //         'path' => 'required',
    //     ]);

    //     $request->request->add(['user_id' => Auth::id()]);

    //     $podcastPath = null;
    //     if ($request->hasFile('path')) {
    //         $podcastPath = $request->file('path')->storeAs(
    //             'podcasts',
    //             Auth::id() . '.' . $request->file('path')->getClientOriginalExtension(),
    //             'public',
    //         );
    //     }

    //     Podcast::create([
    //         'title' => $request->title,
    //         'description' => $request->description,
    //         'user_id' => $request->user_id,
    //         'path' => $podcastPath,
    //     ]);

    //     return redirect()->route('dashboard')->with('message', 'Podcast créé');
    // }
}
