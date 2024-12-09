@extends('Layout.header')

@section('content')
<div class="container mt-4">
    <h2 class="text-primary text-center">Cadastrar Lar Temporário</h2>
    <p class="text-center">Preencha os campos abaixo para cadastrar um novo lar temporário.</p>

    <form action="{{ route('LarTemporarios.db') }}" method="POST">
        @csrf

        <!-- Nome -->
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome do lar" required>
        </div>

        <!-- Endereço -->
        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço</label>
            <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Digite o endereço" required>
        </div>

        <!-- Telefone -->
        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="Digite o telefone" required>
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Digite o e-mail" required>
        </div>

        <!-- Capacidade -->
        <div class="mb-3">
            <label for="capacidade" class="form-label">Capacidade</label>
            <input type="number" class="form-control" id="capacidade" name="capacidade" placeholder="Digite a capacidade de acolhimento" required>
        </div>

        <!-- Descrição -->
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="4" placeholder="Digite uma descrição sobre o lar"></textarea>
        </div>

        <!-- Botões -->
        <div class="d-flex justify-content-between">
            <a href="{{ route('LarTemporarios.index') }}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>
</div>
@endsection
