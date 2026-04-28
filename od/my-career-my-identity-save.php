<?php

// Include DB connection

include 'admin/dbconn.php';



// Load PHPMailer

use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;



require 'PHPMailer/src/Exception.php';

require 'PHPMailer/src/PHPMailer.php';

require 'PHPMailer/src/SMTP.php';



// Create upload directory if required

$uploadDir = "upload/my-career-my-identity";

if (!file_exists($uploadDir)) {

    mkdir($uploadDir, 0777, true);

}



// Check if table exists

$tableName = "my_career_my_identity";

$tableCheckQuery = "SHOW TABLES LIKE '$tableName'";

$result = $conn->query($tableCheckQuery);



if ($result->num_rows == 0) {

    $createTableQuery = "CREATE TABLE $tableName (

        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,

        first_name VARCHAR(30),

        last_name VARCHAR(30),

        email VARCHAR(200),

        message TEXT,

        file_name VARCHAR(255),

        submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP

    )";



    if ($conn->query($createTableQuery) === FALSE) {

        die("Error creating table: " . $conn->error);

    }

}



// Process form

if ($_SERVER["REQUEST_METHOD"] == "POST") {



    // *** No mandatory fields ***

    $firstName = !empty($_POST['fname']) ? $conn->real_escape_string($_POST['fname']) : "Not provided";

    $lastName  = !empty($_POST['lname']) ? $conn->real_escape_string($_POST['lname']) : "Not provided";

    $email     = !empty($_POST['email']) ? $conn->real_escape_string($_POST['email']) : "Not provided";
    $phone     = !empty($_POST['phone']) ? $conn->real_escape_string($_POST['phone']) : "Not provided"; // ✅ NEW

    $messageText = !empty($_POST['text']) ? $conn->real_escape_string($_POST['text']) : "Not provided";

    $q1 = $conn->real_escape_string($_POST['q1']);
    $q2 = $conn->real_escape_string($_POST['q2']);
    $q3 = $conn->real_escape_string($_POST['q3']);
    $q4 = $conn->real_escape_string($_POST['q4']);
    $q5 = $conn->real_escape_string($_POST['q5']);
    $q6 = $conn->real_escape_string($_POST['q6']);



    // ----------------------------

    // FILE UPLOAD (OPTIONAL)

    // ----------------------------

    $targetDir = "$uploadDir/";

    $randomFileName = "No file uploaded";

    $filePath = "";



    if (!empty($_FILES["file"]["name"])) {



        $randomFileName = uniqid() . '_' . basename($_FILES["file"]["name"]);

        $targetFile = $targetDir . $randomFileName;



        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        $allowed = ["jpg", "jpeg", "png", "gif"];



        // Validate file only if uploaded

        if (!in_array($fileType, $allowed)) {

            alertAndReturn("Only JPG, JPEG, PNG, GIF allowed");

        }



        if ($_FILES["file"]["size"] > 5000000) {

            alertAndReturn("File too large. Max 5MB allowed.");

        }



        if (!getimagesize($_FILES["file"]["tmp_name"])) {

            alertAndReturn("Uploaded file is not a valid image.");

        }



        if (!move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {

          alertRedirect("Error uploading file.", "error");
        }



        $filePath = $targetFile;

    }



    // Insert into database

    $sql = "INSERT INTO $tableName (first_name, last_name, email,phone, message, file_name,q1, q2, q3, q4, q5, q6)

            VALUES ('$firstName', '$lastName', '$email','$phone', '$messageText', '$randomFileName','$q1', '$q2', '$q3', '$q4', '$q5', '$q6')";



    if ($conn->query($sql) !== TRUE) {

      alertRedirect("Database Error: " . $conn->error, "error");
    }



    // -----------------------

    //  EMAIL USING PHPMailer

    // -----------------------



    $mail = new PHPMailer(true);



    try {

        // SMTP config

        $mail->isSMTP();

        $mail->Host       = 'odishacareerguidance.com';

        $mail->SMTPAuth   = true;

        $mail->Username   = 'mocareerinfo@odishacareerguidance.com';

        $mail->Password   = 'yK(X2k8xs(SU';

        $mail->SMTPSecure = 'ssl';

        $mail->Port       = 465;



        // UTF-8 support for emojis ✔

        $mail->CharSet  = 'UTF-8';

        $mail->Encoding = 'base64';



        // Sender / Receiver

        $mail->setFrom('mocareerinfo@odishacareerguidance.com', 'Odisha Career Guidance');

        $mail->addAddress('odishacareerguidance@gmail.com');



        // Attach file only if uploaded

        if ($filePath !== "") {

            $mail->addAttachment($filePath, $randomFileName);

        }



        // Subject (Emoji OK)

        $mail->Subject = "🧭 New Submission | My Career My Identity [OD]| $firstName";



        // Email Body (HTML)

        $mail->isHTML(true);

        $mail->Body = "

        <table width='100%' style='background:#f1f1f1;padding:30px;font-family:Arial,sans-serif;'>

            <tr><td align='center'>

                <table width='600' style='background:white;padding:25px;border-radius:10px;'>



                    <tr><td align='center'>

                        <h2 style='margin:0;color:#333;'>🧭 New Submission</h2>

                        <p style='margin:0;color:#666;'>My Career My Identity</p>

                    </td></tr>



                    <tr><td style='padding:15px;'>

                        <p><strong>Name:</strong> $firstName $lastName</p>

                        <p><strong>Email:</strong> $email</p>
                        <p><strong>Phone:</strong> $phone</p>
                         


    <p><strong>Career Action Plan:</strong></p>

    <p><strong>Q1:</strong><br>$q1</p>
    <p><strong>Q2:</strong><br>$q2</p>
    <p><strong>Q3:</strong><br>$q3</p>
    <p><strong>Q4:</strong><br>$q4</p>
    <p><strong>Q5:</strong><br>$q5</p>
    <p><strong>Q6:</strong><br>$q6</p>


                        <p><strong>Attachment:</strong> $randomFileName</p>

                    </td></tr>



                </table>

            </td></tr>

        </table>

        ";



        $mail->send();

alertRedirect("ଧନ୍ୟବାଦ! ଆପଣଙ୍କର ଜମାଦେୟ ସଫଳତାର ସହିତ ଦାଖଲ ହୋଇସାରିଛି ।", "success");




    } catch (Exception $e) {

        alertAndReturn("Email sending failed: " . $mail->ErrorInfo);

    }

}



// Function for alerts + redirect

function alertRedirect($msg, $type = "success") {
    $msg = urlencode($msg);
    header("Location: my-career-my-identity.php?status=$type&msg=$msg");
    exit();
}



?>

