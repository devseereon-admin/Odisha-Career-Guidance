<?php

session_start();

include('dbconn.php');



function getUserIP() {

    // Get the IP address of the user

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {

        $ip = $_SERVER['HTTP_CLIENT_IP'];

    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {

        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

    } else {

        $ip = $_SERVER['REMOTE_ADDR'];

    }

    return $ip;

}



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['log'];

    $password = md5(md5($_POST['pwd']));

    $user_ip = getUserIP();



    // Check if the IP is blocked

    $ip_check = mysqli_query($conn, "SELECT * FROM blocked_ips WHERE ip_address = '$user_ip' AND blocked_until > NOW()");

    if (mysqli_num_rows($ip_check) > 0) {

        echo "<script>alert('Your IP is blocked due to multiple failed login attempts.');window.location.href='index.php'</script>";

        exit();

    }



    // Check if the user is locked out

    $check_lock = mysqli_query($conn, "SELECT failed_attempts, locked_until FROM admin WHERE username = '$username'");

    $user_data = mysqli_fetch_assoc($check_lock);



    if ($user_data && $user_data['locked_until'] && strtotime($user_data['locked_until']) > time()) {

        $remaining_time = strtotime($user_data['locked_until']) - time();

        echo "<script>

            var countdown = $remaining_time;

            function formatTime(seconds) {

                var h = Math.floor(seconds / 3600);

                var m = Math.floor((seconds % 3600) / 60);

                var s = seconds % 60;

                return h + 'h ' + m + 'm ' + s + 's';

            }

        

            var timer = setInterval(function(){

                countdown--;

                document.getElementById('timer').innerText = formatTime(countdown);

                if(countdown <= 0) clearInterval(timer);

            }, 1000);

        

            alert('Your account is locked for another ' + formatTime(countdown) + '.');

            window.location.href='index.php';

        </script>";

        exit();

    }



    $stm_sql = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username' AND password = '$password'");



    if ($stm_sql->num_rows == 1) {

        // Reset failed attempts on successful login

        mysqli_query($conn, "UPDATE admin SET failed_attempts = 0, last_attempt = NULL, locked_until = NULL WHERE username = '$username'");

        mysqli_query($conn, "DELETE FROM blocked_ips WHERE ip_address = '$user_ip'");



        $_SESSION['admin_username'] = $username;

        header('Location: dashboard.php');

    } else {

        // Record the failed attempt for the IP

        $ip_failed_attempts = mysqli_query($conn, "SELECT * FROM blocked_ips WHERE ip_address = '$user_ip'");

        if (mysqli_num_rows($ip_failed_attempts) > 0) {

            $ip_data = mysqli_fetch_assoc($ip_failed_attempts);

            $failed_attempts = $ip_data['failed_attempts'] + 1;

        } else {

            $failed_attempts = 1;

            mysqli_query($conn, "INSERT INTO blocked_ips (ip_address, failed_attempts) VALUES ('$user_ip', 1)");

        }



        if ($failed_attempts >= 3) {

            $blocked_until = date('Y-m-d H:i:s', strtotime('+1 hour'));

            mysqli_query($conn, "UPDATE blocked_ips SET failed_attempts = $failed_attempts, blocked_until = '$blocked_until' WHERE ip_address = '$user_ip'");

            echo "<script>alert('Your IP is blocked due to multiple failed login attempts.');window.location.href='index.php'</script>";

        } else {

            mysqli_query($conn, "UPDATE blocked_ips SET failed_attempts = $failed_attempts WHERE ip_address = '$user_ip'");

            echo "<script>alert('Invalid credentials');window.location.href='index.php'</script>";

        }



        // Record the failed attempt for the username

        $failed_attempts = $user_data['failed_attempts'] + 1;

        $locked_until = NULL;



        if ($failed_attempts >= 5) {

            $locked_until = date('Y-m-d H:i:s', strtotime('+3 hours'));

        }



        mysqli_query($conn, "UPDATE admin SET failed_attempts = $failed_attempts, last_attempt = NOW(), locked_until = '$locked_until' WHERE username = '$username'");

    }

}

