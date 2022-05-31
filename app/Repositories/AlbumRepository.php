<?php

namespace App\Repositories;

use App\Models\Album;
use App\Models\Track;
use App\Http\Requests\StoreAlbumRequest;
use Illuminate\Http\Request;

class AlbumRepository
{
    protected $entity;

    public function __construct(Album $model)
    {
        $this->entity = $model;
    }

    public function getAllAlbums()
    {
        return $this->entity->with('tracks')->get();
    }

    public function getAlbum($album_name)
    {
        $album = Album::select('*')
                        ->where('name', '=', $album_name)
                        ->get();
        
    }

    public function createNewAlbum(StoreAlbumRequest $request)
    {
        $data = $request->validated();

        $album = $this->entity
                        ->create([
                            "name" => $data['name'],
                            "year" => $data['year']
                        ]);
        return $album;
    }

    public function addTrack($track_id, $album_id)
    {
        $track = Track::findOrFail($track_id);
        $album = Album::findOrFail($album_id);

        $album = $album->tracks()->save($track);

        $album->duration += $track->duration;

        return $album;
    }

    public function deleteTrack($track_id, $album_id)
    {
        $track = Track::findOrFail($track_id);
        $album = Album::findOrFail($album_id);

        $album = $album->tracks()->delete($track);

        return $album;
    }

    public function update(StoreAlbumRequest $request, $album_id)
    {
        $data = $request->validate();

        $album = Album::findOrFail($album_id);

        $album->name = $data['name']; 
        $album->year = $data['year'];
        $album->save();

        return $album;
    }

    public function delete($album_id)
    {
        $album = Album::findOrFail($album_id);
        $album = $album->delete();

        return response()->json($album, 201);
    }
}