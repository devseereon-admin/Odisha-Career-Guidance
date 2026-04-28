<?php
session_start();
include('dbconn.php');

// Get the username from the session
$user_name = $_SESSION['admin_username'];

// Ensure the user is logged in
if (!$user_name) {
    session_destroy();
    header('Location: index.php');
    exit();
}
$stm_sql = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$user_name'");

if ($stm_sql->num_rows < 1) {
    session_destroy();
    header('Location: index.php');
    exit();
}
