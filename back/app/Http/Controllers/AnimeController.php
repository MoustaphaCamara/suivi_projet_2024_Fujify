<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnimeRequest;
use App\Models\Anime;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AnimeController extends Controller
{
    public function index(): Collection
    {
        return Anime::all();
    }

    public function store(AnimeRequest $request): JsonResponse
    {
        $anime = Anime::create([
            'title' => $request->title,
            'category'=>$request->category,
            'description'=>$request->description,
            'cover_image'=>$request->cover_image,
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
        $anime = Anime::find($id);
        $anime->update($request->all());
        return response()->json($anime);
    }

    public function destroy(string $id): JsonResponse
    {
        $anime = Anime::find($id);
        $anime->delete();
        return response()->json(null, 204);
    }
}
