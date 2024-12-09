@extends('Layout.header')

@section('content')
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8"> <!-- Define o conjunto de caracteres como UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Tornar a página responsiva -->
    <title>Solicitações de Adoção</title> <!-- Título da página -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Inclusão do Bootstrap via CDN -->
    <style>
        body {
            background-color: #f0f2f5; 
            font-family: Arial, sans-serif; 
            display: flex;
            flex-direction: column;
            min-height: 100vh; 
        }

        main {
            flex: 1;
            margin: 20px auto;
            max-width: 1100px; 
        }

        .table-card {
            background: white;
            border-radius: 8px; 
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px; 
        }

        .table-card-header {
            background-color: #007bff; 
            color: white; 
            padding: 15px 20px;
            text-align: center;
            border-top-left-radius: 8px; 
            border-top-right-radius: 8px; 
        }

        .table-card-header h2 {
            font-size: 24px;
            margin-bottom: 5px; 
        }

        .table-card-header p {
            font-size: 14px;
            margin: 0; 
        }

        .table th {
            background-color: #e9ecef; 
            font-size: 12px;
            text-transform: uppercase; 
            text-align: center;
            padding: 12px; 
        }

        .table td {
            font-size: 14px;
            text-align: center;
            vertical-align: middle; 
            padding: 10px;
        }

        .table td img {
            width: 90px; 
            height: 60px; 
            object-fit: cover; 
            border-radius: 4px; 
        }

        .alert {
            font-size: 14px;
        }

        footer {
            background-color: #343a40; 
            color: white; 
            text-align: center;
            padding: 10px;
            margin-top: auto; 
        }
    </style>
</head>

<body>
    <main>
        <div class="table-card">
            <!-- Cabeçalho da tabela com título e descrição -->
            <div class="table-card-header">
                <h2>Solicitações de Adoção</h2> <!-- Título da seção -->
                <p>Confira os detalhes de cada adoção registrada no sistema.</p> <!-- Descrição da seção -->
            </div>

            <div class="table-responsive p-3"> <!-- Tabela com rolagem para dispositivos pequenos -->
                <!-- Exibição de mensagens de feedback -->
                @if(session('success')) <!-- Se houver uma mensagem de sucesso -->
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }} <!-- Mensagem de sucesso -->
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> <!-- Botão para fechar a mensagem -->
                    </div>
                @endif

                @if(session('error')) <!-- Se houver uma mensagem de erro -->
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }} <!-- Mensagem de erro -->
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> <!-- Botão para fechar a mensagem -->
                    </div>
                @endif

                <!-- Tabela de solicitações de adoção -->
                @if($adotantes->isEmpty()) <!-- Se não houver adotantes -->
                    <div class="alert alert-info text-center">
                        Nenhuma solicitação de adoção encontrada. <!-- Mensagem informando que não há registros -->
                    </div>
                @else
                    <table class="table table-striped align-middle"> <!-- Tabela estilizada -->
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome do Pet</th>
                                <th>Raça</th>
                                <th>Idade</th>
                                <th>Nome do Adotante</th>
                                <th>Email</th>
                                <th>Telefone</th>
                                <th>Data da Adoção</th>
                                <th>Imagem</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($adotantes as $adotante) <!-- Loop para exibir as solicitações de adoção -->
                                <tr>
                                    <td>{{ $adotante->id }}</td> <!-- ID do adotante -->
                                    <td>{{ $adotante->nome }}</td> <!-- Nome do pet -->
                                    <td>{{ $adotante->raca }}</td> <!-- Raça do pet -->
                                    <td>{{ $adotante->idade }} anos</td> <!-- Idade do pet -->
                                    <td>{{ $adotante->nome_adotante }}</td> <!-- Nome do adotante -->
                                    <td>
                                        <a href="mailto:{{ $adotante->email_adotante }}" class="text-decoration-none text-primary">
                                            {{ $adotante->email_adotante }} <!-- Link para enviar um e-mail para o adotante -->
                                        </a>
                                    </td>
                                    <td>
                                        <a href="tel:{{ $adotante->telefone_adotante }}" class="text-decoration-none">
                                            {{ $adotante->telefone_adotante }} <!-- Link para ligar para o adotante -->
                                        </a>
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($adotante->data_adocao)->format('d/m/Y H:i') }} <!-- Data de adoção formatada -->
                                    </td>
                                    <td>
                                        <img src="{{ asset($adotante->caminho_imagem) }}" alt="Imagem do Pet"> <!-- Imagem do pet -->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Adote um Amigo. Todos os direitos reservados.</p> <!-- Copyright no rodapé -->
    </footer>
</body>

</html>
@endsection
