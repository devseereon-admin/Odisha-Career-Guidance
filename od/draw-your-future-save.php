<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection
include "admin/dbconn.php";

// PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS future_images (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    career VARCHAR(255) DEFAULT NULL,
    image_path VARCHAR(255) DEFAULT NULL,
    status ENUM('0','1') DEFAULT '1',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
$conn->query($sql);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Receive fields (not mandatory)
    $career = isset($_POST["carrer_pur_future"]) ? htmlspecialchars(strip_tags($_POST["carrer_pur_future"])) : "";

    // Image upload handling
    $uploadedImagePath = "";
    $targetDir = "draw-your-future-img/";

    // Create directory if not exists
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    if (!empty($_FILES["img"]["name"])) {

        $imageName = $_FILES["img"]["name"];
        $tmpName   = $_FILES["img"]["tmp_name"];

        $ext = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
        $allowed = ["jpg", "jpeg", "png", "gif"];

        if (!in_array($ext, $allowed)) {
            alertAndReturn("Only JPG, JPEG, PNG, GIF files allowed.");
        }

        if ($_FILES["img"]["size"] > 5000000) {
            alertAndReturn("Image too large. Maximum 5MB allowed.");
        }

        $uniqueName = uniqid("future_", true) . "." . $ext;
        $uploadedImagePath = $targetDir . $uniqueName;

        if (!move_uploaded_file($tmpName, $uploadedImagePath)) {
            alertAndReturn("Error uploading image.");
        }
    }

    // Insert data into DB
    $stmt = $conn->prepare("INSERT INTO future_images (career, image_path) VALUES (?, ?)");
    $stmt->bind_param("ss", $career, $uploadedImagePath);
    $stmt->execute();

    // Insert career into another table
    $page_name = "Draw Your Future";
    $conn->query("INSERT INTO career_save_details (career_name, page_from) VALUES ('$career', '$page_name')");

    // ---------------------------
    // 📧 EMAIL USING PHPMailer
    // ---------------------------

    $mail = new PHPMailer(true);
    
    try {
        $mail->isSMTP();
        $mail->Host       = 'odishacareerguidance.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'mocareerinfo@odishacareerguidance.com';
        $mail->Password   = 'yK(X2k8xs(SU';  // your SMTP password
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;

        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';

        $mail->setFrom('mocareerinfo@odishacareerguidance.com', 'Odisha Career Guidance');
        $mail->addAddress('odishacareerguidance@gmail.com');

        // Attach image if uploaded
        if (!empty($uploadedImagePath)) {
            $mail->addAttachment($uploadedImagePath);
        }

        // Subject
        $mail->Subject = "🎨 New Future Drawing Submission [OD]";

        // Body
        $mail->isHTML(true);
        $mail->Body = "
            <div style='font-family:Arial;padding:20px;background:#f2f2f2;'>
                <div style='max-width:600px;margin:auto;background:white;padding:20px;border-radius:10px;'>
                    <h2 style='text-align:center;color:#333;'>🎨 New Future Drawing Submission</h2>
                    <p><strong>Career:</strong> " . ($career ?: 'Not provided') . "</p>
                    <p><strong>Image:</strong> " . (!empty($uploadedImagePath) ? basename($uploadedImagePath) : 'No image uploaded') . "</p>
                    <p>Submitted from <strong>Draw Your Future</strong> page.</p>
                </div>
            </div>
        ";

        $mail->send();

    } catch (Exception $e) {
        alertAndReturn("Email sending failed: " . $mail->ErrorInfo);
    }

    alertAndReturn("ଧନ୍ୟବାଦ! ଆପଣଙ୍କର ଭବିଷ୍ୟତ ଚିତ୍ର ଜମା ହୋଇସାରିଛି 🎨 ।");
}

$conn->close();

// Reusable redirect function
function alertAndReturn($msg) {
    echo "<script>alert('$msg'); window.location.href='draw-your-future.php';</script>";
    exit();
}

?>