@extends('Layout.header') <!-- Usa o layout definido no arquivo 'Layout.header' como cabeçalho padrão -->

@section('content') <!-- Início da seção de conteúdo da página -->
<main class="container my-4">

    <!-- Carrossel -->
    <div id="animalCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <!-- Primeira imagem do carrossel -->
            <div class="carousel-item active">
                <img src="./image/cachorro1-carrossel.jpg" class="d-block w-100" alt="Cachorro para adoção">
            </div>
            <!-- Segunda imagem do carrossel -->
            <div class="carousel-item">
                <img src="./image/cachorro2-carrossel.jpg" class="d-block w-100" alt="Gato para adoção">
            </div>
            <!-- Terceira imagem do carrossel -->
            <div class="carousel-item">
                <img src="./image/cachorro3-carrossel.png" class="d-block w-100" alt="Outro animal para adoção">
            </div>
        </div>

        <!-- Botões de navegação do carrossel -->
        <button class="carousel-control-prev" type="button" data-bs-target="#animalCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#animalCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Próximo</span>
        </button>
    </div>

    <!-- Mensagem de sucesso (exibida caso exista uma mensagem na sessão) -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        {{ session('success') }} <!-- Exibe o conteúdo da mensagem -->
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
    </div>
    @endif

    <!-- Cards de Animais -->
    <section class="row mt-4">
        @foreach($pets as $pet) <!-- Itera sobre a coleção de pets -->
        <div class="col-md-4">
            <div class="card">
                <!-- Imagem do pet -->
                <img src="{{ asset($pet->caminho_imagem) }}" class="card-img-top" alt="{{ $pet->nome }}">
                <div class="card-body">
                    <!-- Informações do pet -->
                    <h5 class="card-title">{{ $pet->nome }}</h5>
                    <p class="card-text">
                        Idade: {{ $pet->idade }} anos<br>
                        Raça: {{ $pet->raca }}
                    </p>
                    <!-- Botão para iniciar o processo de adoção -->
                    <a href="{{ route('Adotantes.create', ['pet' => $pet->id]) }}" class="btn btn-primary">Adotar</a>
                </div>
            </div>
        </div>
        @endforeach
    </section>
</main>

<!-- Rodapé da página -->
<footer class="bg-dark text-white text-center py-3">
    <p>&copy; 2024 Adote um Amigo. Todos os direitos reservados.</p>
</footer>

<!-- Scripts do Bootstrap -->
<script src="./js/bootstrap.bundle.min.js"></script>
@endsection <!-- Fim da seção de conteúdo -->
