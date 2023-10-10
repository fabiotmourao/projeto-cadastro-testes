<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Controle do Supervisor</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JavaScript (bootstrap.min.js) -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>
    <header class="pb-5 pl-4 pr-4 bg-light custom-header pt-3 ">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Painel de Controle do Supervisor</h2>

            <a href="logout.php" class="btn btn-secondary custom-btn-width">
                <i class="fas fa-sign-out-alt"></i> Sair
            </a>
        </div>
    </header>

    <div class="container mt-5">
        <h2 class="mb-5">Lista para Controle</h2>

        <?php
        session_start();

        if (isset($_SESSION['success_message'])) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
            echo $_SESSION['success_message'];
            echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
            echo '<span aria-hidden="true">&times;</span>';
            echo '</button>';
            echo '</div>';
            unset($_SESSION['success_message']); 
        }

        if (isset($_SESSION['error_message'])) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
            echo $_SESSION['error_message'];
            echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
            echo '<span aria-hidden="true">&times;</span>';
            echo '</button>';
            echo '</div>';
            unset($_SESSION['error_message']); 
        }
        ?>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Cargo/Função</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once('dashboard_backend.php');

                foreach ($users as $user) {
                    echo "<tr>";
                    echo "<td>" . $user['id'] . "</td>";
                    echo "<td>" . $user['name'] . "</td>";
                    echo "<td>" . $user['email'] . "</td>";
                    echo "<td>" . $user['telephone'] . "</td>";
                    echo "<td>" . $user['office'] . "</td>";
                    echo "<td>";
                    echo '<div class="btn-group" role="group">';
                    echo '<a href="edit.php?id=' . $user['id'] . '" class="btn btn-primary btn-sm m-1 ">Editar</a>';
                    echo ' <button class="btn btn-danger btn-sm m-1" onclick="confirmDelete(' . $user['id'] . ')">Excluir</button>';
                    echo '</div>';
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end">
                <li class="page-item <?php echo $previous_disabled; ?>">
                    <a class="page-link" href="?page=<?php echo $previous_page; ?>" tabindex="-1">Previous</a>
                </li>
                <?php
                for ($page = 1; $page <= $total_pages; $page++) {
                    echo '<li class="page-item' . ($page == $current_page ? ' active' : '') . '">';
                    echo '<a class="page-link" href="?page=' . $page . '">' . $page . '</a>';
                    echo '</li>';
                }
                ?>
                <li class="page-item <?php echo $next_disabled; ?>">
                    <a class="page-link" href="?page=<?php echo $next_page; ?>">Next</a>
                </li>
            </ul>
        </nav>
    </div>

    <script>
        function confirmDelete(userId) {
            if (confirm("Tem certeza de que deseja excluir este usuário?")) {
                window.location.href = "delete.php?id=" + userId;
            }
        }
    </script>
</body>
</html>