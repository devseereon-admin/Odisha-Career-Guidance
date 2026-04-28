<?php 

?>
<!DOCTYPE html>

<html>



	<head>

		<meta charset="utf-8">

		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title>Our Careers</title>

		<meta name="description" content="">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">



	<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

	<!-- Include Lightbox CSS -->

<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet" />



<!-- Include jQuery and Lightbox JS -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

		<?php include "include/script.php";?>

	<script>

	$(document).ready(function(){

		setTimeout(function () {

		$("#myModal").modal('show');

         }, 1000);

	});

</script>

<?php include "include/header_css.php";?>

<style>

@media screen and (max-width: 767px){

    .student-2{

    max-width: 100% !important;

}

.pdr-0 {

    padding-right: 15px !important;

}

.career-image-secone .compr2{

    height: 100% !important;

}



.testimonials{

    padding-bottom: 5% !important;

}

}

.heading-one1{

    font-size: 50px;

}



.testimonials{

    padding-bottom: 3%;

}

.career-image-secone .compr2{

    height: 387px;

}

.career-image-secone img{

    border-radius: 20px;

}



.student-2{

    max-width: 20% ;

}

    .home-body-three .spinner-five {

    background-color: #ff5f108c;

    padding: 20px;

    border-radius: 20px;

}

.home-body-three .spinner-five h1 {

    color: #bf4204;

    font-family: 'Poppins', sans-serif;

    font-size: 40px;

    font-weight: bold;

}

.home-body-three .spinner-two h1{

    color: #212529;

}

.home-body-three .spinner-four h1{

    color: #007d15;

}

.home-body-three .spinner-five h3 {

    font-size: 18px;

    color: #fff;

    font-family: 'Poppins', sans-serif;

}

.search-container {

  position: relative;

}



#searchInput {

    width: 280px;

    padding: 10px;

    font-size: 16px;

    border: 1px solid #ccc;

    border-radius: 25px;

    margin-top: -50px;

    /* margin-left: -30%; */

    float: right;

}

.search-icon {

    margin-right: 5px;

    cursor: pointer;

    float: right;

    margin-top: -46px;

    z-index: 999;

    position: relative;

    background-color: #0f3970;

    padding: 7px;

    border-radius: 50px;

    padding-left: 13px;

    padding-right: 12px;

    border: none;

    color: #fff;

}



.suggestions {

    position: absolute;

    width: 265px;

    background-color: #fff;

    border: 1px solid #ccc;

    border-top: none;

    display: none;

    z-index: 1000;

    margin-left: -25%;

}



.suggestion-item {

  padding: 10px;

  cursor: pointer;

}



.suggestion-item:hover {

  background-color: #f0f0f0;

}

.search-card {

    width: 280px;

    margin-left: 73%;

    max-height:55vh;

    overflow:auto;

    position: absolute;

    z-index: 999;

    border-radius: 20px;

    word-wrap: break-word;

}

#searchInput:focus {

    outline: none;

    border: none;

    height: 46px;

}

.background-modal{

    width:100%;

    height:100vh;

    position: absolute;

    z-index: 998;

    

}







/*Success Stories*/





.carding {

	margin: 0 auto;

	border: none;

}

.carding .carousel-item {

	min-height: 190px;

}

.carding .carousel-caption {

	

	

	padding: 0;

    top: 20px;

    color: #3d3d3d;

    border: 1px solid transparent;

    min-height: 280px;

    background-color: #fff;

    border-radius: 15px;

    margin-right: 17px;

}

.carding .carousel-caption img{

	

	

	padding-top: 14px;

    width: 80%;

}



    



.carding .carousel-caption .col-sm-3 {

	display: flex;

	align-items: center;

}

.carding .carousel-caption .col-sm-9 {

	text-align: left;

}

.carding .carousel-control-prev, .card .carousel-control-next {

	color: #3d3d3d !important;

	opacity: 1 !important;

}

.carousel-control-prev-icon, .carousel-control-next-icon {

	background-image: none;

	color: #000;

	font-size: 14px;

	background-color: #7e8d98;

	height: 32px;

	line-height: 32px;

	width: 32px;

	margin-top: 40px;

}

.carousel-control-prev-icon:hover, .carousel-control-next-icon:hover {

	opacity: 0.85;

}

.carousel-control-prev {

	left: 40%;

	top: 110%;

}

.carousel-control-next {

	right: 40%;

	top: 110%;

}

.midline {

	width: 60px;

	border-top: 1px solid #d43025;

}

.carousel-caption h2 {

	font-size: 14px;

}

.carousel-caption h2 span {

	color: #cd3a54;

}

 @media (min-width: 320px) and (max-width: 575px) {

.carousel-caption {

	position: relative;

}

.carding .carousel-caption {

	left: 0;

	top: 0;

	margin-bottom: 15px;

}

.carding .carousel-caption img {

	margin: 0 auto;

}

.carousel-control-prev {

	left: 35%;

	top: 105%;

}

.carousel-control-next {

	right: 35%;

	top: 105%;

}

.carding .carousel-caption h3 {

	margin-top: 0;

	font-size: 16px;

	font-weight: 700;

}

}

@media (min-width: 576px) and (max-width: 767px) {

.carousel-caption {

	position: relative;

}

.carding .carousel-caption {

	left: 0;

	top: 0;

	margin-bottom: 15px;

}

.carding .carousel-caption img {

	margin: 0 auto;

}

.carding .carousel-caption h3, .card .carousel-caption small {

	text-align: center;

}

.carousel-control-prev {

	left: 35%;

	top: 105%;

}

.carousel-control-next {

	right: 35%;

	top: 105%;

}

}

@media (min-width: 767px) and (max-width: 991px) {

.carding .carousel-caption h3 {

	margin-top: 0;

	font-size: 16px;

	font-weight: 700;

}

}

        .carding .carousel-item

        {

            min-height: 325px;

        }

        .carousel-caption .col-sm-12

        {

            background:#fff;

        }

        

        

        #overlay {

        display: none;

        position: fixed;

        top: 0;

        left: 0;

        width: 100%;

        height: 100%;

        background-color: rgba(0, 0, 0, 0.5); /* semi-transparent black */

        z-index: 1000; /* Ensure it appears above other content */

    }



    /* Modal styles */

    .modalContainer {

        display: none;

        position: fixed;

        top: 50%;

        left: 50%;

        transform: translate(-50%, -50%);

        background-color: white;

        padding: 20px;

        border-radius: 8px;

        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);

        z-index: 1001; /* Ensure it appears above the overlay */

        max-width: 80%;

        max-height: 80%;

        overflow-y: auto; /* Enable scrolling if content exceeds modal size */

    }



    /* Close button styles */

    .modal-close {

        position: absolute;

        top: 10px;

        right: 10px;

        cursor: pointer;

    }

