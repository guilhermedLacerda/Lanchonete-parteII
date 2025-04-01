<?php

use App\Livewire\Cliente\Create;
use App\Livewire\Cliente\Edit;
use App\Livewire\Cliente\Index;
use Illuminate\Support\Facades\Route;

Route::get('cliente/create', Create::class);
Route::get('cliente/edit/{id}', Edit::class);
Route::get('cliente/index', Index::class);