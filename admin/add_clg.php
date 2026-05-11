<?php

session_start();

include "dbconn.php";
include "includes/audit_log.php";


if(isset($_POST['action']) && $_POST['action'] == "add"){



    $name  = mysqli_real_escape_string($conn, $_POST['name']);

    $about = mysqli_real_escape_string($conn, $_POST['about']);

    $link  = mysqli_real_escape_string($conn, $_POST['link']);



    $institute_typ = mysqli_real_escape_string($conn, $_POST['institute_typ']);

    $strm = mysqli_real_escape_string($conn, $_POST['strm']);

    $location = mysqli_real_escape_string($conn, $_POST['location']);

    

    // Handle state based on location

    $state = 0; // Default state for International

    

    // If location is National (0), get the state value

    if($location == 0) {

        $state = isset($_POST['State']) ? mysqli_real_escape_string($conn, $_POST['State']) : 0;

    }

    

    // Initialize with default values

    $district = 0;

    $block = 0;

    

    // Only set district and block if:

    // 1. Location is National (0)

    // 2. State is Odisha (id=1)

    // 3. Values are provided

    if($location == 0 && $state == 1) {

        $district = isset($_POST['District']) && !empty($_POST['District']) ? intval($_POST['District']) : 0;

        $block    = isset($_POST['block']) && !empty($_POST['block']) ? intval($_POST['block']) : 0;

    }



    $sciencecourse = mysqli_real_escape_string($conn, $_POST['sciencecourse']);

    $comercourse   = mysqli_real_escape_string($conn, $_POST['comercourse']);

    $othercourse   = mysqli_real_escape_string($conn, $_POST['othercourse']);

    $subcat        = isset($_POST['subcat']) ? intval($_POST['subcat']) : 0;



    // Validate required fields

    $errors = array();

    if(empty($name)) $errors[] = "Name is required";

    if(empty($institute_typ)) $errors[] = "Institute type is required";

    if(empty($strm)) $errors[] = "Stream is required";

    if($location === '') $errors[] = "Location is required";

    

    // Only validate state if location is National

    if($location == 0 && empty($state)) {

        $errors[] = "State is required for National location";

    }



    if(empty($errors)) {

        $insert = mysqli_query($conn, "

            INSERT INTO college

            (name, description, link, institute_typ, stream, location, state, district, block, sciencecourse, comercourse, othercourse, subcat, status)

            VALUES

            ('$name', '$about', '$link', '$institute_typ', '$strm', '$location', '$state', '$district', '$block', '$sciencecourse', '$comercourse', '$othercourse', '$subcat', '1')

        ");



        if($insert) {

             $college_id = mysqli_insert_id($conn);

    // AUDIT LOG
    saveAuditLog(
        $conn,
        "College",
        "CREATE",
        "Added college: ".$name." | ID: ".$college_id
    );
    
            $_SESSION['message'] = "College Added Successfully";

            $_SESSION['message_type'] = "success";

        } else {

            $_SESSION['message'] = "Unable to add college: " . mysqli_error($conn);

            $_SESSION['message_type'] = "danger";

        }

    } else {

        $_SESSION['message'] = implode("<br>", $errors);

        $_SESSION['message_type'] = "danger";

    }



    header("Location: college.php");

    exit();

}

?>

<!DOCTYPE html>

<html class=" ">

    <head>

        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />

        <meta charset="utf-8" />

        <title>Ama Career Admin</title>

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

        <link href="assets/plugins/uikit/css/components/htmleditor.css" rel="stylesheet" type="text/css" media="screen"/>

        <!-- CORE CSS FRAMEWORK - END -->



        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 

        <link href="assets/plugins/datatables/css/datatables.min.css" rel="stylesheet" type="text/css" media="screen"/>   

        <link href="assets/plugins/icheck/skins/all.css" rel="stylesheet" type="text/css" media="screen"/>

        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 



        <!-- CORE CSS TEMPLATE - START -->

        <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>

        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>

        <!-- CORE CSS TEMPLATE - END -->



        <style>

            .hidden-field { display: none; }

        </style>

    </head>

    <!-- END HEAD -->



    <!-- BEGIN BODY -->

    <body>

        <!-- START TOPBAR -->

        <div class='page-topbar '>

            <div class='logo-area'></div>

        </div>

        <!-- END TOPBAR -->

        

        <!-- START CONTAINER -->

        <div class="page-container row-fluid">



            <!-- SIDEBAR - START -->

            <div class="page-sidebar ">

                <div class="page-sidebar-wrapper" id="main-menu-wrapper"> 

                    <?php include "admcommon/side-menu.php"; ?>

                </div>

                <!-- MAIN MENU - END -->

            </div>

            <!--  SIDEBAR - END -->

            

            <!-- START CONTENT -->

            <section id="main-content">

                <section class="wrapper main-wrapper" style=''>



                    <div class='col-xl-12 col-lg-12 col-md-12 col-12'>

                        <div class="page-title">

                            <div class="float-left">

                                <h1 class="title">Colleges</h1>                            

                            </div>

                            <div class="float-right d-none">

                                <ol class="breadcrumb">

                                    <li><a href="index.html"><i class="fa fa-home"></i>Home</a></li>

                                    <li><a href="tables-basic.html">Tables</a></li>

                                    <li class="active"><strong>Data Tables</strong></li>

                                </ol>

                            </div>

                        </div>

                    </div>

                    <div class="clearfix"></div>



                    <div class="col-xl-12 col-lg-12 col-12 col-md-12">

                        <section class="box ">

                            <header class="panel_header">

                                <h2 class="title float-left">Add Colleges</h2>

                                <div class="actions panel_actions float-right">

                                    <i class="box_toggle fa fa-chevron-down"></i>

                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>

                                    <i class="box_close fa fa-times"></i>

                                </div>

                            </header>

                            <div class="content-body">

                                <div class="row">

                                    <div class="col-lg-8 col-md-9 col-10">

                                        <form name="strmfrm" method="post" action="add_clg.php" enctype="multipart/form-data">

                                            <input type="hidden" name="action" value="add">

                                            

                                            <div class="form-group">

                                                <label class="form-label" for="field-1">Institute Type</label>

                                                <div class="controls">

                                                    <select class="custom-select" id="inputGroupSelect01" name="institute_typ">

                                                        <option value="">Institute Type...</option>

                                                        <option value="1">Government</option>

                                                        <option value="2">Private</option>

                                                    </select>

                                                </div>

                                            </div>

                                            

                                            <div class="form-group">

                                                <label class="form-label" for="field-2">Stream</label>

                                                <select class="custom-select" id="inputGroupSelect01" name="strm" onchange="displayloc(this.value)">

                                                    <option value="">Choose...</option>

                                                    <?php

                                                    $strm_sql = mysqli_query($conn , "select * from catagory where status='1'");

                                                    while($resstrm = mysqli_fetch_array($strm_sql)){

                                                    ?>

                                                    <option value="<?=$resstrm['id'];?>"><?=$resstrm['name'];?></option>

                                                    <?php } ?>

                                                </select>

                                            </div>

                                            

                                            <div id='displaycarr' style="display:none;">

                                                <select class="custom-select" name='subcat'>

                                                    <option value="0">Select option</option>

                                                    <?php

                                                    $crr = mysqli_query($conn,"select * from `subcatagory` where `cat_id`='5' and status='1' ");

                                                    while($rescrr = mysqli_fetch_array($crr)){

                                                    ?>

                                                    <option value='<?=$rescrr['id'];?>'><?=$rescrr['name'];?></option>

                                                    <?php } ?>

                                                </select>

                                            </div>

                                            

                                            <div id="displayloccc">

                                                <div class="form-group">

                                                    <label class="control-label">Choose Your Location</label><br>

                                                    <div class="custom-control custom-radio">

                                                        <input type="radio" name="location" id="National" onclick="show1()" value="0" checked> National

                                                        <input type="radio" name="location" id="Internatinal" onclick="show2()" value="1"> International

                                                    </div>

                                                </div>

                                                

                                                <div id='national_content'>

                                                    <label class="form-label" for="field-2">State</label>

                                                    <select class="custom-select" name="State" id="state" onchange="getDistrict(this.value);">

                                                        <option value="">Select State</option>

                                                        <?php

                                                        $state_sql = mysqli_query($conn,"select * from state where status='1' ");

                                                        while($res_stat = mysqli_fetch_array($state_sql)){

                                                        ?>

                                                        <option value="<?=$res_stat['id'];?>"><?=$res_stat['name'];?></option>

                                                        <?php } ?>

                                                    </select>

                                                </div>

                                            </div>

                                            

                                            <br>

                                            <div id="dis"></div>

                                            <br>

                                            <div id="blK" style="display:none;"></div>

                                            <br>

                                            

                                            <div class="form-group">

                                                <label class="form-label" for="field-1">Name</label>

                                                <div class="controls">

                                                    <input type="text" class="form-control" id="field-1" name="name">

                                                </div>

                                            </div>



                                            <div class="form-group">

                                                <label class="form-label" for="field-2">College Url</label>

                                                <div class="controls">

                                                    <input type="text" name="link" class="form-control">

                                                </div>

                                            </div>

                                            

                                            <div class="form-group">

                                                <label class="form-label" for="field-2">List of Art Courses Offered</label>

                                                <div class="controls">

                                                    <textarea class="ckeditor" cols="80" id="editor1" name="about" rows="10"></textarea>

                                                </div>

                                            </div>

                                            

                                            <div class="form-group">

                                                <label class="form-label" for="field-2">List of Science Courses Offered</label>

                                                <div class="controls">

                                                    <textarea class="ckeditor" cols="80" id="editor2" name="sciencecourse" rows="10"></textarea>

                                                </div>

                                            </div>

                                            

                                            <div class="form-group">

                                                <label class="form-label" for="field-2">List of Commerce Courses Offered</label>

                                                <div class="controls">

                                                    <textarea class="ckeditor" cols="80" id="editor3" name="comercourse" rows="10"></textarea>

                                                </div>

                                            </div>

                                            

                                            <div class="form-group">

                                                <label class="form-label" for="field-2">List of Other Courses Offered</label>

                                                <div class="controls">

                                                    <textarea class="ckeditor" cols="80" id="editor4" name="othercourse" rows="10"></textarea>

                                                </div>

                                            </div>

                                            

                                            <button type="submit" value="submit" class="btn btn-success btn-corner">Submit</button>

                                        </form>

                                    </div>

                                </div>

                            </div>

                        </section>

                    </div>

                </section>

            </section>

            <!-- END CONTENT -->



            <div class="chatapi-windows "></div>

        </div>

        <!-- END CONTAINER -->



        <!-- CORE JS FRAMEWORK - START --> 

        <script src="assets/js/jquery-3.4.1.min.js" type="text/javascript"></script> 

        <script src="assets/js/popper.min.js" type="text/javascript"></script> 

        <script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 

        <script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>  

        <script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js" type="text/javascript"></script> 

        <script src="assets/plugins/viewport/viewportchecker.js" type="text/javascript"></script>  

        <!-- CORE JS FRAMEWORK - END -->



        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 

        <script src="assets/plugins/datatables/js/dataTables.min.js" type="text/javascript"></script>

        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>

        <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

        <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>

        <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>

        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END -->



        <!-- CORE TEMPLATE JS - START --> 

        <script src="assets/js/scripts.js" type="text/javascript"></script> 

        <!-- END CORE TEMPLATE JS - END -->



        <!-- Sidebar Graph - START --> 

        <script src="assets/plugins/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script>

        <script src="assets/js/chart-sparkline.js" type="text/javascript"></script>

        <!-- Sidebar Graph - END --> 



        <script src="assets/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>

        

        <script>

        $(document).ready(function(){

            $('#blK').hide();

            $('#dis').hide();

        });

        

        function show1(){

            document.getElementById('national_content').style.display = 'block';

            // Reset district and block when switching to National

            $('#dis').hide().html('');

            $('#blK').hide().html('');

        }

        

        function show2(){

            document.getElementById('national_content').style.display = 'none';

            // Clear district and block when switching to International

            $('#dis').hide().html('');

            $('#blK').hide().html('');

        }

        

        function getDistrict(stateId){

            if(stateId == "") {

                $('#dis').hide().html('');

                $('#blK').hide().html('');

                return;

            }

            

            // Only show district field if Odisha (ID=1) is selected

            if(stateId == 1) {

                $.ajax({

                    type: 'POST',

                    url: "../get_Districtclg.php",

                    data: {

                        ditrid: stateId,

                        ajax: '1'

                    },

                    beforeSend: function() {

                        $('.preloader').show();

                    },

                    success: function(result){

                        $('#dis').html('<label>District</label><select class="custom-select" name="District" onchange="getblock(this.value);">' + result + '</select>');

                        $('#dis').show();

                        $('#blK').hide().html('');

                    },

                    complete: function() {

                        $('.preloader').hide();

                    }

                });

            } else {

                // If state is not Odisha, hide district and block fields

                $('#dis').hide().html('');

                $('#blK').hide().html('');

            }

        }

        

        function getblock(districtId){

            if(districtId == "" || districtId == "0") {

                $('#blK').hide().html('');

                return;

            }

            

            $.ajax({

                type: 'POST',

                url: "get_block.php",

                data: {district_id: districtId},

                beforeSend: function() {

                    $('.preloader').show();

                },

                success: function(result){

                    $('#blK').html('<label>Block</label><select class="custom-select" name="block">' + result + '</select>');

                    $('#blK').show();

                },

                complete: function() {

                    $('.preloader').hide();

                }

            });

        }

        

        function displayloc(loccc){

            if(loccc == 5){

                $('#displayloccc').hide();

                $('#displaycarr').show();

            } else if(loccc == 6 || loccc == 7 || loccc == 8){

                $('#displayloccc').hide();

                $('#displaycarr').hide();

            } else {

                $('#displayloccc').show();

                $('#displaycarr').hide();

            }

        }

        </script>

    </body>

</html>