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
Route::get('/cadastrar', [UserController::class, 'cadastrar']);
Route::post('/cadastrar', [UserController::class, 'cadastrarStore']);

Route::middleware(['auth','admgeral','adm'])->group(function () {

    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');

    Route::get('/listar-usuarios', [UserController::class, 'listarNivelUsuario'])->name('listar.nivel.usuario')->middleware('admgeral');
    Route::put('/editar-nivel-usuario/{id}', [UserController::class, 'store'])->name('editar.nivel.usuario')->middleware('admgeral');
    Route::get('/editar-nivel-usuario/{id}', [UserController::class, 'edit'])->name('editar.nivel.usuario')->middleware('admgeral');

    Route::get('/adicionar-permissao', [UserController::class, 'adicionarPermissao'])->name('adicionar.permissao')->middleware('admgeral');
    Route::post('/adicionar-permissao', [UserController::class, 'adicionarPermissaoStore'])->middleware('admgeral');

    Route::get('/adicionarcolaborador', [UserController::class, 'adicionarColaborador'])->name('adicionar.colaborador')->middleware('adm');
    Route::post('/adicionarcolaborador', [UserController::class, 'adicionarColaboradorStore'])->middleware('adm');
    Route::get('/adicionarusuario', [UserController::class, 'adicionarUsuario'])->name('adicionar.usuario')->middleware('adm');
    Route::post('/adicionarusuario', [UserController::class, 'adicionarUsuarioStore'])->middleware('adm');
    Route::get('/colaboradores', [UserController::class, 'listarColaboradores'])->middleware('admgeral')->middleware('adm');

});




