<?php
session_start();
require_once('./db_connection/connection.php');

$email = $_POST['email'];
$password = $_POST['password'];

if (empty($email) || empty($password)) {
    $_SESSION['login_error'] = 'Por favor, preencha todos os campos.';
    header('Location: login.php');
    exit();
}

$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $hashed_password = $row['password'];

    if (password_verify($password, $hashed_password)) {
        if ($row['supervisor'] == 1) {
            $_SESSION['supervisor'] = true;
            header('Location: dashboard.php');
            exit();
        } else {
            $_SESSION['login_error'] = 'Você não tem permissão para acessar o painel de controle do supervisor.';
            header('Location: login.php');
            exit();
        }
    } else {
        $_SESSION['login_error'] = 'Senha incorreta.';
        header('Location: login.php');
        exit();
    }
} else {
    $_SESSION['login_error'] = 'Usuário não encontrado.';
    header('Location: login.php');
    exit();
}
?>
