<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SongController extends Controller
{

    public function index(): Collection
    {
        return Song::all();
    }

    public function store(Request $request): JsonResponse
    {

        $song = Song::create([
            'title' => $request->title,
            'duration'=>$request->duration,
            'description' => $request->description,
            'artist_id' => 1,
        ]);
        return response()->json(['success' => true, 'song' => $song]);
    }

    public function show(string $id): JsonResponse
    {
        $song = Song::find($id);
        return response()->json($song);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $song = Song::find($id);
        $song->update($request->all());
        return response()->json($song);
    }

    public function destroy(string $id): JsonResponse
    {
        $song = Song::find($id);
        $song->delete();
        return response()->json(null, 204);
    }
}
