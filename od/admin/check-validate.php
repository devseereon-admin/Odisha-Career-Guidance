<?php
session_start();
include('dbconn.php');

if (!isset($_SESSION['admin_username']) || empty($_SESSION['admin_username'])) {
    header('Location: index.php');
    exit();
}

$username = $_SESSION['admin_username'];
$check_user = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");

if (mysqli_num_rows($check_user) < 1) {
    session_destroy();
    header('Location: index.php');
    exit();
}
?>