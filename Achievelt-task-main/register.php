<?php
// Arquivo de banco de dados SQLite
$db_file = 'achievelt_task.db';

try {
    // Conexão com SQLite
    $pdo = new PDO("sqlite:$db_file");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Capturar dados do formulário
    $email = $_POST['email'];
    $username = $_POST['user'];
    $password = password_hash($_POST['pass'], PASSWORD_DEFAULT);

    // Validação simples para evitar conflitos
    if ($_POST['pass'] !== $_POST['passconfirm']) {
        die("As senhas não coincidem. Tente novamente.");
    }

    // Inserir usuário no banco de dados
    $query = "INSERT INTO users (email, username, password) VALUES (:email, :username, :password)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
        echo "Usuário registrado com sucesso!";
        header("Location: login.html"); // Redirecionar para login
        exit();
    } else {
        echo "Erro ao registrar usuário.";
    }
} catch (PDOException $e) {
    die("Erro: " . $e->getMessage());
}
?>