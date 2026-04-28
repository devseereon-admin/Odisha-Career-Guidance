<?php
session_start();
include('dbconn.php');

function getUserIP() {
    // Get the IP address of the user
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

if (isset($_SESSION['admin_username'])) {
    $username = $_SESSION['admin_username'];
    $user_ip = getUserIP();

    // Reset failed attempts and locked_until in the admin table
    $reset_query = "UPDATE admin SET failed_attempts = 0, last_attempt = NULL, locked_until = NULL WHERE username = '$username'";
    mysqli_query($conn, $reset_query);

    // Delete the blocked IP from the blocked_ips table
    $delete_ip_query = "DELETE FROM blocked_ips WHERE ip_address = '$user_ip'";
    mysqli_query($conn, $delete_ip_query);

    // Clear the session
    $_SESSION = array();
    session_destroy();

    // Redirect to login page
    header('Location: index.php');
    exit();
} else {
    // If no user is logged in, redirect to login page
    header('Location: index.php');
    exit();
}
?>
