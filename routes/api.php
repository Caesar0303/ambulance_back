<?php

use App\Http\Controllers\BrigadesController;
use App\Http\Controllers\UserController;
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
Route::get('/brigade/show/{id}', [BrigadesController::class, 'show']);
Route::post('/add_user', [\App\Http\Controllers\UserController::class, 'addUser']);
Route::get('/users/list', [\App\Http\Controllers\UserController::class, 'listUsers']);
Route::post('/add_brigade', [BrigadesController::class, 'addBrigade']);
Route::get('/edit_brigade/{id}', [BrigadesController::class, 'editBrigade']);
Route::post('/update_brigade/{id}', [BrigadesController::class, 'updateBrigade']);
Route::delete('/delete_brigade/{id}', [BrigadesController::class, 'deleteBrigade']);
Route::get('/delete_user/{id}', [UserController::class, 'deleteUser']);
Route::get('/my_brigade/{id}', [UserController::class, 'myBrigade']);
Route::get('/my_histories/{id}', [BrigadesController::class, 'myHistories']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/call_brigade/{id}', [BrigadesController::class, 'callBrigade']);

