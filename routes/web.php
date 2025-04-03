<?php

use App\Livewire\Admin\Cliente\ClienteCreate;
use App\Livewire\Admin\Cliente\ClienteEdit;
use App\Livewire\Admin\Funcionario\FuncionarioCreate;
use App\Livewire\Admin\Funcionario\FuncionarioEdit;
use App\Livewire\Admin\Produto\ProdutoCreate;
use App\Livewire\Admin\Produto\ProdutoEdit;
use App\Livewire\Auth\Login;
use App\Livewire\Cliente\Create;
use App\Livewire\Cliente\Edit;
use App\Livewire\Cliente\Index;

use App\Models\Funcionario;
use Illuminate\Support\Facades\Route;


    Route::get('/', Login::class);

// Grupo de rotas protegidas (Apenas clientes autenticados)

    // CLIENTES

    Route::get('cliente/create', ClienteCreate::class);
    Route::get('cliente/edit/{id}', ClienteEdit::class)->name('cliente.edit');
    
    // PRODUTOS
    
    Route::get('produto/create', ProdutoCreate::class);
    Route::get('produto/edit/{id}', ProdutoEdit::class);
    
    // Funcionarios
    
    Route::get('funcionario/create', FuncionarioCreate::class);
    Route::get('funcionario/edit/{id}', FuncionarioEdit::class);

    // Route::middleware(['auth'])->get('/cliente/dashboard', function () {
    //     return view('cliente.dashboard');  // Crie a view 'cliente.dashboard'
    // })->name('cliente.dashboard');