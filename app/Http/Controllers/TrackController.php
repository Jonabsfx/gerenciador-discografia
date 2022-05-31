<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\TrackResource;
use App\Repositories\TrackRepository;
use App\Http\Requests\StoreTrackRequest;


class TrackController extends Controller
{
    public function create(StoreTrackRequest $request)
    {
        $track = $this->repository
                            ->createNewTrack($request);
        
        return new TrackResource($track);
    }

    public function update(StoreTrackRequest $request, $track_id)
    {
        $track = $this->repository->update($track_id, $request);

        return new TrackResource($track);
    }

    public function delete($track_id)
    {
        return $this->repository->delete($track_id);
    }

}
