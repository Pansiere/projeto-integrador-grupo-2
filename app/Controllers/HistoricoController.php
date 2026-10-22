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
            'SELECT * FROM movimentacoes'
            . ' JOIN produtos ON movimentacoes.produto_id = produtos.id');
        $movimentacoes = $consulta->fetchAll();

        View::render('historico/index', [
            'titulo' => 'Histórico',
            'movimentacoes' => $movimentacoes,
        ]);
    }
}