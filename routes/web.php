<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\TermoController;
use App\Http\Controllers\EixoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/login', [LoginController::class, 'redirecionarLogin'])->name('redirecionar.login');
Route::post('/logar', [LoginController::class, 'logar'])->name('logar');

Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    // Route::get('/', [UsuariosController::class, 'index'])->name('redirecionar.index');
    Route::get('/usuarios', [UsuariosController::class, 'listarUsuarios'])->name('listar.usuarios');
    Route::post('/usuarios', [UsuariosController::class, 'cadastrarUsuario'])->name('cadastrar.usuario');
    Route::delete('/usuarios/deletar/{id}', [UsuariosController::class, 'deletarUsuario'])->name('deletar.usuario');
    Route::put('/usuarios/editar/{id}', [UsuariosController::class, 'editarUsuario'])->name('editar.usuario');

    Route::get('/termo', [TermoController::class, 'listarTermo'])->name('listar.termo');
    Route::post('/termo', [TermoController::class, 'cadastrarTermo'])->name('cadastrar.termo');
    Route::delete('/termo/deletar/{id}', [TermoController::class, 'deletarTermo'])->name('deletar.termo');
    Route::put('/termo/editar/{id}', [TermoController::class, 'editarTermo'])->name('editar.termo');
    Route::get('/termo/filtrar', [TermoController::class, 'listarTermo'])->name('filtrar.termos');

    Route::get('/categorias', [CategoriasController::class, 'listarCategorias'])->name('listar.categorias');
    Route::post('/categorias', [CategoriasController::class, 'cadastrarCategorias'])->name('cadastrar.categorias');
    Route::delete('/categoria/deletar/{id}', [CategoriasController::class, 'deletarCategoria'])->name('deletar.categoria');
    Route::put('/categoria/editar/{id}', [CategoriasController::class, 'editarCategoria'])->name('editar.categoria');

    Route::get('/eixo', [EixoController::class, 'listarEixo'])->name('listar.eixo');
    Route::post('/eixo', [EixoController::class, 'cadastrarEixo'])->name('cadastrar.eixo');
    Route::delete('/eixo/deletar/{id}', [EixoController::class, 'deletarEixo'])->name('deletar.eixo');
    Route::put('/eixo/editar/{id}', [EixoController::class, 'editarEixo'])->name('editar.eixo');
});






