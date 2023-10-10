<?php

    $servername = "localhost";
    $username = "root";
    $password = "root@ti";
    $dbname = "db_oficina";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

?>