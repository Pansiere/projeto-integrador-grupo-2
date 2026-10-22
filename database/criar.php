<?php

$pdo = new PDO('sqlite:' . __DIR__ . '/db.sqlite');

$comandos = [
    'DROP TABLE IF EXISTS movimentacoes',
    'DROP TABLE IF EXISTS produtos',
        
'CREATE TABLE produtos (
id INTEGER PRIMARY KEY,
nome TEXT NOT NULL,
unidade TEXT NOT NULL,
quantidade INTEGER NOT NULL,
minimo INTEGER NOT NULL,
preco REAL NOT NULL
)',
"INSERT INTO produtos(nome, unidade, quantidade, minimo, preco) VALUES ('engradado', 'meia dúzia', 100, 20, 25.00)",
"INSERT INTO produtos (nome, unidade, quantidade, minimo, preco) VALUES ('energetico lata', 'unidade', 100, 20, 10.00)",
"INSERT INTO produtos (nome, unidade, quantidade, minimo, preco) VALUES ('refrigerante 2L', 'unidade', 100, 20, 15.00)",
"INSERT INTO produtos (nome, unidade, quantidade, minimo, preco) VALUES ('vinho S/S 1,5L', 'unidade', 100, 20, 350.00)",
"INSERT INTO produtos (nome, unidade, quantidade, minimo, preco) VALUES ('whisky 1L', 'unidade', 100, 20, 180.00)",

'CREATE TABLE movimentacoes (
 id INTEGER PRIMARY KEY ,
 produto_id INTEGER NOT NULL REFERENCES produtos(id),
 tipo TEXT NOT NULL,
 quantidade INTEGER NOT NULL,
 data TEXT NOT NULL 
)',
"INSERT INTO movimentacoes (produto_id, tipo, quantidade, data) VALUES (1,'saida', 20, '2026-10-01')",
"INSERT INTO movimentacoes (produto_id, tipo, quantidade, data) VALUES (5, 'saida', 12, '2026-10-06')",
"INSERT INTO movimentacoes (produto_id, tipo, quantidade, data) VALUES (4, 'entrada', 25, '2026-10-05')",
"INSERT INTO movimentacoes(produto_id, tipo, quantidade, data) VALUES (3, 'saida', 50, '2026-10-02')",
"INSERT INTO movimentacoes (produto_id, tipo, quantidade, data) VALUES (2, 'entrada', 10, '2026-10-07')",
];

foreach ($comandos as $comando) {
    $pdo->query($comando);
}

echo "Banco criado: database/db.sqlite\n";
