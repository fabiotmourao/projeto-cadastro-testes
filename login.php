<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login do Supervisor</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="./css/style.css">
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JavaScript (bootstrap.min.js) -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</head>

<body>
    <section class="mt-5">

        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" class="img-fluid" alt="Sample image">
                </div>

                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-2">
                    <h2 class="row d-flex justify-content-center display-4">Faça seu Login</h2>

                    <form action="auth.php" method="post">
                        <div class="form-outline mb-4">
                            <label class="form-label" for="email">E-mail</label>
                            <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Digite seu e-mail">
                            <?php
                                if (isset($_SESSION['email_error'])) {
                                    echo '<span class="text-danger">' . $_SESSION['email_error'] . '</span>';
                                    unset($_SESSION['email_error']);
                                }
                            ?>
                        </div>

                        <div class="form-outline mb-3">
                            <label class="form-label" for="password">Senha</label>
                            <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Digite sua senha">
                            <?php
                                if (isset($_SESSION['password_error'])) {
                                    echo '<span class="text-danger">' . $_SESSION['password_error'] . '</span>';
                                    unset($_SESSION['password_error']);
                                }
                            ?>
                        </div>

                        <button type="submit" class="btn btn-primary  btn-lg btn-block mb-4">Sign in</button>
                    </form>

                    <?php
                        session_start();

                        if (isset($_SESSION['login_error'])) {
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                            echo $_SESSION['login_error'];
                            echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                            echo '<span aria-hidden="true">&times;</span>';
                            echo '</button>';
                            echo '</div>';
                            unset($_SESSION['login_error']); 
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>
</body>

</html>