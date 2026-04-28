<?php
include 'admin/dbconn.php';
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
			</div>
			
			</div>
			<div class="col-md-2 col-6">
				<nav class="navbar navbar-expand-sm navbar-dark">
			      	<div class="d-flex language">
			      	<div class="language-en">
			      		<a href="event.php" class="language-eng">English</a>
			      	</div>
			        <div class="language-od">
			        <a href="od/event.php" class="language-odia">ଓଡିଆ</a>
			      	</div>
			      	</div>
				</nav> 
			</div>
			</div>      
		</section>
		<!------ header end ------------->





		
		<!-- -------------footer start---------- -->
	<?php include "include/before-footer.php";?>
		<!-- -------------footer end---------- -->
	</body>
	<script>

	</script>
</html>