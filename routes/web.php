<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

/*
Route::get('/', function () {
    return view('home');
});
*/
Route::match(['get', 'post'], '/login', [UsuarioController::class, 'login'])->name('login');
Route::match(['get', 'post'], '/logar', [UsuarioController::class, 'logar'])->name('logar');
Route::match(['get'], '/logout', [UsuarioController::class, 'logout'])->name('logout');

Route::match(['get', 'post'], '/cadastrar', [ClienteController::class, 'cadastrar'])->name('cadastrar');
Route::match(['get', 'post'], '/cadastrar_cliente', [ClienteController::class, 'cadastrar_cliente'])->name('cadastrar_cliente');

Route::match(['get', 'post'], '/', [ProdutoController::class, 'index'])->name('home');

Route::match(['get', 'post'], '/todasCategorias', [ProdutoController::class, 'todasCategorias'])->name('todasCategorias');
Route::match(['get', 'post'], '/categoria', [ProdutoController::class, 'categoria'])->name('categoria');
Route::match(['get', 'post'], '/categoria/{id}', [ProdutoController::class, 'categoria'])->name('categoria_id');

Route::match(['get', 'post'], '/adicionar_car/{id}', [ProdutoController::class, 'adicionar_car'])->name('adicionar_car');
Route::match(['get', 'post'], '/carrinho', [ProdutoController::class, 'carrinho'])->name('carrinho');
Route::match(['get', 'post'], '/deletar_item/{indice}', [ProdutoController::class, 'deletar_item'])->name('deletar_item');
Route::match(['post'], '/finalizar_car', [ProdutoController::class, 'finalizar_car'])->name('finalizar_car');

