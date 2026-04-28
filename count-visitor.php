<?php

session_start(); // Start the session



include "admin/dbconn.php";



// Check if the user has already been counted in this session

if(!isset($_SESSION['user_counted'])) {

    // Increment the count in the database

    $sql = "UPDATE visitor_count SET count = count + 1 WHERE id = 1";

    $conn->query($sql);



    // Mark the user as counted in this session

    $_SESSION['user_counted'] = true;

}



// Retrieve the updated count

$sql = "SELECT count FROM visitor_count WHERE id = 1";

$result = $conn->query($sql);

$row = $result->fetch_assoc();



echo $row['count'];



$conn->close();

?>

