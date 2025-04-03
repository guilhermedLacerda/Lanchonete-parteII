<div class="mt-5">
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show mx-5" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card mx-auto my-5 shadow-lg p-3 mb-5 bg-white rounded w-75">
        <h3 class="card-header d-flex justify-content-center">Editar Produto</h3>

        <div class="card-body">
            <p class="d-flex justify-content-center mb-0"><ins><strong>Produto</strong></ins></p>
            <form wire:submit.prevent="salvar">
                
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Insira o nome do produto" wire:model.defer="nome">
                    @error('nome') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="ingredientes">Ingredientes</label>
                    <input type="text" class="form-control" id="ingredientes" name="ingredientes" placeholder="Insira os ingredientes" wire:model.defer="ingredientes">
                    @error('ingredientes') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="valor">Valor</label>
                    <input type="text" class="form-control" id="valor" name="valor" placeholder="Insira o valor" wire:model.defer="valor">
                    @error('valor') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="imagem" class="form-label">Imagem</label>
                    <input type="file" class="form-control" id="imagem" name="imagem" wire:model="imagem">
                    @if($imagemAntiga)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $imagemAntiga) }}" alt="Imagem do Produto" class="img-thumbnail" width="150">
                        </div>
                    @endif
                    @error('imagem') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3 d-flex justify-content-center">
                    <button type="submit" class="btn btn-success w-75 p-3">Confirmar Edição</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Livewire.on('fecharModalEdicao', function() {
                var modal = document.getElementById('editModal');
                var modalInstance = bootstrap.Modal.getInstance(modal);
    
                if (modalInstance) {
                    modalInstance.hide();
                } else {
                    var newModal = new bootstrap.Modal(modal);
                    newModal.hide();
                }
    
                document.querySelectorAll('.modal-backdrop')
                    .forEach(el => el.remove());
                document.body.classList.remove('modal-open');
            })
        });
    </script>
</div>