<?php

namespace App;

class Banco
{
    public static function conectar(): \PDO
    {
        $arquivo = dirname(__DIR__) . '/database/db.sqlite';
    
        if (!file_exists($arquivo)) {
            throw new \RuntimeException("Banco não encontrado: $arquivo");
        }

        $pdo = new \PDO('sqlite:' . $arquivo);
        $pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        $pdo->exec('PRAGMA foreign_keys = ON');

        return $pdo;
    }
}