?>







<!DOCTYPE html>

<html class=" ">

    <head>

        

        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />

        <meta charset="utf-8" />

        <title>AMA Career Admin</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <meta content="" name="description" />

        <meta content="" name="author" />



        <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon" />    <!-- Favicon -->

        <link rel="apple-touch-icon-precomposed" href="assets/images/apple-touch-icon-57-precomposed.png">	<!-- For iPhone -->

        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/apple-touch-icon-114-precomposed.png">    <!-- For iPhone 4 Retina display -->

        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/apple-touch-icon-72-precomposed.png">    <!-- For iPad -->

        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/apple-touch-icon-144-precomposed.png">    <!-- For iPad Retina display -->









        <!-- CORE CSS FRAMEWORK - START -->

        <link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>

        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

        <link href="assets/fonts/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>

        <link href="assets/css/animate.min.css" rel="stylesheet" type="text/css"/>

        <link href="assets/plugins/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" type="text/css"/>

        <!-- CORE CSS FRAMEWORK - END -->



        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 

        <link href="assets/plugins/icheck/skins/square/orange.css" rel="stylesheet" type="text/css" media="screen"/>        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 





        <!-- CORE CSS TEMPLATE - START -->

        <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>

        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>

        <!-- CORE CSS TEMPLATE - END -->



    </head>

    <!-- END HEAD -->



    <!-- BEGIN BODY -->

    <body class=" login_page">





        <div class="login-wrapper">

            <div id="login" class="login loginpage offset-xl-4 col-xl-4 offset-lg-3 col-lg-6 offset-md-3 col-md-6 col-offset-0 col-12">

                <h1><a href="#" title="Login Page" tabindex="-1">Ama Career Admin</a></h1>



                <form name="loginform" id="loginform" action="" method="post">

                    <p>

                        <label for="user_login">Username<br />

                            <input type="text" name="log" id="user_login" class="input" value="" /></label>

                    </p>

                    <p>

                        <label for="user_pass">Password<br />

                            <input type="password" name="pwd" id="user_pass" class="input" value=""  /></label>

                    </p>

                   





                    <p class="submit">

                        <input type="submit" name="wp-submit" id="wp-submit" class="btn btn-orange btn-block" value="Sign In" />

                    </p>

                </form>



</div>

        </div>











        <!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->





        <!-- CORE JS FRAMEWORK - START --> 

        <script src="assets/js/jquery-3.4.1.min.js" type="text/javascript"></script> 

        <script src="assets/js/popper.min.js" type="text/javascript"></script> 

        <!-- <script src="assets/js/jquery.easing.min.js" type="text/javascript"></script>  -->

        <script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 

        <script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>  



        <script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js" type="text/javascript"></script> 

        <script src="assets/plugins/viewport/viewportchecker.js" type="text/javascript"></script>  

        <!-- CORE JS FRAMEWORK - END --> 





        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 

        <script src="assets/plugins/icheck/icheck.min.js" type="text/javascript"></script><!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 





        <!-- CORE TEMPLATE JS - START --> 

        <script src="assets/js/scripts.js" type="text/javascript"></script> 

        <!-- END CORE TEMPLATE JS - END --> 



        <!-- Sidebar Graph - START --> 

        <script src="assets/plugins/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script>

        <script src="assets/js/chart-sparkline.js" type="text/javascript"></script>

        <!-- Sidebar Graph - END --> 



        <!-- General section box modal start -->

        <div class="modal" id="section-settings" tabindex="-1" role="dialog" aria-labelledby="ultraModal-Label" aria-hidden="true">

            <div class="modal-dialog animated bounceInDown">

                <div class="modal-content">

                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                        <h4 class="modal-title">Section Settings</h4>

                    </div>

                    <div class="modal-body">



                        Body goes here...



                    </div>

                    <div class="modal-footer">

                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>

                        <button class="btn btn-success" type="button">Save changes</button>

                    </div>

                </div>

            </div>

        </div>

        <!-- modal end -->

    </body>

</html>

