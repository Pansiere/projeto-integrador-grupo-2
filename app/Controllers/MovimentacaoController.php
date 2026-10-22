<?php

namespace App\Controllers;

use App\Banco;
use App\View;

class MovimentacaoController
{
    public function index(): void
    {
        $pdo = Banco::conectar();

        $consulta = $pdo->query('SELECT * FROM produtos');
        $produtos = $consulta->fetchAll(\PDO::FETCH_ASSOC);

        View::render('movimentacoes/index', [
            'titulo' => 'Registrar movimentação',
            'produtos' => $produtos,
        ]);
    }

    public function salvar(): void
    {
        date_default_timezone_set('America/Sao_Paulo');

        $pdo = Banco::conectar();

        $produtoId = (int) $_POST['produto_id'];
        $tipo = $_POST['tipo'];
        $quantidade = (int) $_POST['quantidade'];
        $data = date('Y-m-d');

        $consulta = $pdo->prepare('SELECT quantidade FROM produtos WHERE id = ?');
        $consulta->execute([$produtoId]);
        $estoque = (int) $consulta->fetchColumn();

        if ($tipo === 'saida' && $quantidade > $estoque) {
            header('Location: /?erro=estoque');
            exit;
        }

        $pdo->beginTransaction();

        if ($tipo === 'entrada') {
            $atualiza = $pdo->prepare('UPDATE produtos SET quantidade = quantidade + ? WHERE id = ?');
        } else {
            $atualiza = $pdo->prepare('UPDATE produtos SET quantidade = quantidade - ? WHERE id = ?');
        }
        $atualiza->execute([$quantidade, $produtoId]);

        $grava = $pdo->prepare('INSERT INTO movimentacoes (produto_id, tipo, quantidade, data) VALUES (?, ?, ?, ?)');
        $grava->execute([$produtoId, $tipo, $quantidade, $data]);

        $pdo->commit();

        header('Location: /');
        exit;
    }
}

