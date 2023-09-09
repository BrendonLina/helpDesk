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

Route::get('/', [LoginController::class, 'login'])->name('login');

Route::get('/dashboard', [LoginController::class, 'index'])->name('dashboard');
Route::post('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/adicionaradmgeral', [UserController::class, 'adicionarAdmGeral'])->name('add.adm.geral');
Route::post('/adicionaradmgeral', [UserController::class, 'store'])->name('add.adm.geral');

Route::get('/adicionaradm', [UserController::class, 'adicionarAdm'])->name('add.adm');
Route::post('/adicionaradm', [UserController::class, 'adicionarAdmStore'])->name('add.adm');

Route::get('/adicionarcolaborador', [UserController::class, 'adicionarColaborador'])->name('add.colaborador');
Route::post('/adicionarcolaborador', [UserController::class, 'adicionarColaboradorStore'])->name('add.colaborador');

Route::get('/adicionarpermissao', [UserController::class, 'adicionarpermissao'])->name('add.permissao');
Route::post('/adicionarpermissao', [UserController::class, 'adicionarpermissaoStore'])->name('add.permissao');
