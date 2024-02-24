<?php

use App\Http\Controllers\API\NoteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('classes', [NoteController::class, 'classes']);
Route::post('storeclasses', [NoteController::class, 'storeclasses']);

Route::post('matieres', [NoteController::class, 'matieres']);
Route::post('eleves', [NoteController::class, 'eleves']);
Route::post('/eleves/store', [NoteController::class, 'storeEleve']);
Route::post('elevesNote', [NoteController::class, 'storeNote']);

Route::get('storeEleves', [NoteController::class, 'storeEleves']);
Route::post('index', [NoteController::class, 'index']);
