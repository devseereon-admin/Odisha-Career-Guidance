<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

include 'admin/dbconn.php';

// ----------------------
// FILE UPLOAD
// ----------------------
$uploadDir = "upload/feedback";
if (!file_exists($uploadDir)) mkdir($uploadDir, 0777, true);

$tableName = "feedback";
$check = $conn->query("SHOW TABLES LIKE '$tableName'");
if ($check->num_rows == 0) {
    $conn->query("
        CREATE TABLE $tableName (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            first_name VARCHAR(50),
            last_name VARCHAR(50),
            email VARCHAR(100),
            Phonenumber VARCHAR(20),
            message TEXT,
            file_name VARCHAR(255),
            submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )
    ");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstName = $conn->real_escape_string($_POST['fname']);
    $lastName = $conn->real_escape_string($_POST['lname']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['Phonenumber']);
    $messageText = trim($conn->real_escape_string($_POST['text']));

    // -----------------------------------
    // FILE UPLOAD (optional)
    // -----------------------------------
    $randomFileName = "";
    if (!empty($_FILES["file"]["name"])) {
        $randomFileName = uniqid() . "_" . basename($_FILES["file"]["name"]);
        $targetFile = "$uploadDir/$randomFileName";
        move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile);
    }

    // Save into DB
    $conn->query("
        INSERT INTO $tableName (first_name, last_name, email, Phonenumber, message, file_name)
        VALUES ('$firstName', '$lastName', '$email', '$phone', '$messageText', '$randomFileName')
    ");

    // -------------------------------
    // PHPMailer CONFIGURATION
    // -------------------------------
    $mail = new PHPMailer(true);

    try {

        $mail->isSMTP();
        $mail->Host = "odishacareerguidance.com";
        $mail->SMTPAuth = true;
        $mail->Username = "mocareerinfo@odishacareerguidance.com";
        $mail->Password = "yK(X2k8xs(SU";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // SSL
        $mail->Port = 465;
        
        $mail->CharSet = 'UTF-8';     // IMPORTANT
        $mail->Encoding = 'base64';   // IMPORTANT

        // Sender
        $mail->setFrom("mocareerinfo@odishacareerguidance.com", "Website Feedback");

        // Receiver
        $mail->addAddress("odishacareerguidance@gmail.com");

        // Reply-to only if user email is provided
        if (!empty($email)) {
            $mail->addReplyTo($email, "$firstName $lastName");
        }

        // Attachment only if uploaded
        if (!empty($randomFileName) && file_exists($targetFile)) {
            $mail->addAttachment($targetFile);
        }

        // Email subject
        $mail->Subject = "📩 New Feedback Received [ENG]| $firstName ";


        // Email body
        $mail->isHTML(true);
        $mail->Body = "
        <table width='100%' cellpadding='0' cellspacing='0' border='0' 
               style='background:#e0e5ec;padding:40px 0;font-family:Arial,sans-serif;'>
            <tr>
                <td align='center'>
        
                    <!-- Centered Container -->
                    <table width='90%' cellpadding='0' cellspacing='0' border='0' 
                           style='max-width:600px;background:#ffffff;border-radius:20px;
                                  padding:30px; box-shadow:0 4px 15px rgba(0,0,0,0.15);'>
        
                        <tr>
                            <td align='center'>
                                <h2 style='color:#2d3436;font-size:28px;margin:0 0 20px 0;'>
                                    ⭐ New Feedback Submission
                                </h2>
                            </td>
                        </tr>
        
                        <tr>
                            <td>
                                <div style='background:#ffffff;padding:20px;border-radius:15px;
                                     border:1px solid #eee;'>
        
                                    <p style='font-size:16px;margin:0;'>
                                        <strong>👤 Name:</strong> " . ($firstName." ".$lastName ?: "Not provided") . "<br><br>
                                        <strong>📧 Email:</strong> " . ($email ?: "Not provided") . "<br><br>
                                        <strong>📱 Phone:</strong> " . ($phone ?: "Not provided") . "
                                    </p>
        
                                    <hr style='border:0;border-top:1px solid #ddd;margin:20px 0;'>
        
                                    <p style='font-size:16px;margin:0 0 10px 0;'><strong>💬 Message:</strong></p>
        
                                    <div style='background:#f7f9fc;padding:15px;border-radius:12px;
                                        font-size:15px;line-height:1.6;color:#444;border:1px solid #e3e7ee;'>
                                        $messageText
                                    </div>
        
                                    <br>
                                    <p style='font-size:15px;color:#666;margin:0;'>
                                        📎 Attachment: " . ($randomFileName ?: "No file uploaded") . "
                                    </p>
        
                                </div>
                            </td>
                        </tr>
        
                    </table>
        
                </td>
            </tr>
        </table>
        ";


        $mail->send();
        $alertMessage = "Feedback sent successfully!";

    } catch (Exception $e) {
        $alertMessage = "Email failed: " . $mail->ErrorInfo;
    }

    echo "<script>alert('$alertMessage'); window.location='feedback.php';</script>";
}
?>
