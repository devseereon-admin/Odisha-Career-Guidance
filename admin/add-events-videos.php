

<?php
include "dbconn.php";

function isImage($fileExtension) {
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    return in_array($fileExtension, $allowedExtensions);
}

// Function to upload file
function uploadFile($fileKey) {
    if (isset($_FILES[$fileKey]) && $_FILES[$fileKey]['error'] == UPLOAD_ERR_OK) {
        $targetDir = "../upload/";
        $uniqueId = uniqid() . rand(1000, 9999);
        $originalFileName = pathinfo($_FILES[$fileKey]["name"], PATHINFO_FILENAME);
        $extension = strtolower(pathinfo($_FILES[$fileKey]["name"], PATHINFO_EXTENSION));
        $targetFile = $targetDir . $originalFileName . '_' . $uniqueId . '.' . $extension;

        if (isImage($extension)) {
            if (move_uploaded_file($_FILES[$fileKey]["tmp_name"], $targetFile)) {
                return $originalFileName . '_' . $uniqueId . '.' . $extension;
            }
        }
    }
    return null; // Return null if file upload fails or file is not an image
}

// Function to create table if not exists
function checkAndCreateTable($conn) {
    $checkTableQuery = "SHOW TABLES LIKE 'events_videos'";
    $result = mysqli_query($conn, $checkTableQuery);

    if (mysqli_num_rows($result) == 0) {
        // Table does not exist, create it
        $createTableQuery = "
            CREATE TABLE events_videos (
                id INT AUTO_INCREMENT PRIMARY KEY,
                videos text DEFAULT null,
                priority VARCHAR(50) NULL,
                is_display_home ENUM('0', '1') DEFAULT '0',
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )
        ";
        mysqli_query($conn, $createTableQuery);
    }
}

// Check and create table on script execution
checkAndCreateTable($conn);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id']; // Assuming you have a hidden input for ID
    $priority = $_POST['priority'];
    $videos = $_POST['videos'];
    $is_display_home = '0';
    if (!empty($id)) {
        // Get existing image if ID is set and no new image is uploaded
        $query = $conn->prepare("SELECT videos FROM events_videos WHERE id = ?");
        $query->bind_param("i", $id);
        $query->execute();
        $result = $query->get_result();
        $row = $result->fetch_assoc();
        if (empty($videos)) {
            $videos = $row['videos'];
        }
    }
    if (empty($id)) {
        // Insert new record
        $query = $conn->prepare("INSERT INTO events_videos (videos, priority, is_display_home, created_at) VALUES ( ?, ?, ?, NOW())");
        $query->bind_param("sss", $videos, $priority,$is_display_home);
    } else {
        // Update existing record
        $query = $conn->prepare("UPDATE events_videos SET videos=?, priority=?, is_display_home = ?, updated_at=NOW() WHERE id=?");
        $query->bind_param("sssi", $videos, $priority, $is_display_home, $id);
    }

    // Execute the query
    if ($query->execute()) {
        echo "<script>alert('Record saved successfully');window.location.href='events-videos.php'</script>";
    } else {
        echo "<script>alert('Error saving record');</script>";
    }
}
?>

<!DOCTYPE html>
<html class=" ">
    <head>
        <!-- 
         * @Package: Ultra Admin - Responsive Theme
         * @Subpackage: Bootstrap
         * @Version: B4-1.3
         * This file is part of Ultra Admin Theme.
        -->
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
        <title>Ama Career Admin</title>
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
        <link href="assets/plugins/datatables/css/datatables.min.css" rel="stylesheet" type="text/css" media="screen"/>   
<link href="assets/plugins/icheck/skins/all.css" rel="stylesheet" type="text/css" media="screen"/>
		<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


        <!-- CORE CSS TEMPLATE - START -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
        <!-- CORE CSS TEMPLATE - END -->

    </head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body class=" "><!-- START TOPBAR -->
        <div class='page-topbar '>
            <div class='logo-area'>

            </div>

        </div>
        <!-- END TOPBAR -->
        <!-- START CONTAINER -->
        <div class="page-container row-fluid">

            <!-- SIDEBAR - START -->
            <div class="page-sidebar ">

                <!-- MAIN MENU - START -->
                <div class="page-sidebar-wrapper" id="main-menu-wrapper"> 
 <?php include "admcommon/side-menu.php"; ?>
                    

                </div>
                <!-- MAIN MENU - END -->



                <div class="project-info">


                </div>
            </div>
            <!--  SIDEBAR - END -->
            <!-- START CONTENT -->
            <section id="main-content" class=" ">
                <section class="wrapper main-wrapper" style=''>

                    <div class='col-xl-12 col-lg-12 col-md-12 col-12'>
                        <div class="page-title">

                            <div class="float-left">
                                <h1 class="title">Career</h1>                            </div>

                            <div class="float-right d-none">
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="index.html"><i class="fa fa-home"></i>Home</a>
                                    </li>
                                    <li>
                                        <a href="tables-basic.html">Tables</a>
                                    </li>
                                    <li class="active">
                                        <strong>Data Tables</strong>
                                    </li>
                                </ol>
                            </div>

                        </div>
                    </div>
                    <div class="clearfix"></div>

