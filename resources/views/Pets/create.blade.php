@extends('Layout.header') <!-- Utiliza o layout de cabeçalho pré-definido -->

@section('content') <!-- Início da seção de conteúdo -->
<div class="container mt-4">
    <!-- Card para o formulário de cadastro -->
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4>Cadastrar Pet</h4> <!-- Título do formulário -->
        </div>
        <div class="card-body">
            <!-- Formulário de cadastro de pets -->
            <form action="{{ url('/Pets/db') }}" method="POST" enctype="multipart/form-data">
                @csrf <!-- Proteção contra ataques CSRF -->
                
                <!-- Campo: Nome do Pet -->
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome do Pet</label>
                    <input type="text" name="nome" id="nome" class="form-control" placeholder="Digite o nome do pet" required>
                </div>
                
                <!-- Campo: Idade -->
                <div class="mb-3">
                    <label for="idade" class="form-label">Idade</label>
                    <input type="number" name="idade" id="idade" class="form-control" placeholder="Digite a idade do pet" required>
                </div>
                
                <!-- Campo: Raça -->
                <div class="mb-3">
                    <label for="raca" class="form-label">Raça</label>
                    <input type="text" name="raca" id="raca" class="form-control" placeholder="Digite a raça do pet" required>
                </div>
                
                <!-- Campo: Descrição -->
                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição</label>
                    <textarea name="descricao" id="descricao" class="form-control" placeholder="Adicione uma descrição do pet" rows="3"></textarea>
                </div>
                
                <!-- Campo: Foto -->
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" name="foto" id="foto" class="form-control">
                </div>
                
                <!-- Botões de ação -->
                <div class="text-end">
                    <button type="submit" class="btn btn-success">Salvar</button> <!-- Salva o formulário -->
                    <a href="{{ route('Pets.index') }}" class="btn btn-secondary">Cancelar</a> <!-- Retorna ao índice de pets -->
                </div>
            </form>
        </div>
    </div>
</div>
@endsection <!-- Fim da seção de conteúdo -->
