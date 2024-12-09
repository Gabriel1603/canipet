<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Adoção</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Cor de fundo suave */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column; /* Alinha o conteúdo na vertical */
        }

        .card {
            width: 100%;
            max-width: 500px;
            margin-bottom: 20px; /* Adiciona espaçamento entre o card e o rodapé */
        }

        .btn-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }

        footer {
            width: 100%;
            background-color: #343a40; /* Cor de fundo escura do rodapé */
            color: white;
            text-align: center;
            padding: 20px 0; /* Ajusta o tamanho do rodapé */
            position: relative;
            bottom: 0;
        }
    </style>
</head>

<body>
    <!-- Formulário dentro de um card -->
    <div class="card shadow">
        <div class="card-body">
            <h5 class="card-title text-center text-primary">Finalize sua adoção</h5>
            <p class="card-text text-center">Preencha suas informações para completar o processo.</p>
            <form action="{{ route('Adotantes.db') }}" method="POST">
                @csrf
                <!-- Campos ocultos para enviar informações adicionais -->
                <input type="hidden" name="id" value="{{ $pet->id }}">

                <!-- Campo Nome do Pet -->
                <div class="mb-3">
                    <label for="nomePet" class="form-label">Tenho interesse no pet: </label>
                    <input type="text" class="form-control" id="nomePet" name="nome" value="{{ $pet->nome }}" readonly>
                </div>

                <!-- Campo Nome do Adotante -->
                <div class="mb-3">
                    <label for="nomeAdotante" class="form-label">Seu Nome</label>
                    <input type="text" class="form-control" id="nomeAdotante" name="nome_adotante" placeholder="Digite seu nome" required>
                </div>

                <!-- Campo Email do Adotante -->
                <div class="mb-3">
                    <label for="emailAdotante" class="form-label">Seu Email</label>
                    <input type="email" class="form-control" id="emailAdotante" name="email_adotante" placeholder="Digite seu email" required>
                </div>

                <!-- Campo Telefone do Adotante -->
                <div class="mb-3">
                    <label for="telefoneAdotante" class="form-label">Seu Telefone</label>
                    <input type="tel" class="form-control" id="telefoneAdotante" name="telefone_adotante" placeholder="Digite seu telefone" required>
                </div>

                <!-- Botões -->
                <div class="d-flex justify-content-between">
                    <a href="{{ route('Pets.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Quero me candidatar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Rodapé fixo -->
    <footer>
        <p class="m-0">&copy; 2024 Adote um Amigo. Todos os direitos reservados.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Máscara de Telefone -->
    <script>
        document.getElementById('telefoneAdotante').addEventListener('input', function (e) {
            let value = e.target.value.replace(/\D/g, ''); // Remove caracteres não numéricos
            value = value.replace(/^(\d{2})(\d)/g, '($1) $2'); // Adiciona parênteses no DDD
            value = value.replace(/(\d)(\d{4})$/, '$1-$2'); // Adiciona o hífen
            e.target.value = value;
        });
    </script>
</body>

</html>
