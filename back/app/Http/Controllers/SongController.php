<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Collection
    {
        return Song::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $artists = [1, 4, 7];

        $song = new Song();
        $song->title = $request->title;
        $song->duration = $request->duration;
        $song->description = $request->description;
        $song->save();

        $song->artists()->attach($artists);
        return response()->json(['success' => true, 'song' => $song]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Song $song)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Song $song)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Song $song)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Song $song)
    {
        //
    }
}
