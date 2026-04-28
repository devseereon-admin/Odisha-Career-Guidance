<?php
require_once('check-validate.php');
include "dbconn.php"; // Including database connection file

if (isset($_GET['id']) && isset($_GET['table'])) {
    $id = intval($_GET['id']);
    $table = $_GET['table'];

    // Prepare the SQL statement
    $stmt = $conn->prepare("DELETE FROM `$table` WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param('i', $id);

        // Execute the statement
        if ($stmt->execute()) {
            // Redirect to the provided page after successful deletion
            if (isset($_GET['page'])) {
                 echo "<script>
                    alert('Record deleted successfully.');
                    window.location.href = '" . htmlspecialchars($_GET['page']) . "';
                </script>";
                exit();
            } else {
                echo "Record deleted successfully.";
            }
        } else {
            header("Location: dashboard.php?error=execution");
            exit();
        }

        $stmt->close();
    } else {
        header("Location: dashboard.php?error=preparation");
        exit();
    }
} else {
    header("Location: dashboard.php?error=invalid_request");
    exit();
}

$conn->close();
?>
