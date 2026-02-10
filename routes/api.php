<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// TODO: Implementar las siguientes rutas:
// GET /users/ (Listar todos los usuarios)
// GET /users/{id} (Obtener el detalle de un usuario)
// PUT /users/{id} (Actualización completa)
// PATCH /users/{id} (Actualización parcial)
// DELETE /users/{id} (Borrar un usuario)

Route::group(['prefix' => 'v1'], function () {
    Route::post('/users', [UserController::class, 'store']); // Añadir
    Route::get('/users', [UserController::class, 'index']); // Listar
    Route::get('/users/{user}', [UserController::class, 'show']); // Obtener
    Route::put('/users/{user}', [UserController::class, 'update']); // Actualizar
    Route::patch('/users/{user}', [UserController::class, 'update']); // Actualizar
    Route::delete('/users/{user}', [UserController::class, 'destroy']); // Borrar
    Route::post('/users/{id}/restore', [UserController::class, 'restore']); // Restaurar
});
