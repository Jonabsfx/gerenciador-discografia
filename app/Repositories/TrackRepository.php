<?php

namespace App\Repositories;


use App\Models\Track;
use App\Http\Requests\StoreTrackRequest;
use Illuminate\Http\Request;

class TrackRepository
{
    protected $entity;

    public function __construct(Track $model)
    {
        $this->entity = $model;
    }

    public function createNewTrack(StoreTrackRequest $request)
    {
        $data = $request->validated();

        $track = $this->entity
                        ->create([
                            "name" => $data['name'],
                            "duration" => $data['duration'],
                            "feat" => $data['feat']
                        ]);
        return $track;
    }

    public function update(StoreTrackRequest $request, $track_id)
    {
        $data = $request->validated();

        $track = Track::findOrFail($track_id);
        $track->name = $data['name'];
        $track->duration = $data['duration'];
        $track->feat = $data['feat'];
    }

    public function delete($track_id)
    {
        $track = Track::findOrFail($track_id);
        $track = $track->delete();

        return response()->json($track, 201);
    }
}