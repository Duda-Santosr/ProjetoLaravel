<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Estoque</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* Fundo com tom personalizado */
        body {
            background: linear-gradient(135deg, #f6f9fc, #d9e9f7);
            font-family: 'Poppins', sans-serif;
            color: #1a2d40;
            margin: 0;
            min-height: 100vh; /* Garante que o rodapé fique no final da página */
            display: flex;
            flex-direction: column;
        }

        /* Navbar exclusiva */
        .navbar {
            background: linear-gradient(90deg, #1f4d72, #3b87b2);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
            border-bottom-left-radius: 12px;
            border-bottom-right-radius: 12px;
            padding: 0.8rem 1rem;
        }

        .navbar-brand {
            font-weight: 600;
            font-size: 1.6rem;
            letter-spacing: 0.5px;
            color: #fff !important;
        }
        
        .navbar-nav .nav-link {
            color: #f1f5f9 !important;
            font-weight: 500;
            transition: all 0.3s ease;
            border-radius: 8px;
            padding: 8px 14px;
        }

        .navbar-nav .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.18);
        }

        /* Área principal */
        main {
            padding-top: 30px;
            flex-grow: 1; /* Faz a área principal ocupar o espaço restante */
        }

        /* Cartões com visual clean */
        .card {
            border-radius: 14px;
            border: none;
            background: white;
            box-shadow: 0 8px 25px rgba(31, 77, 114, 0.12);
            padding: 1rem;
            transition: transform 0.2s ease;
        }

        .card:hover {
            transform: translateY(-3px);
        }

        /* Botões personalizados */
        .btn-primary {
            background-color: #1f4d72;
            border: none;
            font-weight: 500;
            padding: 0.5rem 1.2rem;
            border-radius: 8px;
            transition: 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #163a56;
            transform: scale(1.03);
        }

        .btn-outline-primary {
            background-color:  #3b87b2;
            border: none;
            font-weight: 500;
            padding: 0.5rem 1.2rem;
            border-radius: 8px;
            transition: 0.3s ease;
            color: #fff;
        }

        .btn-outline-primary:hover {
            background-color:  #3b87b2;
            transform: scale(1.03);
            color: #fff;
        }
        /* Botão de logout */
        .btn-link.nav-link {
            border: none;
            padding: 0;
            background: none;
        }

        /* Links */
        a {
            text-decoration: none;
        }

        /* Rodapé */
        footer {
            text-align: center;
            padding: 14px;
            background: #cfe2f3;
            color: #1a2d40;
            font-size: 0.9rem;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            margin-top: 40px;
        }

        /* Ajuste para telas menores */
        @media (max-width: 768px) {
            .navbar-nav {
                text-align: center;
                gap: 5px;
            }
        }
    </style>
</head>
<body>
    <div id="app" class="d-flex flex-column min-vh-100">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">📦 Estoque</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Cadastro</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('produtos.index') }}">Produtos</a>
                            </li>
                            <li class="nav-item">
                                <form action="{{ route('logout') }}" method="POST" class="d-flex">
                                    @csrf
                                    <button type="submit" class="nav-link">Logout</button>
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 container">
            @yield('content')
        </main>

        <footer class="mt-auto">
            &copy; {{ date('Y') }} Controle de Estoque - Todos os direitos reservados
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>