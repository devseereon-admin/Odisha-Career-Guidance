<?php header('Access-Control-Allow-Origin: *'); ?>
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
				<nav class="navbar navbar-expand-md  navbar-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
  						<ul class="navbar-nav me-auto">
			        		<li class="nav-item">
						      <a class="nav-link" href="index.html">Home</a>
						    </li>
						    <li class="nav-item">
						      <a class="nav-link" href="streams.html">Career</a>
						    </li>
						    <li class="nav-item">
						      <a class="nav-link" href="college.php">College</a>
						    </li>
						    <li class="nav-item">
						      <a class="nav-link" href="entrance-exams.php">Entrance Exams</a>
						    </li>
						    <li class="nav-item">
						      <a class="nav-link" href="scholarships.php">Scholarship</a>
						    </li>
						    <li class="nav-item">
						      <a class="nav-link" href="career-collateral.html">Career Collateral</a>
						    </li>
						    <li class="nav-item">
						      <a class="nav-link" href="youtube.html">Youtube</a>
						    </li>
						    <li class="nav-item">
						      <a class="nav-link" href="feedback.html">Feedback</a>
						    </li>
				      	</ul>
				    </div>
				</nav> 
			</div>
			
			</div>
			<div class="col-md-2 col-6">
				<nav class="navbar navbar-expand-sm navbar-dark">
			      	<div class="d-flex language">
			      	<div class="language-en">
			      		<a href="college.html" class="language-eng">English</a>
			      	</div>
			        <div class="language-od">
			        <a href="od/college.html" class="language-odia">ଓଡିଆ</a>
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
						    
						   <select class="form-select" name="Domain" onchange="uu(this.value);">
						     <option>Select Domain</option>
						     <option value='1'>Vocational</option>
						     <option value='2'>Arts</option>
						     <option value='3'>Science</option>
						     <option value='4'>Commerce</option>
						     <option value='5'>Neutral</option>
						   </select>
						   
						    <select class="form-select" name="Qualification" id='qui'>
						     <option>Select Qualification</option>
						    
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
						   <select class="form-select" name="State"  onchange="getDistrict(this.value);">
						     <option>Select State</option>
						     <option value="1">Orissa</option>
						     <option value="Andra Pradesh">Andra Pradesh</option>
                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                        <option value="Assam">Assam</option>
                        <option value="Bihar">Bihar</option>
                        <option value="Chhattisgarh">Chhattisgarh</option>
                        <option value="Goa">Goa</option>
                        <option value="Gujarat">Gujarat</option>
                        <option value="Haryana">Haryana</option>
                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                        <option value="Jharkhand">Jharkhand</option>
                        <option value="Karnataka">Karnataka</option>
                        <option value="Kerala">Kerala</option>
                        <option value="Madya Pradesh">Madya Pradesh</option>
                        <option value="Maharashtra">Maharashtra</option>
                        <option value="Manipur">Manipur</option>
                        <option value="Meghalaya">Meghalaya</option>
                        <option value="Mizoram">Mizoram</option>
                        <option value="Nagaland">Nagaland</option>
                        <option value="Punjab">Punjab</option>
                        <option value="Rajasthan">Rajasthan</option>
                        <option value="Sikkim">Sikkim</option>
                        <option value="Tamil Nadu">Tamil Nadu</option>
                        <option value="Telangana">Telangana</option>
                        <option value="Tripura">Tripura</option>
                        <option value="Uttaranchal">Uttaranchal</option>
                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                        <option value="West Bengal">West Bengal</option>
                        <option disabled style="background-color:#aaa; color:#fff">UNION Territories</option>
                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                        <option value="Chandigarh">Chandigarh</option>
                        <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                        <option value="Daman and Diu">Daman and Diu</option>
                        <option value="Delhi">Delhi</option>
                        <option value="Lakshadeep">Lakshadeep</option>
                        <option value="Pondicherry">Pondicherry</option>
						     
						   </select>
						   </div>
						   
						  <div id="dis"></div>
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
    function uu(domainid){
		$.ajax({
			type:'POST',
			url:"ht.php",
			data:{domaind:domainid},
			beforeSend:function(json)
			{
				$('.preloader').show();
			},
			success:function(result){
				$('#qui').html(result);
				
				
			},
			complete:function(json)
			{
				$('.preloader').hide();
			}
		});
	}
</script>
<script>
    function getDistrict(ditrid){
		$.ajax({
			type:'POST',
			url:"get_District.php",
			data:{ditrid:ditrid},
			beforeSend:function(json)
			{
				$('.preloader').show();
			},
			success:function(result){
				$('#dis').html(result);
				
				
			},
			complete:function(json)
			{
				$('.preloader').hide();
			}
		});
	}
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
	
	</script>
	</body>
</html>