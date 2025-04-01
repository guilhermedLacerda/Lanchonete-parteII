<?php

namespace App\Livewire\Funcionario;

use App\Models\Funcionario;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Create extends Component
{
    public $nome;
    public $cpf; // único
    public $email;
    public $senha;

    protected $rules = [
        'nome' => 'required|string|min:3|max:100',
        'cpf' => 'required|string|size:11|unique:funcionarios,cpf',
        'email' => 'required|email|unique:funcionarios,email',
        'senha' => 'required|string|min:6',
    ];

    protected $messages = [
        'nome.required' => 'Nome é obrigatório.',
        'nome.string' => 'Nome deve ser um texto.',
        'nome.min' => 'Nome deve ter no mínimo 3 caracteres.',
        'nome.max' => 'Nome deve ter no máximo 100 caracteres.',

        'cpf.required' => 'CPF é obrigatório.',
        'cpf.string' => 'CPF deve ser um texto.',
        'cpf.size' => 'CPF deve ter exatamente 11 dígitos.',
        'cpf.unique' => 'CPF já cadastrado.',

        'email.required' => 'E-mail é obrigatório.',
        'email.email' => 'Informe um e-mail válido.',
        'email.unique' => 'E-mail já cadastrado.',

        'senha.required' => 'Senha é obrigatória.',
        'senha.string' => 'Senha deve ser um texto.',
        'senha.min' => 'Senha deve ter no mínimo 6 caracteres.',
    ];

    public function store()
    {
        $this->validate();

        Funcionario::create([
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'email' => $this->email,
            'senha' => Hash::make($this->senha),
        ]);

        $this->reset(['nome', 'cpf', 'email', 'senha']);

        session()->flash('success', 'Funcionário cadastrado com sucesso!');
    }

    public function render()
    {
        return view('livewire.funcionario.create');
    }
}
