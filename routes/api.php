<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PortafolioController;
use App\Http\Controllers\Auth\AuthController;


//Route::resource('portafolios', PortafolioController::class);

//php artisan route:list --path=api

Route::get('/portafolios',[PortafolioController::class,'index']);

Route::get('/portafolios/{portafolio}',[PortafolioController::class,'show']);



// Ruta pública para el manejo de inicio de sesión del usuario
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Grupo de rutas protegidas
Route::middleware(['auth:sanctum'])->group(function ()
{

    //Route::get('/portafolios',[PortafolioController::class,'index']);
    Route::post('/portafolios',[PortafolioController::class,'store']);
    Route::put('/portafolios/{portafolio}',[PortafolioController::class,'update']);
    Route::delete('/portafolios/{portafolio}',[PortafolioController::class,'destroy']);
    // Ruta para el cierre de sesión
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

