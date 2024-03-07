<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlbumCoverRequest;
use App\Models\AlbumCover;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class AlbumCoverController extends Controller
{
    public function index(): Collection
    {
        return AlbumCover::all();
    }

    public function store(AlbumCoverRequest $request): JsonResponse
    {
        $uploadFolder = 'albums';
        $data = $request->validated();
        $image = $data['image'];
        $image_path = $image->store($uploadFolder, 'public');

        $uploaded_response = array(
            'image_name' => basename($image_path),
            'image_url' => Storage::disk('public')->url($image_path)
        );
        return response()->json(['message' => 'uploaded successfully', $uploaded_response], 200, $uploaded_response);
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
