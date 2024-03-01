<?php

use App\Http\Controllers\API\ClasseController;
use App\Http\Controllers\API\EleveController;
use App\Http\Controllers\ProfesseurController;
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
 
Route::resource('professeurs', ProfesseurController::class);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::apiResource('eleve', EleveController::class);

Route::get('/classes', [ClasseController::class, 'index']);
Route::post('eleves', [EleveController::class, 'store']);
Route::post('/classes', [ClasseController::class, 'store']);
Route::get('/classes/{id}', [ClasseController::class, 'show']);
Route::put('/classes/{id}', [ClasseController::class, 'update']);
Route::delete('/classes/{id}', [ClasseController::class, 'destroy']);



