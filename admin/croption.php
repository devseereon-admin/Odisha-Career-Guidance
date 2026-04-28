<?php
include "dbconn.php";
?>
<!DOCTYPE html>
<html>
    <head>
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
            .table-container {
                width: 100%;
                overflow-x: auto;
                margin-bottom: 30px;
                background: #fff;
                padding: 15px;
                border-radius: 10px;
                box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            }
            
            /* Heading spacing */
            .table-container h2 {
                margin-bottom: 15px;
                font-size: 18px;
            }
            
            /* Fix table breaking */
            table.dataTable {
                width: 100% !important;
            }
            
            table.dataTable td {
                white-space: nowrap;
                max-width: 250px;
                overflow: hidden;
                text-overflow: ellipsis;
            }
            
            table.dataTable td:hover {
                white-space: normal;
            }
            
            .highlight-text {
                font-size: 1.2em;
                font-weight: bold;
                color:#3498db;
            }
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
                <!-- MAIN MENU - START -->
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
                                <h1 class="title">Career Options</h1>  
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
                        <section class="box">
                            <header class="panel_header">
                                <h2 class="title float-left">List Of Career Options</h2>
                                <div class="actions panel_actions float-right">
                                   <a href="add_creer.php" style="background-color:#0f3970;color:#fff;padding: 10px; border-radius: 10px;">Add New</a>
                                </div>
                            </header>
                            <div class="content-body">    
							<div class="row">
							<?php
							$cat_sql = mysqli_query($conn ,"select * from catagory where status='1' ");
							while($es_cat = mysqli_fetch_array($cat_sql))
							{
								$cattid = $es_cat['id'];
							?>     
                                       <div class="col-lg-12 col-md-12 col-12 padding-0">
                                          <div class="table-container">
                                            <h2 class="title float-left">List Of Career Options Under <strong class="highlight-text text-uppercase"><?=$es_cat['name'];?></strong></h2>
                                            <table id="example-<?=$cattid;?>" class="table table-striped datatable">
                                            <thead>
                                                <tr>
												
                                                    <th>Name</th>
                                                    <th>stream</th>
													<th>Detail</th>
													<th>View</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                           
                                            <tbody>
                                            <?php
                                            $stm_sql = mysqli_query($conn,"SELECT * FROM subcatagory WHERE cat_id='$cattid' AND status='1'");
                                            while($res_stm = mysqli_fetch_array($stm_sql)){
                                                $ssid = $res_stm['id'];
                                                $slug = $res_stm['slug'];
                                            
                                                // Check if any active sub_subcategory exists
                                                $chk_subsubcat = mysqli_num_rows(
                                                    mysqli_query($conn, "SELECT id FROM sub_subcategory WHERE subcat_id='$ssid' AND status='1'")
                                                );
                                            ?>
                                                <tr>
                                                    <td><?=$res_stm['name']?></td>
                                                    <td><?=$res_stm['cat_name']?></td>
                                            
                                                    <?php
                                                    // Show buttons ONLY if:
                                                    // 1) has_sub = 0
                                                    // 2) and no active sub_subcategory exists
                                                    if($res_stm['has_sub'] == 0 && $chk_subsubcat == 0){
                                                    ?>
                                                        <td>
                                                            <a href="add_subcatdetail.php?subcid=<?=$ssid;?>" style="background-color:#fff;color:#000;padding:6px;border: 1px solid #000;">
                                                                Add Detail
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="../<?=$slug;?>.php" style="background-color:#fff;color:#000;padding:6px;border: 1px solid #000;">
                                                                View Detail
                                                            </a>
                                                        </td>
                                                    <?php } else { ?>
                                                        <td></td>
                                                        <td></td>
                                                    <?php } ?>
                                            
                                                    <td>
                                                        <?php if($chk_subsubcat == 0){ // âœ… Only show delete if NO sub_subcategory ?>
                                                            <a href="subcat_delete.php?id=<?=$ssid;?>" 
                                                               onclick="return confirm('Are you sure you want to delete this subcategory?');"
                                                               style="padding:6px;border:1px solid red;color:red;">
                                                               Delete
                                                            </a>
                                                        <?php } else { ?>
                                                            <!-- Optional: show text instead of button -->
                                                            <span style="color:#999;">Has Sub-Category</span>
                                                        <?php } ?>
                                                    </td>
                                                
                                                </tr>
                                            <?php } ?>
                                            </tbody>

                                        </table>
                                          </div>
                                       </div>
									<?php
							}
									?>
                                </div>
                            </div>
                        </section>
                    </div>
                </section>
            </section>
            <!-- END CONTENT -->


            <div class="chatapi-windows"></div>   
        </div>
        <!-- END CONTAINER -->
        
        
        <!-- ✅ FIRST load jQuery -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        
        <!-- THEN Bootstrap & plugins -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/plugins/pace/pace.min.js"></script>
        <script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script src="assets/plugins/viewport/viewportchecker.js"></script>
        
        <!-- THEN template scripts (sidebar depends on jQuery) -->
        <script src="assets/js/scripts.js"></script>
        
        <!-- THEN DataTables -->
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        
        <!-- THEN your custom script -->
        <script>
        $(document).ready(function () {
            $('.datatable').each(function () {
                $(this).DataTable({
                    pageLength: 5,
                    lengthMenu: [5, 10, 25, 50, 100],
                    scrollX: true,
                    autoWidth: false,
                    ordering: true,
        
                    dom: 'lfrtip',
                    language: {
                        search: "Search:",
                        lengthMenu: "Show _MENU_ entries"
                    }
                });
            });
        });
        </script>
         
    </body>
</html>



