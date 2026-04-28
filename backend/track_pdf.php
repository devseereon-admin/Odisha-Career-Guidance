<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "../admin/dbconn.php";

// ✅ Check DB connection
if (!$conn) {
    die("DB Connection Failed: " . mysqli_connect_error());
}

// ✅ Get POST values safely
$device_id    = $_POST['device_id'] ?? '';
$pdf_name     = $_POST['pdf_name'] ?? '';
$pdf_category = $_POST['pdf_category'] ?? '';
$pdf_file     = $_POST['pdf_file'] ?? '';
$pdf_path     = $_POST['pdf_path'] ?? '';
$today        = date('Y-m-d');

// ✅ Get IP
$ip = $_SERVER['REMOTE_ADDR'];

// ✅ Validate required fields
if (!$device_id || !$pdf_file) {
    echo "Missing Data";
    exit;
}

// ✅ Prevent duplicate (same device + pdf + date)
$checkQuery = "SELECT id FROM pdf_clicks 
               WHERE device_id='$device_id' 
               AND pdf_file='$pdf_file' 
               AND click_date='$today'";

$check = mysqli_query($conn, $checkQuery);

if (!$check) {
    echo "Check Query Error: " . mysqli_error($conn);
    exit;
}

if (mysqli_num_rows($check) == 0) {

    $insertQuery = "INSERT INTO pdf_clicks(
        device_id, ip_address, pdf_name, pdf_category, pdf_file, pdf_path, click_date
    ) VALUES(
        '$device_id', '$ip', '$pdf_name', '$pdf_category', '$pdf_file', '$pdf_path', '$today'
    )";

    $result = mysqli_query($conn, $insertQuery);

    if ($result) {
        echo "Inserted";
    } else {
        echo "Insert Error: " . mysqli_error($conn);
    }

} else {
    echo "Already Counted";
}
?>