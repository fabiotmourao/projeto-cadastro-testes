<?php
session_start();

require_once('./db_connection/connection.php');

// Verifique se o ID do usuário foi fornecido na URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('Location: dashboard.php');
    exit();
}

// Recupere o ID do usuário da URL
$id = $_GET['id'];

// Lógica para recuperar os detalhes do usuário com base no ID (consulte o banco de dados)
$sql = "SELECT * FROM users WHERE id = $id";
$result = $conn->query($sql);

// Verifique se o usuário existe
if ($result->num_rows === 0) {
    $_SESSION['error_message'] = "Usuário não encontrado.";
    header('Location: dashboard.php');
    exit();
}

// Lógica para excluir o usuário do banco de dados
$delete_sql = "DELETE FROM users WHERE id = $id";

if ($conn->query($delete_sql) === TRUE) {
    $_SESSION['success_message'] = "Usuário excluído com sucesso!";
} else {
    $_SESSION['error_message'] = "Erro ao excluir usuário: " . $conn->error;
}

$conn->close();

header('Location: dashboard.php');
exit();
?>
