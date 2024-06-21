<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\vegetablesController;

Route::get('/', function () {
    return view('pages.home');
})->name('home');
Route::get('/vegetables', function () {
    return view('pages.plp');
})->name('plp');
Route::get('//{i}', function () {
    return view('pages.pdp');
})->name('pdp');
Route::get('/login', function () {
    return view('pages.login');
})->name('show_login');


Route::middleware('auth')->prefix('admin')->group(function () {
    Route::prefix('vegetables')->group(function () {
        Route::post('/', function () {
            return view('pages.admin.vegetables.index');
        });
        Route::post('/add', function () {
            return view('pages.admin.vegetables.add');
        });
        Route::post('/edit/{id}', [vegetablesController::class, 'form_update']);
    });
});