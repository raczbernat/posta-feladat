<?php

use App\Http\Controllers\TelepulesController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [TelepulesController::class, 'login']);
Route::get('/telepulesek', [TelepulesController::class, 'index']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/telepulesek', [TelepulesController::class, 'store']);
    Route::put('/telepulesek/{id}', [TelepulesController::class, 'update']);
    Route::delete('/telepulesek/{id}', [TelepulesController::class, 'destroy']);
});
