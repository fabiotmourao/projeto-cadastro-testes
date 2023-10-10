<?php
session_start();
require_once('./db_connection/connection.php');

if (!isset($_SESSION['supervisor'])) {
    header('Location: login.php');
    exit();
}

$items_per_page = 10;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $items_per_page;

$sql = "SELECT * FROM users LIMIT $items_per_page OFFSET $offset";
$result = $conn->query($sql);

$users = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}

$total_users_sql = "SELECT COUNT(*) as total FROM users";
$total_users_result = $conn->query($total_users_sql);
$total_users_row = $total_users_result->fetch_assoc();
$total_users = $total_users_row['total'];

$total_pages = ceil($total_users / $items_per_page);

$previous_page = $page - 1;

$next_page = $page + 1;

$previous_disabled = $previous_page < 1 ? 'disabled' : '';

$next_disabled = $next_page > $total_pages ? 'disabled' : '';
?>