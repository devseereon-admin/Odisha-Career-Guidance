<?php
$conn = new mysqli("localhost", "root", "", "ama_career");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['option'])){

    $option = $conn->real_escape_string($_POST['option']);

    $check = $conn->query("SELECT * FROM chatbot_tracking WHERE option_name='$option'");

    if ($check->num_rows > 0) {
        $conn->query("UPDATE chatbot_tracking SET count = count + 1 WHERE option_name='$option'");
    } else {
        $conn->query("INSERT INTO chatbot_tracking (option_name, count) VALUES ('$option', 1)");
    }
}

$conn->close();
?>