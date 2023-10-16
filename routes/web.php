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

//habilitar para primeiro acesso assim que projeto for clonado ou hospedado

// Route::get('/adicionaradmgeral', [UserController::class, 'adicionarAdmGeral']);
// Route::post('/adicionaradmgeral', [UserController::class, 'adicionarAdmGeralStore']);

// Route::get('/adicionar-permissao', [UserController::class, 'adicionarPermissao']);
// Route::post('/adicionar-permissao', [UserController::class, 'adicionarPermissaoStore']);


Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');


    Route::get('/listar-usuarios', [UserController::class, 'listarNivelUsuario'])->middleware('admgeral')->name('listar.nivel.usuario');
    Route::put('/editar-nivel-usuario/{id}', [UserController::class, 'store'])->middleware('admgeral')->name('editar.nivel.usuario');
    Route::get('/editar-nivel-usuario/{id}', [UserController::class, 'edit'])->middleware('admgeral')->name('editar.nivel.usuario');

    Route::get('/adicionar-permissao', [UserController::class, 'adicionarPermissao'])->middleware('admgeral')->name('adicionar.permissao');
    Route::post('/adicionar-permissao', [UserController::class, 'adicionarPermissaoStore'])->middleware('admgeral');

    Route::get('/adicionarcolaborador', [UserController::class, 'adicionarColaborador'])->middleware('adm')->name('adicionar.colaborador');
    Route::post('/adicionarcolaborador', [UserController::class, 'adicionarColaboradorStore'])->middleware('adm');
    Route::get('/adicionarusuario', [UserController::class, 'adicionarUsuario'])->middleware('adm')->name('adicionar.usuario');
    Route::post('/adicionarusuario', [UserController::class, 'adicionarUsuarioStore'])->middleware('adm');
    Route::get('/colaboradores', [UserController::class, 'listarColaboradores'])->middleware('adm');

    Route::get('/chamados', [UserController::class, 'chamados']);
    Route::get('/criarchamado', [UserController::class, 'criarChamado']);
    Route::post('/criarchamado', [UserController::class, 'criarChamadoStore']);
    Route::get('/chamadosusuario', [UserController::class, 'chamadosUsuario']);

});




