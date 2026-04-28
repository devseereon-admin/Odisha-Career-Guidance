<?php

$servername = "localhost";

$username = "root";

$password = "";

$dbname = "ama_career_odia";

$conn = new mysqli($servername, $username, $password, $dbname);



// Change character set to utf8

mysqli_set_charset($conn,"utf8");



if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

}

?>