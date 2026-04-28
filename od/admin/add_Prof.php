<?php
require_once('check-validate.php');
include "dbconn.php";
if (!empty($_POST['action']) && $_POST['action'] == "add") {
    extract($_POST);
    
    $strm_det = mysqli_fetch_assoc(mysqli_query($conn ,"select * from `catagory` where id='$strm' and status='1' "));
    $strmname = $strm_det['name'];
    
    $career_det = mysqli_fetch_assoc(mysqli_query($conn ,"select * from `subcatagory` where id='$career' and status='1' "));
    $careername = $career_det['name'];
    
    $slug = trim($name);
    $slug = mb_strtolower($slug, 'UTF-8');
    $slug = preg_replace('/\s+/u', '-', $slug); // replace spaces with hyphen

    
    $insert = mysqli_query($conn , "INSERT INTO `sub_subcategory`(`name`, `cat_id`, `cat_name`, `subcat_id`, `subcat_name`,`slug`) VALUES ('$name' ,'$strm' ,'$strmname','$career','$careername','$slug')");
    
    if($insert){
        // Create the PHP file for this sub_subcategory
        $filename = "../" . $slug . ".php"; // Create file outside admin folder
        
            $file_content = '<?php 
include "admin/dbconn.php"; 
$det_sub = mysqli_query($conn ,"select * from sub_subcategory where slug=\'' . $slug . '\' and status=\'1\'");
$res_det = mysqli_fetch_assoc($det_sub);
$pid = $res_det[\'id\'];
$subcat_name = $res_det[\'subcat_name\'];
$details = mysqli_fetch_assoc(mysqli_query($conn,"select * from detail where sid=\'$pid\' and status=\'1\'"));

$about = $details[\'about\'];

?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Ama Career</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
			<?php include "include/header_css.php";?>
	
	
		<?php include "include/script.php";?>
		<script src="admin/assets/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
		<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({\'gtm.start\':
new Date().getTime(),event:\'gtm.js\'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!=\'dataLayer\'?\'&l=\'+l:\'\';j.async=true;j.src=
\'https://www.googletagmanager.com/gtm.js?id=\'+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,\'script\',\'dataLayer\',\'GTM-K43FK2HL\');</script>
<!-- End Google Tag Manager -->

	</head>
	<body>
	    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K43FK2HL"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

			<!-- -------------header start---------- -->
		<!--<section class="top-logo">-->
		<!--	<div class="container">-->
		<!--		<div class="row">-->
		<!--			<div class="col-md-4 col-8 img-one" >-->
		<!--				<img src="img/Logo-1.png" class="img-fluid">-->
		<!--			</div>-->
		<!--			<div class="col-md-4 col-2 img-two">-->
		<!--				<img src="img/Logo-2.png" class="img-fluid">-->
		<!--			</div>-->
		<!--			<div class="col-md-4 col-2 img-three" >-->
		<!--				<img src="img/Unicef-logo.gif" class="img-fluid">-->
		<!--			</div>-->
		<!--		</div>-->
		<!--	</div>-->
		<!--</section>-->
		<section class="top-logo">
			<div class="container">
				<?php include "include/top_bar.php";?>
			</div>
		</section>
		<section class ="bg-pattern header-menubg" >
			<div class="container">
			<div class="row">
			<div class="col-md-10 col-6">
				<?php include "include/nav_menu.php";?> 
			</div>
			
			
			<div class="col-md-2 col-6">
                    <nav class="navbar navbar-expand-sm navbar-dark">
                        <div class="d-flex language">
                        <div class="language-en">
                            <a href="../#" class="language-eng">English</a>
                        </div>
                        <div class="language-od">
                        <a href="' . $slug . '.php" class="language-odia">ଓଡିଆ</a>
                        </div>
                        </div>
                    </nav> 
			</div>
			</div>      
		</section>
		<!------ header end ------------->
		 <div class="headingbnner" >
		   
		      <div class="row">
		          <div class="col-md-6" style="text-align:right;">
		              <img src="banner-image/<?=$details[\'banner\'];?>" style="width:300px;height:300px;">
		          </div>
		          <div class="col-md-6" style="text-align:left;padding-top:100px;">
		            
		               <h2 class="heading-one-two"><?=$subcat_name;?> ରେ</h2>
				<h1 class="heading-one">ବୃତ୍ତି</h1>
		          </div>
		      </div>
				</div>
		<section class="psephologist-one">
			<div class="container">
				<!--<h2 class="heading-one-two">CAREER IN</h2>-->
				<!--<h1 class="heading-one"><//?=$subcat_name;?></h1>-->
				
				<div class="row">
					<div class="col-md-3" >
						<div class="search-btn">
					    <form action="/action_page.php">
					      <input type="text" placeholder="Search.." name="search">
					      <button type="submit"><i class="fa fa-search"></i></button>
					    </form>
					  	</div>
					  	<div class="heading-psephologist">
					  		<h3><?=$res_det[\'name\'];?></h3>
					  	</div>
					</div>
					<div class="col-md-9 border-psepho" >
							<!-- Nav tabs -->
						  <ul class="nav nav-tabs" role="tablist">
						    <li class="nav-item">
						      <a class="nav-link active" data-toggle="tab" href="#home">ବିବରଣୀ</a>
						    </li>
						    <li class="nav-item">
						      <a class="nav-link" data-toggle="tab" href="#menu1">ଯୋଜନା</a>
						    </li>
						    <li class="nav-item">
						      <a class="nav-link" data-toggle="tab" href="#menu3">ଶିକ୍ଷାନୁଷ୍ଠାନ</a>
						    </li>
						    <li class="nav-item">
						      <a class="nav-link" data-toggle="tab" href="#menu2">ପ୍ରବେଶିକା ପରୀକ୍ଷା</a>
						    </li>
						    <li class="nav-item">
						      <a class="nav-link" data-toggle="tab" href="#menu4">ମେଧାବୃତ୍ତି</a>
						    </li>
						    <li class="nav-item">
						      <a class="nav-link" data-toggle="tab" href="#menu5">ଉଦ୍ୟୋଗ</a>
						    </li>
						    <li class="nav-item">
						      <a class="nav-link" data-toggle="tab" href="#menu6">ଦିବ୍ୟାଙ୍ଗ</a>
						    </li>
						  </ul>

						  <!-- Tab panes -->
						  <div class="tab-content">
						    <div id="home" class="contaner tab-pane active"><br>
						      <div class="row">
						      	<div class="col-md-12">
						      		<div class="psefology-skill-spea">
						      		<h3 class="hading-for-tab"><?=$res_det[\'name\'];?></h3>
						      		<p><?=$details[\'about\'];?></p>
						      		<img src="about-image/<?=$details[\'aboiut_img\'];?>" class="img-fluid">
						      		<h5>ଆବଶ୍ୟକ ଦକ୍ଷତା :</h5>
						      		<?=$details[\'skill_required\'];?>
						      	
						      		<h5>ସଫଳତାର କାହାଣୀ</h5>
						      		<div class="row yogendra-head">
						      				<a href="#"><img src="successtory-image/<?=$details[\'success_strimg\'];?>" style="border-radius: 100px; width:100px;" class="img-fluid"></a>
						      			
						      			<div class="col-md-10 col-9">
						      				<p class="Yogendra-heading" ><b><?=$details[\'sucees_stitle\'];?></b></p>
						      			</div>
						      		</div>
										 <?=$details[\'success_cont\'];?>
										 <br>
										 <a href="<?=$details[\'success_slink\'];?>" class="color-btn" target="blank">
						                 ଉତ୍ସ</a><br><br>
						      		<div class="row you-tube-channel">
						      			<div class="col-md-1 col3">
						      				<a href="https://youtube.com/@odishacareerguidanceportal8840?si=ZUssJpgdl4SxSeMS"><img src="img/free-youtube-logo-icon-2431-thumb.png" width="50px" class="img-fluid"></a>
						      			</div>
						      			<div class="col-md-11 col-9">
						      				<p style="padding-top: 6px;"><b>ଅଧିକ ସୂଚନା ପାଇଁ, ଆମର ୟୁଟ୍ୟୁବ୍ ଚ୍ୟାନେଲ୍ ପରିଦର୍ଶନ କରନ୍ତୁ</b></p>
						      			</div>
						      		</div>
						      	</div>
						      	</div>
						    
						      </div>
						    </div>
						    <div id="menu1" class="contaner tab-pane fade"><br>
						     <img src="roadmap-image/<?=$details[\'road_map\'];?>" class="img-fluid">
						    </div>
							 <div id="menu2" class="container tab-pane fade"><br>
						      <h3 class="heading-for-tab">ପ୍ରବେଶିକା ପରୀକ୍ଷା</h3>
						     <!-- <h5><u>Entrance Exams Odisha</u></h5>-->
						     <!--<?=$details[\'enxm_od\'];?>-->
						      <h5><u>ପ୍ରବେଶିକା ପରୀକ୍ଷା ଭାରତ</u></h5>
						     <?=$details[\'enxm_in\'];?>
						      
						    </div>
							
						    
								<div id="menu3" class="container tab-pane fade"><br>
						     <h3 class="heading-for-tab">ଶିକ୍ଷାନୁଷ୍ଠାନ</h3>
						     <h5><u>Colleges in Odisha</u></h5>
						    <?=$details[\'clg_od\'];?>
						      <h5><u>Colleges in India</u></h5>
						       <?=$details[\'clg_in\'];?>
						      <!--<h5><u>Colleges Abroad </u></h5>-->
						      <!--<?=$details[\'clg_ab\'];?>-->
						    </div>
							
						   
						    
							 <div id="menu4" class="container tab-pane fade"><br>
						      <h3 class="heading-for-tab">ମେଧାବୃତ୍ତି</h3>
						      <h5><u>Scholarship in Odisha</u></h5><br>
						     <?=$details[\'schlr_od\'];?>
						      <h5><u>Scholarship in India</u></h5><br>
						       <?=$details[\'schlr_national\'];?>
						    </div>
						   
							  <div id="menu5" class="container tab-pane fade"><br>
						      <h3 class="heading-for-tab">ଉଦ୍ୟୋଗ</h3>
							  <?=$details[\'enterprener\'];?>
						     <!--<h5>SUCCESS STORY </h5>-->
						     <!-- 		 <div class="row yogendra-head">-->
						     <!-- 				<a href="#"><img src="successtory-image/<?=$details[\'enterpre_succ_img\'];?>" style="border-radius: 100px; width:100px;" class="img-fluid"></a>-->
						      			
						     <!-- 			<div class="col-md-10 col-9">-->
						     <!-- 				<p class="Yogendra-heading" ><b> <?=$details[\'enterpre_succ_titl\'];?></b></p>-->
						     <!-- 			</div>-->
						     <!-- 		</div> 	-->
										 <!--<?=$details[\'enterpre_succ_con\'];?><br><br>-->
										 <!--<a href="<?=$details[\'enterpre_succ_source\'];?>" class="color-btn" target="blank">-->
						     <!--            Source</a><br><br>-->
						    </div>
							 
						    <div id="menu6" class="container tab-pane fade"><br>
						      <?=$details[\'differenty_abled\'];?>
						    </div>
						  </div>
					</div>
				</div>
			</div>
		</section>
		<!-- -------------footer start---------- -->
		<?php include "include/before-footer.php";?>
		<!---------------footer end------------>
	</body>
</html>';
        // Write the file
        if(file_put_contents($filename, $file_content)) {
            $msg = "Sub-subcategory added and file created successfully";
            $alert = "success";
        } else {
            $msg = "Sub-subcategory added but file creation failed";
            $alert = "warning";
        }
        
    } else {
        $msg = "Unable to add sub-subcategory";
        $alert = "danger";
    }
    
    header("Location: profesion.php");
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
                                    <div class="col-lg-8 col-md-9 col-10">
									<form name="careerfrm" method="post" action="add_Prof.php" enctype="multipart/form-data">
									<input type="hidden" name="action" value="add">
                                        <div class="form-group">
                                            <label class="form-label" for="field-1">Name</label>
                                            
                                            <div class="controls">
                                                <input type="text" class="form-control" id="field-1" name="name">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-2">stream</label>
                                           
                                             <select class="custom-select" id="inputGroupSelect01" name="strm" onchange="gtceer(this.value);">
                                                <option selected>Choose...</option>
												<?php
												$strm_sql = mysqli_query($conn , "select * from catagory where status='1'");
												while($resstrm = mysqli_fetch_array($strm_sql)){
												?>
                                                <option value="<?=$resstrm['id'];?>"><?=$resstrm['name'];?></option>
												<?php
												}
												?>
                                               
                                            </select>
                                        </div>
										 <div class="form-group" id='creerid'>
										  
									   </div>
										 
										<button type="submit" value="submit" class="btn btn-success btn-corner">Submit</button>
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
<script>
function gtceer(strmid){
    $.ajax({
        type:'POST',
        url:"gceeroption.php",
        data:{
            strmid: strmid,
            from_prof: 1   // \ this tells PHP where the call is from
        },
        beforeSend:function()
        {
            $('.preloader').show();
        },
        success:function(result){
            $('#creerid').html(result);
        },
        complete:function()
        {
            $('.preloader').hide();
        }
    });
}
</script>
</html>



