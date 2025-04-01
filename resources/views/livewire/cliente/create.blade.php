    <div class="mt-5" >
        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show mx-5" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card mx-auto my-5 shadow-lg p-3 mb-5 bg-white rounded w-75">
            <h3 class="card-header d-flex justify-content-center">Cadastrar-se</h3>
            <div class="card-body">
                <p class="d-flex justify-content-center mb-0"><ins><strong>Cliente</strong></ins></p>
                <form wire:submit.prevent="store">
                    
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Insira seu Nome" wire:model.defer="nome">
                        @error('nome') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="endereco">Endereço</label>
                        <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Insira seu endereço" wire:model.defer="endereco">
                        @error('endereco') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="telefone">Telefone</label>
                        <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Insira seu telefone" wire:model.defer="telefone">
                        @error('telefone') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="text" class="form-control @error('cpf') is-invalid @enderror" id="cpf" name="cpf" placeholder="Insira seu CPF" wire:model.defer="cpf">
                        @error('cpf') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Insira seu e-mail" wire:model.defer="email">
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="senha">Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha" placeholder="Insira sua senha" wire:model.defer="senha">
                        @error('senha') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3 d-flex justify-content-center">
                        <button type="submit" class="btn btn-dark w-75 p-3">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
