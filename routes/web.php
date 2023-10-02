<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LoginController::class, 'login']);
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/dashboard', [UserController::class, 'dashboard']);

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');

    Route::get('/listar-usuarios', [UserController::class, 'listarNivelUsuario'])->name('listar.nivel.usuario');
    Route::put('/editar-nivel-usuario/{id}', [UserController::class, 'store'])->name('editar.nivel.usuario');
    Route::get('/editar-nivel-usuario/{id}', [UserController::class, 'edit'])->name('editar.nivel.usuario');

    // Route::get('/adicionaradm', [UserController::class, 'adicionarAdm'])->name('add.adm');
    // Route::post('/adicionaradm', [UserController::class, 'adicionarAdmStore'])->name('add.adm');

    // Route::get('/adicionarcolaborador', [UserController::class, 'adicionarColaborador'])->name('add.colaborador');
    // Route::post('/adicionarcolaborador', [UserController::class, 'adicionarColaboradorStore'])->name('add.colaborador');

    // Route::get('/adicionarpermissao', [UserController::class, 'adicionarpermissao'])->name('add.permissao');
    // Route::post('/adicionarpermissao', [UserController::class, 'adicionarpermissaoStore'])->name('add.permissao');

});



