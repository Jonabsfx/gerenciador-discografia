<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Album;

class AlbumTest extends TestCase
{
    public function test_getAllAlbums()
    {
        Album::factory()->count(10)->create();

       // $response = $this->
    }
}
