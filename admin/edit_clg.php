<?php
include "dbconn.php";

/* Secure ID */
$eid = isset($_GET['id']) ? intval($_GET['id']) : 0;

/* Fetch college details */
$exam_query = mysqli_query($conn, "SELECT * FROM `college` WHERE id='$eid' AND status='1'");
$exam_det = mysqli_fetch_assoc($exam_query);

/* Assign variables */
$type     = $exam_det['institute_typ'];
$loc      = $exam_det['location'];
$qual     = $exam_det['stream'];
$state    = $exam_det['state'];
$district = $exam_det['district'];
$block    = $exam_det['block'];
$subcat   = $exam_det['subcat'];
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
    <body class=" ">
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
            <section id="main-content" class=" ">
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
                                <h2 class="title float-left">Edit College</h2>
                                <div class="actions panel_actions float-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">
                                <div class="row">
                                    <div class="col-lg-8 col-md-9 col-10">
                                        <form name="strmfrm" method="post" action="edit_clgaction.php" enctype="multipart/form-data">
                                            <input type="hidden" name="action" value="update">
                                            <input type="hidden" name="id" value="<?=$eid;?>">
                                            
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Institute Type</label>
                                                <div class="controls">
                                                    <select class="custom-select" id="inputGroupSelect01" name="institute_typ">
                                                        <option value="">select Type</option>
                                                        <option value="1" <?=($type==1)?'selected':'';?>>Govt.</option>
                                                        <option value="2" <?=($type==2)?'selected':'';?>>Private.</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="field-2">Stream</label>
                                                <select class="custom-select" id="inputGroupSelect01" name="strm" onchange="checkSubcat(this.value)">
                                                    <option value="">Choose...</option>
                                                    <?php
                                                    $strm_sql = mysqli_query($conn , "select * from catagory where status='1'");
                                                    while($resstrm = mysqli_fetch_array($strm_sql)){
                                                        $qid = $resstrm['id'];
                                                        $selected = ($qual == $qid) ? "selected" : "";
                                                    ?>
                                                    <option value="<?=$resstrm['id'];?>" <?=$selected;?>><?=$resstrm['name'];?></option>
                                                    <?php } ?>
                                                </select>
                                                
                                                <div id="subcat_div" style="<?=($qual==5)?'display:block;':'display:none;';?> margin-top:10px;">
                                                    <select class="custom-select" name='subcat'>
                                                        <option value="0">Select option</option>
                                                        <?php
                                                        $crr = mysqli_query($conn,"select * from `subcatagory` where `cat_id`='5' and status='1' ");
                                                        while($rescrr = mysqli_fetch_array($crr)){
                                                            $sidd = $rescrr['id']; 
                                                            $selectsbct = ($subcat == $sidd) ? "selected" : "";
                                                        ?>
                                                        <option value='<?=$rescrr['id'];?>' <?=$selectsbct;?>><?=$rescrr['name'];?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="control-label">Choose Your Location</label><br>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" name="location" id="National" onclick="show1()" value="0" <?=($loc==0)?'checked':'';?>> National
                                                    <input type="radio" name="location" id="Internatinal" onclick="show2()" value="1" <?=($loc==1)?'checked':'';?>> International
                                                </div>
                                            </div>
                            
<div class="form-group" id="state_area" style="<?=($loc==0)?'display:block;':'display:none;';?>">
    <label>State</label>
    <select name="state" id="state" class="form-control" onchange="handleStateChange(this.value)">
        <option value="">Select State</option>
        <?php
        $state_sql = mysqli_query($conn,"SELECT * FROM state WHERE status='1'");
        while($st = mysqli_fetch_array($state_sql)){
        ?>
        <option value="<?=$st['id'];?>" <?=($state==$st['id'])?'selected':'';?>>
            <?=$st['name'];?>
        </option>
        <?php } ?>
    </select>
</div>

                                            <div class="form-group" id="district_area" style="<?=($state==1)?'display:block;':'display:none;';?>">
                                                <label>District</label>
                                                <select name="district" id="district" class="form-control" onchange="loadBlocks(this.value)">
                                                    <option value="">Select District</option>
                                                    <?php
                                                    if($state == 1){
                                                        $dist_sql = mysqli_query($conn,"SELECT * FROM district WHERE state_id='1' AND status='1' ORDER BY name");
                                                        if(mysqli_num_rows($dist_sql) > 0) {
                                                            while($dist = mysqli_fetch_array($dist_sql)){
                                                                $selected = ($district == $dist['id']) ? 'selected' : '';
                                                    ?>
                                                    <option value="<?=$dist['id'];?>" <?=$selected;?>>
                                                        <?=htmlspecialchars($dist['name']);?>
                                                    </option>
                                                    <?php 
                                                            }
                                                        } else {
                                                            echo "<option value=''>No districts found</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="form-group" id="block_area" style="<?=($state==1 && $district>0)?'display:block;':'display:none;';?>">
                                                <label>Block</label>
                                                <select name="block" id="block" class="form-control">
                                                    <option value="">Select Block</option>
                                                    <?php
                                                    if($state == 1 && $district > 0){
                                                        $block_sql = mysqli_query($conn,"SELECT * FROM block WHERE dist='$district' AND status='1'");
                                                        while($blk = mysqli_fetch_array($block_sql)){
                                                    ?>
                                                    <option value="<?=$blk['id'];?>" <?=($block==$blk['id'])?'selected':'';?>>
                                                        <?=$blk['name'];?>
                                                    </option>
                                                    <?php }} ?>
                                                </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Name</label>
                                                <div class="controls">
                                                    <input type="text" class="form-control" id="field-1" name="name" value="<?=$exam_det['name'];?>">
                                                </div>
                                            </div>
                                                
                                            <div class="form-group">
                                                <label class="form-label" for="field-2">Link</label>
                                                <div class="controls">
                                                    <input type="text" name="link" class="form-control" value="<?=$exam_det['link'];?>">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="form-label" for="field-2">List of Art Courses Offered</label>
                                                <div class="controls">
                                                    <textarea class="ckeditor" cols="80" id="editor1" name="about" rows="10"><?=$exam_det['description'];?></textarea>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="form-label" for="field-2">List of Science Courses Offered</label>
                                                <div class="controls">
                                                    <textarea class="ckeditor" cols="80" id="editor2" name="sciencecourse" rows="10"><?=$exam_det['sciencecourse'];?></textarea>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="form-label" for="field-2">List of Commerce Courses Offered</label>
                                                <div class="controls">
                                                    <textarea class="ckeditor" cols="80" id="editor3" name="comercourse" rows="10"><?=$exam_det['comercourse'];?></textarea>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="form-label" for="field-2">List of Other Courses Offered</label>
                                                <div class="controls">
                                                    <textarea class="ckeditor" cols="80" id="editor4" name="othercourse" rows="10"><?=$exam_det['othercourse'];?></textarea>
                                                </div>
                                            </div>
                                            
                                            <button type="submit" value="update" class="btn btn-success btn-corner">Update</button>
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
        <script src="assets/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
        <!-- Sidebar Graph - END --> 

<script>
// Function for National selection
function show1() {
    console.log("National selected"); // Debug
    $("#state_area").show(); // Show state field for national
}

// Function for International selection
function show2() {
    console.log("International selected"); // Debug
    $("#state_area").hide(); // Hide state field for international
    // Also reset state, district, block values
    $("#state").val('');
    $("#district").html('<option value="">Select District</option>');
    $("#block").html('<option value="">Select Block</option>');
    $("#district_area").hide();
    $("#block_area").hide();
}

function handleStateChange(stateId) {
    console.log("State changed to: " + stateId); // Debug
    
    if(stateId == 1) { // Odisha
        $("#district_area").show();
        // Load districts via AJAX
        $.ajax({
            type: "POST",
            url: "../get_Districtclg.php",
            data: {
                ditrid: stateId,
                ajax: '1'
            },
            dataType: "html",
            success: function(data) {
                console.log("Districts loaded: " + data);
                $("#district").html(data);
                
                <?php if($state == 1 && $district > 0) { ?>
                setTimeout(function() {
                    $("#district").val('<?=$district;?>');
                    loadBlocks('<?=$district;?>');
                }, 200);
                <?php } ?>
            },
            error: function(xhr, status, error) {
                console.log("AJAX Error loading districts: " + error);
                $("#district").html('<option value="">Error loading districts</option>');
            }
        });
    } else {
        $("#district_area").hide();
        $("#block_area").hide();
        $("#district").html('<option value="">Select District</option>');
        $("#block").html('<option value="">Select Block</option>');
    }
}

function loadBlocks(districtId) {
    console.log("Loading blocks for district: " + districtId);
    
    if(districtId == "" || districtId == "0" || districtId == null) {
        $("#block_area").hide();
        $("#block").html('<option value="">Select Block</option>');
        return;
    }
    
    $.ajax({
        type: "POST",
        url: "get_block.php",
        data: {district_id: districtId},
        dataType: "html",
        success: function(data) {
            console.log("Blocks loaded: " + data);
            $("#block").html(data);
            
            <?php if($block > 0) { ?>
            setTimeout(function() {
                $("#block").val('<?=$block;?>');
            }, 100);
            <?php } ?>
            
            $("#block_area").show();
        },
        error: function(xhr, status, error) {
            console.log("AJAX Error loading blocks: " + error);
            $("#block").html('<option value="">Error loading blocks</option>');
        }
    });
}

function checkSubcat(val) {
    if(val == 5) {
        $("#subcat_div").show();
    } else {
        $("#subcat_div").hide();
    }
}

// On page load
$(document).ready(function() {
    console.log("Page loaded. Location: <?=$loc;?>, State: <?=$state;?>");
    
    // Check initial location value
    <?php if($loc == 0) { ?>
    // National - show state
    $("#state_area").show();
    <?php } else { ?>
    // International - hide state
    $("#state_area").hide();
    <?php } ?>
    
    <?php if($state == 1) { ?>
    $("#district_area").show();
    
    <?php if($district > 0) { ?>
    setTimeout(function() {
        loadBlocks('<?=$district;?>');
    }, 300);
    <?php } ?>
    <?php } ?>
});
</script>
    </body>
</html>