<?php
session_start();

require_once('./db_connection/connection.php');

$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    validateForm($errors);

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $telephone = $_POST['telephone'];
    $office = $_POST['office'];
    $cep = $_POST['cep'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    if (empty($errors)) {

        $url = "https://viacep.com.br/ws/{$cep}/json/";
        $response = file_get_contents($url);

        if ($response) {
            $data = json_decode($response);

            if (!$data->erro) {
                $logradouro = $data->logradouro;
                $bairro = $data->bairro;
                $cidade = $data->localidade;
                $estado = $data->uf;
                $cep = $data->cep;

                $sql = "INSERT INTO users (name, email, password, telephone, office, cep, logradouro, bairro, cidade, estado)
                VALUES ('$nome', '$email', '$hashed_password', '$telephone', '$office', '$cep', '$logradouro', '$bairro', '$cidade', '$estado')";

                if ($conn->query($sql) === TRUE) {
                    $_SESSION['success_message'] = "Usuário registrado com sucesso!";
                    header("Location: index.php");
                    exit();
                } else {
                    $errors[] = "Erro ao registrar usuário: " . $conn->error;
                }
            }
        }
    }
}

$conn->close();

if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    header("Location: index.php");
    exit();
}

function validateForm(&$errors) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $telephone = $_POST['telephone'];
    $office = $_POST['office'];
    $cep = $_POST['cep'];

    if (empty($cep)) {
        $errors[] = "O campo CEP é obrigatório.";
    } elseif (!preg_match('/^\d{8}$/', $cep)) {
        $errors[] = "O campo CEP deve conter 8 dígitos numéricos.";
    }

    if (empty($nome)) {
        $errors[] = "O campo Nome é obrigatório.";
    }

    if (empty($email)) {
        $errors[] = "O campo E-mail é obrigatório.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "O campo E-mail é inválido.";
    }

    if (empty($password)) {
        $errors[] = "O campo Senha é obrigatório.";
    }

    if (!empty($telephone) && !preg_match('/^\d{11}$/', $telephone)) {
        $errors[] = "O campo Telefone deve conter 11 dígitos numéricos.";
    }

    if (!empty($office) && strlen($office) > 255) {
        $errors[] = "O campo Cargo/Função deve conter no máximo 255 caracteres.";
    }

    $servername = "localhost";
    $username = "root";
    $password = "root@ti";
    $dbname = "db_oficina";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    $email_check_sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($email_check_sql);

    if ($result->num_rows > 0) {
        $errors[] = "Este e-mail já está em uso por outro usuário.";
    }

    $conn->close();
}
?>