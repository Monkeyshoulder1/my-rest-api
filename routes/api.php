<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\vegetablesController;

Route::prefix('user')->group(function () {
    Route::get('/users', function () {
        return $request->user();
    });
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');
});

Route::resource('vegetables', vegetablesController::class, [
    'only' => [
        'index',
        'show'
    ]
]);

Route::resource('vegetables', vegetablesController::class, [
    'except' => [
        'index',
        'show'
    ]
])->middleware(['auth:api']);