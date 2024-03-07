<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnimeRequest;
use App\Models\Anime;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class AnimeController extends Controller
{
    public function index(): Collection
    {
        return Anime::all();
    }

    public function store(AnimeRequest $request): JsonResponse
    {
        // retrieve only valid data from the input
        $data = $request->safe()->toArray();

        $anime = Anime::create([
            'title' => $data['title'],
            'category' => $data['category'],
            'description' => $data['description'],
            'cover_image' => $data['cover_image'],
        ]);
        return response()->json($anime, Response::HTTP_CREATED);
    }

    public function show(string $id): JsonResponse
    {
        $anime = Anime::find($id);
        return response()->json($anime);
    }

    public function update(AnimeRequest $request, string $id): JsonResponse
    {
        $data = $request->validated();

        $anime = Anime::find($id);
        $anime->update($data);

        return response()->json($anime);
    }


    public function getAnimeDetails($animeId): JsonResponse
    {
        $cacheKey = "anime_details_{$animeId}";

        $animeDetails = Cache::get($cacheKey);

        if ($animeDetails === null) {
            $animeDetails = Anime::find($animeId);
            Cache::put($cacheKey, $animeDetails, $minutes = 60);
        }

        return response()->json($animeDetails);
    }

    public function destroy(string $id): JsonResponse
    {
        $anime = Anime::find($id);
        $anime->delete();

        return response()->json(null, 204);
    }
}
