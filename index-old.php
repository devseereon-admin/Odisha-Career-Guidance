
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Mo Career</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=evice-width, initial-scale=1.0">

	<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
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
    color: #ff5f10;
    font-family: 'Poppins', sans-serif;
    font-size: 40px;
    font-weight: bold;
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
	right: 15px;
	left: 15px;
	top: 15px;
	color: #3d3d3d;
	border: 1px solid #ccc;
	min-height:175px;
	padding: 15px;
	background-color: #fff;
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
 .carousel-caption img{
            border-radius:50%;
        }
        .carding .carousel-item
        {
            min-height: 288px;
        }
        .carousel-caption .col-sm-12
        {
            background:#fff;
        }
/*Success Stories*/




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
                        <h3>MO CAREER</h3>
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
                    <div class="card card-body search-card searching-box d-none">
                        <ul class="searching-ul" style="list-style-type: none;padding:0"></ul>
                    </div>
			</div>
			<!--<div class="col-md-2">-->
			   
			    
			<!--</div>-->
			<div class="col-md-2 col-6">
				<nav class="navbar navbar-expand-sm navbar-dark">
			      	<div class="d-flex language">
			      	<div class="language-en">
			      		<a href="index.html" class="language-eng">English</a>
			      	</div>
			        <div class="language-od">
			        <a href="od/index.php" class="language-odia">ଓଡିଆ</a>
			      	</div>
			      	</div>
				</nav> 
			</div>
			</div>
			</div>      
		</section>
		<div class="background-modal d-none"></div>
		<!------ header end ------------->
        <div class="home-body-bg" style="background-image: url(img/Bg-low.gif); background-size:cover; background-repeat: no-repeat;">
        <div class="home-body-bg-two" style="background-image: url(img/Butterfly_4.gif);">
		<section class="home-body-one1" style="padding:30px 0px">
			<div class="container">
				<h1 class="heading-one1">MO CAREER</h1>
				<div class="row">
					
					<div class="col-md-12">
						<div class="image-ec-one">
						<div class="row">
							<div class="col-md-6 not-padding">
								<div class="career-image-secone">
								<img src="img/compressed-home-img-1.jpg" class="img-fluid">
								<img src="img/Home-img-compr-2.jpg" class="img-fluid">
								</div>
							</div>
							<div class="col-md-6">
								<div class="career-image-sectwo">
								<img src="img/compressed-home-img5.jpg" class="img-fluid">
								<img src="img/compressed-home-img6.jpg" class="img-fluid">	
								</div>						
							</div>
						</div>
						</div>
						
					</div>
					
				</div>
			</div>
		</section>
		
	
		
		
		
		<section class="home-body-two">
			<div class="container">
				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-10">
						<div class="image-ec-two">
							<div class="row">
								<div class="col-md-4 ">
								<div class="tr-ft">
								<a href="know-yourself.php"><img src="img/wired-outline-268-avatar-man.gif" class="img-fluid" style="height: 26px;"> Know Yourself</a>
								</div>
									</div>
								<div class="col-md-4 ">
								<div class="tr-ft">
								  <a href="know-your-career.php"><img src="img/Know-your-Career.gif" class="img-fluid" style="height: 26px;"> Know Your Career</a>
								</div>
									</div>
								<div class="col-md-4 ">
								<div class="tr-ft">
								 <a href="my-career-my-identity.php"><img src="img/My-Career-My-Identity.gif" class="img-fluid" style="height: 26px;"> My Career My Identity </a> 
								</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-1"></div>
				</div>
			</div>
		</section>
		<section class="home-body-three">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="image-ec-three">
							<div class="row">
								<div class="col-md-3 student-2">
								<div class="spinner-one">
									<div class="item">
								       <!--<h1 class="count" id="visitor-count" data-number="1500"> </h1>-->
								       <h1 class="" id="" data-number="0">0 </h1>
								       <h3 class="text">Students Visited</h3>
								    </div>
								</div>
								</div>
								<div class="col-md-3 student-2">
								<div class="spinner-two">
								  <div class="item">
								       <h1 class="count" data-number="42"> </h1>
								       <h3 class="text">Entrance Exams</h3>
								    </div>
								</div>
								</div>
								<div class="col-md-3 student-2">
								<div class="spinner-three">
								 	<div class="item">
								       <h1 class="count" data-number="100"> </h1>
								       <h3 class="text">Careers</h3>
								    </div>
								</div>
								</div>
								<div class="col-md-3 student-2">
								<div class="spinner-four">
								 	<div class="item">
								       <h1 class="count" data-number="48"> </h1>
								       <h3 class="text">Scholarships</h3>
								    </div>
								</div>
								</div>
								<div class="col-md-3 student-2">
								<div class="spinner-five">
								 	<div class="item">
								       <h1 class="count" data-number="2000"> </h1>
								       <h3 class="text">Institutions</h3>
								    </div>
								</div>
								</div>
							
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<!--success stories section start-->
<section class="pt-5 pb-5">
	<div class="container">
		<h2 class="text-center" style="color: #fff">Success Stories</h2>
		<hr class="midline">
 		<div class="carding col-md-12 mt-2">
      		<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="100000">
        		<div class="w-100 carousel-inner mb-5" role="listbox">
          			<div class="carousel-item active">
            			<div class="bg"></div>
            			<div class="row">
            				<div class="col-md-6 col-12">
            					<div class="carousel-caption">
            		          		<div class="row">
                                <div class="col-sm-12 col-12">
                                    <img src="img/panchanan.png" alt="image" style="width:100px;height:auto;"> 
                                    <h2>Panchanan Duria - <span>Author</span></h2>
                                    <small>Panchanan Duria, an ELT consultant from Kalahandi, teaches English at R.C College, Kodinga. Founded the English Support Mission to empower the Rural Youth with English and Life Skills. He has authored textbooks & grammar books and also edited books. He has received numerous awards and recognition for his contributions to English language education.</small>
                                </div>
            		          		</div>
            		        	</div>
            		    	</div>
            				<div class="col-md-6 col-12">
            					<div class="carousel-caption">
            		          		<div class="row">
            		          			<div class="col-sm-12 col-12">
                                  <img src="img/manjusa.png" alt="image" style="width:100px;height:auto;">
                                    <h2>Manjusha Manjari Jagat - <span>TGT Mathematics</span></h2>
                                      <small>Manjusha Manjari Jagat is an Assistant Teacher at Govt Girls' High School, Khariar. She graduated in Science and Mathematics from Khariar Autonomous College and later earned her M.Sc from Utkal University in Mathematics. She cracked the High School Teachership exam in 2022.</small>
            				            </div>
            		          		</div>
            		      </div>
            		    </div>
            			</div>
          			</div>
          			<div class="carousel-item">
            			<div class="bg"></div>
              			<div class="row">
              				<div class="col-md-6 col-12">
            					<div class="carousel-caption">
            		          		<div class="row">
            		          			<div class="col-sm-12 col-12">
                                  <img src="img/muni.jpg" alt="image" style="width:100px;height:auto;">
                                    <h2>Muni Tiga - <span>Locomotive Pilot</span></h2>
                                      <small>Muni Tiga, born into a poor tribal family, lost her father at an early age. Despite adversities, she studied hard, joined ITI Bargarh, and became a locomotive pilot with Indian Railways.</small> 
            				            </div>
            		          		</div>
            		        	</div>
            		    	</div>
            		    	<div class="col-md-6 col-12">
            					<div class="carousel-caption">
            		          		<div class="row">
            		          			<div class="col-sm-12 col-12">
                                    <img src="img/anushree.png" alt="image" style="width:100px;height:auto;">
                                      <h2>Anushree Padhee - <span>Branch Post Master</span></h2>
                                      <small>Anushree Padhee, a Branch Post Master at Ubuda post office in Jharsuguda, excelled academically, scoring 90% in her 10th grade and completing her 12th from Sambalpur. Her dedication and hard work led her to be selected as a Branch Post Master in 2022 based on her impressive 10th-grade marks. Anushree’s commitment to her studies paved the way for her successful career.</small>
            				            </div>
            		          		</div>
            		        	</div>
            		    	</div>
            			</div>
          			</div>
          			<div class="carousel-item">
            		    <div class="bg"></div>
              			<div class="row">
                            <div class="col-md-6">
                					  <div class="carousel-caption">
                		          		<div class="row">
                		          			<div class="col-sm-12 col-12">
                                      <img src="img/papun.png" alt="image" style="width:100px;height:auto;">
                                        <h2>Mr. Papun Kumar Pradhan - <span>Excise Constable</span></h2>
                                          <small>Mr. Papun Kumar Pradhan from Angul ,Odisha is a Constable in the Excise department. He belongs to a farmer's family. He studied in Pabitranagar High School,Parabil . He completed his graduation from Siddhivinayak +3 Science college, Angul . It was his dream to join the police department and finally he fulfilled his dream in 2023 after years of hardwork.</small>
                				            </div>
                		          		</div>
                		        </div>
                		  </div>
                		    <div class="col-md-6 ">
                					  <div class="carousel-caption">
                		          		<div class="row">
                		          			<div class="col-sm-12 col-12">
                                      <img src="img/subha.jpg" alt="image" style="width:100px;height:auto;">
                                        <h2>Subhalaxmi Subudhi - <span>Patissiere</span></h2>
                                          <small>Subhalaxmi, a 4-year-old from Telenga Bazaar, Cuttack, lost her father in an accident at the age of 4. She pursued Hotel Management at Swosti Institute of Hotel Management, excelled in baking and cake decoration, and represented Odisha in the 2018 India Skills Competitions, winning a bronze medal.</small>
                				            </div>
                		          		</div>
                		        </div>
                		  </div>
            		    </div>
          			</div>
        		</div>
		        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
		          <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
		          <span class="sr-only">Previous</span>
		        </a>
		        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
		          <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
		          <span class="sr-only">Next</span>
		        </a>
      		</div>
		</div> 
	</div>
</section>
<!--success stories section end-->
		
		
		
		</div>
		</div>
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
       /* function updateVisitorCount() {
            fetch('count-visitor.php')
                .then(response => response.text())
                .then(data => {
                    document.getElementById('visitor-count').innerText = data;
                })
                .catch(error => console.error('Error:', error));
        }

        // Update the visitor count every 5 seconds
        setInterval(updateVisitorCount, 5000);

        // Initial call to update the visitor count
        updateVisitorCount();*/


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




    </script>
	</body>
</html>