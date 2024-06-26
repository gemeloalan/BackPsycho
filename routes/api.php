<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\PatientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//Open ROuteees


Route::post('/register', [ApiController::class, 'register']);
Route::post('/login', [ApiController::class, 'login']);
// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:api');

Route::group([
    "middleware" => ["auth:api"]], function () {
        Route::get('/profile', [ApiController::class, 'profile']);
        Route::get('/logout', [ApiController::class, 'logout']);
        Route::resource('patients', PatientController::class);
    });
