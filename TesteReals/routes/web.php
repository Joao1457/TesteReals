<?php

use App\Http\Controllers\AfiliadoController;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\ComissaoController;
use App\Http\Controllers\UserController;
use App\Models\Afiliado;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::post('/update-status', [UserController::class, 'updateStatus'])->name('users.updateStatus');
Route::post('/afiliado-Status', [AfiliadoController::class, 'afiliadoStatus'])->name('afiliados.afiliadoStatus');
Route::post('/select-cidade', [CidadeController::class, 'selectCidade'])->name('cidades.select');


Route::resource('users', UserController::class);
Route::resource('afiliados', AfiliadoController::class);
Route::resource('comissoes', ComissaoController::class);
Route::get('/comissoes/create/{afiliadoId}', [ComissaoController::class, 'create'])->name('comissoes.create');



