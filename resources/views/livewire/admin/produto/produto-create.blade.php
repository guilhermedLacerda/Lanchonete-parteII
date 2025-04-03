<div class="mt-5">
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show mx-5" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card mx-auto my-5 shadow-lg p-3 mb-5 bg-white rounded w-75">
        <h3 class="card-header d-flex justify-content-center">Cadastrar Produto</h3>
        <div class="card-body">
            <p class="d-flex justify-content-center mb-0"><ins><strong>Produto</strong></ins></p>
            <form wire:submit.prevent="store">
                
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome do Produto</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Produto" wire:model.defer="nome">
                    @error('nome') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="ingredientes">Ingredientes</label>
                    <input type="text" class="form-control" id="ingredientes" name="ingredientes" placeholder="Ingredientes" wire:model.defer="ingredientes">
                    @error('ingredientes') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="valor">Valor</label>
                    <input type="number" class="form-control" id="valor" name="valor" placeholder="Valor do Produto" wire:model.defer="valor" step="0.01">
                    @error('valor') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="imagem">Imagem do Produto</label>
                    <input type="file" class="form-control" id="imagem" name="imagem" wire:model="imagem">
                    @error('imagem') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3 d-flex justify-content-center">
                    <button type="submit" class="btn btn-dark w-75 p-3">Cadastrar Produto</button>
                </div>
            </form>
        </div>
    </div>
</div>
