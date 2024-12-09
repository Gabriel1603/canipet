@extends('Layout.header')

@section('content')
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Lares Temporários</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        /* Tabela */
        .table {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .table thead th {
            background: #007bff;
            color: white;
            text-transform: uppercase;
            font-size: 14px;
            letter-spacing: 0.5px;
            text-align: center;
            padding: 15px;
            border-bottom: 2px solid #e2e6ea;
        }

        .table tbody td {
            font-size: 14px;
            text-align: center;
            vertical-align: middle;
            padding: 12px;
        }

        /* Botão Cadastrar */
        .btn-cadastrar {
            font-size: 1rem;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
        }

        .btn-cadastrar:hover {
            background-color: #218838;
        }

        /* Rodapé fixo */
        footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        /* Espaçamento do conteúdo principal */
        .main-content {
            flex: 1;
            margin-top: 7px; /* Mais próximo do header */
        }

        .actions-bar {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 10px; /* Espaço entre o botão e a tabela */
        }
    </style>
</head>

<body>
    <!-- Conteúdo Principal -->
    <main class="container main-content">
        <!-- Mensagens de feedback -->
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <!-- Botão Cadastrar -->
        <div class="actions-bar">
            <a href="{{ route('LarTemporarios.create') }}" class="btn-cadastrar">Cadastrar</a>
        </div>

        <!-- Tabela de lares temporários -->
        @if($lares->isEmpty())
        <div class="alert alert-info text-center">
            Nenhum lar temporário cadastrado.
        </div>
        @else
        <table class="table table-striped align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th>Capacidade</th>
                </tr>
            </thead>
            <tbody>
                @foreach($lares as $lar)
                <tr>
                    <td>{{ $lar->id }}</td>
                    <td>{{ $lar->nome }}</td>
                    <td>{{ $lar->endereco }}</td>
                    <td>
                        <a href="tel:{{ $lar->telefone }}" class="text-decoration-none">
                            {{ $lar->telefone }}
                        </a>
                    </td>
                    <td>
                        <a href="mailto:{{ $lar->email }}" class="text-decoration-none text-primary">
                            {{ $lar->email }}
                        </a>
                    </td>
                    <td>{{ $lar->capacidade }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </main>

    <!-- Rodapé fixo -->
    <footer>
        <p>&copy; 2024 Sistema de Gestão de Lares Temporários. Todos os direitos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
@endsection