/*Success Stories*/



/*success stories new slider design start*/

.carousel-caption {

    position: absolute;

    right: 0%;

    bottom: 20px;

    left: 7%;

    z-index: 10;

    padding-top: 20px;

    padding-bottom: 20px;

    color: #fff;

    text-align: center;

}

.openModalBtn{

    background-color: #0f3970;

    color: #fff;

    padding: 5px 12px;

    font-size: 13px;

    border-radius: 5px;

    border: none;



}

#closeModalBtn{

    width: 22%;

    background-color: #d80000;

    color: #fff;

    border: none;

    padding: 10px;

}

@media screen and (max-width: 768px){

    .carousel-inner{

        height: 400px;

    }

    .carding .carousel-caption{

        height: 400px;

    }

    .modalContainer{

        width: 320px;

    }

    #closeModalBtn{

        width: 45%;

    }

    

    .pdr-1{

        padding-left: 15px !important;

        padding-right: 15px !important;

    }

    .pdr-0{

        padding-left: 15px !important;

        padding-right: 15px !important;

    }

}

/*success stories new slider design end*/

.pdr-0{

padding-right: 8px;

padding-left: 8px;

}

.pdr-1{

padding-left: 8px;

padding-right: 8px;

}





/*success stories style start*/

        .shadow-effect {

		    background: #fff;

		    padding: 20px;

		    border-radius: 45px;

		    text-align: center;

	border:1px solid #ECECEC;

		    box-shadow: 0 19px 38px rgba(0,0,0,0.10), 0 15px 12px rgba(0,0,0,0.02);

		}

		.shadow-effect h3{

		    font-size: 20px;

            font-weight: 600;

            padding-top: 8px !important;

            padding-left: 32%;

            text-align: left;

		}

		.shadow-effect h6 {

    text-align: left;

    padding-left: 32%;

    font-size: 13px;

    font-style: italic;

}

		#customers-testimonials .shadow-effect p {

		    font-family: inherit;

		    font-size: 15px;

		    line-height: 1.5;

		    margin: 0 0 17px 0;

		    font-weight: 300;

		    padding-top: 15px;

		    text-align:justify;

		}

		.testimonial-name {

		    margin: -17px auto 0;

		    display: table;

		    width: auto;

		    background: #3190E7;

		    padding: 9px 35px;

		    border-radius: 12px;

		    text-align: center;

		    color: #fff;

		    box-shadow: 0 9px 18px rgba(0,0,0,0.12), 0 5px 7px rgba(0,0,0,0.05);

		}

		#customers-testimonials .item {

		    text-align: center;

		    padding: 30px;

				margin-bottom:-10px;

		    opacity: .2;

		    -webkit-transform: scale3d(0.8, 0.8, 1);

		    transform: scale3d(0.8, 0.8, 1);

		    -webkit-transition: all 0.3s ease-in-out;

		    -moz-transition: all 0.3s ease-in-out;

		    transition: all 0.3s ease-in-out;

		}

		#customers-testimonials .owl-item.active.center .item {

		    opacity: 1;

		    -webkit-transform: scale3d(1.0, 1.0, 1);

		    transform: scale3d(1.0, 1.0, 1);

		}

		.owl-carousel .owl-item img {

    transform-style: preserve-3d;

    max-width: 100px;

    margin: 0 auto 2px;

    float: left;

    border-radius: 50px;

    height: 90px;

    width: 90px;

}

		#customers-testimonials.owl-carousel .owl-dots .owl-dot.active span,

#customers-testimonials.owl-carousel .owl-dots .owl-dot:hover span {

		    background: #3190E7;

		    transform: translate3d(0px, -50%, 0px) scale(0.7);

		}

#customers-testimonials.owl-carousel .owl-dots{

	display: inline-block;

	width: 100%;

	text-align: center;

}

#customers-testimonials.owl-carousel .owl-dots .owl-dot{

	display: inline-block;

}

		#customers-testimonials.owl-carousel .owl-dots .owl-dot span {

		    background: #3190E7;

		    display: inline-block;

		    height: 20px;

		    margin: 0 2px 5px;

		    transform: translate3d(0px, -50%, 0px) scale(0.3);

		    transform-origin: 50% 50% 0;

		    transition: all 250ms ease-out 0s;

		    width: 20px;

		    border-radius: 50px;

		}

/*success stories style end*/



.home-body-two .tr-ft{

             margin-bottom: 15px;

         }

         .home-body-two {

    padding-bottom: 0px;

}

         .custom-col-38 {

    max-width: 38% !important;

    flex: 0 0 38%;

}



.custom-col-24 {

    max-width: 24% !important;

    flex: 0 0 24%;

    

}

@media screen and (max-width: 768px){

    .custom-col-38 {

    max-width: 100% !important;

    flex: 0 0 100%;

    padding-bottom: 10px;

}



.custom-col-24 {

    max-width: 100% !important;

    flex: 0 0 100%;

    

}

}



