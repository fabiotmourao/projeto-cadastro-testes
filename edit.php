<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">

</head>

<body>
    <div class="container mt-5">
        <a href="dashboard.php" class="btn btn-secondary float-right">Voltar</a>
        <h2>Editar Usuário</h2>

        <form method="post" action="edit_backend.php?id=<?php echo $_GET['id']; ?>">
            <?php
            require_once('./db_connection/connection.php');

            if (!isset($_GET['id']) || empty($_GET['id'])) {
                echo '<div class="alert alert-danger">ID de usuário inválido.</div>';
            } else {
                $id = $_GET['id'];

                $sql = "SELECT * FROM users WHERE id = $id";
                $result = $conn->query($sql);

                if ($result->num_rows === 0) {
                    echo '<div class="alert alert-danger">Usuário não encontrado.</div>';
                } else {
                    $user = $result->fetch_assoc();

            ?>
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $user['name']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="telephone">Telefone:</label>
                        <input type="text" class="form-control" id="telephone" name="telephone" value="<?php echo $user['telephone']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="office">Cargo/Função:</label>
                        <input type="text" class="form-control" id="office" name="office" value="<?php echo $user['office']; ?>">
                    </div>
                    <button type="submit" class="btn btn-success float-right  custom-btn-width">Salvar</button>
            <?php
                }
            }
            ?>
        </form>
    </div>
</body>

</html>