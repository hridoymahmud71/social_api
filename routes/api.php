<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Social\PageController;

// auth specific routes
Route::prefix('auth')->group(function () {

    Route::get('/', function () {
        return "auth_works";
    });


    Route::post('/register', [AuthController::class, 'register'])->name('api.auth.register');
    Route::post('/login', [AuthController::class, 'login'])->name('api.login'); 

    //page
    Route::post('page/create', [PageController::class, 'create'])->name('api.page.create'); 

    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::get('/logout', [AuthController::class, 'logout'])->name('api.logout');

        
    });
});

Route::group(['middleware' => ['auth:sanctum']], function () {
            
    //pages
    Route::post('page/create', [PageController::class, 'create'])->name('api.page.create');     
});








Route::fallback(function () {
    return response()->json(['result' => false, 'message' => 'Url not found'], 404);
});