</style>



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





	    <div id="mymodal" class="modal fade ">

        <div class="modal-dialog" style="max-width: 611px !important;">

        <div class="modal-content">

            <div class="modal-header">

                <div class="row">

                    <div class="col-md-3 col-3">

                       	<img src="img/Logo-2.png" class="img-fluid"> 

                    </div>

                    <div class="col-md-9 col-9">

                        <h3>OUR CAREERS</h3>

                    </div>

                </div>

                <!--<button type="button" class="close" data-dismiss="modal">×</button>-->

            </div>

            <div class="modal-body">

                <h4>SIGN UP</h4>

                

                <form action="#">

                    <div class="form-group">

                    <div class="rw">

                        <div class="col-md-3 lable-right col-4">

                        <label>Name:</label>

                        </div>

                        <div class="col-md-9 col-8">

                        <input type="text" class="form-control" name="name" required>

                        </div>

                     </div>

                    </div>

                    <div class="form-group">

                    <div class="row">

                        <div class="col-md-3 lable-right col-4">

                        <label>Mobile Number:</label>

                        </div>

                        <div class="col-md-9 col-8">

                        <input type="tel" class="form-control" name="mobilenumber" required>

                        </div>

                     </div>

                    </div>

                    <div class="form-group">

                    <div class="row">

                        <div class="col-md-3 lable-right col-4">

                        <label>Email:</label>

                        </div>

                        <div class="col-md-9 col-8">

                        <input type="email" class="form-control" name="email">

                        </div>

                     </div>

                    </div>

                    <div class="form-group">

                    <div class="row">

                        <div class="col-md-3 lable-right col-4">

                        <label>District:</label>

                        </div>

                        <div class="col-md-9 col-8">

                        <select class="form-control" name="sellist1" required>

                            <option> </option>

                            <option>Khordha</option>

                            <option>Angul</option>

                            <option>Boudh</option>

                            <option>Balangir</option>

                            <option>Bargarh</option>

                            <option>Cuttack</option>

                         </select>

                        </div>

                     </div>

                     </div>

                    <div class="form-group">

                     <div class="row">

                        <div class="col-md-3 lable-right col-4">

                        <label>Block:</label>

                        </div>

                        <div class="col-md-9 col-8">

                        <select class="form-control" name="sellist2" required>

                            <option> </option>

                            <option>Cuttack Sadar</option>

                            <option>Baranga</option>

                            <option>Kantapada</option>

                            <option>Niali</option>

                            <option>Tangi</option>

                            <option>Salipur</option>

                            <option>Nischintakoili</option>

                         </select>

                        </div>

                     </div>

                    </div>

                    <div class="form-group">

                    <div class="row">

                        <div class="col-md-3 lable-right col-4">

                        <label>School Code:</label>

                        </div>

                        <div class="col-md-9 col-8">

                        <input type="text" class="form-control" required >

                        <br>

                        <div class="form-check">

                          <label class="form-check-label" >

                            <input type="checkbox" class="form-check-input" id="check2" name="option2" value="something" required>Other than the School

                          </label>

                        </div>

                        </div>

                     </div>

                    </div>

                    <div class="form-group">

                    <div class="row">

                        <div class="colmd-3 col-4 lable-right">

                        <label>Role:</label>

                        </div>

                        <div class="col-md-9 col-8">

                        <div class="form-check-inline">

                          <label class="form-check-label" for="radio1">

                            <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1" required>Teacher

                          </label>

                        </div>

                        <div class="form-check-inline">

                          <label class="form-check-label" for="radio2">

                            <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">Parent

                          </label>

                        </div>

                        <div class="form-check-inline">

                          <label class="form-check-label" for="radio2">

                            <input type="radio" class="form-check-input" id="radio3" name="optradio" value="option3">Student

                          </label>

                        </div>

                        <div class="form-check-inline">

                          <label class="form-check-label" for="radio2">

                            <input type="radio" class="form-check-input" id="radio4" name="optradio" value="option4">Officer

                          </label>

                        </div>

                        </div>

                     </div>

                    </div>

                    <div class="form-group">

                    <div class="row">

                        <div class="col-md-3 col-4 lable-right">

                        <label>Gender:</label>

                        </div>

                        <div class="col-md-9 col-8">

                        <div class="form-check-inline">

                          <label class="form-check-label" for="radio5">

                            <input type="radio" class="form-check-input" id="radio5" name="male" value="option5" required >Male

                          </label>

                        </div>

                        <div class="form-check-inline">

                          <label class="form-check-label" for="radio6">

                            <input type="radio" class="form-check-input" id="radio6" name="male" value="option6">Female

                          </label>

                        </div>

                        <div class="form-check-inline">

                          <label class="form-check-label" for="radio7">

                            <input type="radio" class="form-check-input" id="radio7" name="male" value="option7">Other

                          </label>

                        </div>

                      

                        </div>

                     </div>

                    </div>

                    <div class="form-group">

                    <div class="row">

                        <div class="col-md-3 col-4 lable-right">

                        <label>Class:</label>

                        </div>

                        <div class="col-md-9 col-8">

                        <div class="form-check-inline">

                          <label class="form-check-label" for="radio8">

                            <input type="radio" class="form-check-input" id="radio8" name="Other" value="option8" required>9th

                          </label>

                        </div>

                        <div class="form-check-inline">

                          <label class="form-check-label" for="radio9">

                            <input type="radio" class="form-check-input" id="radio9" name="Other" value="option9">10th

                          </label>

                        </div>

                        <div class="form-check-inline">

                          <label class="form-check-label" for="radio10">

                            <input type="radio" class="form-check-input" id="radio10" name="Other" value="option10">11th

                          </label>

                        </div>

                        <div class="form-check-inline">

                          <label class="form-check-label" for="radio11">

                            <input type="radio" class="form-check-input" id="radio11" name="Other" value="option11">12th

                          </label>

                        </div>

                        </div>

                     </div>

                    </div>

                    <div class="btn-cen">

                    <button type="submit" class="btn btn-primary">Submit</button>

                    </div>

                </form>

            </div>

        </div>

        </div>

        </div>

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

			 <!--<div class="search-container">

                <input type="text" id="searchInput" placeholder="Search...">

                <div id="suggestions" class="suggestions active">

                    <ul class="suggestions-ul">

                       

                    </ul>

                </div>

                <button class="search-icon" id="search-button"><i class="fa fa-search " ></i></button>

            </div>-->

                    <!--<div class="card card-body search-card searching-box d-none">-->

                    <!--    <ul class="searching-ul" style="list-style-type: none;padding:0"></ul>-->

                    <!--</div>-->

			</div>

			<!--<div class="col-md-2">-->

			   

			    

			<!--</div>-->

			

			</div>

			<div class="col-md-2 col-6">

				<nav class="navbar navbar-expand-sm navbar-dark">

			      	<div class="d-flex language">

			      	<div class="language-en">

			      		<a href="index.php" class="language-eng">English</a>

			      	</div>

			        <div class="language-od">

			        <a href="od/index.php" class="language-odia">ଓଡିଆ</a>

			      	</div>

			      	</div>

				</nav> 

			</div>

			</div>      

		</section>

		<div class="background-modal d-none"></div>

		<!------ header end ------------->

        <!--<div class="home-body-bg" style="/*background-image: url(img/Bg-low.gif); background-size:cover; background-repeat: no-repeat;*/">-->

        <div class="home-body-bg">

        <div class="home-body-bg-two" style="background-image: url(img/Butterfly_4.gif);">

		<section class="home-body-one1" style="padding:30px 0px">

			<div class="container">

				<h1 class="heading-one1">OUR CAREERS</h1>

				<div class="row">

					

					<!--<div class="col-md-12">-->

					<!--	<div class="image-ec-one">-->

					<!--	<div class="row">-->

						

					<!--		<div class="col-md-3 col-12 pdr-0">-->

					<!--		   <div class="career-image-secone" style="padding-bottom: 15px">-->

					<!--		       <img src="img/e1.png" class="img-fluid">-->

					<!--		    </div>-->

					<!--		</div>-->

					<!--		<div class="col-md-3 col-12 pdr-1">-->

					<!--		    <div class="career-image-secone"  style="padding-bottom: 15px">-->

							       <!--<img src="img/e2.png" class="img-fluid">-->

					<!--		       <img src="img/h2.png" class="img-fluid">-->

					<!--		    </div>-->

					<!--		</div>-->

					<!--		<div class="col-md-3 col-12 pdr-0">-->

					<!--		    <div class="career-image-secone"  style="padding-bottom: 15px">-->

					<!--		       <img src="img/h3.png" class="img-fluid" >-->

					<!--		    </div>-->

					<!--		</div>-->

							

					<!--		<div class="col-md-3 col-12 pdr-1">-->

					<!--		    <div class="career-image-secone" style="padding-bottom: 15px">-->

					<!--		       <img src="img/e4.png" class="img-fluid">-->

					<!--		    </div>-->

					<!--		</div>-->

					<!--	</div>-->

					<!--	<div class="row">-->

						

					<!--		<div class="col-md-3 col-12 pdr-0">-->

					<!--		   <div class="career-image-secone" style="padding-bottom: 15px">-->

					<!--		       <img src="img/home-section2-1.png" class="img-fluid">-->

					<!--		    </div>-->

					<!--		</div>-->

					<!--		<div class="col-md-3 col-12 pdr-1">-->

					<!--		    <div class="career-image-secone"  style="padding-bottom: 15px">-->

							       <!--<img src="img/e2.png" class="img-fluid">-->

					<!--		       <img src="img/home-section2-2.png" class="img-fluid">-->

					<!--		    </div>-->

					<!--		</div>-->

					<!--		<div class="col-md-3 col-12 pdr-0">-->

					<!--		    <div class="career-image-secone"  style="padding-bottom: 15px">-->

					<!--		       <img src="img/home-section2-3.png" class="img-fluid" >-->

					<!--		    </div>-->

					<!--		</div>-->

							

					<!--		<div class="col-md-3 col-12 pdr-1">-->

					<!--		    <div class="career-image-secone" style="padding-bottom: 15px">-->

					<!--		       <img src="img/e2.png" class="img-fluid">-->

					<!--		    </div>-->

					<!--		</div>-->

					<!--	</div>-->

					<!--	</div>-->

						

					<!--</div>-->

					<div class="col-md-12">

    <div class="row">

        <div class="col-md-4 col-12 custom-col-38">

            <div class="career-image-secone">

                <a href="img/h2.png" data-lightbox="career-gallery">

                    <img src="img/h2.png" class="img-fluid">

                </a>

            </div>

        </div>

        <div class="col-md-4 col-12 custom-col-38">

            <div class="career-image-secone">

                <a href="img/home-section2-2.png" data-lightbox="career-gallery">

                    <img src="img/home-section2-2.png" class="img-fluid">

                </a>

            </div>

        </div>

       

            <div class="career-image-secone">

                <a href="img/e1.png" data-lightbox="career-gallery">

                </a>

            </div>

    

     

            <div class="career-image-secone">

                <a href="img/h3.png" data-lightbox="career-gallery">

                </a>

           

        </div>

         <div class="career-image-secone">

                <a href="img/e4.png" data-lightbox="career-gallery">

                </a>

           

        </div>

        <div class="career-image-secone">

                <a href="img/home-section2-2.png" data-lightbox="career-gallery">

                </a>

           

        </div><div class="career-image-secone">

                <a href="img/home-section2-3.png" data-lightbox="career-gallery">

                </a>

           

        </div>

        <div class="col-md-3 col-12 custom-col-24 d-md-flex justify-content-center align-items-center">

            <section class="home-body-two">

                <div class="image-ec-two">

                    <div class="tr-ft">

