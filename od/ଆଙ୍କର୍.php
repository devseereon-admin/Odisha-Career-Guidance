<?php 
include "admin/dbconn.php"; 
$det_sub = mysqli_query($conn ,"select * from  sub_subcategory where slug='ଆଙ୍କର୍' and status='1'");
$res_det = mysqli_fetch_assoc($det_sub);
$pid = $res_det['id'];

$subcat_name = $res_det['subcat_name'];
$details = mysqli_fetch_assoc(mysqli_query($conn,"select * from  detail where sid='$pid' and status='1'"));

$about = $details['about'];

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
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-K43FK2HL');</script>
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
			      	    <div class="language-od">
			        <a href="../anchor.php" class="language-odia">English</a>
			      	</div>
			      	<div class="language-en">
			      		<a href="ଆଙ୍କର୍.php" class="language-eng">ଓଡିଆ</a>
			      	</div>
			        
			      	</div>
				</nav> 
			</div>
			</div>
			</div>      
		</section>
		<!------ header end ------------->
		<div class="headingbnner" >
		   
		      <div class="row">
		          <div class="col-md-6" style="text-align:right;">
		              <img src="banner-image/<?=$details['banner'];?>" style="width:300px;height:300px;">
		          </div>
		          <div class="col-md-6" style="text-align:left;padding-top:100px;">
		            
		            <h2 class="heading-one-two"><?=$subcat_name;?> ରେ</h2>
				<h1 class="heading-one">ବୃତ୍ତି </h1>
		          </div>
		      </div>
				</div>
		<section class="psephologist-one">
			<div class="container">
				<!--<h2 class="heading-one-two"><//?=$subcat_name;?>ରେ</h2>-->
				<!--<h1 class="heading-one">ବୃତ୍ତି </h1>-->
				
				<div class="row">
					<div class="col-md-3" >
						<div class="search-btn">
					    <form action="/action_page.php">
					      <input type="text" placeholder="Search.." name="search">
					      <button type="submit"><i class="fa fa-search"></i></button>
					    </form>
					  	</div>
					  	<div class="heading-psephologist">
					  		<h3><?=$res_det['name'];?></h3>
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
						      <a class="nav-link" data-toggle="tab" href="#menu2">ପ୍ରବେଶିକା ପରୀକ୍ଷା </a>
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
						      		<h3 class="hading-for-tab"><?=$res_det['name'];?></h3>
						      		<p><?=$details['about'];?></p>
						      		<img src="about-image/<?=$details['aboiut_img'];?>" class="img-fluid">
						      		<h5>ଆବଶ୍ୟକ ଦକ୍ଷତା :</h5>
						      		<?=$details['skill_required'];?>
						      	
						      		<h5>ସଫଳତାର କାହାଣୀ</h5>
						      		<div class="row yogendra-head">
						      				<a href="#"><img src="successtory-image/<?=$details['success_strimg'];?>" style="border-radius: 100px; width:100px;" class="img-fluid"></a>
						      			
						      			<div class="col-md-10 col-9">
						      				<p class="Yogendra-heading" ><b><?=$details['sucees_stitle'];?></b></p>
						      			</div>
						      		</div>
										 <?=$details['success_cont'];?>
										 <br>
										 <a href="<?=$details['success_slink'];?>" class="color-btn" target="blank">
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
						     <img src="roadmap-image/<?=$details['road_map'];?>" class="img-fluid">
						    </div>
							 <div id="menu2" class="container tab-pane fade"><br>
						      <h3 class="heading-for-tab">ପ୍ରବେଶିକା ପରୀକ୍ଷା</h3>
						     <!-- <h5><u>ପ୍ରବେଶିକା ପରୀକ୍ଷା ଓଡ଼ିଶା</u></h5>-->
						     <!--<?=$details['enxm_od'];?>-->
						      <h5><u>ପ୍ରବେଶିକା ପରୀକ୍ଷା ଭାରତ</u></h5>
						     <?=$details['enxm_in'];?>
						      
						    </div>
							
						    
						<div id="menu3" class="container tab-pane fade"><br>
						     <h3 class="heading-for-tab">ଶିକ୍ଷାନୁଷ୍ଠାନ</h3>
						     <h5><u>ଓଡିଶାରେ ଥିବା ଶିକ୍ଷାନୁଷ୍ଠାନ</u></h5>
						    <?=$details['clg_od'];?>
						      <h5><u>ଭାରତରେ ଥିବା ଶିକ୍ଷାନୁଷ୍ଠାନ</u></h5>
						       <?=$details['clg_in'];?>
						      <!--<h5><u>ବିଦେଶରେ ଥିବା ଶିକ୍ଷାନୁଷ୍ଠାନ</u></h5>-->
						      <!--<?=$details['clg_ab'];?>-->
						    </div>
							
						   
						    
							 <div id="menu4" class="container tab-pane fade"><br>
						      <h3 class="heading-for-tab">ମେଧାବୃତ୍ତି</h3>
						      <h5><u>ଓଡିଶାରେ ମେଧାବୃତ୍ତି</u></h5><br>
						     <?=$details['schlr_od'];?>
						      <h5><u>ଭାରତରେ ମେଧାବୃତ୍ତି</u></h5><br>
						       <?=$details['schlr_national'];?>
						    </div>
						   
							  <div id="menu5" class="container tab-pane fade"><br>
						      <h3 class="heading-for-tab">ଉଦ୍ୟୋଗ</h3>
							  <?=$details['enterprener'];?>
						     <!--<h5>ସଫଳତାର କାହାଣୀ</h5>-->
						     <!-- 		 <div class="row yogendra-head">-->
						     <!-- 				<a href="#"><img src="successtory-image/<?=$details['enterpre_succ_img'];?>" style="border-radius: 100px; width:100px;" class="img-fluid"></a>-->
						      			
						     <!-- 			<div class="col-md-10 col-9">-->
						     <!-- 				<p class="Yogendra-heading" ><b> <?=$details['enterpre_succ_titl'];?></b></p>-->
						     <!-- 			</div>-->
						     <!-- 		</div> 	-->
										 <!--<?=$details['enterpre_succ_con'];?><br><br>-->
										 <!--<a href="<?=$details['enterpre_succ_source'];?>" class="color-btn" target="blank">-->
						     <!--            ଉତ୍ସ</a><br><br>-->
						    </div>
							 
						    <div id="menu6" class="container tab-pane fade"><br>
						      <?=$details['differenty_abled'];?>
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
</html>