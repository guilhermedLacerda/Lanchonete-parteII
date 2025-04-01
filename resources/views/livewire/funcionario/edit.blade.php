<div class="mt-5">
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show mx-5" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card mx-auto my-5 shadow-lg p-3 mb-5 bg-white rounded w-75">
        <h3 class="card-header d-flex justify-content-center">Editar Funcionário</h3>

        <div class="card-body">
            <p class="d-flex justify-content-center mb-0"><ins><strong>Funcionário</strong></ins></p>
            <form wire:submit.prevent="salvar">
                
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Insira o Nome" wire:model.defer="nome">
                    @error('nome') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" class="form-control @error('cpf') is-invalid @enderror" id="cpf" name="cpf" placeholder="Insira o CPF" wire:model.defer="cpf">
                    @error('cpf') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Insira o E-mail" wire:model.defer="email">
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="senha">Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha" placeholder="Insira a Senha" wire:model.defer="senha">
                    @error('senha') <span class="text-danger">{{ $message }}</span> @enderror
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
            });
        });
    </script>
</div>