<a href="know-yourself.php" onclick="trackPageClick(['know_yourself'],this)">
                            <img src="img/wired-outline-268-avatar-man.gif" class="img-fluid" style="height: 26px;"> Know Yourself

                        </a>

                    </div>

                    <div class="tr-ft">

                        <a href="know-your-career.php" onclick="trackPageClick(['know_your_career'],this)">

                            <img src="img/Know-your-Career.gif" class="img-fluid" style="height: 26px;"> Know Your Career

                        </a>

                    </div>

                    <div class="tr-ft">

                        <a href="my-career-my-identity.php" onclick="trackPageClick(['my_career_identity'],this)">

                            <img src="img/My-Career-My-Identity.gif" class="img-fluid" style="height: 26px;"> My Career My Identity

                        </a>

                    </div>

                </div>

            </section>

        </div>

    </div>

</div>

					

				</div>

			</div>

		</section>

		

	

		

		

		

		<!--<section class="home-body-two">-->

		<!--	<div class="container">-->

		<!--		<div class="row">-->

		<!--			<div class="col-md-1"></div>-->

		<!--			<div class="col-md-10">-->

		<!--				<div class="image-ec-two">-->

		<!--					<div class="row">-->

		<!--						<div class="col-md-4 ">-->

		<!--						<div class="tr-ft">-->

		<!--						<a href="know-yourself.php"><img src="img/wired-outline-268-avatar-man.gif" class="img-fluid" style="height: 26px;"> Know Yourself</a>-->

		<!--						</div>-->

		<!--							</div>-->

		<!--						<div class="col-md-4 ">-->

		<!--						<div class="tr-ft">-->

		<!--						  <a href="know-your-career.php"><img src="img/Know-your-Career.gif" class="img-fluid" style="height: 26px;"> Know Your Career</a>-->

		<!--						</div>-->

		<!--							</div>-->

		<!--						<div class="col-md-4 ">-->

		<!--						<div class="tr-ft">-->

		<!--						 <a href="my-career-my-identity.php"><img src="img/My-Career-My-Identity.gif" class="img-fluid" style="height: 26px;"> My Career My Identity </a> -->

		<!--						</div>-->

		<!--						</div>-->

		<!--					</div>-->

		<!--				</div>-->

		<!--			</div>-->

		<!--			<div class="col-md-1"></div>-->

		<!--		</div>-->

		<!--	</div>-->

		<!--</section>-->

		<section class="home-body-three">

			<div class="container">

				<div class="row">

					<div class="col-md-12">

						<div class="image-ec-three">

							<div class="row">

								<div class="col-md-3 student-2">

								<div class="spinner-one">

									<div class="item">

								       <h1 class="" id="visitor-count" ></h1>

								       <!--<h1 class="" id="" data-number="0">0 </h1>-->

								       <h3 class="text">Students Visited</h3>

								    </div>

								</div>

								</div>

									<div class="col-md-3 student-2">

								<div class="spinner-three">

								 	<div class="item">

								       <h1 class="count" data-number="110"> </h1>

								       <h3 class="text">Careers</h3>

								    </div>

								</div>

								</div>

								<div class="col-md-3 student-2">

								<div class="spinner-five">

								 	<div class="item">

								       <h1 class="count" data-number="3500"> </h1>

								       <h3 class="text">Institutions</h3>

								    </div>

								</div>

								</div>

								<div class="col-md-3 student-2">

								<div class="spinner-two">

								  <div class="item">

								       <h1 class="count" data-number="80"> </h1>

								       <h3 class="text">Entrance Exams</h3>

								    </div>

								</div>

								</div>

							

								<div class="col-md-3 student-2">

								<div class="spinner-four">

								 	<div class="item">

								       <h1 class="count" data-number="90"> </h1>

								       <h3 class="text">Scholarships</h3>

								    </div>

								</div>

								</div>

							

							

							</div>

						</div>

					</div>

				</div>

			</div>

		</section>

		<div class="overlay" onclick="hidemodal()" id="overlay"></div>



        <div class="modalContainer" style="display: none;">

            <div class="modal-content">

                <p>This is dynamic content inside the modal.</p>

                <button id="closeModalBtn">Close Modal</button>

            </div>

        </div>



		<!--success stories section start-->

