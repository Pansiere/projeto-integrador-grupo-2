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

    public function excluir(): void
    {
        $pdo = Banco::conectar();

        $comando = $pdo->prepare(
            'UPDATE produtos SET excluido = 1 WHERE id = ?'
        );

        $comando->execute([$_GET['id']]);

        header('Location: /');
        exit;
    }

    public function excluidos(): void
    {
        $pdo = Banco::conectar();

        $comando = $pdo->query(
            'SELECT * FROM produtos WHERE excluido = 1 ORDER BY id DESC'
        );

        $produtos = $comando->fetchAll(\PDO::FETCH_ASSOC);

        View::render('produtos/excluidos', [
            'titulo' => 'Produtos Excluídos',
            'produtos' => $produtos,
        ]);
    }
    public function editar(): void
{
    $pdo = Banco::conectar();

    $id = (int) ($_GET['id'] ?? 0);

    $consulta = $pdo->prepare(
        'SELECT * FROM produtos WHERE id = ?'
    );
    $consulta->execute([$id]);

    $produto = $consulta->fetch(\PDO::FETCH_ASSOC);

    if (!$produto) {
        header('Location: /');
        exit;
    }

    View::render('produtos/editar', [
        'titulo' => 'Editar produto',
        'produto' => $produto,
    ]);
}

public function atualizar(): void
{
    $pdo = Banco::conectar();

    $id = (int) ($_POST['id'] ?? 0);
    $nome = trim($_POST['nome'] ?? '');
    $unidade = trim($_POST['unidade'] ?? '');
    $quantidade = (int) ($_POST['quantidade'] ?? 0);
    $minimo = (int) ($_POST['minimo'] ?? 0);
    $preco = str_replace(',', '.', $_POST['preco'] ?? '0');

    $comando = $pdo->prepare(
        'UPDATE produtos
         SET nome = ?, unidade = ?, quantidade = ?, minimo = ?, preco = ?
         WHERE id = ?'
    );

    $comando->execute([
        $nome,
        $unidade,
        $quantidade,
        $minimo,
        $preco,
        $id,
    ]);

    header('Location: /');
    exit;
}
}
