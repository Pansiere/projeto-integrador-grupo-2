<?php

$pdo = new PDO('sqlite:' . __DIR__ . '/db.sqlite');

$comandos = [
];

foreach ($comandos as $comando) {
    $pdo->query($comando);
}

echo "Banco criado: database/db.sqlite\n";
