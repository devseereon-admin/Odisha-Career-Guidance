<?php

function saveAuditLog($conn, $module, $action, $details)
{
    $username = $_SESSION['admin_username'] ?? 'Unknown';

    $ip = $_SERVER['REMOTE_ADDR'];

    $stmt = $conn->prepare("
        INSERT INTO audit_logs
        (
            username,
            module_name,
            action_type,
            activity_details,
            ip_address
        )
        VALUES (?, ?, ?, ?, ?)
    ");

    $stmt->bind_param(
        "sssss",
        $username,
        $module,
        $action,
        $details,
        $ip
    );

    $stmt->execute();
}
?>