<!--<section class="pt-5 pb-5">-->

<!--	<div class="container">-->

<!--		<h2 class="text-center" style="color: #fff">Success Stories</h2>-->

<!--		<hr class="midline">-->

<!-- 		<div class="carding col-md-12 mt-2">-->

<!--      		<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="5000">-->

<!--        		<div class="w-100 carousel-inner mb-5" role="listbox">-->

<!--          			<div class="carousel-item active">-->

<!--            			<div class="bg"></div>-->

<!--            			<div class="row">-->

<!--            				<div class="col-md-2">-->

<!--            					<div class="carousel-caption">-->

<!--                                    <img src="img/panchanan.png" alt="image" > -->

<!--                                    <h2 class="pt-3">Panchanan Duria <br> ~ <span>Author</span></h2>-->

<!--                                    <button class="openModalBtn" value="Panchanan Duria, an ELT consultant from Kalahandi, teaches English at R.C College, Kodinga. Founded the English Support Mission to empower rural youth with English and Life Skills. He has authored textbooks & grammar books and also edited books. He has received numerous awards and recognition for his contributions to English language education.">View more</button>-->



<!--            		        	</div>-->

<!--            		    	</div>-->

<!--            		    	<div class="col-md-2">-->

<!--            					<div class="carousel-caption">-->

<!--                                    <img src="img/manjusa.png" alt="image">-->

<!--                                    <h2 class="pt-3">Manjusha Manjari Jagat <br> ~ <span>TGT Mathematics</span></h2>-->

<!--                                    <button class="openModalBtn" value="Manjusha Manjari Jagat is an Assistant Teacher at Govt Girls' High School, Khariar. She graduated in Science and Mathematics from Khariar Autonomous College and later earned her M.Sc from Utkal University in Mathematics. She cracked the High School Teachership exam in 2022.">View more</button>-->

<!--            		        	</div>-->

<!--            		    	</div>-->

<!--            		    	<div class="col-md-2">-->

<!--            					<div class="carousel-caption">-->

<!--                                    <img src="img/muni.jpg" alt="image" >-->

<!--                                    <h2 class="pt-3">Muni Tiga <br> ~ <span>Locomotive Pilot</span></h2>-->

<!--                                    <button class="openModalBtn" value="Muni Tiga, born into a poor tribal family, lost her father at an early age. Despite adversities, she studied hard, joined ITI Bargarh, and became a locomotive pilot with Indian Railways.">View more</button>-->

<!--            		        	</div>-->

<!--            		    	</div>-->

<!--            		    	<div class="col-md-2">-->

<!--            					<div class="carousel-caption">-->

<!--                                    <img src="img/anushree.png" alt="image" >-->

<!--                                      <h2 class="pt-3">Anushree Padhee <br> ~ <span>Branch Post Master</span></h2>-->

<!--                                      <button class="openModalBtn" value="Anushree Padhee, a Branch Post Master at Ubuda post office in Jharsuguda, excelled academically, scoring 90% in her 10th grade and completing her 12th from Sambalpur. Her dedication and hard work led her to be selected as a Branch Post Master in 2022 based on her impressive 10th-grade marks. Anushree’s commitment to her studies paved the way for her successful career.">View more</button>-->

<!--            		        	</div>-->

<!--            		    	</div>-->

<!--            		    	<div class="col-md-2">-->

<!--            					<div class="carousel-caption">-->

<!--                                    <img src="img/papun.png" alt="image" >-->

<!--                                        <h2 class="pt-3">Mr. Papun Kumar Pradhan <br> ~ <span>Excise Constable</span></h2>-->

<!--                                          <button class="openModalBtn" value="Mr. Papun Kumar Pradhan from Angul, Odisha is a Constable in the Excise Department. He belongs to a farmer's family. He studied in Pabitranagar High School, Parabil. He completed his graduation from Siddhivinayak +3 Science college, Angul. It was his dream to join the police department and finally he fulfilled his dream in 2023 after years of hardwork.">View more</button>-->

<!--            		        	</div>-->

<!--            		    	</div>-->

