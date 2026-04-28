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

		<section class="youtube-Career">
			<div class="container">
				<div class="youtube-in">
				<div class="search-btn">
					    <form action="/action_page.php">
					      <input type="text" placeholder="Search.." name="search">
					      <button type="submit"><i class="fa fa-search"></i></button>
					    </form>
					  	</div>
				<div class="row">
					<div class="col-md-3 col-2">
						<div class="youtube-btn-img">
						<img src="img/free-youtube-logo-icon-2431-thumb.png" width="200px" class="img-fluid">
						</div>
					</div>
					<div class="col-md-9 col-10">
						<div class="youtube-btn">
						<h3>Career Planning</h3>
						<p>Book Consist Of 45 Career Options for the Students.</p>
						<a href="">Arts</a>
						<a href="">Science</a>
						<a href="">Commerce</a>
						<a href="">Vocational</a>
						<a href="">Compitative</a>
						<a href="">Neutral</a>
						</div>
					</div>
					<div class="col-md-12">
					    	<div class="spacing"></div>
					</div>
				
					<div class="col-md-3 col-2">
						<div class="youtube-btn-img">
						<img src="img/free-youtube-logo-icon-2431-thumb.png" width="200px" class="img-fluid">
						</div>
					</div>
					<div class="col-md-9 col-10">
						<div class="youtube-btn">
						<h3>Career in Medical Science</h3>
						<p>Book Consist Of 45 Career Options for the Students.</p>
						<a href="">Science</a>
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