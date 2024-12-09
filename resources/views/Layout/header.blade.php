<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adote um Amigo</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        /* Estilização do cabeçalho */
        .header {
            background-color: #007bff; /* Azul padrão */
            color: white;
            text-align: center;
            padding: 30px 0; /* Altura ajustada */
            position: relative;
            z-index: 1030;
        }
        .header h1 {
            margin: 0;
            font-size: 2rem;
        }
        .header p {
            margin: 0;
            font-size: 1rem;
        }

        /* Botão do menu */
        .hamburger-icon {
            position: absolute;
            top: 10px; /* Ajuste vertical */
            left: 15px;
            font-size: 1.8rem;
            color: white;
            cursor: pointer;
            z-index: 1050;
        }

        /* Menu lateral */
        .offcanvas {
            width: 270px;
        }
        .offcanvas .nav-item a {
            font-size: 1.1rem;
            padding: 10px 15px;
            transition: background-color 0.3s, color 0.3s; /* Suaviza transições */
        }
        .offcanvas .nav-item a:hover {
            background-color: #0056b3; /* Azul mais escuro */
            color: #e2e6ea; /* Texto claro */
        }
        .offcanvas .nav-item .nav-link.cadastrar:hover {
            background-color: #28a745; /* Verde ao passar o cursor */
            color: #fff; /* Texto branco no hover */
        }

        /* Ajuste para o conteúdo principal */
        .main-content {
            margin-top: 50px; /* Menor espaço abaixo do cabeçalho */
        }

        /* Estilização do dropdown do usuário */
        .user-actions {
            position: absolute;
            right: 20px; /* Ajuste o valor conforme necessário */
            top: 50%;
            transform: translateY(-50%);
        }

        /* Dropdown simples sem JS */
        .dropdown {
            position: relative;
        }

        .dropdown-toggle {
            background-color: #6c757d;
            border: none;
            color: white;
            padding: 8px 12px;
            cursor: pointer;
            font-size: 1rem;
        }

        /* O menu fica visível quando o botão recebe foco ou ao passar o mouse */
        .dropdown-menu {
            display: none;
            position: absolute;
            right: 0;
            background-color: white;
            color: #333;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 150px;
            margin-top: 5px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
        }

        /* Exibe o menu quando o botão está em foco ou quando o mouse passa por cima */
        .dropdown:hover .dropdown-menu,
        .dropdown:focus-within .dropdown-menu {
            display: block;
        }

        .dropdown-item {
            padding: 10px 15px;
            text-decoration: none;
            color: #333;
        }

        .dropdown-item:hover {
            background-color: #f8f9fa;
            color: #007bff;
        }

        /* Estilização do botão de login */
        .login-btn {
    background-color: gray;
    color: white;
    position: absolute;
    right: 20px;
    top: 50%;
    transform: translateY(-50%);
    z-index: 1050;
    border: 2px solid transparent; /* Borda padrão transparente */
    transition: background-color 0.3s, border-color 0.3s; /* Suaviza a transição */
}

.login-btn:hover {
    background-color: #5a5a5a; /* Tom de cinza mais escuro */
    border-color: #d3d3d3; /* Borda de contraste */
}


    </style>
</head>
<body>
    <!-- Cabeçalho principal -->
    <header class="header">
        <span class="hamburger-icon" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu">☰</span>
        <h1>Adote um Amigo</h1>
        <p>Encontre o animal perfeito para sua família!</p>
        
        <!-- Exibe o nome do usuário logado ou o ícone de login, centralizado à direita -->
        <div class="user-actions d-flex align-items-center">
            @auth
                <div class="dropdown">
                    <button class="dropdown-toggle" type="button" id="userMenuButton">
                        {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="userMenuButton">
                       
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-primary login-btn">
                    <i class="bi bi-box-arrow-in-right"></i> Login
                </a>
            @endauth
        </div>
    </header>

    <!-- Menu Lateral (Off-Canvas) -->
    <div class="offcanvas offcanvas-start text-bg-primary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-white" href="/Pets">Início</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/Adotantes">Solicitações</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white cadastrar" href="/Pets/create">Cadastrar Pet</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/LarTemporarios">Cadastrar Lar Temporário</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Conteúdo Principal -->
    <div class="container main-content">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
