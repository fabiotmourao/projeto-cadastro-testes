<?php

    $servername = "localhost";
    $username = "seu usuario";
    $password = "sua senha";
    $dbname = "sua base de dados";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

?>