<!--            		    	<div class="col-md-2">-->

<!--            					<div class="carousel-caption">-->

<!--                                    <img src="img/subha.jpg" alt="image" >-->

<!--                                        <h2 class="pt-3">Subhalaxmi Subudhi <br> ~ <span>Patissiere</span></h2>-->

<!--                                          <button class="openModalBtn"  value="Subhalaxmi, from Telenga Bazaar, Cuttack, lost her father when she was only 4 years old. She pursued Hotel Management at Swosti Institute of Hotel Management, excelled in baking and cake decoration, and represented Odisha in the 2018 India Skills Competitions, winning a bronze medal.">View more</button>-->

<!--            		        	</div>-->

<!--            		    	</div>-->

            				

<!--            			</div>-->

<!--          			</div>-->

<!--          			<div class="carousel-item">-->

<!--            			<div class="bg"></div>-->

<!--            			<div class="row">-->

<!--            				<div class="col-md-2">-->

<!--            					<div class="carousel-caption">-->

<!--                                    <img src="img/panchanan.png" alt="image" > -->

<!--                                    <h2 class="pt-3">Panchanan Duria <br> ~ <span>Author</span></h2>-->

<!--                                    <button class="openModalBtn" value="Panchanan Duria, an ELT consultant from Kalahandi, teaches English at R.C College, Kodinga. Founded the English Support Mission to empower rural youth with English and Life Skills. He has authored textbooks & grammar books and also edited books. He has received numerous awards and recognition for his contributions to English language education.">View more</button>-->



<!--            		        	</div>-->

<!--            		    	</div>-->

<!--            		    	<div class="col-md-2">-->

<!--            					<div class="carousel-caption">-->

<!--                                    <img src="img/manjusa.png" alt="image">-->

<!--                                    <h2 class="pt-3">Manjusha Manjari Jagat <br> ~ <span>TGT Mathematics</span></h2>-->

<!--                                    <button class="openModalBtn" value="Manjusha Manjari Jagat is an Assistant Teacher at Govt Girls' High School, Khariar. She graduated in Science and Mathematics from Khariar Autonomous College and later earned her M.Sc from Utkal University in Mathematics. She cracked the High School Teachership exam in 2022.">View more</button>-->

<!--            		        	</div>-->

<!--            		    	</div>-->

<!--            		    	<div class="col-md-2">-->

<!--            					<div class="carousel-caption">-->

<!--                                    <img src="img/muni.jpg" alt="image" >-->

<!--                                    <h2 class="pt-3">Muni Tiga <br> ~ <span>Locomotive Pilot</span></h2>-->

<!--                                    <button class="openModalBtn" value="Muni Tiga, born into a poor tribal family, lost her father at an early age. Despite adversities, she studied hard, joined ITI Bargarh, and became a locomotive pilot with Indian Railways.">View more</button>-->

<!--            		        	</div>-->

<!--            		    	</div>-->

<!--            		    	<div class="col-md-2">-->

<!--            					<div class="carousel-caption">-->

<!--                                    <img src="img/anushree.png" alt="image" >-->

<!--                                      <h2 class="pt-3">Anushree Padhee <br> ~ <span>Branch Post Master</span></h2>-->

<!--                                      <button class="openModalBtn" value="Anushree Padhee, a Branch Post Master at Ubuda post office in Jharsuguda, excelled academically, scoring 90% in her 10th grade and completing her 12th from Sambalpur. Her dedication and hard work led her to be selected as a Branch Post Master in 2022 based on her impressive 10th-grade marks. Anushree’s commitment to her studies paved the way for her successful career.">View more</button>-->

<!--            		        	</div>-->

<!--            		    	</div>-->

<!--            		    	<div class="col-md-2">-->

<!--            					<div class="carousel-caption">-->

<!--                                    <img src="img/papun.png" alt="image" >-->

<!--                                        <h2 class="pt-3">Mr. Papun Kumar Pradhan <br> ~ <span>Excise Constable</span></h2>-->

<!--                                          <button class="openModalBtn" value="Mr. Papun Kumar Pradhan from Angul, Odisha is a Constable in the Excise Department. He belongs to a farmer's family. He studied in Pabitranagar High School, Parabil. He completed his graduation from Siddhivinayak +3 Science college, Angul. It was his dream to join the police department and finally he fulfilled his dream in 2023 after years of hardwork.">View more</button>-->

<!--            		        	</div>-->

<!--            		    	</div>-->

<!--            		    	<div class="col-md-2">-->

<!--            					<div class="carousel-caption">-->

<!--                                    <img src="img/subha.jpg" alt="image" >-->

<!--                                        <h2 class="pt-3">Subhalaxmi Subudhi <br> ~ <span>Patissiere</span></h2>-->

<!--                                          <button class="openModalBtn"  value="Subhalaxmi, from Telenga Bazaar, Cuttack, lost her father when she was only 4 years old. She pursued Hotel Management at Swosti Institute of Hotel Management, excelled in baking and cake decoration, and represented Odisha in the 2018 India Skills Competitions, winning a bronze medal.">View more</button>-->

<!--            		        	</div>-->

<!--            		    	</div>-->

            				

<!--            			</div>-->

<!--          			</div>-->

<!--        		</div>-->

<!--		        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">-->

<!--		          <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>-->

<!--		          <span class="sr-only">Previous</span>-->

<!--		        </a>-->

<!--		        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">-->

<!--		          <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>-->

<!--		          <span class="sr-only">Next</span>-->

<!--		        </a>-->

<!--      		</div>-->

<!--		</div>-->

<!--	</div>-->

<!--</section>-->

<!--success stories section end-->





 <!-- TESTIMONIALS -->

