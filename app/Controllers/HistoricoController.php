<?php

namespace App\Controllers;

use App\View;

class HistoricoController
{
    public function index(): void
    {
        View::render('historico/index', [
            'titulo' => 'Histórico',
            'mensagem' => 'Olá, mundo!',
        ]);
    }
}