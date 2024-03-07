<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlbumCoverRequest;
use App\Models\AlbumCover;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class AlbumCoverController extends Controller
{
    public function index(): Collection
    {
        return AlbumCover::all();
    }

    public function store(AlbumCoverRequest $request): JsonResponse
    {
        $data = $request->validated();

        $data['image'] = $request->file('image')->store('image');
        $data = AlbumCover::create($data);

        return response()->json($data);
    }

    public function show(string $id): JsonResponse
    {
        $albumCover = AlbumCover::find($id);
        return response()->json($albumCover);

    }

    public function destroy(string $id): JsonResponse
    {
        $albumCover = AlbumCover::find($id);
        $albumCover->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