<section class="testimonials">

	<div class="container">



      <div class="row">

        <div class="col-sm-12">

            <h2 class="text-center" style="color: #005590; font-size:35px; text-transform:uppercase;font-weight: 600">Success Stories</h2>

          <div id="customers-testimonials" class="owl-carousel">



            <!--TESTIMONIAL 1 -->

            <div class="item">

              <div class="shadow-effect">

                <img src="img/panchanan.png" alt="image" >

                <h3 class="pt-3">Panchanan Duria </h3>

                <h6 style="color: red;">Author</h6>

                <h6 style="font-size: 14px;color: red;">Govt High School, Jayantpur</h6>

                <p>Panchanan Duria, an ELT consultant and English teacher at R.C College, Kodinga, founded the English Support Mission and has received multiple awards for his work.</p>

              </div>

            </div>

            <!--END OF TESTIMONIAL 1 -->

            <!--TESTIMONIAL 2 -->

            <div class="item">

              <div class="shadow-effect">

                <img src="img/manjusa.png" alt="image" >

                <h3 class="pt-3">Manjusha Manjari Jagat </h3>

                 <h6 style="color: red;">Assistant Teacher</h6>

                <h6 style="font-size: 14px;color: red;">Govt Girls' High School, Khariar</h6>

                <p>Manjusha Manjari Jagat, Assistant Teacher at Govt Girls' High School, Khariar, holds an M.Sc in Mathematics and cleared the High School Teachership exam in 2022.</p>

              </div>

            </div>

            <!--END OF TESTIMONIAL 2 -->

            <!--TESTIMONIAL 3 -->

            <div class="item">

              <div class="shadow-effect">

               <img src="img/muni.jpg" alt="image" >

                <h3 class="pt-3">Muni Tiga </h3>

                 <h6 style="color: red;">Loco Pilot</h6>

                <h6 style="font-size: 14px;color: red;">ITI Bargarh</h6>

                <p>Muni Tiga, born into a poor tribal family, lost her father at an early age. Despite adversities, she studied hard, joined ITI Bargarh, and became a locomotive pilot with Indian Railways.</p>

              </div>

            </div>

            <!--END OF TESTIMONIAL 3 -->

            <!--TESTIMONIAL 4 -->

            <!--END OF TESTIMONIAL 4 -->

            <!--TESTIMONIAL 5 -->

            <div class="item">

              <div class="shadow-effect">

                <img src="img/papun.png" alt="image" >

                <h3 class="pt-3">Mr. Papun Kumar Pradhan </h3>

                 <h6 style="color: red;">Police Constable</h6>

                <h6 style="font-size: 14px;color: red;">Pabitranagar Govt High School,Parabil</h6>

                <p>Papun Kumar Pradhan from Angul, Odisha, is a Constable in the Excise Department, fulfilling his dream in 2023 after years of hard work.</p>

              </div>

            </div>

            

            <div class="item">

              <div class="shadow-effect">

                <img src="img/Alok Kumar.jpg" alt="image" >

                <h3 class="pt-3">Alok Kumar Panda</h3>

                 <h6 style="color: red;">Research Associate</h6>

                <h6 style="font-size: 14px;color: red;">Jayprakash Shikhyaniketan, Ramchandrapur</h6>

                <p>Alok Ranjan Panda, an alumnus of Jayprakash Shikhyaniketan, Ramchandrapur, qualified GATE in 2014 and is currently working as a Research Associate at CRIJAF, Kolkata.</p>

              </div>

            </div>

            

            <div class="item">

              <div class="shadow-effect">

                <img src="img/Swetapadma.jpg" alt="image" >

                <h3 class="pt-3">Swetpadma Nayak</h3>

                 <h6 style="color: red;">Junior Engineer</h6>

                <h6 style="font-size: 14px;color: red;">Jayprakash Shikhyaniketan, Ramchandrapur</h6>

                <p>Swetpadma Nayak, a Jayprakash Shikhyaniketan alumnus with a Civil Engineering M.Tech, is a Junior Engineer at the RCE, Burla.</p>

              </div>

            </div>

            <!--END OF TESTIMONIAL 5 -->

            <!--TESTIMONIAL 6 -->

            <div class="item">

              <div class="shadow-effect">

                <img src="img/subha.jpg" alt="image" >

                <h3 class="pt-3">Subhalaxmi Subudhi</h3>

                 <h6 style="color: red;">Pastry chef</h6>

                <h6 style="font-size: 14px;color: red;">Mohan Subuddhi High School, Badamba</h6>

                <p>Subhalaxmi from Cuttack, lost her father at age 4, studied Hotel Management, excelled in baking, and won a bronze at the 2018 India Skills Competitions.</p>

              </div>

            </div>

            

            <div class="item">

              <div class="shadow-effect">

                <img src="img/dr-suryakanta.png" alt="image" >

                <h3 class="pt-3">Dr. Suryakanta Mohapatra</h3>

                 <h6 style="color: red;">Medical doctor</h6>

                <h6 style="font-size: 14px;color: red;">Upper Primary School, Loisingha, Balangir</h6>

                <p>Dr. Suryakanta Mahapatra, a Medical Officer at Kusanga's Primary Health Centre, adopted Phatabahal Project Upper Primary School in Bolangir, driven by his belief in serving humanity.</p>

              </div>

            </div>

            

            <div class="item">

              <div class="shadow-effect">

                <img src="img/shri dilip.jpg" alt="image" >

                <h3 class="pt-3">Shri. Dillip Kumar Jena</h3>

                 <h6 style="color: red;">Teacher</h6>

                <h6 style="font-size: 14px;color: red;">Government Upper Primary School, Bhejiput, Ganjam</h6>

                <p>Sri Dillip Kumar Jena, an alumnus of Government Upper Primary School in Bhejiput, funded desks and benches for students, transforming their classroom experience and earning recognition for his efforts.</p>

              </div>

            </div>

            

            <div class="item">

              <div class="shadow-effect">

                <img src="img/Sankarshan Sahu.jpg" alt="image" >

                <h3 class="pt-3">Shri. Sankarshan Sahu</h3>

                 <h6 style="color: red;">Head Peon</h6>

                <h6 style="font-size: 14px;color: red;">GT High School,Bellaguntha, Ganjam</h6>

                <p> Sri Sankarshan Sahu has been the head peon at GT High School, Bellaguntha since 1992. Known for his dedication, he values the school's rich history and development since its founding in 1948.</p>

              </div>

            </div>

            <div class="item">

              <div class="shadow-effect">

                <img src="img/tulasi.png" alt="image" >

                <h3 class="pt-3">Sri Tulasi Ranjan</h3>

                 <h6 style="color: red;">Chief Manager, SBI</h6>

                <h6 style="font-size: 14px;color: red;">Zilla School, Balasore </h6>

                <p>Sri Tulasi Ranjan, now in his nineties, overcame early hardships, joining the Imperial Bank (now SBI) and retiring as Chief Manager in 1995.</p>

              </div>

            </div>

            <div class="item">

              <div class="shadow-effect">

                <img src="img/dharashree.png" alt="image" >

                <h3 class="pt-3">Smt. Dharashree Panda</h3>

                 <h6 style="color: red;">Lecturer</h6>

                <h6 style="font-size: 14px;color: red;">University High School, VaniVihar</h6>

                <p>Smt. Dharashree Panda, a 1995 alumnus of University High School, VaniVihar, earned post-graduate degrees from Utkal University and worked as a lecturer while supporting the school's development.</p>

              </div>

            </div>

            <!--END OF TESTIMONIAL 6 -->

          </div>

        </div>

      </div>

      </div>

    </section>

    <!-- END OF TESTIMONIALS -->

		

		

		

		</div>

		</div>

		<?php include "include/before-footer-index.php";?>

		<!-- -------------footer start---------- -->

		<?php include "include/footer.php";?>

		<!---------------footer end------------>

		<script>

			let count = document.querySelectorAll(".count")

			let arr = Array.from(count)

			arr.map(function(item){

			  let startnumber = 0

			  function counterup(){

			  startnumber++

			  item.innerHTML= startnumber

			   

			  if(startnumber == item.dataset.number){

			      clearInterval(stop)

			  }

			}

			let stop =setInterval(function(){

			  counterup()

			},4)



			})

		</script>

		<script>

        function updateVisitorCount() {

            fetch('count-visitor.php')

                .then(response => response.text())

                .then(data => {

document.getElementById('visitor-count').innerHTML = data.replace(/<br\s*\/?>/gi, "") + "+";                })

                .catch(error => console.error('Error:', error));

        }



        // Update the visitor count every 5 seconds

        setInterval(updateVisitorCount, 10000);



        // Initial call to update the visitor count

        updateVisitorCount();





