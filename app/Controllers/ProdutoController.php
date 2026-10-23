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
        $uploadDir = dirname(__DIR__) . '/teste/';

        if (isset($_FILES['imagem'])) {
            move_uploaded_file(
                $_FILES['imagem']['tmp_name'],
                '../public/assets/' . $_FILES['imagem']['name']
            );
        }

        $pdo = Banco::conectar();

        $comando = $pdo->prepare(
            'INSERT INTO produtos (nome, unidade, quantidade, minimo, preco, imagem) VALUES (?, ?, ?, ?, ?, ?)'
        );

        $comando->execute([
            $_POST['nome'],
            $_POST['unidade'],
            $_POST['quantidade'],
            $_POST['minimo'],
            str_replace(',', '.', $_POST['preco']),
            $_FILES['imagem']['name'],
        ]);

        header('Location: /');
        exit;
    }
}
