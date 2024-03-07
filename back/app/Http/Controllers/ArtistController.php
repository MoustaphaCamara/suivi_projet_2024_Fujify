<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArtistRequest;
use App\Models\Artist;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class ArtistController extends Controller
{
    public function index(): Collection
    {
        return Artist::all();
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->safe()->toArray();
        $artist = Artist::create([
            'name' =>$data['title'],
            'alias'=>$data['duration'],
            'birth_date' =>$data['description'],
            'label' =>$data['label'],
        ]);
        return response()->json($artist, Response::HTTP_CREATED);
    }

    public function show(string $id)
    {
        $artist = Artist::find($id);
        return response()->json($artist);
    }

    public function update(ArtistRequest $request, string $id): JsonResponse
    {
        $data = $request->validated();

        $artist = Artist::find($id);
        $artist->update($data);
        return response()->json($artist);
    }


    public function getArtisDetails($artisId)
    {
        $cacheKey = "artis_details_{$artisId}";

        $artisDetails = Cache::get($cacheKey);

        if ($artisDetails === null) {
            $artisDetails = Artist::find($artisId);
            Cache::put($cacheKey, $artisDetails, $minutes = 60);
        }

        return response()->json($artisDetails);
    }


    public function destroy(string $id): JsonResponse
    {
        $artist = Artist::find($id);
        $artist->delete();
        return response()->json(null, 204);
    }
}
