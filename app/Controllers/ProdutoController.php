<?php

namespace App\Controllers;

use App\Banco;
use App\View;

class ProdutoController
{
    public function novo(): void
    {
        View::render('produtos/novo', [
            'titulo' => 'Cadastrar produto',
        ]);
    }

    public function salvar(): void
    {
        $pdo = Banco::conectar();

        $comando = $pdo->prepare(
            'INSERT INTO produtos (nome, unidade, quantidade, minimo, preco) VALUES (?, ?, ?, ?, ?)'
        );

        $comando->execute([
            $_POST['nome'],
            $_POST['unidade'],
            $_POST['quantidade'],
            $_POST['minimo'],
            str_replace(',', '.', $_POST['preco']),
        ]);

        header('Location: /');
        exit;
    }
}
