<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?> - GELA QUE É SUCESSO</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            color: #1b263b;
        }

        nav {
            background-color: #0b1f3a;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.15);
        }

        nav a {
            color: white;
            text-decoration: none;
            font-size: 15px;
            font-weight: bold;
            padding: 12px 16px;
            border-radius: 6px;
            transition: 0.3s;
        }

        nav a:hover {
            background-color: #dc3545;
            color: white;
        }

        @media (max-width: 600px) {
            nav {
                flex-direction: column;
                padding: 15px;
            }

            nav a {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>

<nav>
    <a href="/">Painel</a>
    <a href="/historico">Histórico</a>
    <a href="/produtos/novo">Novo Produto</a>
    <a href="/movimentacoes">Nova Movimentação</a>
</nav>