<div class="col-xl-12 col-lg-12 col-12 col-md-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title float-left">Add events photos</h2>
                                <div class="actions panel_actions float-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">
                <?php
                            $id = isset($_GET['id'])?$_GET['id']:null;
                            $priority = "";
                            $videos = "";
                            $is_display_home = "";

                            if($id != ""){
                                $detqry = mysqli_query($conn, "SELECT * FROM events_videos   WHERE id='$id'");
                                $cnt_det = mysqli_num_rows($detqry);
                                if($cnt_det > 0)
                                {
                                    $dettinfooo = mysqli_fetch_assoc($detqry);
                                    $priority = $dettinfooo['priority'];
                                    $videos = $dettinfooo['videos'];
                                }
                            }
                            ?>
                             
                            <form name="strmfrm" method="post" action="" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $id; ?>">

                                <div class="form-group">
                                    <label class="form-label" for="videos">Videos embade code<span style="color:red;">*</span></label>
                                    <div style="font-size:13px;color:#666;">
                                    Required size: <b>651 × 316 px</b>
                                    </div>
                                    <div class="controls">
                                        <textarea class="form-control" name="videos"></textarea>
                                        <?php if (!empty($videos)): ?>
                                            <br>
                                            <?= $videos ?>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="priority">Priority</label>
                                    <div class="controls">
                                        <input type="text" class="form-control" id="priority" name="priority" value="<?= htmlspecialchars($priority); ?>">
                                    </div>
                                </div>
                                
                                <button type="submit" value="submit" class="btn btn-success btn-corner">Submit</button>
                            </form>

                </div>
                        </section></div>
                  

                  
                </section>
            </section>
            <!-- END CONTENT -->
            <div class="page-chatapi hideit">

                <div class="search-bar">
                    <input type="text" placeholder="Search" class="form-control">
                </div>

                <div class="chat-wrapper">
                    <h4 class="group-head">Groups</h4>
                    <ul class="group-list list-unstyled">
                        <li class="group-row">
                            <div class="group-status available">
                                <i class="fa fa-circle"></i>
                            </div>
                            <div class="group-info">
                                <h4><a href="#">Work</a></h4>
                            </div>
                        </li>
                        <li class="group-row">
                            <div class="group-status away">
                                <i class="fa fa-circle"></i>
                            </div>
                            <div class="group-info">
                                <h4><a href="#">Friends</a></h4>
                            </div>
                        </li>

                    </ul>


                    <h4 class="group-head">Favourites</h4>
                    <ul class="contact-list">

                        <li class="user-row" id='chat_user_1' data-user-id='1'>
                            <div class="user-img">
                                <a href="#"><img src="data/profile/avatar-1.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Clarine Vassar</a></h4>
                                <span class="status available" data-status="available"> Available</span>
                            </div>
                            <div class="user-status available">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>
                        <li class="user-row" id='chat_user_2' data-user-id='2'>
                            <div class="user-img">
                                <a href="#"><img src="data/profile/avatar-2.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Brooks Latshaw</a></h4>
                                <span class="status away" data-status="away"> Away</span>
                            </div>
                            <div class="user-status away">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>
                        <li class="user-row" id='chat_user_3' data-user-id='3'>
                            <div class="user-img">
                                <a href="#"><img src="data/profile/avatar-3.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Clementina Brodeur</a></h4>
                                <span class="status busy" data-status="busy"> Busy</span>
                            </div>
                            <div class="user-status busy">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>

                    </ul>


                    <h4 class="group-head">More Contacts</h4>
                </div>

            </div>


            <div class="chatapi-windows ">


            </div>    </div>
        <!-- END CONTAINER -->
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
        <script src="assets/plugins/datatables/js/dataTables.min.js" type="text/javascript"></script>
		<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js">
        </script>
        
        <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js">
        </script>
        <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js">
        </script>
        <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js">
        </script>
        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js">
        </script>
        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js">
        </script> <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


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