<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\TermoController;
use App\Http\Controllers\api\UsuarioController;

Route::apiResource('/termos', TermoController::class);
Route::get('/favoritos', [TermoController::class, 'favoritos']);
Route::post('/Alterar-favoritos', [TermoController::class, 'AlterarFavorito']);

Route::post('/logar', [UsuarioController::class, 'logar']);
Route::post('/cadastrar-usuario', [UsuarioController::class, 'cadastrarUsuario']);
