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

		<!--<link rel="stylesheet" href="css/bootstrap.min.css">-->
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
			</div><div class="col-md-2 col-6">
				<nav class="navbar navbar-expand-sm navbar-dark">
			      	<div class="d-flex language">
			      	<div class="language-en">
			      		<a href="oldscholarships.php" class="language-eng">English</a>
			      	</div>
			        <div class="language-od">
			        <a href="od/oldscholarships.php" class="language-odia">ଓଡିଆ</a>
			      	</div>
			      	</div>
				</nav> 
			</div>
			</div>
			</div>      
		</section>
		<!------ header end ------------->

		<section class="College">
			<div class="container">
				<div class="College-round">
				<h1 class="heading-one1">Scholarship</h1>
				<div class="row">
					<div class="col-md-3">
					<div class="filterfrm" style="background-color: #d5dde9;padding: 10px;">
					<form name="schlrfrm" method="post" id='schlrfrm'>
						   <select class="form-select" name="type" required>
						     <option value="">Select type</option>
						     <option value="1">Private</option>
						     <option value="2">Central / State</option>
						     <option value="3">PSU</option>
						   </select>
						    <button type="submit" id="submit"  name="submit" value="submit" class="btn btn-primary">Submit</button>
					  </form> 
					  </div>
					</div>
					<div class="col-md-9">
						   
						<div class="search-result-college">
						<div class="search-result-two">
						<?php
						$clg_exe = mysqli_query($conn ,"select * from scholarship where status = '1' order by `name`");
						$c=1;
						while($res_clgex = mysqli_fetch_array($clg_exe)){
							$description = $res_clgex['description'];
							
						?>
						<div class="content" style="padding-bottom:7px;">
						<h4 data-toggle='modal' data-target='#myModal<?=$c;?>'style="cursor:pointer;"><?=$res_clgex['name'];?></h4>
						<a data-toggle='modal' data-target='#myModal<?=$c;?>' style="cursor:pointer;">Explore</a>&nbsp;&nbsp;<a href='<?=$res_clgex['link'];?>' target='_blank'>Visit</a>
	</div>
	
	<div class='modal' id='myModal<?=$c;?>'>
	<div class='modal-dialog  modal-xl'>
	<div class='modal-content'>
	<div class='modal-header'>
	<h4 class='modal-title' style="padding: 0;"></h4>
	<button type='button' class='close' data-dismiss='modal'>&times;</button>
	</div>
	<div class='modal-body'>
	<table class='table table-hover table-bordered'>
	<thead>
	<tr>
	
	<th>Description</th>
	<th>Eligibility Criteria</th>
	<th>Stipend</th>
	
	</tr>
	</thead>
	<tbody><tr>
	
	<td><?=$res_clgex['description']; ?></td>
	<td><?=$res_clgex['eligibility_criteria']; ?></td>
	<td><?=$res_clgex['stipend']; ?></td>
	
	</tr></tbody></table>
	
	</div>
	<div class='modal-footer'>
	
	</div>
	</div>
	</div>
	</div>
						<?php
						$c++;
						}
						?>
						</div>
						
						
						</div>
					</div>		
					
				</div>
				</div>
			</div>
		</section>
		
		<!-- -------------footer start---------- -->
				<?php include "include/footer.php";?>
		<!-- -------------footer end---------- -->
			<?php include "include/script.php";?>
		<script>
			// In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
		</script>
			<script>
		$("#schlrfrm").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    //var actionUrl = form.attr('action');
    
    $.ajax({
        type: "POST",
        url: "schlr.php",
        data: form.serialize(), // serializes the form's elements.
        success: function(data)
        {
          	$('.search-result-college').html(data);// show response from the php script.
        }
    });
    
});
		</script>
	</body>
</html>