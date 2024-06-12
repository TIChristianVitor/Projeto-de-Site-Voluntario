<!-- Utilização do PHP 7.4 -->
<!-- Utilização do banco de dados SQLite -->
<?php

$pdo = new PDO('sqlite:bancodedados.sqlite');

$pdo->exec('CREATE TABLE IF NOT EXISTS site (
            titulo TEXT,
            banner TEXT,
            sobre TEXT )');

if (!$pdo->query("SELECT * FROM site")->fetch()) { 
    $pdo->exec("INSERT INTO site (titulo,banner,sobre)
                VALUES ('Meu Site', 'Bem-vindo ao Meu Site', 'Texto da área SOBRE')");
}

$pdo->exec('CREATE TABLE IF NOT EXISTS contatos (
            id INTEGER PRIMARY KEY,
            nome TEXT,
            email TEXT,
            mensagem TEXT )');