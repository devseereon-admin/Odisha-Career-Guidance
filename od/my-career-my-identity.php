<?php
include "admin/dbconn.php"; // adjust path if needed

// Get image based on priority (best practice)
$query = mysqli_query($conn, "SELECT image FROM my_career_images ORDER BY priority  DESC LIMIT 1");

$data = mysqli_fetch_assoc($query);

// Set image path
if(!empty($data['image'])){
    $imagePath = "od/upload/my-career/" . $data['image'];
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



		<!--<link rel="stylesheet" href="css/bootstrap.min.css">-->

		

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

			        <a href="../my-career-my-identity.php" class="language-odia">English</a>

			      	</div>

			      	<div class="language-en">

			      		<a href="my-career-my-identity.php" class="language-eng">ଓଡିଆ</a>

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

						<h1 class="heading-one">ଆମ ବୃତ୍ତି ଓ ପରିଚୟ</h1>

						<!-- <p>ଆପଣ ଏହି ୱେବସାଇଟ୍ ରୁ କ'ଣ ଶିଖିଛନ୍ତି ସେ ବିଷୟରେ ଆମକୁ ଜଣାନ୍ତୁ ! </p>

				        <p>ଏହା ଆପଣଙ୍କୁ ବିଭିନ୍ନ କ୍ୟାରିୟର ବିଷୟରେ ବୁଝିବାରେ ସାହାଯ୍ୟ କରିଥିଲା କି, ଏବଂ ଆପଣଙ୍କ ଭବିଷ୍ୟତ ଯୋଜନା ପ୍ରସ୍ତୁତ କରିବାରେ ସାହାଯ୍ୟ କରିଥିଲା କି? </p>

				        <p>ଆପଣଙ୍କ କ୍ୟାରିୟର ଲକ୍ଷ କ'ଣ ଏବଂ ଆପଣ କେଉଁ ବ୍ୟାକ୍ ଅପ୍ କ୍ୟାରିୟର ବିଷୟରେ ଚିନ୍ତା କରିଛନ୍ତି?</p>

				        <p>ଶେଷରେ, ଏହି ୱେବସାଇଟକୁ ଆସିବା ପୂର୍ବରୁ ଆପଣ ନିଜ ପାଇଁ କେଉଁ କ୍ୟାରିୟର ବିଷୟରେ ଚିନ୍ତା କରିଥିଲେ ତାହା ଆମକୁ କୁହନ୍ତୁ । ଏବେ ଏହି ୱେବସାଇଟ୍ ର ସୂଚନା କୁ ଅନୁଧ୍ୟାନ କରିବା ପରେ ଆପଣ କେଉଁ  ନୂଆ କ୍ୟାରିୟର ବିଷୟରେ ଚିନ୍ତା କରିଛନ୍ତି ?  ସେ ବିଷୟରେ ଆମକୁ ଜଣାନ୍ତୁ।

</p> -->

                        <div class="my-carrer-my-identity-form">

                            <form action="my-career-my-identity-save.php" method="post" enctype="multipart/form-data">

                                <div class="row">

                        

                                    <!-- First Name -->

                                    <div class="col-md-6 col-6">

                                        <input type="text" class="form-control form-control-lg" 

                                               placeholder=" ପ୍ରଥମ ନାମ" name="fname">

                                    </div>

                        

                                    <!-- Last Name -->

                                    <div class="col-md-6 col-6">

                                        <input type="text" class="form-control form-control-lg" 

                                               placeholder=" ଶେଷ ନାମ" name="lname">

                                    </div>

                        

                                    <!-- Email -->

                                    <div class="col-md-6 col-6">

                                        <input type="email" class="form-control form-control-lg" 

                                               placeholder=" ଇମେଲ୍" name="email">

                                    </div>

                       <div class="col-md-6 col-6">
    <input 
        type="tel" 
        class="form-control form-control-lg" 
        placeholder="ମୋବାଇଲ ନମ୍ବର" 
        name="phone"
        pattern="[6-9][0-9]{9}"
        maxlength="10"
        required
        oninput="this.value = this.value.replace(/[^0-9]/g, '')"
    >
</div>

<div class="col-md-12 col-12 mt-4">
<h3 class="mb-3" style="color:#005590;">ତୁମର କ୍ୟାରିୟର୍ ଆକ୍ସନ୍ ପ୍ଲାନ୍ ବିଷୟରେ କୁହ</h3>								</div>

								<div class="col-md-12 col-12">
									<label> Q1. ତୁମର ଦକ୍ଷତା,ବ୍ୟକ୍ତିତ୍ଵ ଓ ଆଗ୍ରହ କୁ ନେଇ ଭବିଷ୍ୟତରେ କ'ଣ ହେବାକୁ ଚାହୁଁଛ? </label>
									<textarea class="form-control  form-control-lg mb-3" name="q1" required></textarea>
								</div>

								<div class="col-md-12 col-12">
									<label>Q2. ତୁମେ ଚୟନ କରିଥିବା ବୃତ୍ତି ପାଇଁ ନିଜକୁ କିଭଳି ପ୍ରସ୍ତୁତ କରୁଛ? </label>
									<textarea class="form-control form-control-lg mb-3" name="q2" required></textarea>
								</div>

								<div class="col-md-12 col-12">
									<label>Q3. ତୁମେ ବୃତ୍ତିଗତ ମାର୍ଗଦର୍ଶନ ପାଇଲା ପରେ ଆଉ କିଛି ନୂଆ କ୍ୟାରିୟର୍ ବିକଳ୍ପ ବିଷୟରେ ଚିନ୍ତା କରିଛ କି ? ଯଦି ହଁ, ତେବେ ତାହା କ'ଣ?</label>
									<textarea class="form-control form-control-lg mb-3" name="q3" required></textarea>
								</div>

								<div class="col-md-12 col-12">
									<label>Q4. ତୁମେ ଏହି ବିକଳ୍ପ କ୍ୟାରିୟର୍  ପାଇବା ପାଇଁ ନିଜକୁ କିଭଳି ପ୍ରସ୍ତୁତ କରିବ?</label>
									<textarea class="form-control form-control-lg mb-3" name="q4" required></textarea>
								</div>

								<div class="col-md-12 col-12">
									<label>Q5. ତୁମେ ଲକ୍ଷ୍ୟ ରଖିଥିବା କ୍ୟାରିୟର୍‌ ବା ବୃତ୍ତି ହାସଲ କରିବା ପାଇଁ ତୁମକୁ ଆଉ କେଉଁ ପ୍ରକାରର ମାର୍ଗଦର୍ଶନ ଆବଶ୍ୟକ?</label>
									<textarea class="form-control form-control-lg mb-3" name="q5" required></textarea>
								</div>

								<div class="col-md-12 col-12">
									<label>Q6. ତୁମେ ନିଜର ଲକ୍ଷ୍ୟ /ସ୍ଵପ୍ନ ମୁତାବକ କ୍ୟାରିୟର୍‌ ପାଇବା ପାଇଁ କେଉଁ ଦକ୍ଷତା/ବ୍ୟକ୍ତିତ୍ଵ/ଆଗ୍ରହର ବିକାଶ ଉପରେ ଗୁରୁତ୍ଵ ଦେବାପାଇଁ ଯୋଜନା କରୁଛ ? </label>
									<textarea class="form-control form-control-lg mb-3" name="q6" required></textarea>
								</div>



                                    <!-- Message -->
<!-- 
                                    <div class="col-md-12 col-12">

                                        <textarea class="form-control form-control-lg" rows="5" 

                                                  name="text" placeholder="ଏକ ସନ୍ଦେଶ ପ୍ରେରଣ କରନ୍ତୁ"></textarea>

                                    </div> -->

                        

                                    <!-- File Upload -->

                                    <div class="col-md-6 col-12">

                                        <label for="myfile">ଫୋଟୋ ଏବଂ ଭିଡିଓ ଅପଲୋଡ କରନ୍ତୁ:</label>

                                        <input class="form-control form-control-lg" type="file" 

                                               name="file" accept="image/png, image/jpeg, image/jpg, image/gif">

                                    </div>

                        

                                    <div class="col-md-6 col-12"></div>

                        

                                    <!-- Submit Button -->

                                    <div class="col-md-12 col-12">

                                        <button type="submit" class="btn btn-primary btn-lg">ପଠାନ୍ତୁ</button>

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

		

		<!-- -------------footer start---------- -->

	<section class="footer">

			<div class="container">

				<div class="row">

				<div class="col-m-2 col-5"><p>ବିଜ୍ଞାପନ:</p></div>

				<div class="col-md-10 col-7"><marquee >ଏନଟିଏ ଦ୍ୱାରା ନିଟ୍ ସରକାରୀ ବିଜ୍ଞପ୍ତି ୨୦୨୩ ଜାନୁଆରୀ ୪ ସୁଦ୍ଧା <a href="https://neet.nta.nic.in/">http://neet.nta.nic.in </a>ପ୍ରକାଶ ପାଇବ ବୋଲି ଆଶା କରାଯାଉଛି ।</marquee></div>

				</div>

			</div>

		</section>

		<div class="modal fade" id="responseModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      
      <div class="modal-header text-white">
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
	
	$(document).ready(function () {
    const urlParams = new URLSearchParams(window.location.search);
    const msg = urlParams.get('msg');

    if (msg) {
        $('#modalMessage').text(decodeURIComponent(msg));
        $('#responseModal').modal('show');
    }

    // 🔥 When cross button clicked → redirect
    $('#modalCloseBtn').click(function () {
        window.location.href = "my-career-my-identity.php";
    });
});
</script>



		<?php include "include/before-footer.php";?>

		<!-- -------------footer end---------- -->

	</body>

</html>