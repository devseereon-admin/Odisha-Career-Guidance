<?php
include "admin/dbconn.php";
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
			
			</div>
			<div class="col-md-2 col-6">
				<nav class="navbar navbar-expand-sm navbar-dark">
			      	<div class="d-flex language">
			      	<div class="language-en">
			      		<a href="college.php" class="language-eng">English</a>
			      	</div>
			        <div class="language-od">
			        <a href="od/college.php" class="language-odia">ଓଡିଆ</a>
			      	</div>
			      	</div>
				</nav>
			</div>
			</div>      
		</section>
		<!------ header end ------------->

		<section class="College">
			<div class="container">
				<div class="College-round">
				<h1 class="heading-one">College</h1>
				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-10">
						<form  name="clgfrm" method="post" id='clgrtfrm'>
						
						     <select class="form-select" name="institute" required>
						     <option value="">Institute Type</option>
						     <option value='1'>Govt.</option>
						     <option value='2'>Private</option>
						   </select>
						   
						   <select class="form-select" name="Domain" required>
						     <option value="">Select Domain</option>
							 <?php
							 
							 $strm_sql = mysqli_query($conn,"select * from catagory where status='1' ");
							 while($res_strm = mysqli_fetch_array($strm_sql))
							 {
							 ?>
						     <option value='<?=$res_strm['id'];?>'><?=$res_strm['name'];?></option>
						     
							 <?php
							 }
							 ?>
						   </select>
						   
						  <div class="form-group">
									<label class="control-label">Choose Your Location</label><br>
									<div class="custom-control custom-radio">
										<input type="radio" name="customRadio" id="National" onclick="show1()" value="0" checked> 
										National
										<input type="radio"  name="customRadio" id="Internatinal" onclick="show2()" value="1">
										International
											
									</div>
							</div>
						  
						   <div id='national_content' >
						   <select class="form-select" name="State" onchange="showdist(this.value);">
						     <option value="0">Select State</option>
							 <?php
							 $state_sql = mysqli_query($conn,"select * from state where status='1' ");
							 while($res_stat = mysqli_fetch_array($state_sql)){
							 ?>
						     <option value="<?=$res_stat['id'];?>"><?=$res_stat['name'];?></option>
							 <?php
							 }
							 ?>
						   </select>
						    <div id="distdiv" style="display:none;">
						   <select class="form-select" name="District" >
						     <option value="0">Select District</option>
							 
							 <?php
							 $dist_sql = mysqli_query($conn,"select * from district where status='1'");
							 while($res_dist = mysqli_fetch_array($dist_sql)){
							 ?>
						     <option value="<?=$res_dist['id'];?>"><?=$res_dist['name'];?></option>
							 <?php
							 }
							 ?>
						   </select>
						   </div>
						   </div>
						   
						 
						   <button type="submit" id="submit"  name="submit" value="submit" class="btn btn-primary">Submit</button>
					  </form> 
					
						<div class="search-result-college">
						</div>
					
					</div>		
					<div class="col-md-1"></div>
				</div>
				</div>
			</div>
		</section>
		
		<!-- -------------footer start---------- -->
		<?php include "include/before-footer.php";?>
		<!-- -------------footer end---------- -->

	<?php include "include/script.php";?>
<!-- Latest compiled JavaScript -->

		<script>
			// In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
		</script>

<script>

	$("#clgrtfrm").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    //var actionUrl = form.attr('action');
    
    $.ajax({
        type: "POST",
        url: "ve.php",
        data: form.serialize(), // serializes the form's elements.
        success: function(data)
        {
          	$('.search-result-college').html(data);// show response from the php script.
        }
    });
    
});
</script>

<script>
	
function show1(){
  document.getElementById('national_content').style.display ='block';
}
function show2(){
  document.getElementById('national_content').style.display = 'none';
}
function showdist(distidd){
	console.log(distidd);
	if(distidd == 1){
		document.getElementById('distdiv').style.display = 'block';
	}else{
		document.getElementById('distdiv').style.display = 'none';
	}
  
}
	
	</script>
	</body>
</html>