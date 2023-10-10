<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuários</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="/css/style.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JavaScript (bootstrap.min.js) -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</head>
<body>
    <div class="container mt-5">
        <h2>Registre-se</h2>

        <div id="error-messages">
            <?php
            session_start();
            
            if (!empty($_SESSION['errors'])) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                foreach ($_SESSION['errors'] as $error) {
                    echo $error . '<br>';
                }
                echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                echo '<span aria-hidden="true">&times;</span>';
                echo '</button>';
                echo '</div>';
                unset($_SESSION['error_message']); 
            } elseif (isset($_SESSION['success_message'])) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                echo $_SESSION['success_message'];
                echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                echo '<span aria-hidden="true">&times;</span>';
                echo '</button>';
                echo '</div>';
                unset($_SESSION['success_message']); 
            }
            ?>
        </div>

        <form action="register.php" method="post">
            <div class="form-group">
                <label for="nome">Nome Completo</label>
                <input type="text" class="form-control <?php if (isset($errors['nome'])) echo 'is-invalid'; ?>" id="nome" name="nome" placeholder="Digite aqui seu nome completo" >
                <?php
                if (isset($errors['nome'])) {
                    echo '<span class="invalid-feedback">' . $errors['nome'] . '</span>';
                }
                ?>
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control <?php if (isset($errors['email'])) echo 'is-invalid'; ?>" id="email" name="email" placeholder="Digite aqui seu e-mail">
                <?php
                if (isset($errors['email'])) {
                    echo '<span class="invalid-feedback">' . $errors['email'] . '</span>';
                }
                ?>
            </div>
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" class="form-control <?php if (isset($errors['password'])) echo 'is-invalid'; ?>" id="password" name="password" placeholder="Digite aqui sua senha">
                <?php
                if (isset($errors['password'])) {
                    echo '<span class="invalid-feedback">' . $errors['password'] . '</span>';
                }
                ?>
            </div>
            <div class="form-group">
                <label for="telephone">Telefone</label>
                <input type="text" class="form-control <?php if (isset($errors['telephone'])) echo 'is-invalid'; ?>" id="telephone" name="telephone" placeholder="Digite aqui seu telefone">
                <?php
                if (isset($errors['telephone'])) {
                    echo '<span class="invalid-feedback">' . $errors['telephone'] . '</span>';
                }
                ?>
            </div>
            <div class="form-group">
                <label for="office">Cargo/Função</label>
                <input type="text" class="form-control <?php if (isset($errors['office'])) echo 'is-invalid'; ?>" id="office" name="office" placeholder="Digite aqui seu Cargo/Função">
                <?php
                if (isset($errors['office'])) {
                    echo '<span class="invalid-feedback">' . $errors['office'] . '</span>';
                }
                ?>
            </div>
            <button type="submit" class="btn btn-success">Registrar</button>
        </form>
    </div>
</body>
</html>
