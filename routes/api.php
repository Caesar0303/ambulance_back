<?php

use App\Http\Controllers\BrigadesController;
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

Route::get('/brigade/list', [BrigadesController::class, 'listBrigade']);
Route::post('/add_brigade', [BrigadesController::class, 'addBrigade']);
Route::post('/update_brigade/{id}', [BrigadesController::class, 'updateBrigade']);
Route::delete('/delete_brigade/{id}', [BrigadesController::class, 'deleteBrigade']);
Route::get('/call_brigade/{id}', [BrigadesController::class, 'callBrigade']);

