<?php

use App\Http\Controllers\API\ClasseController;
use App\Http\Controllers\API\EleveController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\FlareClient\Api;

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

Route::post('eleve/create', [EleveController::class, 'store']);
Route::put('eleve/{eleve}/update', [EleveController::class, 'update']);
Route::get('eleve/{eleve}/show', [EleveController::class, 'show']);
Route::delete('eleve/{eleve}/delete', [EleveController::class, 'destroy']);
