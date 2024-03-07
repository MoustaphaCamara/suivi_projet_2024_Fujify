<?php

namespace App\Http\Controllers;

use App\Http\Requests\SongRequest;
use App\Models\Song;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

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
        return response()->json($song, Response::HTTP_CREATED);
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

    public function destroy(string $id): JsonResponse
    {
        $song = Song::find($id);
        $song->delete();

        return response()->json(null, 204);
    }
}
