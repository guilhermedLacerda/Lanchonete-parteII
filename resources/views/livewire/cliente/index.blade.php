<div class="mt-5">
    <div class="card">
        <div class="card-body">

            <!-- Campo de busca somente por CPF -->
            <div class="mb-3">
                <label for="search" class="form-label">Buscar Cliente por CPF:</label>
                <div class="input-group">
                    <input type="text" id="search" class="form-control" wire:model.defer="search" placeholder="Digite o CPF do cliente">
                    <button class="btn btn-primary" wire:click="buscarCliente">Buscar</button>
                </div>
            </div>
            

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Endereço</th>
                        <th>Telefone</th> 
                        <th>CPF</th> 
                        <th>Email</th> 
                        <th>Senha</th> 
                        <th>Ações</th> <!-- Coluna de ações -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientes as $c)
                    <tr>
                        <td>{{ $c->id }}</td>
                        <td>{{ $c->nome }}</td>
                        <td>{{ $c->endereco }}</td>
                        <td>{{ $c->telefone }}</td>
                        <td>{{ $c->cpf }}</td>
                        <td>{{ $c->email }}</td>
                        <td>{{ $c->senha }}</td>
                        <td>
                            <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewModal" wire:click="abrirModalVisualizar({{ $c->id }})">Visualizar</button>
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" wire:click="abrirModalExclusao({{ $c->id }})">Excluir</button>

                            <a href="{{ route('cliente.edit', ['id' => $c->id]) }}" class="btn btn-info btn-sm">Editar sem Modal</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Modal de exclusão -->
            <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Excluir Cliente</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <p>Tem certeza que deseja excluir este cliente?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-danger" wire:click="excluir" data-bs-dismiss="modal">Excluir</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal de visualização -->
            <div wire:ignore.self class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Detalhes do Cliente</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Nome:</strong> {{ $nome }} </p>
                            <p><strong>Endereço:</strong> {{ $endereco }} </p>
                            <p><strong>Telefone:</strong> {{ $telefone }} </p>
                            <p><strong>CPF:</strong> {{ $cpf }} </p>
                            <p><strong>Email:</strong> {{ $email }} </p>
                            <p><strong>Senha:</strong> {{ $senha }} </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        </div>  
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>