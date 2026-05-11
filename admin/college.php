<?php

include "dbconn.php";
include "includes/audit_log.php";

saveAuditLog(
    $conn,
    "College",
    "VIEW",
    "Viewed college list page"
);

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

        <link href="assets/plugins/datatables/css/datatables.min.css" rel="stylesheet" type="text/css" media="screen"/>        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 

        <!-- CORE CSS TEMPLATE - START -->

        <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>

        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>

        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

        <!-- CORE CSS TEMPLATE - END -->

        <style>

            /* Fix table overflow */

            .table-container {

                width: 100%;

                overflow-x: auto;

            }

            

            /* Prevent text breaking layout */

            table.dataTable td {

                white-space: nowrap;

                max-width: 250px;

                overflow: hidden;

                text-overflow: ellipsis;

            }

            

            /* Show full content on hover */

            table.dataTable td:hover {

                white-space: normal;

                word-wrap: break-word;

                background-color: #f8f9fa;

                box-shadow: 0 0 10px rgba(0,0,0,0.1);

            }

            

            /* Better spacing */

            .dataTables_wrapper .dataTables_length,

            .dataTables_wrapper .dataTables_filter {

                margin-bottom: 10px;

            }

            

            /* Style for dash */

            .text-muted {

                color: #999;

                font-style: italic;

            }

            

            /* Action buttons */

            .action-links a {

                margin: 0 5px;

                text-decoration: none;

            }

            .action-links a:hover {

                text-decoration: underline;

            }

        </style>



    </head>

    <!-- END HEAD -->



    <!-- BEGIN BODY -->

    <body>

        <!-- START TOPBAR -->

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







                <div class="project-info"></div>

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

                    <div class="col-xl-12">

                        <section class="box ">

                            <header class="panel_header">

                                <h2 class="title float-left">List Of Colleges</h2>

                                <div class="actions panel_actions float-right">

                                   <a href="add_clg.php" style="background-color:#0f3970;color:#fff;padding: 10px; border-radius: 10px;">Add New</a>

                                </div>

                            </header>

                            <div class="content-body">    

                                <div class="row">

                                    <div class="col-lg-12 col-md-12 col-12 padding-0">



                                        <div class="table-container">

                                         <table id="example-11" class="table table-striped display nowrap" width="100%">

                                           <thead>

                                                <tr>

                                                    <th>SL.No</th>

                                                    <th>Name</th>

                                                    <th>Institute type</th>

                                                    <th>Stream</th>

                                                    <th>Location</th>

                                                    <th>State</th>

                                                    <th>District</th>

                                                    <th>Block</th>

                                                    <th>Arts Courses</th>

                                                    <th>Science Courses</th>

                                                    <th>Commerce Courses</th>

                                                    <th>Other Courses</th>

                                                    <th>Link</th>

                                                    <th>Action</th>

                                                </tr>

                                            </thead>

                                            <tbody>

<?php

$stm_sql = mysqli_query($conn,"select * from college where status='1' ORDER BY id DESC");

$i=1;

