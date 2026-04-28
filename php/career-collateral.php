<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Mo Career</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!--<link rel="stylesheet" href="css/bootstrap.min.css">-->
	    <?php include "include/header_css.php";?>
	</head>
	<body>
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
			</div>
			</div>
			</div>      
		</section>
		<!------ header end ------------->

		<section class="Career-collateral">
			<div class="container">
				<div class="Career-collateral-st">
				<h1 class="heading-one">CAREER COLLATERAL</h1>
				<div class="row">
					<div class="col-md-4">
						<div class="career-booklet-img">
						<img src="img/9819_high.jpg" class="img-fluid">
						</div>
					</div>
					<div class="col-md-8">
						<div class="career-booklet">
						<h3>Career Booklets</h3>
						<p>Book Consist Of 45 Career Options for the Students.</p>
						<a href="">Download</a>
						</div>
					</div>
					<div class="col-md-12">
					    <div class="spacing"></div>
					</div>
					<div class="col-md-4">
						<div class="career-booklet-img">
						<img src="img/9819_high.jpg" class="img-fluid">
						</div>
					</div>
					<div class="col-md-8">
						<div class="career-booklet">
						<h3>Work Sheet</h3>
						<p>Book Consist Of 45 Career Options for the Students.</p>
						<a href="">Download</a>
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
	</body>
</html>