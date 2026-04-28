<?php

use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;





require 'PHPMailer/src/Exception.php';

require 'PHPMailer/src/PHPMailer.php';

require 'PHPMailer/src/SMTP.php';

include 'admin/dbconn.php';



// Directory for uploads

$uploadDir = "upload/my-career-my-identity";

if (!file_exists($uploadDir)) {

    mkdir($uploadDir, 0777, true);

}



// Create table if not exists

$tableName = "my_career_my_identity";

$tableCheckQuery = "SHOW TABLES LIKE '$tableName'";

$result = $conn->query($tableCheckQuery);



if ($result->num_rows == 0) {

    $createTableQuery = "CREATE TABLE $tableName (

        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,

        first_name VARCHAR(30) NOT NULL,

        last_name VARCHAR(30) NOT NULL,

        email VARCHAR(200) NOT NULL,
        
        message TEXT NOT NULL,

        file_name VARCHAR(255) NOT NULL,

        submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP

    )";

    $conn->query($createTableQuery);

}



// Process form

if ($_SERVER["REQUEST_METHOD"] == "POST") {



    $firstName = $conn->real_escape_string($_POST['fname']);

    $lastName  = $conn->real_escape_string($_POST['lname']);

    $email     = $conn->real_escape_string($_POST['email']);
    $phone     = $conn->real_escape_string($_POST['phone']); // ✅ NEW

    $messageText = $conn->real_escape_string($_POST['text']);
   $q1 = $conn->real_escape_string($_POST['q1']);
$q2 = $conn->real_escape_string($_POST['q2']);
$q3 = $conn->real_escape_string($_POST['q3']);
$q4 = $conn->real_escape_string($_POST['q4']);
$q5 = $conn->real_escape_string($_POST['q5']);
$q6 = $conn->real_escape_string($_POST['q6']);


    // Handle file upload

    $targetDir = "$uploadDir/";

    $randomFileName = uniqid() . '_' . basename($_FILES["file"]["name"]);

    $targetFile = $targetDir . $randomFileName;



    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    $allowed = ["jpg","jpeg","png","gif"];



    if (!in_array($fileType, $allowed)) {

        alertRedirect("Only JPG, JPEG, PNG, GIF allowed!");

    }



    if ($_FILES["file"]["size"] > 5000000) {

        alertRedirect("Image is too large. Max 5MB allowed.");

    }



    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {



        // Insert into DB

        $sql = "INSERT INTO $tableName (first_name, last_name, email, phone, message, file_name,q1, q2, q3, q4, q5, q6)

                VALUES ('$firstName', '$lastName', '$email','$phone', '$messageText', '$randomFileName','$q1', '$q2', '$q3', '$q4', '$q5', '$q6')";

        $conn->query($sql);



        // -------------------------

        //  PHPMailer SMTP SECTION

        // -------------------------





        $mail = new PHPMailer(true);



        try {

            // Server Settings

            $mail->isSMTP();

            $mail->Host       = 'odishacareerguidance.com';

            $mail->SMTPAuth   = true;

            $mail->Username   = 'mocareerinfo@odishacareerguidance.com';

            $mail->Password   = 'yK(X2k8xs(SU';  // CHANGE THIS

            $mail->SMTPSecure = 'ssl';

            $mail->Port       = 465;

            

            $mail->CharSet = 'UTF-8';     // IMPORTANT

            $mail->Encoding = 'base64';   // IMPORTANT



            // Sender & Recipient

            $mail->setFrom('mocareerinfo@odishacareerguidance.com', 'Odisha Career Guidance');

            // Receiver

            $mail->addAddress('odishacareerguidance@gmail.com'); // Admin will receive it



            // Attach File

            $mail->addAttachment($targetFile);



            // Email UI (Modern)

            $mail->isHTML(true);



            // ******** SUBJECT ICON + USER FIRST NAME ********

            $mail->Subject = "💼 New Submission | My Career My Identity [ENG]| $firstName";







            $mail->Body = '

            <table width="100%" cellpadding="0" cellspacing="0" 

                   style="font-family: Arial; background:#f4f6f9; padding:30px;">

                <tr><td align="center">

                

                    <table width="600" 

                           style="background:#fff; border-radius:12px; padding:25px; 

                           box-shadow:0 4px 10px rgba(0,0,0,0.08);">



                        <tr>

                            <td align="center">

                                <h2 style="margin:0; color:#2c3e50;">💼  My Career My Identity</h2>

                                <p style="color:#7f8c8d; margin-top:5px;">

                                    A new form submission has arrived.

                                </p>

                            </td>

                        </tr>



                        <tr><td>

                            <table width="100%" 

                                style="background:#f9fafc; border-radius:10px; padding:20px; 

                                border:1px solid #e6e9ef;">

                                

                                <tr>

                                    <td>

                                        <strong style="color:#34495e;">First Name:</strong><br>

                                        <span style="font-size:16px;color:#2c3e50;">'.$firstName.'</span>

                                    </td>

                                </tr>



                                <tr>

                                    <td style="padding-top:10px;">

                                        <strong style="color:#34495e;">Last Name:</strong><br>

                                        <span style="font-size:16px;color:#2c3e50;">'.$lastName.'</span>

                                    </td>

                                </tr>



                                <tr>

                                    <td style="padding-top:10px;">

                                        <strong style="color:#34495e;">Email:</strong><br>

                                        <span style="font-size:16px;color:#2c3e50;">'.$email.'</span>

                                    </td>

                                </tr>

<tr>
    <td style="padding-top:10px;">
        <strong style="color:#34495e;">Phone:</strong><br>
        <span style="font-size:16px;color:#2c3e50;">'.$phone.'</span>
    </td>
</tr>

<tr><td style="padding-top:15px;"><strong>Career Action Plan</strong></td></tr>

<tr><td>Q1: '.$q1.'</td></tr>
<tr><td>Q2: '.$q2.'</td></tr>
<tr><td>Q3: '.$q3.'</td></tr>
<tr><td>Q4: '.$q4.'</td></tr>
<tr><td>Q5: '.$q5.'</td></tr>
<tr><td>Q6: '.$q6.'</td></tr>

                              



                                <tr>

                                    <td style="padding-top:10px;">

                                        <strong style="color:#34495e;">Attachment:</strong><br>

                                        <span style="font-size:15px;color:#2980b9;">'.$randomFileName.'</span>

                                    </td>

                                </tr>
            


                            </table>

                        </td></tr>



                        <tr><td align="center" style="padding-top:25px;">

                            <p style="font-size:13px; color:#95a5a6;">

                                OdishaCareerGuidance.com â€¢ Automatic Notification

                            </p>

                        </td></tr>



                    </table>

                </td></tr>

            </table>';



            $mail->send();

alertRedirect("Thank you! Your form has been submitted.", "success");
        } 

        catch (Exception $e) {

            alertRedirect("Email failed: {$mail->ErrorInfo}");

        }



    } else {

alertRedirect("Error uploading file.", "error");
    }



}


function alertRedirect($msg, $type = "success") {
    $msg = urlencode($msg);
    header("Location: my-career-my-identity.php?status=$type&msg=$msg");
    exit();
}



?>

