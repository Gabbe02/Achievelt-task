<?php
include('../includes/db.php');
include('../includes/functions.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verificar se o email já está registrado
    $query = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($existingUser) {
        echo "Email já registrado!";
    } else {
        // Registrar o novo usuário
        if (registerUser($username, $email, $password)) {
            echo "Usuário registrado com sucesso!";
        } else {
            echo "Erro ao registrar usuário!";
        }
    }
}
?>

