<?php

namespace App\Livewire\Admin\Cliente;

use Livewire\Component;

class ClienteEdit extends Component
{

    public $clienteId;
    public $nome;
    public $endereco;
    public $telefone;
    public $cpf;
    public $email;
    public $senha;

    public function rules(){
        return [
            'nome' => 'required|string|min:3|max:100',
            'endereco' => 'required|string|max:255',
            'telefone' => 'required|regex:/^\(?\d{2}\)?[\s-]?\d{4,5}-?\d{4}$/',
            'cpf' => 'required|unique:clientes,cpf,' . $this->clienteId,
            'email' => 'required|email|unique:clientes,email,' . $this->clienteId,
            'senha' => 'required|min:6',
        ];
    }

    protected $messages = [
        'nome.required' => 'Nome é obrigatório.',
        'nome.string' => 'Nome deve ser um texto.',
        'nome.min' => 'Nome deve ter no mínimo 3 caracteres.',
        'nome.max' => 'Nome deve ter no máximo 100 caracteres.',

        'endereco.required' => 'Endereço é obrigatório.',
        'endereco.string' => 'Endereço deve ser um texto.',
        'endereco.max' => 'Endereço deve ter no máximo 255 caracteres.',

        'telefone.required' => 'Telefone é obrigatório.',
        'telefone.regex' => 'Formato de telefone inválido.',

        'cpf.required' => 'CPF é obrigatório.',
        'cpf.unique' => 'Este CPF já está cadastrado.',

        'email.required' => 'E-mail é obrigatório.',
        'email.email' => 'Formato de e-mail inválido.',
        'email.unique' => 'Este E-mail ja esta cadastrado',

        'senha.required' => 'Senha é obrigatória.',
        'senha.min'=> 'Senha deve conter no mínimo 6 caracteres.',
    ];

    protected $listeners = [
        'editarCliente',
        'closeEditModal' => 'fecharModal'
    ];

    public function fecharModal(){
        $this->dispatch('hideModal');
    }

    public function render()
    {
        return view('livewire.admin.cliente.cliente-edit');
    }
}