while($res_stm = mysqli_fetch_array($stm_sql)){



    $cid = $res_stm['id'];

    $institute_type = $res_stm['institute_typ'];

    $stream = $res_stm['stream'];

    $location = $res_stm['location'];

    $state = $res_stm['state'];

    $district = $res_stm['district'];

    $block = $res_stm['block'];

    

    // Get stream name with error handling

    $stream_name = '-';

    if(!empty($stream)) {

        $stream_query = mysqli_query($conn ,"select * from catagory where id='$stream' and status='1'");

        if($stream_query && mysqli_num_rows($stream_query) > 0) {

            $stream_exe = mysqli_fetch_assoc($stream_query);

            $stream_name = isset($stream_exe['name']) ? $stream_exe['name'] : '-';

        }

    }

    

    // Get state name with error handling

    $state_name = '-';

    if(!empty($state) && $state > 0) {

        $state_query = mysqli_query($conn ,"select * from state where id='$state' and status='1'");

        if($state_query && mysqli_num_rows($state_query) > 0) {

            $state_exe = mysqli_fetch_assoc($state_query);

            $state_name = isset($state_exe['name']) ? $state_exe['name'] : '-';

        }

    }

    

    // Get district name - only if state is Odisha (1)

    $district_name = '-';

    if($state == 1 && !empty($district) && $district > 0) {

        $district_query = mysqli_query($conn,"select * from district where id='$district' and status='1'");

        if($district_query && mysqli_num_rows($district_query) > 0) {

            $district_exe = mysqli_fetch_assoc($district_query);

            $district_name = isset($district_exe['name']) ? $district_exe['name'] : '-';

        }

    }

    

    // Get block name - only if state is Odisha (1)

    $block_name = '-';

    if($state == 1 && !empty($block) && $block > 0) {

        $block_query = mysqli_query($conn,"select * from block where id='$block' and status='1'");

        if($block_query && mysqli_num_rows($block_query) > 0) {

            $block_exe = mysqli_fetch_assoc($block_query);

            $block_name = isset($block_exe['name']) ? $block_exe['name'] : '-';

        }

    }

?>

    <tr>

        <td><?=$i;?></td>

        <td><?=($res_stm['name'])?></td>

        <td>

            <?php

            if($institute_type == 1){

                echo "Govt.";

            } elseif($institute_type == 2){

                echo "Private";

            } else {

                echo '<span class="text-muted">-</span>';

            }

            ?>

        </td>

        <td><?=($stream_name);?></td>

        <td>

            <?php

            if($location == 0){

                echo "National";

            } elseif($location == 1){

                echo "International";

            } else {

                echo '<span class="text-muted">-</span>';

            }

            ?>

        </td>

        <td><?=($state_name)?></td>

        <td><?=($district_name)?></td>

        <td><?=($block_name)?></td>

        <td title="<?=($res_stm['description'])?>"><?=!empty($res_stm['description']) ? ($res_stm['description']) : '<span class="text-muted">-</span>'?></td> 

        <td title="<?=($res_stm['sciencecourse'])?>"><?=!empty($res_stm['sciencecourse']) ? ($res_stm['sciencecourse']) : '<span class="text-muted">-</span>'?></td> 

        <td title="<?=($res_stm['comercourse'])?>"><?=!empty($res_stm['comercourse']) ? ($res_stm['comercourse']) : '<span class="text-muted">-</span>'?></td> 

        <td title="<?=($res_stm['othercourse'])?>"><?=!empty($res_stm['othercourse']) ? ($res_stm['othercourse']) : '<span class="text-muted">-</span>'?></td> 

        <td>

            <?php if(!empty($res_stm['link'])) { ?>

                <a href="<?=($res_stm['link']);?>" target="_blank" title="<?=($res_stm['link']);?>">Link</a>

            <?php } else { ?>

                <span class="text-muted">-</span>

            <?php } ?>

        </td>

        <td class="action-links">

            <a href="edit_clg.php?id=<?=$cid;?>&audit=edit" style="color:#0f3970;">Edit</a> 

            <a href="delete-row.php?id=<?=$cid;?>&table=college&page=college.php" style="color:#dc3545;" onclick="return confirm('Are you sure you want to delete this college?')">Delete</a>

        </td>

    </tr>

<?php

$i++;

}

?>

                                            </tbody>

                                         </table>

                                        </div>



                                    </div>

                                </div>

                            </div>

                        </section>

                        

                    </div>

                </section>

            </section>

            <!-- END CONTENT -->

        </div>

        <!-- END CONTAINER -->

        





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

        

         <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

         <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

         

         <script>

            $(document).ready(function () {

                $('#example-11').DataTable({

                    "pageLength": 10,

                    "lengthMenu": [5, 10, 25, 50, 100],

                    "scrollX": true,

                    "autoWidth": false,

                    "ordering": true,

                    "responsive": false

                });

            });

         </script>

    </body>

</html>