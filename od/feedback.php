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

			<div class="col-md-2 col-6">

				<nav class="navbar navbar-expand-sm navbar-dark">

			      	<div class="d-flex language">

			      	    <div class="language-od">

			        <a href="../feedback.php" class="language-odia">English</a>

			      	</div>

			      	<div class="language-en">

			      		<a href="feedback.php" class="language-eng">ଓଡିଆ</a>

			      	</div>

			        

			      	</div>

				</nav> 

			</div>

			</div>

			</div>      

		</section>

		<!------ header end ------------->



		<section class="my-carrer-my-identity">

			<div class="container">

				<div class="row">

					<div class="col-md-6">

						<h1 class="heading-one1">ମୋ ବୃତ୍ତି ମୋ ପରିଚୟ</h1>

						<div class="my-carrer-my-identity-form">

							<form action="feedback-save.php" method="post" enctype="multipart/form-data">

							    <div class="row">

							      	<div class="col-md-6 col-6">

							        <input type="text" class="form-control form-control-lg" placeholder=" ପ୍ରଥମ ନାମ" name="fname">

							      	</div>

							      	<div class="col-md-6 col-6">

							        <input type="text" class="form-control form-control-lg" placeholder=" ଶେଷ ନାମ" name="lname">

							      	</div>

							      	<div class="col-md-6 col-6">

							        <input type="tel" class="form-control form-control-lg" placeholder=" ମୋବାଇଲ୍ ନମ୍ବର" name="Phonenumber">

							      	</div>

							      	<div class="col-md-6 col-6">

							        <input type="email" class="form-control form-control-lg" placeholder="* ଇମେଲ୍" name="email" required>

							      	</div>

							      	<div class="col-md-12 col-12">

							      	<textarea class="form-control form-control-lg" rows="5" id="comment" name="text" placeholder="ଏକ ସନ୍ଦେଶ ପ୍ରେରଣ କରନ୍ତୁ"></textarea>

							      	</div>

							      	<div class="col-md-6 col-12">

							      	<label for="myfile">ଫୋଟୋ ଏବଂ ଭିଡିଓ ଅପଲୋଡ କରନ୍ତୁ</label>

							      	<input class="form-control form-control-lg" name="file" type="file">

							  		</div>

							      

							  		<div class="col-md-6 col-12"></div>

							      	<div class="col-md-12 col-12">

							      	<button type="submit" class="btn btn-primary btn-lg">ପଠାନ୍ତୁ</button>

							      </div>

							    </div>

							</form>

						</div>

					</div>		

					<div class="col-md-6">

						<div class="my-carrer-my-identity-img">

							<img src="img/feedback.jpg" class="img-fluid">

						</div>

					</div>

				</div>

			</div>

		</section>

		

				<!--video section start-->

<section style="padding-bottom: 5%">

    <div class="container">

        <h1 class="heading-one1">Testimonial Videos</h1>

        <div class="row">

            

            

            <?php

            $stm_sql = mysqli_query($conn,"select * from events_videos order by priority asc");

    			while($res_stm = mysqli_fetch_array($stm_sql)){

    				$cid = $res_stm['id'];

    			?>

                    <div class="col-md-4 col-12 video-box">

                        <?=$res_stm['videos']?> 

                    </div>

    			<?php

    			}

			?>

            

            <!--<div class="col-md-6 col-12">-->

            <!--    <iframe width="100%" height="315" src="https://www.youtube.com/embed/JF8VNjL46gg?si=P4T_JS4ZQCM-p3jH" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen style="border-radius: 20px"></iframe>-->

            <!--</div>-->

            <!--<div class="col-md-6 col-12">-->

            <!--    <iframe width="100%" height="315" src="https://www.youtube.com/embed/UL9ASrpKRMo?si=8pNQftcLvi-5ZpEt" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen style="border-radius: 20px"></iframe>-->

            <!--</div>-->

            <!--            <div class="col-md-6 col-12">-->

            <!--    <iframe width="100%" height="315" src="https://www.youtube.com/embed/Vj4b5bihPsU?si=FvgvruoTUMqe9Vwj" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen style="border-radius: 20px"></iframe>-->

            <!--</div>-->

            <!--<div class="col-md-6 col-12">-->

            <!--    <iframe width="100%" height="315" src="https://www.youtube.com/embed/gBVqBCajJ7Y?si=-787Va8YJZ2pJjQ8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen style="border-radius: 20px"></iframe>-->

            <!--</div>-->

            <!--<div class="col-md-6 col-12">-->

            <!--    <iframe width="100%" height="315" src="https://www.youtube.com/embed/vdjnrsnPnjM?si=QcXx7LS8tP1O3MnA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen style="border-radius: 20px"></iframe>-->

            <!--</div>-->

            <!--<div class="col-md-6 col-12">-->

            <!--    <iframe width="100%" height="315" src="https://www.youtube.com/embed/Zeh_1DUYNrA?si=1WVwHZM1pRDZKKGE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen style="border-radius: 20px"></iframe>-->

            <!--</div>-->

            

        </div>

    </div>

</section>



<!--video section end-->

		

		<!-- -------------footer start---------- -->

		<!--<section class="footer">

			<div class="container">

				<div class="row">

				<div class="col-md-2 col-5"><p>Notification Bar:</p></div>

				<!--<div class="col-md-10 col-7"><marquee >NEET official notification 2023 by NTA expected to be out by January 4 at <a href="https://neet.nta.nic.in/">http://neet.nta.nic.in</a></marquee></div>-->

				</div>

			</div>

		</section>

		<?php include "include/before-footer.php";?>

		<!-- -------------footer end---------- -->

	</body>

</html>