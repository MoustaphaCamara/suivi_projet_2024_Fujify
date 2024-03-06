<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlbumCoverRequest;
use App\Models\AlbumCover;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class AlbumCoverController extends Controller
{
    public function index(): Collection
    {
        return AlbumCover::all();
    }

    public function store(AlbumCoverRequest $request): Response
    {
        $data = $request->validated();

//        $data['image'] = $request->file('image')->store('image');
//        $data = AlbumCover::create($data);

        Storage::disk('public')->put('image', $data['image']);
        return response($data, Response::HTTP_CREATED);
    }

    public function show(string $id): string
    {
        $albumCover = AlbumCover::find($id);
        $exists = Storage::disk('public')->exists('image/' . $albumCover->image);
        dd($exists);
        $imagePath = storage_path() . '/app/' . $albumCover->image;
        return '<img src="' . $imagePath . '" />';
    }

    public function destroy(AlbumCover $albumCover)
    {
        //
    }
}
