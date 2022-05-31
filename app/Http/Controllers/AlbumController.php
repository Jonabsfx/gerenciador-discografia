<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\AlbumResource;
use App\Repositories\AlbumRepository;
use App\Http\Requests\StoreAlbumRequest;
use App\Http\Requests\StoreTrackRequest;
class AlbumController extends Controller
{
    protected $repository;

    public function __construct(AlbumRepository $albumRepository)
    {
        $this->repository = $albumRepository;
    }

    public function index()
    {
        return AlbumResource::collection($this->repository->getAllAlbums());
    }

    public function read($album_name)
    {
        return new AlbumResource($this->repository->getAlbum($album_name));
    }

    public function create(StoreAlbumRequest $request)
    {
        $album = $this->repository
                            ->createNewAlbum($request);
        
        return new AlbumResource($album);
    }

    public function addTrack($album_id, $track_id)
    {
        $album = $this->repository
                            ->addTrack($track_id, $album_id);
        
        return new AlbumResource($album);
    }

    public function deleteTrack($album_id, $track_id)
    {
        $album = $this->repository
                            ->deleteTrack($track_id, $album_id);
        
        return new AlbumResource($album);
    }

    public function update(StoreAlbumRequest $request, $album_id)
    {
        $album = $this->repository->update($album_id, $request);

        return new AlbumResource($album);
    }

    public function delete($album_id)
    {
        return $this->repository->delete($album_id);
    }
}
