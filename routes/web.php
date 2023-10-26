<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ConceitosController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\TermosController;

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

Route::get('/', [DashboardController::class, 'redirecionarDashboard'])->name('redirecionar.dashboard');

Route::get('/usuarios', [UsuariosController::class, 'redirecionarUsuarios'])->name('redirecionar.usuarios');
Route::get('/cadastrar', [UsuariosController::class, 'redirecionarCadastrar'])->name('redirecionar.cadastrar.usuario');
Route::post('/cadastrar', [UsuariosController::class, 'cadastrar'])->name('cadastrar');
Route::delete('/usuarios/deletar/{id}', [UsuariosController::class, 'deletarUsuario'])->name('deletar.usuario');
Route::put('/usuarios/editar/{id}', [UsuariosController::class, 'editarUsuario'])->name('editar.usuario');

Route::get('/conceitos', [ConceitosController::class, 'listarConceitos'])->name('listar.conceitos');
Route::post('/conceitos', [ConceitosController::class, 'cadastrarConceitos'])->name('cadastrar.conceitos');
Route::delete('/conceitos/deletar/{id}', [ConceitosController::class, 'deletarConceitos'])->name('deletar.conceito');

Route::get('/categorias', [CategoriasController::class, 'listarCategorias'])->name('listar.categorias');
Route::post('/categorias', [CategoriasController::class, 'cadastrarCategorias'])->name('cadastrar.categorias');
Route::delete('/categoria/deletar/{id}', [CategoriasController::class, 'deletarCategoria'])->name('deletar.categoria');
