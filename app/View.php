<?php

namespace App;

class View
{
    public static function render(string $view, array $dados = []): void
    {
        extract($dados);

        $arquivo = dirname(__DIR__) . '/views/' . $view . '.php';

        if (!file_exists($arquivo)) {
            throw new \RuntimeException("View não encontrada: $view");
        }

        require $arquivo;
    }
}
