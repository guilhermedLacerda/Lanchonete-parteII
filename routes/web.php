<?php

use App\Livewire\Auth\Login;
use App\Livewire\Cliente\Create;
use App\Livewire\Cliente\Edit;
use App\Livewire\Cliente\Index;
use App\Livewire\Produto\Create as ProdutoCreate;
use Illuminate\Support\Facades\Route;

// Rota de Login (apenas para usuários não autenticados)
Route::get('/', Login::class);

// Grupo de rotas protegidas (Apenas clientes autenticados)

    // CLIENTES

    Route::get('cliente/create', Create::class);
    Route::get('cliente/edit/{id}', Edit::class)->name('cliente.edit');
    Route::get('cliente/index', Index::class)->name('cliente.index');


    Route::middleware(['auth'])->get('/cliente/dashboard', function () {
        return view('cliente.dashboard');  // Crie a view 'cliente.dashboard'
    })->name('cliente.dashboard');

    // PRODUTOS

    Route::get('produto/create', ProdutoCreate::class);

