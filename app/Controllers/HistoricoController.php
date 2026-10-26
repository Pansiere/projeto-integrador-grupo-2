<?php

namespace App\Controllers;

use App\View;
use App\Banco;

class HistoricoController
{
    public function index(): void
    {
        $pdo = Banco::conectar();
        $consulta = $pdo->query(
            'SELECT movimentacoes.*, produtos.nome, produtos.preco FROM movimentacoes'
            . ' JOIN produtos ON movimentacoes.produto_id = produtos.id ORDER BY movimentacoes.id DESC');
        $movimentacoes = $consulta->fetchAll();

        View::render('historico/index', [
            'titulo' => 'Histórico',
            'movimentacoes' => $movimentacoes,
        ]);
    }
}