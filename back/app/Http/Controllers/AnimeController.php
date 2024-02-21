<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AnimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Collection
    {
        return Anime::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $anime = Anime::create($request->all());
        return response()->json($anime, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $anime = Anime::find($id);
        return response()->json($anime);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $anime = Anime::find($id);
        $anime->update($request->all());
        return response()->json($anime);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $anime = Anime::find($id);
        $anime->delete();
        return response()->json(null, 204);
    }
}
