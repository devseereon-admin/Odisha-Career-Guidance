<?php
include "../admin/dbconn.php";

$device_id   = $_POST['device_id'] ?? '';
$parent_page = $_POST['parent_page'] ?? '';
$page_url    = $_POST['page_url'] ?? '';
$page_title  = $_POST['page_title'] ?? '';
$page_flow   = $_POST['page_flow'] ?? '';

$ip = $_SERVER['REMOTE_ADDR'];

// simple validation
if(!$device_id || !$page_url){
    echo "Missing data";
    exit;
}

mysqli_query($conn, "INSERT INTO page_clicks(
    device_id,
    parent_page,
    page_url,
    page_title,
    page_flow,
    ip_address
) VALUES(
    '$device_id',
    '$parent_page',
    '$page_url',
    '$page_title',
    '$page_flow',
    '$ip'
)");

echo "Inserted";
?>