<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adote um Amigo - Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        /* Fonte global */
        body {
            font-family: 'Roboto', Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        /* Estilo do cabeçalho */
        .header-login {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-bottom: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .header-login h1 {
            margin: 0;
            font-size: 2.5rem;
            font-weight: 700;
        }

        .header-login p {
            margin: 0;
            font-size: 1.2rem;
            font-weight: 300;
        }

        /* Estilo do formulário */
        .form-container {
            max-width: 400px;
            margin: 30px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .form-container .form-label {
            font-weight: 600;
            font-size: 1rem;
            color: #555;
        }

        .form-container .form-control {
            border-radius: 5px;
            font-size: 1rem;
            padding: 10px;
        }

        .form-container .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .form-container .btn-primary {
            width: 100%;
            padding: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            background-color: #007bff;
            border-color: #007bff;
        }

        .form-container .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        /* Links */
        .form-container a.text-primary {
            font-size: 0.9rem;
            text-decoration: none;
            color: #007bff;
        }

        .form-container a.text-primary:hover {
            text-decoration: underline;
            color: #0056b3;
        }

        /* Mensagens de erro */
        .text-danger {
            font-size: 0.85rem;
        }
    </style>
</head>
<body>
    <!-- Cabeçalho do Login -->
    <header class="header-login">
        <h1>Adote um Amigo</h1>
        <p>Entre na sua conta para continuar</p>
    </header>

    <!-- Formulário de Login -->
    <div class="form-container">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Status de Sessão -->
            @if (session('status'))
                <div class="alert alert-success mb-4">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <div class="text-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Senha -->
            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input id="password" type="password" class="form-control" name="password" required>
                @error('password')
                    <div class="text-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Lembrar-me -->
            <div class="mb-3 form-check">
                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                <label for="remember_me" class="form-check-label">Lembrar-me</label>
            </div>

            <!-- Ações -->
            <div class="d-flex justify-content-between align-items-center">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-primary">Esqueceu sua senha?</a>
                @endif
            </div>
            <button type="submit" class="btn btn-primary mt-4">Entrar</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
