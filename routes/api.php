<?php

<<<<<<< HEAD
use App\Http\Controllers\API\NoteController;
=======
use App\Http\Controllers\API\ClasseController;
use App\Http\Controllers\API\EleveController;
use App\Http\Controllers\ProfesseurController;
>>>>>>> 20ddd0b26c92d7b5e289dbf1fdf66d28bb2d16f1
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

<<<<<<< HEAD
Route::post('classes', [NoteController::class, 'classes']);
Route::post('storeclasses', [NoteController::class, 'storeclasses']);

Route::post('matieres', [NoteController::class, 'matieres']);
Route::post('eleves', [NoteController::class, 'eleves']);
Route::post('/eleves/store', [NoteController::class, 'storeEleve']);
Route::post('elevesNote', [NoteController::class, 'storeNote']);

Route::get('storeEleves', [NoteController::class, 'storeEleves']);
Route::post('index', [NoteController::class, 'index']);
=======


Route::post('eleve/create', [EleveController::class, 'store']);
Route::put('eleve/{eleve}/update', [EleveController::class, 'update']);
Route::get('eleve/{eleve}/show', [EleveController::class, 'show']);
Route::delete('eleve/{eleve}/delete', [EleveController::class, 'destroy']);


//prof//


//prof//
>>>>>>> 20ddd0b26c92d7b5e289dbf1fdf66d28bb2d16f1
