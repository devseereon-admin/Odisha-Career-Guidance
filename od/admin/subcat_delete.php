<?php
ob_start();          // ✅ start output buffering
include "dbconn.php";

if(isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    // Soft delete: set status = 0
    $sql = "UPDATE subcatagory SET status = '0' WHERE id = '$id'";
    mysqli_query($conn, $sql);
}

// Redirect back to listing page
header("Location: croption.php");
exit;
?>
