<?php

namespace App\Controllers;

use App\Banco;
use App\View;

class PainelController
{
    public function index(): void
    {
        $pdo = Banco::conectar();
        $consulta = $pdo->query('SELECT * FROM produtos');
        $produtos = $consulta->fetchAll();

        $total = 0;
        foreach ($produtos as $produto) {
            $total = $total + $produto['quantidade'] * $produto['preco'];
        }

        View::render('painel/index', [
            'titulo' => 'Painel',
            'produtos' => $produtos,
            'total' => $total,
        ]);
    }
}
