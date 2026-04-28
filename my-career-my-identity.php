<?php
include "admin/dbconn.php"; // adjust path if needed

// Get image based on priority (best practice)
$query = mysqli_query($conn, "SELECT image FROM my_career_images ORDER BY priority  DESC LIMIT 1");

$data = mysqli_fetch_assoc($query);

// Set image path
if (!empty($data['image'])) {
	$imagePath = "upload/my-career/" . $data['image'];
} else {
	$imagePath = "img/default.jpg"; // fallback image
}
?>


<!DOCTYPE html>

<html>



<head>

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>Ama Career</title>

	<meta name="description" content="">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">



	<?php include "include/header_css.php"; ?>





	<?php include "include/script.php"; ?>



	<!-- Google Tag Manager -->

	<script>
		(function(w, d, s, l, i) {
			w[l] = w[l] || [];
			w[l].push({
				'gtm.start':

					new Date().getTime(),
				event: 'gtm.js'
			});
			var f = d.getElementsByTagName(s)[0],

				j = d.createElement(s),
				dl = l != 'dataLayer' ? '&l=' + l : '';
			j.async = true;
			j.src =

				'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
			f.parentNode.insertBefore(j, f);

		})(window, document, 'script', 'dataLayer', 'GTM-K43FK2HL');
	</script>

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

			<?php include "include/top_bar.php"; ?>

		</div>

	</section>

	<section class="bg-pattern header-menubg">

		<div class="container">

			<div class="row">

				<div class="col-md-10 col-6">

					<?php include "include/nav_menu.php"; ?>

				</div>



			</div>

			<div class="col-md-2 col-6">

				<nav class="navbar navbar-expand-sm navbar-dark">

					<div class="d-flex language">

						<div class="language-en">

							<a href="my-career-my-identity.php" class="language-eng">English</a>

						</div>

						<div class="language-od">

							<a href="od/my-career-my-identity.php" class="language-odia">ଓଡିଆ</a>

						</div>

					</div>

				</nav>

			</div>

		</div>

	</section>

	<!------ header end ------------->



	<section class="my-carrer-my-identity">

		<div class="container">

			<div class="row">

				<div class="col-12">



				</div>

				<div class="col-md-6">

					<h1 class="heading-one">MY CAREER MY IDENTITY</h1>

					<!-- <p>Tell us what you learned from this website! </p>

				        <p>Did it help you understand yourself better, and help you make your future plans?</p>

				        <p>What careers and back-up careers have you thought about?</p>

				        <p>Finally, tell us what career you had thought about for yourself before you came to this website. Now, after going through this information, have you thought about new careers? Tell us what they are.</p> -->

					<div class="my-carrer-my-identity-form">

						<form action="my-career-my-identity-save.php" method="POST" enctype="multipart/form-data">

							<div class="row">

								<div class="col-md-6 col-6">

									<input type="text" class="form-control form-control-lg" placeholder=" First Name" name="fname">

								</div>



								<div class="col-md-6 col-6">

									<input type="text" class="form-control form-control-lg" placeholder=" Last Name" name="lname">

								</div>

								<div class="col-md-6 col-6">

									<input type="text" class="form-control form-control-lg" placeholder="* Email" name="email" required>

								</div>
								<div class="col-md-6 col-6">
									<input
										type="tel"
										class="form-control form-control-lg"
										placeholder="Phone Number"
										name="phone"
										pattern="[0-9]{10}"
										maxlength="10"
										required
										oninput="this.value = this.value.replace(/[^0-9]/g, '')"
										oninvalid="this.setCustomValidity('Please enter a valid 10 digit phone number')"
										oninput="this.setCustomValidity('')">
								</div>

								<div class="col-md-12 col-12 mt-4">
									<h3 class="mb-3" style="color:#005590;">Tell us about your Career Action Plan</h3>
								</div>

								<div class="col-md-12 col-12">
									<label> Q1. Based on your skills, personality and interests, what Career do you want to pursue in future?</label>
									<textarea class="form-control  form-control-lg mb-3" name="q1" required></textarea>
								</div>

								<div class="col-md-12 col-12">
									<label>Q2. How are you preparing yourself for that career?</label>
									<textarea class="form-control form-control-lg mb-3" name="q2" required></textarea>
								</div>

								<div class="col-md-12 col-12">
									<label>Q3. After receiving career guidance, have you thought about any backup career options? If yes, what is that?</label>
									<textarea class="form-control form-control-lg mb-3" name="q3" required></textarea>
								</div>

								<div class="col-md-12 col-12">
									<label>Q4. How will you prepare yourself for the chosen alternative/backup career option?</label>
									<textarea class="form-control form-control-lg mb-3" name="q4" required></textarea>
								</div>

								<div class="col-md-12 col-12">
									<label>Q5. What other guidance do you need which will help you to pursue your aspired Career?</label>
									<textarea class="form-control form-control-lg mb-3" name="q5" required></textarea>
								</div>

								<div class="col-md-12 col-12">
									<label>Q6. To achieve your career goals or dreams, which skills, personality or interests will you focus on developing?</label>
									<textarea class="form-control form-control-lg mb-3" name="q6" required></textarea>
								</div>


								<!-- <div class="col-md-12 col-12">

									<textarea class="form-control form-control-lg" rows="5" id="comment" name="text" placeholder="Send a Message" required></textarea>

								</div> -->

								<div class="col-md-12 col-12">

									<label for="myfile">Upload Photo/Video:</label>

									<input class="form-control form-control-lg" name="file" type="file" placeholder="Send a Message">

								</div>

								<div class="col-md-6 col-12"></div>
								
								<div class="col-md-12 col-12">

									<button type="submit" class="btn btn-primary btn-lg">Submit</button>

								</div>

							</div>

						</form>

					</div>

				</div>

				<div class="col-md-6">

					<div class="my-carrer-my-identity-img">
						<img src="<?= $imagePath ?>" class="img-fluid">
					</div>

				</div>

			</div>

		</div>

	</section>

	<div class="modal fade" id="responseModal" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">

				<div class="modal-header  text-white">
					<h5 class="modal-title">Success</h5>
					<button type="button" class="close text-white" id="modalCloseBtn">&times;</button>
				</div>

				<div class="modal-body text-center">
					<p id="modalMessage"></p>
				</div>

			</div>
		</div>
	</div>

	<script>
		$(document).ready(function() {
			const urlParams = new URLSearchParams(window.location.search);
			const msg = urlParams.get('msg');

			if (msg) {
				$('#modalMessage').text(decodeURIComponent(msg));
				$('#responseModal').modal('show');
			}

			// 🔥 When cross button clicked → redirect
			$('#modalCloseBtn').click(function() {
				window.location.href = "my-career-my-identity.php";
			});
		});
	</script>



	<!-- -------------footer start---------- -->

	<?php include "include/before-footer.php"; ?>

	<!-- -------------footer end---------- -->

</body>

</html>