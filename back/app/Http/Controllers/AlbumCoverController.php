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

        $public_url = Storage::disk('public')->url($image_path);

        $response = [
            'image_name' => basename($image_path),
            'image_url' => $public_url
        ];

        AlbumCover::create([
            'image' => $public_url
        ]);
        return response()->json([
            'message' => 'uploaded successfully',
            $response
        ],
            Response::HTTP_OK);
    }

    public function show(string $id): string
    {
        $albumCover = AlbumCover::find($id);
        return '<img src="' . $albumCover->image . '" />';
    }

    public function destroy(string $id): JsonResponse
    {
        $albumCover = AlbumCover::find($id);
        $albumCover->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
