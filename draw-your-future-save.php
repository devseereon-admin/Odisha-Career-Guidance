<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Database connection
include "admin/dbconn.php";

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS future_images (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    career VARCHAR(255) NOT NULL,
    image_path VARCHAR(255) NOT NULL,
    status ENUM('0', '1') DEFAULT '1',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
$conn->query($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $career     = htmlspecialchars(strip_tags($_POST["carrer_pur_future"]));
    $image_name = $_FILES["img"]["name"];
    $image_temp = $_FILES["img"]["tmp_name"];
    $target_dir = "draw-your-future-img/";

    // RANDOM FILE NAME
    $random_digits = rand(11111111, 99999999);
    $target_file = $target_dir . $random_digits . "_" . basename($image_name);

    if (move_uploaded_file($image_temp, $target_file)) {

        // Insert into DB
        $sql = "INSERT INTO future_images (id, career, image_path) 
                VALUES ('$random_digits', '$career', '$target_file')";

        if ($conn->query($sql) === TRUE) {

            // Save in career log table
            $page_name = "Draw your future";
            mysqli_query($conn, "INSERT INTO career_save_details (career_name, page_from) 
                                 VALUES ('$career', '$page_name')");

            // --------------------------
            // EMAIL USING PHPMailer
            // --------------------------
            $mail = new PHPMailer(true);

            try {
                // SMTP Config
                $mail->isSMTP();
                $mail->Host       = "odishacareerguidance.com";
                $mail->SMTPAuth   = true;
                $mail->Username   = "mocareerinfo@odishacareerguidance.com"; 
                $mail->Password   = "yK(X2k8xs(SU";
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; 
                $mail->Port       = 465;
                
                $mail->CharSet = 'UTF-8';     // IMPORTANT
                $mail->Encoding = 'base64';   // IMPORTANT

                // Sender
                $mail->setFrom("mocareerinfo@odishacareerguidance.com", "Draw Your Future");

                // Receiver
                $mail->addAddress("odishacareerguidance@gmail.com");

                // Subject with emoji
                $mail->Subject = "🎨 New Future Image Submission [ENG]";


                // Email body
                $mail->isHTML(true);
                $mail->Body = '
                <table width="100%" cellpadding="0" cellspacing="0" style="font-family: Arial, sans-serif; background:#f4f6f9; padding:30px;">
                   <tr>
                     <td align="center">
                 
                       <table width="600" cellpadding="0" cellspacing="0" 
                         style="background:#ffffff; border-radius:12px; padding:25px; box-shadow:0 4px 10px rgba(0,0,0,0.08);">
                 
                         <!-- Header -->
                         <tr>
                           <td align="center" style="padding-bottom:20px;">
                             <h2 style="margin:0; font-size:24px; color:#2c3e50;">
                               🎨 New Image Submission
                             </h2>
                             <p style="margin:5px 0 0; color:#7f8c8d; font-size:14px;">
                               A new drawing has been sent from the website.
                             </p>
                           </td>
                         </tr>
                 
                         <!-- Content Card -->
                         <tr>
                           <td>
                             <table width="100%" cellpadding="0" cellspacing="0" 
                               style="background:#f9fafc; border-radius:10px; padding:20px; border:1px solid #e6e9ef;">
                 
                               <tr>
                                 <td style="padding-bottom:10px;">
                                   <strong style="color:#34495e; font-size:15px;">Career:</strong><br>
                                   <span style="font-size:16px; color:#2c3e50;">'.$career.'</span>
                                 </td>
                               </tr>
                 
                               <tr>
                                 <td>
                                   <strong style="color:#34495e; font-size:15px;">Page:</strong><br>
                                   <span style="font-size:16px; color:#2c3e50;">Draw Your Future</span>
                                 </td>
                               </tr>
                 
                             </table>
                           </td>
                         </tr>
                 
                         <!-- Footer -->
                         <tr>
                           <td align="center" style="padding-top:25px;">
                             <p style="font-size:13px; color:#95a5a6; margin:0;">
                               Odishacareerguidance.com â€¢ Automated Notification
                             </p>
                           </td>
                         </tr>
                 
                       </table>
                 
                     </td>
                   </tr>
                 </table>
                 ';


                // ATTACHMENT
                if (file_exists($target_file)) {
                    $mail->addAttachment($target_file);
                }

                // SEND MAIL
                $mail->send();

                echo "<script>alert('Thank you for your response!'); window.location.href='draw-your-future.php';</script>";

            } catch (Exception $e) {
                echo "<script>alert('Email failed: ".$mail->ErrorInfo."'); window.location.href='draw-your-future.php';</script>";
            }

        } else {
            echo "<script>alert('Something went wrong!'); window.location.href='draw-your-future.php';</script>";
        }

    } else {
        echo "<script>alert('File upload error!'); window.location.href='draw-your-future.php';</script>";
    }
}
?>
