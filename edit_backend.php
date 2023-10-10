<?php
    session_start();
    require_once('./db_connection/connection.php');

    if (!isset($_GET['id']) || empty($_GET['id'])) {
        $_SESSION['error_message'] = "ID de usuário inválido.";
        header('Location: dashboard.php');
        exit();
    }

    $id = $_GET['id'];

    $sql = "SELECT * FROM users WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows === 0) {
        $_SESSION['error_message'] = "Usuário não encontrado.";
        header('Location: dashboard.php');
        exit();
    }

    $user = $result->fetch_assoc();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telephone = $_POST['telephone'];
        $office = $_POST['office'];

        $update_sql = "UPDATE users SET name = '$nome', email = '$email', telephone = '$telephone', office = '$office' WHERE id = $id";

        if ($conn->query($update_sql) === TRUE) {
            $_SESSION['success_message'] = "Usuário atualizado com sucesso!";
            header('Location: dashboard.php');
            exit();
        } else {
            $_SESSION['error_message'] = "Erro ao atualizar usuário: " . $conn->error;
        }
    }

$conn->close();
?>
