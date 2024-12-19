<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\IbanController;
use App\Models\User;

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
// Route::post('/ibans/check', [IbanController::class, 'isValidIBAN']);
//     Route::post('/ibans/create', [IbanController::class, 'store']);
    Route::post('/auth/register', [UserController::class, 'createUser']);
    Route::post('/auth/login', [UserController::class, 'loginUser']);
    Route::post('/ibans/check', [IbanController::class, 'validateIban']);
    // Route::get('/user', [IbanController::class, '']);
// Route::post('/register', 'AuthController@register');
// Route::post('/login', 'AuthController@login');
// Route::middleware('auth:sanctum')->group(function () {

// });
Route::get('/users', function (Request $request) {
    return  User::all();
});


// Route::middleware(['auth:sanctum'])->group(function () {

//     // Route::get('user/profile', [AuthController::class, 'profile']);
//     // Additional routes for IBAN management could also go here
// });
