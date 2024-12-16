<?php
include('../includes/db.php');
include('../includes/functions.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verificar se o usuário existe e a senha é válida
    $user = loginUser($email, $password);

    if ($user) {
        // Iniciar sessão e armazenar os dados do usuário
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header('Location: Task.html'); // Redireciona para a página principal após login
    } else {
        echo "Email ou senha incorretos!";
    }
}
?>
