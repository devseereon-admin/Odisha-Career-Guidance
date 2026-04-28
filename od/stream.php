

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

			<div class="col-md-2 col-6">

				<nav class="navbar navbar-expand-sm navbar-dark">

			      	<div class="d-flex language">

			      	<div class="language-od">

			      		<a href="../stream.php" class="language-eng">English</a>

			      	</div>

			        <div class="language-en">

			        <a href="stream.php" class="language-odia">ଓଡିଆ</a>

			      	</div>

			      	</div>

				</nav> 

			</div>

			</div>

			</div>      

		</section>

		<!------ header end ------------->



		<section class="streams">

			<div class="container">

				<div class="streams-round">

				<h1 class="heading-one1">ବିଭାଗ</h1>

				<div class="row">

					<div class="col-md-2"></div>

					<div class="col-md-8">

						<div class="row">

						<?php

						$det_sub = mysqli_query($conn ,"select * from  catagory where status='1' order by priority limit 0,1");

						while($res_det = mysqli_fetch_array($det_sub)){

						$ftid = $res_det['id'];

						?>

							<div class="col-md-4">

<a href="career-option.php?id=<?=$ftid;?>"
   onclick="trackPageClick(['car1','<?=$res_det['name'];?>'], this)">
								<div class="streams-img  streams-img-pt">

								<img src="stream-img/<?=$res_det['icon'];?>" class="img-fluid">

								<h4><?=$res_det['name'];?></h4>

								</div>

								</a>

							</div>

							<?php

							}

							?>

							<div class="col-md-4"></div>

							<?php

						$det_ssub = mysqli_query($conn ,"select * from  catagory where status='1' order by priority limit 1,2");

						while($res_sdet = mysqli_fetch_array($det_ssub)){

						$sdeid = $res_sdet['id'];

						?>

							<div class="col-md-4">

<a href="career-option.php?id=<?=$sdeid;?>"
 onclick="trackPageClick(['car1','<?=$res_sdet['name'];?>'], this)">
								<div class="streams-img streams-img-pt">

								<img src="stream-img/<?=$res_sdet['icon'];?>" class="img-fluid">

								<h4><?=$res_sdet['name'];?></h4>

								</div>

								</a>



							</div>

							<?php

							}

							?>

							

							<div class="col-md-4"></div>

								<?php

						$det_thsub = mysqli_query($conn ,"select * from  catagory where status='1' order by priority limit 3,2");

						while($res_thsdet = mysqli_fetch_array($det_thsub)){

						$thsdeid = $res_thsdet['id'];

						?>

							<div class="col-md-4">

<a href="career-option.php?id=<?=$thsdeid;?>"
   onclick="trackPageClick(['car1','<?=$res_thsdet['name'];?>'], this)">

								<div class="streams-img streams-img-pt">

								<img src="stream-img/<?=$res_thsdet['icon'];?>" class="img-fluid">

								<h4><?=$res_thsdet['name'];?></h4>

								</div>

								</a>



							</div>

							

							<?php

							}

							?>

							<div class="col-md-4"></div>

							

									<?php

						$det_frub = mysqli_query($conn ,"select * from  catagory where status='1' order by priority limit 5,1");

						while($res_frdet = mysqli_fetch_array($det_frub)){

						$frdeid = $res_frdet['id'];

						?>

							<div class="col-md-4">

<a href="career-option.php?id=<?=$frdeid;?>"
  onclick="trackPageClick(['car1','<?=$res_frdet['name'];?>'], this)">
								<div class="streams-img streams-img-pt">

								<img src="stream-img/<?=$res_frdet['icon'];?>" class="img-fluid">

								<h4><?=$res_frdet['name'];?></h4>

								</div>

								</a>



							</div>

							

							<?php

							}

							?>

						</div>

					</div>		

					<div class="col-md-2"></div>

				</div>

				</div>

			</div>

		</section>

		

		<!-- -------------footer start---------- -->

		<!--<section class="footer">

			<div class="container">

				<div class="row">

				<div class="col-md-2 col-5"><p>Notification Bar:</p></div>

				<div class="col-md-10 col-7"><marquee >NEET official notification 2023 by NTA expected to be out by January 4 at <a href="https://neet.nta.nic.in/">http://neet.nta.nic.in</a></marquee></div>

				</div>

			</div>

		</section>-->

		<?php include "include/before-footer.php";?>

		<!-- -------------footer end---------- -->

	</body>

</html>