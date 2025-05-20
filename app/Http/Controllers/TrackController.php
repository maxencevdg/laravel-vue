<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TrackController extends Controller
{
    public function index()
    {
        $tracks = Track::where('display', true)->get();

        return Inertia::render('Track/Index', [
            'tracks' => $tracks,
        ]);
    }

    public function create()
    {
        return Inertia::render('Track/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:5', 'max:255'],
            'artist' => ['required', 'string', 'min:5', 'max:50'],
            'display' => ['required', 'boolean'],
            'image' => ['nullable', 'file', 'image'],
            'music' => ['required', 'file', 'extensions:mp3,wav']
        ]);

        Track::create([
            'title' => $request->title,
            'artist' => $request->artist,
            'display' => $request->display,
        ]);

        // $track = new Track();
        // $track->title = $request->title;
        // $track->artist = $request->artist;
        // $track->display = $request->display;
        // $track->save();
    }
}
