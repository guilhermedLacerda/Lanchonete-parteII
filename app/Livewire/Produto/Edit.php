<?php

namespace App\Livewire\Produto;

use App\Models\Produto;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $produtoId;
    public $nome;
    public $ingredientes;
    public $valor;
    public $imagem;
    public $imagemAntiga;

    public function rules(){
        return [
            'nome' => 'required|string|min:3|max:100',
            'ingredientes' => 'required|string|max:255',
            'valor' => 'required|numeric|min:0',
            'imagem' => 'nullable|image|max:2048',
        ];
    }

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

    public function mount($id){
        $produto = Produto::find($id);

        if ($produto) {
            $this->produtoId = $produto->id;
            $this->nome = $produto->nome;
            $this->ingredientes = $produto->ingredientes;
            $this->valor = $produto->valor;
            $this->imagemAntiga = $produto->imagem;
        }
    }

    public function salvar(){
        $this->validate();

        $produto = Produto::find($this->produtoId);
        
        if (!$produto) {
            session()->flash('error', 'Produto não encontrado.');
            return;
        }
        
        $imagePath = $this->imagem ? $this->imagem->store('produtos', 'public') : $this->imagemAntiga;
        
        $produto->update([
            'nome' => $this->nome,
            'ingredientes' => $this->ingredientes,
            'valor' => $this->valor,
            'imagem' => $imagePath,
        ]);
        
        session()->flash('success', 'Produto atualizado com sucesso!');
    }

    public function render()
    {
        return view('livewire.produto.edit');
    }
}
