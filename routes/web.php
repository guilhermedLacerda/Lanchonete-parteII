<?php

use App\Livewire\Auth\Login;
use App\Livewire\Cliente\Create;
use App\Livewire\Cliente\Edit;
use App\Livewire\Cliente\Index;
use App\Livewire\Funcionario\Create as FuncionarioCreate;
use App\Livewire\Funcionario\Edit as FuncionarioEdit;
use App\Livewire\Produto\Create as ProdutoCreate;
use App\Livewire\Produto\Edit as ProdutoEdit;
use App\Models\Funcionario;
use Illuminate\Support\Facades\Route;


    Route::get('/', Login::class);

// Grupo de rotas protegidas (Apenas clientes autenticados)

    // CLIENTES

    Route::get('cliente/create', Create::class);
    Route::get('cliente/edit/{id}', Edit::class)->name('cliente.edit');
    
    // PRODUTOS
    
    Route::get('produto/create', ProdutoCreate::class);
    Route::get('produto/edit/{id}', ProdutoEdit::class);
    
    // Funcionarios
    
    Route::get('funcionario/create', FuncionarioCreate::class);
    Route::get('funcionario/edit/{id}', FuncionarioEdit::class);

    // Route::middleware(['auth'])->get('/cliente/dashboard', function () {
    //     return view('cliente.dashboard');  // Crie a view 'cliente.dashboard'
    // })->name('cliente.dashboard');