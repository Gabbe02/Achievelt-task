<?php
// Arquivo de banco de dados SQLite
$db_file = 'achievelt_task.db';

try {
    // Conexão com SQLite
    $pdo = new PDO("sqlite:$db_file");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Criação da tabela "users" se não existir
    $query = "
        CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            email TEXT NOT NULL UNIQUE,
            username TEXT NOT NULL,
            password TEXT NOT NULL
        )
    ";
    $pdo->exec($query);
    echo "Banco de dados e tabela 'users' criados com sucesso!";
} catch (PDOException $e) {
    die("Erro ao criar banco de dados: " . $e->getMessage());
}
?>