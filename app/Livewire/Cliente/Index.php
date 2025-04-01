<?php

namespace App\Livewire\Cliente;

use App\Models\Cliente;
use Livewire\Component;

class Index extends Component
{
    public $search = ''; // Variável para armazenar o termo de busca (somente CPF)
    public $clienteId;
    public $nome;
    public $endereco;
    public $telefone;
    public $cpf;
    public $email;

    public function render()
    {
        $clientes = Cliente::when(!empty($this->search), function ($query) {
            return $query->where('cpf', 'like', '%' . $this->search . '%');
        })->get();
    
        return view('livewire.cliente.index', compact('clientes'));
    }

    public function abrirModalVisualizar($clienteId)
    {
        $this->reset(); // Evita exibir dados antigos no modal

        $cliente = Cliente::find($clienteId);

        if ($cliente) {
            $this->clienteId = $cliente->id;
            $this->nome = $cliente->nome;
            $this->endereco = $cliente->endereco;
            $this->telefone = $cliente->telefone;
            $this->cpf = $cliente->cpf;
            $this->email = $cliente->email;
        }
    }

    public function abrirModalExclusao($clienteId)
    {
        $this->clienteId = $clienteId;
    }

    public function excluir()
    {
        if ($this->clienteId) {
            $cliente = Cliente::find($this->clienteId);
            if ($cliente) {
                $cliente->delete();
                $this->reset(); // Limpa os dados após exclusão
            }
        }
    }

    public function buscarCliente()
    {
        // Livewire já atualiza automaticamente, então não é necessário chamar render()
    }
}
