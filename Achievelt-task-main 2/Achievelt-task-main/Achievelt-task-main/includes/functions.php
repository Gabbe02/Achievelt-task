<?php
include('../includes/db.php');

// Função para registrar um novo usuário
function registerUser($username, $email, $password) {
    global $pdo;

    // Hash da senha (para segurança)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepara a query de inserção no banco de dados
    $query = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashedPassword);

    // Executa a query
    return $stmt->execute();
}

// Função para autenticar um usuário durante o login
function loginUser($email, $password) {
    global $pdo;

    // Busca o usuário pelo email
    $query = "SELECT * FROM users WHERE email = :email LIMIT 1";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifica se a senha é válida
    if ($user && password_verify($password, $user['password'])) {
        // Se for válido, retorna os dados do usuário
        return $user;
    }
    return false;
}
?>
