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

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100vh;
            background-color: #0b1f3a;
            padding: 25px 15px;
            display: flex;
            flex-direction: column;
            box-shadow: 3px 0 10px rgba(0, 0, 0, 0.15);
            z-index: 1000;
        }

        /* Logo / nome */
        .sidebar h2 {
            color: white;
            text-align: center;
            font-size: 21px;
            margin: 10px 0 35px;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        /* Links */
        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            font-size: 15px;
            font-weight: bold;
            padding: 14px 16px;
            margin-bottom: 8px;
            border-radius: 6px;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background-color: #dc3545;
            padding-left: 22px;
        }

        /* Conteúdo da página */
        main {
            margin-left: 250px;
            padding: 25px;
        }

        /* Celulares */
        @media (max-width: 600px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                padding: 15px;
            }

            .sidebar h2 {
                margin: 5px 0 15px;
                padding-bottom: 15px;
            }

            .sidebar a {
                text-align: center;
                margin-bottom: 5px;
            }

            main {
                margin-left: 0;
                padding: 15px;
            }
        }
    </style>
</head>
<body>

<nav class="sidebar">
    <h2>GELA QUE É SUCESSO</h2>

    <a href="/">Painel</a>
    <a href="/historico">Histórico</a>
    <a href="/produtos/novo">Novo Produto</a>
    <a href="/movimentacoes">Nova Movimentação</a>
</nav>

<main>
