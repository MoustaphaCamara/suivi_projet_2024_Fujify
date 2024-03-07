<?php

namespace App\Http\Controllers;

use App\Http\Requests\SongRequest;
use App\Models\Song;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SongController extends Controller
{

    public function index(): Collection
    {
        return Song::all();
    }

    public function store(SongRequest $request): JsonResponse
    {
        $data = $request->safe()->toArray();

        $song = Song::create([
            'title' => $data['title'],
            'duration'=>$data['duration'],
            'description' => $data['description'],
            'artist_id' => 1,
        ]);
        return response()->json(['success' => true, 'song' => $song]);
    }

    public function show(string $id): JsonResponse
    {
        $song = Song::find($id);
        return response()->json($song);
    }

    public function update(SongRequest $request, string $id): JsonResponse
    {
        $data = $request->validated();

        $song = Song::find($id);
        $song->update($data);
        return response()->json($song);
    }

    public function getSongDetails($songId)
    {
        $cacheKey = "song_details_{$songId}";

        $songDetails = Cache::get($cacheKey);

        if ($songDetails === null) {
            $songDetails = Song::find($songId);

            Cache::put($cacheKey, $songDetails, $minutes = 60);
        }

        return response()->json($songDetails);
    }

    public function destroy(string $id): JsonResponse
    {
        $song = Song::find($id);
        $song->delete();
        return response()->json(null, 204);
    }
}
