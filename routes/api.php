<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controlers\{
    AlbumController,
    TrackController
};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// CRUD dos Álbuns
Route::get('/lista-albuns', [AlbumController::class, 'index']);
Route::get('/{album_id}/detalhes', [AlbumController::class,'read']);
Route::post('/cadastro-album', [AlbumController::class, 'create']);
Route::put('/{album_id}/atualizar',[AlbumController::class, 'update']);
Route::delete('/{album_id}/deletar', [AlbumController::class, 'delete']);

// CRUD das Faixas
Route::post('/cadastro-faixa', [TrackController::class, 'create']);
Route::put('/{track_id}/atualizar', [TrackController::class, 'update']);
Route::delete('{track_id}/deletar', [TrackController::class, 'delete']);

// Interação Faixa-Álbum
Route::post('/{album_id}/adicionar-faixa/{track_id}', [AlbumController::class, 'addTrack']);
Route::post('/{album_id}/deletar-faixa/{track_id}', [AlbumController::class, 'deleteTrack']);