$(document).ready(function(){

    $("#search-button").click(function(){

        const searchKeyword = $('#searchInput').val();

        if(searchKeyword !="")

        {

            var suggestions =  $(".searching-ul")

            $.ajax({

                type: "post",

                url: "backend/getData.php",

                data: {

                    'tab': 1000, 

                    'searchKeyword':searchKeyword

                },

                beforeSend: function(){

                    $("#search-button").html('<span class="fa fa-spinner fa-spin"></span>')

                },

                success: function(resp){

                    console.log(resp);

                    return false;

                    suggestions.html('');

                    resp = JSON.parse(resp);

                    $(".searching-box").removeClass('d-none')

                    $(".background-modal").removeClass('d-none')

                    for(var i = 0; i < resp.length; i++) {

                        if(resp[i].table == "catagory") {

                            suggestions.append(`<li><a href='career-option.php?id=${resp[i].row.id}'>${resp[i].row.name}</a></li>`);

                        }

                        else if(resp[i].table == "subcatagory") {

                            suggestions.append(`<li><a href='${resp[i].row.slug}.php'>${resp[i].row.name}</a></li>`);

                        }

                        else if(resp[i].table == "sub_subcategory") {

                            suggestions.append(`<li><a href='${resp[i].row.slug}.php'>${resp[i].row.name}</a></li>`);

                        }

                        else if(resp[i].table == "college") {

                            suggestions.append('<li class="">' + resp[i].row.name + '<br> <button onclick=instituteDetails(\'' + resp[i].row.id + '\')>View Details</button><br><a target=\'_blank\' href=\'' + resp[i].row.link + '\'>visit</a></li>')

                            

                        } else if(resp[i].table == "scholarship") {

                            // alert()

                            suggestions.append('<li class="">' + resp[i].row.name + '<br> <button onclick=ScholarDetails(\'' + resp[i].row.id + '\')>View Details</button><br><a target=\'_blank\' href=\'' + resp[i].row.link + '\'>visit</a></li>')

                        } else if(resp[i].table == "entrance_exam") {

                            suggestions.append('<li class="responsText-ai-li">' + resp[i].row.name + '<br> <button onclick=ScholarDetails(\'' + resp[i].row.id + '\')>View Details</button><br><a target=\'_blank\' href=\'' + resp[i].row.link + '\'>visit</a></li>')

                        }

                    }

                   

    

                    $("#search-button").html('<span class="fa fa-search"></span>');

                }

         })

        }

    });

    

    

    $(".background-modal").click(function(){

        $(".background-modal").addClass('d-none')

        $(".searching-box").addClass('d-none')

        $(".searching-ul").html()

    })

});





$(document).ready(function() {

        $('.openModalBtn').click(function() {

        var content = $(this).attr('value');

        var dynamicContent = '<p class="p-3">'+content+'</p><button id="closeModalBtn" onclick="hidemodal()">Close View</button>';

        $('.modalContainer .modal-content').html(dynamicContent);



        $('.modalContainer').fadeIn();

        $('#overlay').fadeIn();

    });





});



function hidemodal()

{

        $('.modalContainer').fadeOut();

        $('.overlay').fadeOut();

}









    </script>

     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Owl Carousel JS -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    

    <script>

        jQuery(document).ready(function($) {

        		"use strict";

        		//  TESTIMONIALS CAROUSEL HOOK

		        $('#customers-testimonials').owlCarousel({

		            loop: true,

		            center: true,

		            items: 3,

		            margin: 0,

		            autoplay: true,

		            dots:true,

		            autoplayTimeout: 8500,

		            smartSpeed: 450,

		            responsive: {

		              0: {

		                items: 1

		              },

		              768: {

		                items: 2

		              },

		              1170: {

		                items: 3

		              }

		            }

		        });

        	});

    </script>

<script>
    
if (!localStorage.getItem("device_id")) {
    localStorage.setItem("device_id", 'dev-' + Math.random().toString(36).substr(2, 12));
}

function trackPageClick(levels = [], el = null) {

    let deviceId = localStorage.getItem("device_id");

    let pageUrl = '';

    // If link click
    if (el && el.getAttribute("href")) {
        pageUrl = el.getAttribute("href")
                    .split("/")
                    .pop()
                    .split("?")[0];
    } 
    // If form / ajax (NO redirect)
    else {
        pageUrl = window.location.pathname.split("/").pop() || 'home';
    }

    $.ajax({
        type: "POST",
        url: "backend/track_page.php",
        data: {
            device_id: deviceId,
            parent_page: levels[0] || '',
            page_url: pageUrl,
            page_title: document.title,
            page_flow: JSON.stringify(levels)
        }
    });
}
    </script>
	</body>

</html>