<?php
session_start();
include('dbconn.php');

function getUserIP() {
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
    $username = trim($_POST['log']);
    $password = md5(md5($_POST['pwd']));
    $user_ip = getUserIP();

    // Check if IP is blocked
    $ip_check = mysqli_query($conn, "SELECT * FROM blocked_ips WHERE ip_address = '$user_ip' AND blocked_until > NOW()");
    if (mysqli_num_rows($ip_check) > 0) {
        echo "<script>alert('Your IP is blocked due to multiple failed login attempts.');window.location.href='index.php'</script>";
        exit();
    }

    // Check if user is locked
    $check_lock = mysqli_query($conn, "SELECT failed_attempts, locked_until FROM admin WHERE username = '$username'");
    $user_data = mysqli_fetch_assoc($check_lock);

    if ($user_data && $user_data['locked_until'] && strtotime($user_data['locked_until']) > time()) {
        $remaining_time = strtotime($user_data['locked_until']) - time();
        $minutes = floor($remaining_time / 60);
        $seconds = $remaining_time % 60;
        echo "<script>alert('Your account is locked for another $minutes minutes $seconds seconds.');window.location.href='index.php'</script>";
        exit();
    }

    // Check credentials
    $stm_sql = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username' AND password = '$password'");

    if (mysqli_num_rows($stm_sql) == 1) {
        // Reset failed attempts
        mysqli_query($conn, "UPDATE admin SET failed_attempts = 0, locked_until = NULL WHERE username = '$username'");
        mysqli_query($conn, "DELETE FROM blocked_ips WHERE ip_address = '$user_ip'");

        // Set session
        $_SESSION['admin_username'] = $username;
        
        // Redirect to dashboard
        header('Location: dashboard.php');
        exit();
    } else {
        // Record failed attempt for IP
        $ip_result = mysqli_query($conn, "SELECT * FROM blocked_ips WHERE ip_address = '$user_ip'");
        if (mysqli_num_rows($ip_result) > 0) {
            $ip_data = mysqli_fetch_assoc($ip_result);
            $failed_attempts = $ip_data['failed_attempts'] + 1;
            
            if ($failed_attempts >= 3) {
                $blocked_until = date('Y-m-d H:i:s', strtotime('+1 hour'));
                mysqli_query($conn, "UPDATE blocked_ips SET failed_attempts = $failed_attempts, blocked_until = '$blocked_until' WHERE ip_address = '$user_ip'");
                echo "<script>alert('Your IP is blocked due to multiple failed login attempts.');window.location.href='index.php'</script>";
            } else {
                mysqli_query($conn, "UPDATE blocked_ips SET failed_attempts = $failed_attempts WHERE ip_address = '$user_ip'");
                echo "<script>alert('Invalid credentials');window.location.href='index.php'</script>";
            }
        } else {
            mysqli_query($conn, "INSERT INTO blocked_ips (ip_address, failed_attempts) VALUES ('$user_ip', 1)");
            echo "<script>alert('Invalid credentials');window.location.href='index.php'</script>";
        }

        // Record failed attempt for user
        if ($user_data) {
            $failed_attempts = $user_data['failed_attempts'] + 1;
            $locked_until = NULL;

            if ($failed_attempts >= 5) {
                $locked_until = date('Y-m-d H:i:s', strtotime('+3 hours'));
            }

            mysqli_query($conn, "UPDATE admin SET failed_attempts = $failed_attempts, last_attempt = NOW(), locked_until = '$locked_until' WHERE username = '$username'");
        }
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

        <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon" />
        <link rel="apple-touch-icon-precomposed" href="assets/images/apple-touch-icon-57-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/apple-touch-icon-144-precomposed.png">

        <!-- CORE CSS FRAMEWORK - START -->
        <link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/fonts/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" type="text/css"/>
        <!-- CORE CSS FRAMEWORK - END -->

        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        <link href="assets/plugins/icheck/skins/square/orange.css" rel="stylesheet" type="text/css" media="screen"/>
        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 

        <!-- CORE CSS TEMPLATE - START -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
        <!-- CORE CSS TEMPLATE - END -->

    </head>

    <body class=" login_page">
        <div class="login-wrapper">
            <div id="login" class="login loginpage offset-xl-4 col-xl-4 offset-lg-3 col-lg-6 offset-md-3 col-md-6 col-offset-0 col-12">
                <h1><a href="#" title="Login Page" tabindex="-1">Ama Career Admin</a></h1>

                <form name="loginform" id="loginform" action="" method="post">
                    <p>
                        <label for="user_login">Username<br />
                            <input type="text" name="log" id="user_login" class="input" value="" required /></label>
                    </p>
                    <p>
                        <label for="user_pass">Password<br />
                            <input type="password" name="pwd" id="user_pass" class="input" value="" required /></label>
                    </p>

                    <p class="submit">
                        <input type="submit" name="wp-submit" id="wp-submit" class="btn btn-orange btn-block" value="Sign In" />
                    </p>
                </form>
            </div>
        </div>

        <!-- CORE JS FRAMEWORK - START --> 
        <script src="assets/js/jquery-3.4.1.min.js" type="text/javascript"></script> 
        <script src="assets/js/popper.min.js" type="text/javascript"></script> 
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
        <script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>  
        <script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js" type="text/javascript"></script> 
        <script src="assets/plugins/viewport/viewportchecker.js" type="text/javascript"></script>  
        <!-- CORE JS FRAMEWORK - END --> 

        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        <script src="assets/plugins/icheck/icheck.min.js" type="text/javascript"></script>
        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 

        <!-- CORE TEMPLATE JS - START --> 
        <script src="assets/js/scripts.js" type="text/javascript"></script> 
        <!-- END CORE TEMPLATE JS - END --> 
    </body>
</html>