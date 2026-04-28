<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
include "../admin/dbconn.php";
include "../admin/dbconn.php";

$conn->set_charset("utf8mb4");

    $option = isset($_POST['tab'])?$_POST['tab']:null;

    $errmsg = "";

    $data = array();

    
   if($option == 100)
{
    $career_name = $_POST['career_name'];
    $page_name   = $_POST['page_name'];

    // ---------------------------
    // SAVE TO DATABASE
    // ---------------------------
    $det_sub = mysqli_query($conn, "INSERT INTO career_save_details (career_name, page_from) 
    VALUES ('$career_name', '$page_name')");

    if (mysqli_affected_rows($conn) > 0) {

        // ---------------------------
        // SEND EMAIL
        // ---------------------------
        $mail = new PHPMailer(true);

        try {

            $mail->isSMTP();
            $mail->Host       = 'odishacareerguidance.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'mocareerinfo@odishacareerguidance.com';
            $mail->Password   = 'yK(X2k8xs(SU';
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 465;

            $mail->CharSet = 'UTF-8';
            $mail->Encoding = 'base64';

            $mail->setFrom('mocareerinfo@odishacareerguidance.com', 'Odisha Career Guidance');
            $mail->addAddress('odishacareerguidance@gmail.com');

            $mail->isHTML(true);
            $mail->Subject = "📩 New Submission |  strengths and weakness | [OD]";

            $mail->Body = '
            <table width="100%" cellpadding="0" cellspacing="0" style="font-family:Arial;background:#f4f6f9;padding:30px;">
                <tr>
                    <td align="center">

                        <table width="600" style="background:#fff;border-radius:12px;padding:25px;box-shadow:0 4px 10px rgba(0,0,0,0.08);">

                            <tr>
                                <td align="center">
                                    <h2 style="margin:0;color:#2c3e50;">📩 New  strengths and weakness Response</h2>
                                    <p style="color:#7f8c8d;margin-top:5px;">
                                        A new submission has arrived.
                                    </p>
                                </td>
                            </tr>

                            <tr>
                                <td>

                                    <table width="100%" style="background:#f9fafc;border-radius:10px;padding:20px;border:1px solid #e6e9ef;">

                                     

                                        <tr>
                                            <td style="padding-top:15px;">
                                                <span style="font-size:16px;color:#2c3e50;">'.$career_name.'</span>
                                            </td>
                                        </tr>

                                    </table>

                                </td>
                            </tr>

                            <tr>
                                <td align="center" style="padding-top:25px;">
                                    <p style="font-size:13px;color:#95a5a6;">
                                        OdishaCareerGuidance.com • Automatic Notification
                                    </p>
                                </td>
                            </tr>

                        </table>

                    </td>
                </tr>
            </table>';

            $mail->send();

            echo "1";

        } catch (Exception $e) {
            echo "0";
        }

    } else {
        echo "0";
    }
}

   if ($option == 101) {

    $career_name = $_POST['career_name'];

    if (is_array($career_name) && !empty($career_name)) {

        $page_name = "Explore Your Interest";

        // ---------------------------
        // SAVE TO DATABASE
        // ---------------------------
        $stmt = $conn->prepare("INSERT INTO career_save_details (career_name, page_from) VALUES (?, ?)");
        $stmt->bind_param("ss", $c_name, $page_name);

        foreach ($career_name as $c_name) {
            $stmt->execute();
        }

        $stmt->close();

        // ---------------------------
        // SEND EMAIL
        // ---------------------------
        $mail = new PHPMailer(true);

        try {

            $mail->isSMTP();
            $mail->Host       = 'odishacareerguidance.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'mocareerinfo@odishacareerguidance.com';
            $mail->Password   = 'yK(X2k8xs(SU';
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 465;

            $mail->CharSet = 'UTF-8';
            $mail->Encoding = 'base64';

            $mail->setFrom('mocareerinfo@odishacareerguidance.com', 'Odisha Career Guidance');
            $mail->addAddress('odishacareerguidance@gmail.com');

            $mail->isHTML(true);
            $mail->Subject = "🎯 New Submission | Explore Your Interest|[OD]";

            $careerList = "";
            foreach ($career_name as $career) {
                $careerList .= "<li style='padding:6px 0;'>$career</li>";
            }

            $mail->Body = '
            <table width="100%" cellpadding="0" cellspacing="0" style="font-family:Arial;background:#f4f6f9;padding:30px;">
                <tr>
                    <td align="center">

                        <table width="600" style="background:#fff;border-radius:12px;padding:25px;box-shadow:0 4px 10px rgba(0,0,0,0.08);">

                            <tr>
                                <td align="center">
                                    <h2 style="margin:0;color:#2c3e50;">🎯 Explore Your Interest</h2>
                                    <p style="color:#7f8c8d;margin-top:5px;">
                                        A new career interest response has arrived.
                                    </p>
                                </td>
                            </tr>

                            <tr>
                                <td>

                                    <table width="100%" style="background:#f9fafc;border-radius:10px;padding:20px;border:1px solid #e6e9ef;">

                                     

                                        <tr>
                                            <td style="padding-top:15px;">
                                                <strong style="color:#34495e;">Selected Careers:</strong>
                                                <ul style="margin-top:10px;padding-left:20px;color:#2c3e50;font-size:16px;">
                                                    ' . $careerList . '
                                                </ul>
                                            </td>
                                        </tr>

                                    </table>

                                </td>
                            </tr>

                            <tr>
                                <td align="center" style="padding-top:25px;">
                                    <p style="font-size:13px;color:#95a5a6;">
                                        OdishaCareerGuidance.com • Automatic Notification
                                    </p>
                                </td>
                            </tr>

                        </table>

                    </td>
                </tr>
            </table>';

            $mail->send();

            echo "1";

        } catch (Exception $e) {
            echo "0";
        }

    } else {
        echo "0";
    }
}

    

?>