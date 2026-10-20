<?php

require dirname(__DIR__) . '/vendor/autoload.php';

use App\Controllers\PainelController;

$rotas = [
    'GET /' => [PainelController::class, 'index'],
];

$pedido = $_SERVER['REQUEST_METHOD'] . ' ' . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (!isset($rotas[$pedido])) {
    http_response_code(404);
    echo 'Página não encontrada';
    exit;
}

$rota = $rotas[$pedido];

$nomeDaClasse = $rota[0];
$nomeDoMetodo = $rota[1];

$controller = new $nomeDaClasse();
$controller->$nomeDoMetodo();
