<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArtistRequest;
use App\Models\Artist;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ArtistController extends Controller
{
    public function index(): Collection
    {
        return Artist::all();
    }

    public function store(Request $request): JsonResponse
    {
        $artist = Artist::create([
            'name' => $request->title,
            'alias'=>$request->duration,
            'birth_date' => $request->description,
            'label' => $request->label,
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
        $artist = Artist::find($id);
        $artist->update($request->all());
        return response()->json($artist);
    }

    public function destroy(string $id): JsonResponse
    {
        $artist = Artist::find($id);
        $artist->delete();
        return response()->json(null, 204);
    }
}
