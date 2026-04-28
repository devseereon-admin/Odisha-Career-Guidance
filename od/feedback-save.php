<?php
// Include DB connection
include 'admin/dbconn.php';

// Load PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// ----------------------------
// Create Upload Directory
// ----------------------------
$uploadDir = "upload/feedback";
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// ----------------------------
// Create Table if NOT Exists
// ----------------------------
$tableName = "feedback";
$createTable = "
CREATE TABLE IF NOT EXISTS $tableName (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(30) DEFAULT NULL,
    last_name VARCHAR(30) DEFAULT NULL,
    email VARCHAR(200) DEFAULT NULL,
    Phonenumber VARCHAR(30) DEFAULT NULL,
    message TEXT DEFAULT NULL,
    file_name VARCHAR(255) DEFAULT NULL,
    submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$conn->query($createTable);

// ----------------------------
// Process Form Submission
// ----------------------------
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Safe inputs & replace empty values
    $firstName   = !empty(trim($_POST['fname'])) ? $conn->real_escape_string($_POST['fname']) : "Not Provided";
    $lastName    = !empty(trim($_POST['lname'])) ? $conn->real_escape_string($_POST['lname']) : "Not Provided";
    $email       = !empty(trim($_POST['email'])) ? $conn->real_escape_string($_POST['email']) : "Not Provided";
    $Phonenumber = !empty(trim($_POST['Phonenumber'])) ? $conn->real_escape_string($_POST['Phonenumber']) : "Not Provided";
    $messageText = !empty(trim($_POST['text'])) ? $conn->real_escape_string($_POST['text']) : "Not Provided";

    // ----------------------------
    // File Upload Handling
    // ----------------------------
    $fileName = "No file uploaded";
    $targetFile = "";

    if (!empty($_FILES["file"]["name"])) {

        $fileName = uniqid() . "_" . basename($_FILES["file"]["name"]);
        $targetFile = $uploadDir . "/" . $fileName;
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile);
    }

    // ----------------------------
    // Insert Data into Database
    // ----------------------------
    $sql = "INSERT INTO $tableName (first_name, last_name, email, Phonenumber, message, file_name)
            VALUES ('$firstName', '$lastName', '$email', '$Phonenumber', '$messageText', '$fileName')";
    $conn->query($sql);

    // ----------------------------
    // SEND EMAIL USING PHPMailer
    // ----------------------------
    $mail = new PHPMailer(true);

    try {
        // SMTP Settings
        $mail->isSMTP();
        $mail->Host       = 'odishacareerguidance.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'mocareerinfo@odishacareerguidance.com';
        $mail->Password   = 'yK(X2k8xs(SU'; // Your SMTP password
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;

        // UTF-8 Support
        $mail->CharSet = "UTF-8";

        // Sender & Receiver
        $mail->setFrom('mocareerinfo@odishacareerguidance.com', 'Odisha Career Guidance');
        $mail->addAddress('odishacareerguidance@gmail.com');

        // Attachment (if exists)
        if ($targetFile != "") {
            $mail->addAttachment($targetFile, $fileName);
        }

        // Email Subject
        $mail->Subject = "📝 New Feedback Received [OD] | $firstName";

        // ----------------------------
        // Attractive HTML Email Body
        // ----------------------------
        $mail->isHTML(true);
        $mail->Body = "
        <table width='100%' style='background:#f2f2f7;padding:30px;font-family:Arial,sans-serif;'>
            <tr>
                <td align='center'>
                    <table width='600' style='background:white;padding:25px;border-radius:16px;
                        box-shadow:0 4px 12px rgba(0,0,0,0.1);'>
        
                        <tr>
                            <td align='center' style='padding-bottom:15px;'>
                                <div style='font-size:40px;'>💬</div>
                                <h2 style='margin:10px 0;color:#222;font-size:26px;'>ନୂତନ ଫିଡ୍ବ୍ୟାକ୍ ରିସିଭ୍ ହେଲା</h2>
                                <p style='color:#555;margin:0;font-size:16px;'>ଆପଣଙ୍କ ଓେବସାଇଟ୍ ଠାରୁ ଏକ ନୂତନ ମତାମତ ପ୍ରେରଣ ହୋଇଛି</p>
                            </td>
                        </tr>
        
                        <tr>
                            <td style='padding:20px;background:#fafafa;border-radius:12px;
                                border:1px solid #eee;'>
        
                                <p style='font-size:16px; margin-bottom:10px;'>
                                    <strong>👤 ନାମ:</strong> $firstName $lastName
                                </p>
        
                                <p style='font-size:16px; margin-bottom:10px;'>
                                    <strong>📧 ଇମେଲ୍:</strong> $email
                                </p>
        
                                <p style='font-size:16px; margin-bottom:10px;'>
                                    <strong>📱 ଫୋନ୍ ନମ୍ବର:</strong> $Phonenumber
                                </p>
        
                                <p style='font-size:16px;margin:18px 0 8px;'><strong>📝 ମତାମତ:</strong></p>
        
                                <div style='background:white;padding:15px;border-radius:10px;
                                    border:1px solid #ddd;font-size:15px;line-height:1.6;
                                    color:#333;'>
                                    $messageText
                                </div>
        
                                <p style='font-size:16px;margin-top:15px;'>
                                    <strong>📎 ଅଟାଚ୍ମେଣ୍ଟ:</strong> $fileName
                                </p>
        
                            </td>
                        </tr>
        
                        <tr>
                            <td align='center' style='padding-top:20px;color:#777;font-size:13px;'>
                                © Odisha Career Guidance – Automated Feedback Notification
                            </td>
                        </tr>
        
                    </table>
                </td>
            </tr>
        </table>
        ";


        // Send mail
        $mail->send();

        echo "<script>alert('ଆପଣଙ୍କର ମତାମତ ସଫଳଭାବେ ପ୍ରେରଣ ହୋଇଛି!'); window.location='feedback.php';</script>";
        exit();

    } catch (Exception $e) {
        echo "<script>alert('Mail Error: {$mail->ErrorInfo}'); window.location='feedback.php';</script>";
        exit();
    }

}

?>