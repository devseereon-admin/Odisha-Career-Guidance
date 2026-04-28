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
		<section class="psephologist-one">
			<div class="container">
				<h2 class="heading-one-two">CARRER IN</h2>
				<h1 class="heading-one">POLITICS</h1>
				
				<div class="row">
					<div class="col-md-3" >
						<div class="search-btn">
					    <form action="/action_page.php">
					      <input type="text" placeholder="Search.." name="search">
					      <button type="submit"><i class="fa fa-search"></i></button>
					    </form>
					  	</div>
					  	<div class="heading-psephologist">
					  		<h3>Psephologist</h3>
					  	</div>
					</div>
					<div class="col-md-9 border-psepho" >
							<!-- Nav tabs -->
						  <ul class="nav nav-tabs" role="tablist">
						    <li class="nav-item">
						      <a class="nav-link active" data-toggle="tab" href="#home">About</a>
						    </li>
						    <li class="nav-item">
						      <a class="nav-link" data-toggle="tab" href="#menu1">Road Map</a>
						    </li>
						    <li class="nav-item">
						      <a class="nav-link" data-toggle="tab" href="#menu2">Entrance Exams</a>
						    </li>
						    <li class="nav-item">
						      <a class="nav-link" data-toggle="tab" href="#menu3">Colleges</a>
						    </li>
						    <li class="nav-item">
						      <a class="nav-link" data-toggle="tab" href="#menu4">Entrepreneurship</a>
						    </li>
						    <li class="nav-item">
						      <a class="nav-link" data-toggle="tab" href="#menu5">For The Differently Abled</a>
						    </li>
						  </ul>

						  <!-- Tab panes -->
						  <div class="tab-content">
						    <div id="home" class="container tab-pane active"><br>
						      <div class="row">
						      	<div class="col-md-9">
						      		<div class="psefology-skill-spea">
						      		<h3 class="heading-for-tab">Psephologist</h3>
						      		<p>Psephology is a division of political science that deals with the examination as well as the statistical analysis of elections and polls. People who practice psephology are called psephologists.</p>
						      		<img src="img/Govt-School-List.jpg" class="img-fluid">
						      		<h5>Skills Required:</h5>
						      		<ul class="Skills-Psephologist">
						      			<li>Public Specking</li>
						      			<li>Analytical Skill</li>
						      			<li>Decision Making</li>
						      			<li>Interpersonal Skills</li>
						      			<li>Predicting future with assumptions</li>
						      			<li>Attention</li>
						      		</ul>
						      		<div class="row you-tube-channel">
						      			<div class="col-md-1 col-3">
						      				<a href="#"><img src="img/free-youtube-logo-icon-2431-thumb.png" width="50px" class="img-fluid"></a>
						      			</div>
						      			<div class="col-md-11 col-9">
						      				<p><b>For More Information , Visit Our Youtube Channel</b></p>
						      			</div>
						      		</div>
						      	</div>
						      	</div>
						      	<div class="col-md-3 right-side-pshology">
						      		<img src="img/Govt-School-List.jpg" class="img-fluid">
						      		<form>
										   <select class="form-select">
										     <option>Success Story</option>
										     <option>Vocational</option>
										     <option>Arts</option>
										     <option>Science</option>
										     <option>Commerce</option>
										     <option>Neutral</option>
										   </select>
										 </form>
						      	</div>
						      </div>
						    </div>
						    <div id="menu1" class="container tab-pane fade"><br>
						      <h3>Menu 1</h3>
						      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
						    </div>
						    <div id="menu2" class="container tab-pane fade"><br>
						      <h3>Menu 2</h3>
						      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
						    </div>
						    <div id="menu3" class="container tab-pane fade"><br>
						      <h3>Menu 3</h3>
						      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
						    </div>
						    <div id="menu4" class="container tab-pane fade"><br>
						      <h3>Menu 4</h3>
						      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
						    </div>
						    <div id="menu5" class="container tab-pane fade"><br>
						      <h3>Menu 5</h3>
						      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
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
	</body>
</html>