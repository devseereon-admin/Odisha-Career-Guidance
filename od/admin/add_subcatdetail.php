<?php
require_once('check-validate.php');
include "dbconn.php";

$id = $_GET['subcid'];
//echo "select * from detail where sid='$id' and status='1' ";

$cnt = mysqli_num_rows(mysqli_query($conn ,"select * from detail where 	subcat_id='$id' and status='1' "));

//echo "select * from detail where 	subcat_id='$id' and status='1' ";
//echo $chk;
//exit;
if($cnt!=0){
$detl= mysqli_query($conn , "select * from detail where subcat_id='$id' and status='1' ");
$res_sql = mysqli_fetch_assoc($detl);
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
<link href="assets/plugins/bootstrap3-wysihtml5/css/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" media="screen"/>
		<link href="assets/plugins/uikit/css/uikit.min.css" rel="stylesheet" type="text/css" media="screen"/>
		<link href="assets/plugins/uikit/vendor/codemirror/codemirror.css" rel="stylesheet" type="text/css" media="screen"/>
		<link href="assets/plugins/uikit/css/components/htmleditor.css" rel="stylesheet" type="text/css" media="screen"/>
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
            <div class='quick-area'>
                <div class='float-left'>
                    <ul class="info-menu left-links list-inline list-unstyled">
                        
                        
                        <li class="notify-toggle-wrapper list-inline-item">
                            
                            <ul class="dropdown-menu notifications animated fadeIn">
                                <li class="total dropdown-item">
                                    <span class="small">
                                        You have <strong>3</strong> new notifications.
                                        <a href="javascript:;" class="float-right">Mark all as Read</a>
                                    </span>
                                </li>
                                <li class="list dropdown-item">

                                    <ul class="dropdown-menu-list list-unstyled ps-scrollbar">
                                        <li class="unread available"> <!-- available: success, warning, info, error -->
                                            <a href="javascript:;">
                                                <div class="notice-icon">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                                <div>
                                                    <span class="name">
                                                        <strong>Server needs to reboot</strong>
                                                        <span class="time small">15 mins ago</span>
                                                    </span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="unread away"> <!-- available: success, warning, info, error -->
                                            <a href="javascript:;">
                                                <div class="notice-icon">
                                                    <i class="fa fa-envelope"></i>
                                                </div>
                                                <div>
                                                    <span class="name">
                                                        <strong>45 new messages</strong>
                                                        <span class="time small">45 mins ago</span>
                                                    </span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class=" busy"> <!-- available: success, warning, info, error -->
                                            <a href="javascript:;">
                                                <div class="notice-icon">
                                                    <i class="fa fa-times"></i>
                                                </div>
                                                <div>
                                                    <span class="name">
                                                        <strong>Server IP Blocked</strong>
                                                        <span class="time small">1 hour ago</span>
                                                    </span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class=" offline"> <!-- available: success, warning, info, error -->
                                            <a href="javascript:;">
                                                <div class="notice-icon">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                                <div>
                                                    <span class="name">
                                                        <strong>10 Orders Shipped</strong>
                                                        <span class="time small">5 hours ago</span>
                                                    </span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class=" offline"> <!-- available: success, warning, info, error -->
                                            <a href="javascript:;">
                                                <div class="notice-icon">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                                <div>
                                                    <span class="name">
                                                        <strong>New Comment on blog</strong>
                                                        <span class="time small">Yesterday</span>
                                                    </span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class=" available"> <!-- available: success, warning, info, error -->
                                            <a href="javascript:;">
                                                <div class="notice-icon">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                                <div>
                                                    <span class="name">
                                                        <strong>Great Speed Notify</strong>
                                                        <span class="time small">14th Mar</span>
                                                    </span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class=" busy"> <!-- available: success, warning, info, error -->
                                            <a href="javascript:;">
                                                <div class="notice-icon">
                                                    <i class="fa fa-times"></i>
                                                </div>
                                                <div>
                                                    <span class="name">
                                                        <strong>Team Meeting at 6PM</strong>
                                                        <span class="time small">16th Mar</span>
                                                    </span>
                                                </div>
                                            </a>
                                        </li>

                                    </ul>

                                </li>

                                <li class="external dropdown-item">
                                    <a href="javascript:;">
                                        <span>Read All Notifications</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                      
                    </ul>
                </div>		
                	
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

                    <div class="block1">
                        <div class="data">
                            <span class='title'>New&nbsp;Orders</span>
                            <span class='total'>2,345</span>
                        </div>
                        <div class="graph">
                            <span class="sidebar_orders">...</span>
                        </div>
                    </div>

                    <div class="block2">
                        <div class="data">
                            <span class='title'>Visitors</span>
                            <span class='total'>345</span>
                        </div>
                        <div class="graph">
                            <span class="sidebar_visitors">...</span>
                        </div>
                    </div>

                </div>
            </div>
            <!--  SIDEBAR - END -->
            <!-- START CONTENT -->
            <section id="main-content" class=" ">
                <section class="wrapper main-wrapper" style=''>

                    <div class='col-xl-12 col-lg-12 col-md-12 col-12'>
                        <div class="page-title">

                            <div class="float-left">
                                <h1 class="title">Profession</h1>                            </div>

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
                                <h2 class="title float-left">Add Profession</h2>
                                <div class="actions panel_actions float-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-12">
									<form name="careerfrm" method="post" action="subdetail_action.php" enctype="multipart/form-data">
									<?php
									if($cnt==0){
									?>
									<input type="hidden" name="action" value="add">
									<?php
									}else{
									?>
									<input type="hidden" name="action" value="update">
									<?php
									}
									?>
									<input type="hidden" name="sbid" value="<?=$id;?>">
									
									
									<div class="form-group">
                                            <label class="form-label" for="field-2">Banner</label>
											
                                           <?php
										   if($cnt!=0){
										   ?>
                                            <div class="controls">
											<?php 
										if($res_sql['banner']==''){
										?>
                                                <input type="file" value="" class="form-control" id="field-2" name="banner" >
												<?php
										}else{
												?>
										<input type="file" class="form-control" id="field-2" name="banner" ><br/><br/>
										<img src="../banner-image/<?=$res_sql['banner']?>" name="prev_banner" id="prev_banner"/ style="width:100px;height:100px;">
										
												<?php
										}
												?>
                                            </div>
											<?php
										   }else{
										   ?>
										       <div class="controls">
											
                                                <input type="file" value="" class="form-control" id="field-2" name="banner" >
												
										
                                            </div>
										   <?php
										   }
										   ?>
                                        </div>
									
                                        <div class="form-group">
                                            <label class="form-label" for="field-1">About Content</label>
											<?php
											if($cnt!=0){
											?>
                                            
                                             <textarea class="ckeditor" cols="80" id="editor1" name="about" rows="10">
											 
												<?=$res_sql['about'];?>
                                        </textarea>
										<?php
											}else{
										?>
										<textarea class="ckeditor" cols="80" id="editor1" name="about" rows="10">
											 
												
                                        </textarea>
										<?php
											}
										?>
                                        </div>
										
										 
										 <div class="form-group">
                                            <label class="form-label" for="field-2">About Image</label>
											
                                           <?php
										   if($cnt!=0){
										   ?>
                                            <div class="controls">
											<?php 
										if($res_sql['aboiut_img']==''){
										?>
                                                <input type="file" value="" class="form-control" id="field-2" name="abt_img" >
												<?php
										}else{
												?>
										<input type="file" class="form-control" id="field-2" name="abt_img" ><br/><br/>
										<img src="../about-image/<?=$res_sql['aboiut_img']?>" name="prev_abt_img" id="prev_abt_img"/ style="width:100px;height:100px;">
										
												<?php
										}
												?>
                                            </div>
											<?php
										   }else{
										   ?>
										       <div class="controls">
											
                                                <input type="file" value="" class="form-control" id="field-2" name="abt_img" >
												
										
                                            </div>
										   <?php
										   }
										   ?>
                                        </div>
										
										
										 <div class="form-group">
                                            <label class="form-label" for="field-1">Skill Required</label>
											<?php
											if($cnt!=0){
											?>
                                            
                                             <textarea class="ckeditor" cols="80" id="editor20" name="skill_required" rows="10">
											 
												<?=$res_sql['skill_required'];?>
                                        </textarea>
										<?php
											}else{
										?>
										<textarea class="ckeditor" cols="80" id="editor1" name="skill_required" rows="10">
											 
												
                                        </textarea>
										<?php
											}
										?>
                                        </div>
										
										
										
										
										<div class="form-group">
                                            <label class="form-label" for="field-2">Success Story Image</label>
											
                                           <?php
											if($cnt!=0){
											?>
                                            <div class="controls">
											<?php 
										if($res_sql['success_strimg']==''){
										?>
                                                <input type="file" value="" class="form-control" id="field-2" name="success_strimg" >
												<?php
										}else{
												?>
										<input type="file" class="form-control" id="field-2" name="success_strimg" ><br/><br/>
										<img src="../successtory-image/<?=$res_sql['success_strimg']?>" name="prev_success_strimg" id="prev_success_strimg"/ style="width:100px;height:100px;">
										
												<?php
										}
												?>
                                            </div>
											<?php
											}else{
											?>
											 <div class="controls">
											
                                                <input type="file" value="" class="form-control" id="field-2" name="success_strimg" >
												
                                            </div>
											<?php
											}
											?>
                                        </div>
										
										 <div class="form-group">
                                            <label class="form-label" for="field-1">Success title</label>
                                            
                                            <div class="controls">
											 <?php
											if($cnt!=0){
											?>
                                                <input type="text" class="form-control" id="field-1" name="sucees_stitle" value="<?=$res_sql['sucees_stitle']?>">
                                            <?php
											}else{
											?>
											<input type="text" class="form-control" id="field-1" name="sucees_stitle" value="">
											<?php
											}
											?>
											</div>
                                        </div>
										<div class="form-group">
                                            <label class="form-label" for="field-1">Success Link</label>
                                            
                                            <div class="controls">
											 <?php
											if($cnt!=0){
											?>
                                                <input type="text" class="form-control" id="field-1" name="success_slink" value="<?=$res_sql['success_slink']?>">
												<?php
											}else{
												?>
												 <input type="text" class="form-control" id="field-1" name="success_slink" value="">
												<?php
											}
												?>
                                            </div>
                                        </div>
										
										 <div class="form-group">
                                            <label class="form-label" for="field-1">success Content</label>
											<?php
											if($cnt!=0){
											?>
                                            
                                             <textarea class="ckeditor" cols="80" id="editor21" name="success_cont" rows="10">
											<?=$res_sql['success_cont'];?>
										</textarea>
										<?php
											}else{
										?>
										<textarea class="ckeditor" cols="80" id="editor2" name="success_cont" rows="10">
										</textarea>
										<?php
											}
										?>
                                        </div>
										
										
										
										
												 <div class="form-group">
                                            <label class="form-label" for="field-1">road_map</label>
											<?php
											if($cnt!=0){
											?>
                                              <div class="controls">
											<?php 
										if($res_sql['road_map']==''){
										?>
                                                <input type="file" value="" class="form-control" id="field-2" name="road_map" >
												<?php
										}else{
												?>
										<input type="file" class="form-control" id="field-2" name="road_map" ><br/><br/>
										<img src="../roadmap-image/<?=$res_sql['road_map']?>" name="prev_road_map" id="prev_road_map"/ style="width:100px;height:100px;">
										
												<?php
										}
												?>
                                            </div>
                                            
										<?php
											}else{
										?>
										 <div class="controls">
										 <input type="file" value="" class="form-control" id="field-2" name="road_map" >
										 </div>
										<?php
											}
										?>
                                        </div>
										 <div class="form-group">
                                            <label class="form-label" for="field-1">clg_in</label>
                                            <?php
											if($cnt!=0){
											?>
                                            <textarea class="ckeditor" cols="80" id="editor3" name="clg_in" rows="10">
											<?=$res_sql['clg_in'];?>
											</textarea>
				<?php
											}else{
										?>
										 <textarea class="ckeditor" cols="80" id="editor3" name="clg_in" rows="10">
				</textarea>
										<?php
											}
										?>
                                        </div>
										 <div class="form-group">
                                            <label class="form-label" for="field-1">clg_od</label>
											
                                            <?php
											if($cnt!=0){
											?>
                                             <textarea class="ckeditor" cols="80" id="editor4" name="clg_od" rows="10">
											 <?=$res_sql['clg_od'];?>
											 </textarea>
											 <?php
											}else{
											 ?>
											 <textarea class="ckeditor" cols="80" id="editor4" name="clg_od" rows="10"></textarea>
											 <?php
											}
											 ?>
                                        </div>
										 <div class="form-group">
                                            <label class="form-label" for="field-1">clg_ab</label>
											<?php
											if($cnt!=0){
											?>
                                            
                                             <textarea class="ckeditor" cols="80" id="editor5" name="clg_ab" rows="10">
											 <?=$res_sql['clg_ab'];?>
											 </textarea>
											 <?php
											}else{ 
											?>
											 <textarea class="ckeditor" cols="80" id="editor5" name="clg_ab" rows="10"></textarea>
											<?php
											}
											?>
                                        </div>
										 <div class="form-group">
                                            <label class="form-label" for="field-1">enxm_in</label>
											<?php
											if($cnt!=0){
											?>
                                            
                                             <textarea class="ckeditor" cols="80" id="editor6" name="enxm_in" rows="10">
											 <?=$res_sql['enxm_in'];?>
											 </textarea>
											 <?php
											}else{ 
											 ?>
											 <textarea class="ckeditor" cols="80" id="editor6" name="enxm_in" rows="10"></textarea>
											 <?php
											}
											 ?>
                                        </div>
										 <div class="form-group">
                                            <label class="form-label" for="field-1">enxm_od</label>
                                            <?php
											if($cnt!=0){
											?>
                                             <textarea class="ckeditor" cols="80" id="editor7" name="enxm_od" rows="10">
											 <?=$res_sql['enxm_od'];?>
											 </textarea>
											 <?php
											}else{
											 ?>
											 <textarea class="ckeditor" cols="80" id="editor7" name="enxm_od" rows="10"></textarea>
											 <?php
											}
											 ?>
                                        </div>
										 <div class="form-group">
                                            <label class="form-label" for="field-1">enxm_ab</label>
                                             <?php
											if($cnt!=0){
											?>
                                             <textarea class="ckeditor" cols="80" id="editor8" name="enxm_ab" rows="10">
											 <?=$res_sql['enxm_ab'];?>
											 </textarea>
											 <?php
											}else{
											 ?>
											 <textarea class="ckeditor" cols="80" id="editor8" name="enxm_ab" rows="10"></textarea>
											 <?php
											}
											 ?>
                                        </div>
										 <div class="form-group">
                                            <label class="form-label" for="field-1">schlr_od</label>
											<?php
											if($cnt!=0){
											?>

                                            
                                             <textarea class="ckeditor" cols="80" id="editor9" name="schlr_od" rows="10">
											 <?=$res_sql['schlr_od'];?>
											 </textarea>
											 <?php
											}else{
											 ?>
											 <textarea class="ckeditor" cols="80" id="editor9" name="schlr_od" rows="10">
											 
											 </textarea>
											 <?php
											}
											 ?>
                                        </div>
										 <div class="form-group">
                                            <label class="form-label" for="field-1">schlr_national</label>
                                            <?php
											if($cnt!=0){
											?>
                                             <textarea class="ckeditor" cols="80" id="editor10" name="schlr_national" rows="10">
											 <?=$res_sql['schlr_national'];?>
											 </textarea>
											 <?php
											}else{
											 ?>
											 <textarea class="ckeditor" cols="80" id="editor10" name="schlr_national" rows="10"></textarea>
											 <?php
											}
											 ?>
                                        </div>
										 <div class="form-group">
                                            <label class="form-label" for="field-1">enterprener</label>
                                             <?php
											if($cnt!=0){
											?>
                                             <textarea class="ckeditor" cols="80" id="editor11" name="enterprener" rows="10">
											  <?=$res_sql['enterprener'];?>
											 </textarea>
											 <?php
											}else{
											 ?>
											 <textarea class="ckeditor" cols="80" id="editor11" name="enterprener" rows="10"></textarea>
											 <?php
											}
											 ?>
                                        </div>
										
										<div class="form-group">
                                            <label class="form-label" for="field-2">enterprener Success Story Image</label>
											<?php
											if($cnt!=0){
											?>
                                           
												<div class="controls">
												<?php 
												if($res_sql['enterpre_succ_img']==''){
												?>
												<input type="file" value="" class="form-control" id="field-2" name="enterpre_succ_img" >
												<?php
												}else{
												?>
												<input type="file" class="form-control" id="field-2" name="enterpre_succ_img" ><br/><br/>
												<img src="../successtory-image/<?=$res_sql['enterpre_succ_img']?>" name="prev_enterpre_succ_img" id="prev_enterpre_succ_img"/ style="width:100px;height:100px;">

												<?php
												}
												?>
												</div>
											<?php
											}else{
											?>
												<div class="controls">
												<input type="file" value="" class="form-control" id="field-2" name="enterpre_succ_img" >
												</div>
											<?php
											}
											?>
                                        </div>
										
										
										
										 <div class="form-group">
                                            <label class="form-label" for="field-1">enterprener Success title</label>
                                            
                                            <div class="controls">
											<?php
											if($cnt!=0){
											?>
                                                <input type="text" class="form-control" id="field-1" name="enterpre_succ_titl" value="<?=$res_sql['enterpre_succ_titl']?>">
												<?php
											}else{
												?>
												 <input type="text" class="form-control" id="field-1" name="enterpre_succ_titl" value="">
												<?php
											}
												?>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="form-label" for="field-1">enterprener Success Link</label>
                                            
                                            <div class="controls">
											<?php
											if($cnt!=0){
											?>
                                                <input type="text" class="form-control" id="field-1" name="enterpre_succ_source" value="<?=$res_sql['enterpre_succ_source']?>">
												<?php
											}else{
												?>
												 <input type="text" class="form-control" id="field-1" name="enterpre_succ_source" value="">
												<?php
											}
												?>
                                            </div>
                                        </div>
										
										 <div class="form-group">
                                            <label class="form-label" for="field-1">enterprener success Content</label>
											<?php
											if($cnt!=0){
											?>
                                            
                                             <textarea class="ckeditor" cols="80" id="editor21" name="enterpre_succ_con" rows="10">
											<?=$res_sql['enterpre_succ_con'];?>
										</textarea>
										<?php
											}else{
										?>
										<textarea class="ckeditor" cols="80" id="editor2" name="enterpre_succ_con" rows="10">
										</textarea>
										<?php
											}
										?>
                                        </div>
										 <div class="form-group">
                                            <label class="form-label" for="field-1">differenty_abled</label>
                                             <?php
											if($cnt!=0){
											?>
                                             <textarea class="ckeditor" cols="80" id="editor12" name="differenty_abled" rows="10">
											 <?=$res_sql['differenty_abled'];?>
											 </textarea>
											 <?php
											}else{
											 ?>
											  <textarea class="ckeditor" cols="80" id="editor12" name="differenty_abled" rows="10"></textarea>
											 <?php
											}
											 ?>
                                        </div>

                                       
										 <?php
											if($cnt==0){
											?>
										<button type="submit" value="submit" class="btn btn-success btn-corner">Submit</button>
										<?php
											}else{
										?>
										<button type="submit" value="update" class="btn btn-success btn-corner">Update</button>
										<?php
											}
										?>
									</form>
                                    </div>
                                </div>


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
                    <ul class="contact-list">

                        <li class="user-row" id='chat_user_4' data-user-id='4'>
                            <div class="user-img">
                                <a href="#"><img src="data/profile/avatar-4.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Carri Busey</a></h4>
                                <span class="status offline" data-status="offline"> Offline</span>
                            </div>
                            <div class="user-status offline">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>
                        <li class="user-row" id='chat_user_5' data-user-id='5'>
                            <div class="user-img">
                                <a href="#"><img src="data/profile/avatar-5.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Melissa Dock</a></h4>
                                <span class="status offline" data-status="offline"> Offline</span>
                            </div>
                            <div class="user-status offline">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>
                        <li class="user-row" id='chat_user_6' data-user-id='6'>
                            <div class="user-img">
                                <a href="#"><img src="data/profile/avatar-1.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Verdell Rea</a></h4>
                                <span class="status available" data-status="available"> Available</span>
                            </div>
                            <div class="user-status available">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>
                        <li class="user-row" id='chat_user_7' data-user-id='7'>
                            <div class="user-img">
                                <a href="#"><img src="data/profile/avatar-2.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Linette Lheureux</a></h4>
                                <span class="status busy" data-status="busy"> Busy</span>
                            </div>
                            <div class="user-status busy">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>
                        <li class="user-row" id='chat_user_8' data-user-id='8'>
                            <div class="user-img">
                                <a href="#"><img src="data/profile/avatar-3.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Araceli Boatright</a></h4>
                                <span class="status away" data-status="away"> Away</span>
                            </div>
                            <div class="user-status away">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>
                        <li class="user-row" id='chat_user_9' data-user-id='9'>
                            <div class="user-img">
                                <a href="#"><img src="data/profile/avatar-4.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Clay Peskin</a></h4>
                                <span class="status busy" data-status="busy"> Busy</span>
                            </div>
                            <div class="user-status busy">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>
                        <li class="user-row" id='chat_user_10' data-user-id='10'>
                            <div class="user-img">
                                <a href="#"><img src="data/profile/avatar-5.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Loni Tindall</a></h4>
                                <span class="status away" data-status="away"> Away</span>
                            </div>
                            <div class="user-status away">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>
                        <li class="user-row" id='chat_user_11' data-user-id='11'>
                            <div class="user-img">
                                <a href="#"><img src="data/profile/avatar-1.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Tanisha Kimbro</a></h4>
                                <span class="status idle" data-status="idle"> Idle</span>
                            </div>
                            <div class="user-status idle">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>
                        <li class="user-row" id='chat_user_12' data-user-id='12'>
                            <div class="user-img">
                                <a href="#"><img src="data/profile/avatar-2.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Jovita Tisdale</a></h4>
                                <span class="status idle" data-status="idle"> Idle</span>
                            </div>
                            <div class="user-status idle">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>

                    </ul>
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
		
        </script> 
		 <script src="assets/plugins/bootstrap3-wysihtml5/js/bootstrap3-wysihtml5.all.js" type="text/javascript"></script>
		<script src="assets/plugins/ckeditor/ckeditor.js" type="text/javascript"></script><!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


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
	<script>
    function gtceer(strmid){
		$.ajax({
			type:'POST',
			url:"gceeroption.php",
			data:{strmid:strmid},
			beforeSend:function(json)
			{
				$('.preloader').show();
			},
			success:function(result){
				$('#creerid').html(result);
				
				
			},
			complete:function(json)
			{
				$('.preloader').hide();
			}
		});
	}
</script>
</html>



