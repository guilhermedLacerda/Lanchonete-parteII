<?php

namespace App\Livewire\Produto;

use App\Models\Produto;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $nome;
    public $ingredientes;
    public $valor;
    public $imagem;

    protected $rules = [
        'nome' => 'required|string|min:3|max:100',
        'ingredientes' => 'required|string|max:255',
        'valor' => 'required|numeric|min:0',
        'imagem' => 'nullable|image|max:2048', // Limite de 2MB para imagens
    ];

    protected $messages = [
        'nome.required' => 'Nome é obrigatório.',
        'nome.string' => 'Nome deve ser um texto.',
        'nome.min' => 'Nome deve ter no mínimo 3 caracteres.',
        'nome.max' => 'Nome deve ter no máximo 100 caracteres.',

        'ingredientes.required' => 'Ingredientes são obrigatórios.',
        'ingredientes.string' => 'Os ingredientes devem ser um texto.',
        'ingredientes.max' => 'Ingredientes devem ter no máximo 255 caracteres.',

        'valor.required' => 'O valor é obrigatório.',
        'valor.numeric' => 'O valor deve ser um número.',
        'valor.min' => 'O valor não pode ser negativo.',

        'imagem.image' => 'O arquivo deve ser uma imagem.',
        'imagem.max' => 'A imagem deve ter no máximo 2MB.',
    ];

    public function store()
    {
        $this->validate();

        $imagePath = $this->imagem ? $this->imagem->store('produtos', 'public') : null;

        Produto::create([
            'nome' => $this->nome,
            'ingredientes' => $this->ingredientes,
            'valor' => $this->valor,
            'imagem' => $imagePath,
        ]);

        $this->reset(['nome', 'ingredientes', 'valor', 'imagem']);

        session()->flash('success', 'Produto cadastrado com sucesso!');
    }

    public function render()
    {
        return view('livewire.produto.create');
    }
}
