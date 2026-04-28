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
			<div class="containr">
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

		<section class="my-carrer-my-identity">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h1 class="heading-one">MY CAREER MY IDENTITY</h1>
						<div class="my-carrer-my-identity-form">
							<form>
							    <div class="row">
							      	<div class="col-md-6 col-6">
							        <input type="text" class="form-control form-control-lg" placeholder="* First Name" name="fname" required>
							      	</div>
							      	<div class="col-md-6 col-6">
							        <input type="text" class="form-control form-control-lg" placeholder="* Last Name" name="lname" required>
							      	</div>
							      	<div class="col-md-12 col-12">
							      	<textarea class="form-control form-control-lg" rows="5" id="comment" name="text" placeholder="Send a Message" required></textarea>
							      	</div>
							      	<div class="col-md6 col-12">
							      	<label for="myfile">Upload Photo/Video:</label>
							      	<input class="form-control form-control-lg" type="file" placeholder="Send a Message" required >
							  		</div>
							  		<div class="col-md-6 col-12"></div>
							      	<div class="col-md-12 col-12">
							      	<button type="submit" class="btn btnprimary btn-lg">Submit</button>
							      </div>
							    </div>
							</form>
						</div>
					</div>		
					<div class="col-md-6">
						<div class="my-carrer-my-identity-img">
							<img src="img/Govt-School-List.jpg" class="img-fluid">
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