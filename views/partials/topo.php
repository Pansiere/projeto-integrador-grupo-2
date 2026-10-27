php
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $titulo ?> - GELA QUE É SUCESSO</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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

        /* Animação Fade In */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Animação do conteúdo */
        main {
            animation: fadeIn 0.6s ease-out both;
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
            overflow-y: auto;
        }

        /* Nome */
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
            transition: background-color 0.3s, padding-left 0.3s;
        }

        .sidebar a:hover {
            background-color: #dc3545;
            padding-left: 22px;
        }

        /* Logo na parte inferior */
        .sidebar-logo {
            width: 100%;
            max-width: 210px;
            height: auto;
            margin-top: auto;
            margin-left: auto;
            margin-right: auto;
            padding-top: 20px;
            display: block;
            border-radius: 8px;
        }

        /* Conteúdo */
        main {
            margin-left: 250px;
            padding: 25px;
            min-height: 100vh;
        }

        /* Acessibilidade: respeita quem prefere menos animação */
        @media (prefers-reduced-motion: reduce) {
            main {
                animation: none;
            }

            .sidebar a {
                transition: none;
            }
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

            .sidebar-logo {
                width: 150px;
                margin: 20px auto 0;
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

    <a href="/">
        <i class="bi bi-house-door mr-2"></i>
        Painel
    </a>

    <a href="/historico">
        <i class="bi bi-clock-history mr-2"></i>
        Histórico
    </a>

    <a href="/produtos/novo">
        <i class="bi bi-plus-square mr-2"></i>
        Novo Produto
    </a>

    <a href="/movimentacoes">
        <i class="bi bi-arrow-left-right mr-2"></i>
        Nova Movimentação
    </a>

    <a href="/produtos/excluidos">
        <i class="bi bi-trash3 mr-2"></i>
        Itens Excluídos
    </a>

    <img
        src="/assets/logo.png"
        alt="Logo Gela Que É Sucesso"
        class="sidebar-logo"
    >

</nav>

<main>
