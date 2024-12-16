<?php
// Arquivo de conexão com o banco de dados

$host = 'localhost';         // Host do banco de dados (geralmente localhost)
$dbname = 'kanban';          // Nome do banco de dados
$username = 'root';          // Usuário do banco de dados
$password = '';              // Senha do banco de dados (se houver)

// Tentar estabelecer a conexão com o banco de dados
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Definir o modo de erro do PDO para exceção
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Caso ocorra um erro na conexão, exibe uma mensagem
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
?>
