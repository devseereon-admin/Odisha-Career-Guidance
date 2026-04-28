<?php
include "admin/dbconn.php";
?>
<!DOCTYPE html>
<!-- saved from url=(0048)https://webctsl.in/mocareer/draw-your-future.php -->
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Ama Career</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">


<?php include "include/header_css.php";?>
<?php include "include/script.php";?>

	<style>
		#imageContainer img {
			/*height: 320px;*/
			width: 100%;
		}

		.cards {
			position: absolute;
			top: -40px;
			right: -10px;
			background-color: rgb(3 107 210);
			padding: 17px;
			border-radius: 19px;
			border: none;
			color: #fff;
			padding-bottom: 35px; 
			width: 230px;
			padding-top: 35px;
			text-align: center;
		}

		.custom-image {
			position: absolute;
			top: -38px;
			left: 460px;
			width: 40px !important;
			height: 40px !important;
		}
		
		/*/new*/
		.fa-certificate{
        display: none;
        }
		
		@media(max-width:768px)
		{
		    #imageContainer img{
		        margin-top:0px;
		        
		    }
		    .cards
		    {
		        top: 5px;
		    }
		    .custom-image{
            left: 175px;
            top: 0px;
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

<body cz-shortcut-listen="true">
    
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
		
			<?php  include "include/nav_menu.php";?> 
			</div>
			<div class="col-md-2 col-6">
				<nav class="navbar navbar-expand-sm navbar-dark">
			      	<div class="d-flex language">
			      	<div class="language-en">
			      		<a href="../draw-your-future.php" class="language-eng">English</a>
			      	</div>
			        <div class="language-od">
			        <a href="draw-your-future.php" class="language-odia">ଓଡିଆ</a>
			      	</div>
			      	</div>
				</nav> 
			</div>
			</div>
			</div>      
		</section>
	<!------ header end ------------->

	<!-- ================================================section start======================================= -->

	<section class="draw-your-future pb-5">
		<div class="container">
			<form action="draw-your-future-save.php" method="post" enctype="multipart/form-data">
				<h1 class="heading-one1 mt-2">ନିଜ ଭବିଷ୍ୟତ ନିର୍ଦ୍ଧାରଣ କରନ୍ତୁ</h1>
				<p style="color:#0000E6" class="">ଆପଣ ବଡ଼ ହେବା ପରେ କ'ଣ ହେବାକୁ ଚାହୁଁଛନ୍ତି, ତାହା ନିର୍ଦ୍ଧାରଣ କରନ୍ତୁ!  ଭବିଷ୍ୟତରେ ଆପଣ କ'ଣ କରିବେ? ଆପଣଙ୍କର କେଉଁ କ୍ୟାରିୟର ରହିବ? ଆପଣ ଏହା ବିଷୟରେ ଲେଖିପାରିବେ କିମ୍ବା ଫଟୋ ସଂଗ୍ରହ କରି ଏକ ପୃଷ୍ଠାରେ ପେଷ୍ଟ୍ କରିପାରିବେ ।</p>
				<p style="color:#0000cb" class="">ମନେ ରଖନ୍ତୁ, ଆପଣ ଝିଅ ହୁଅନ୍ତୁ କି ପୁଅ, ଆପଣ ସମାନ କ୍ୟାରିୟର ସ୍ୱପ୍ନ ଦେଖିପାରିବେ!</p>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label style="color:#353579">ଆପଣଙ୍କ ଫଟୋ ସମ୍ପୂର୍ଣ୍ଣ କରିବା ପରେ, ଦୟାକରି ଏକ ଫଟୋ ନିଅନ୍ତୁ ଏବଂ ଏହାକୁ ଏଠାରେ ଅପଲୋଡ୍ କରନ୍ତୁ!</label> <br>
							<input type="file" id="img" name="img" accept="image/*">
						</div>
						<div class="form-group">
							<label>ବର୍ତ୍ତମାନ, ଆପଣ ଭବିଷ୍ୟତରେ କେଉଁ କ୍ୟାରିୟର କରିବାକୁ ଚାହୁଁଛନ୍ତି ତାହା ଟାଇପ୍ କରନ୍ତୁ। </label><br>
							
							<select name="carrer_pur_future" id="field5" class="form-control">
							    <option>ଚୟନ କରନ୍ତୁ </option>
							    
							    <?php
							        $sql= "SELECT name FROM all_career_list WHERE status = '1'";
							        $result = mysqli_query($conn, $sql);
							        print_r($result);
							        if ($result) {
							        while($res_strm = mysqli_fetch_assoc($result))
        							 {
        							 ?>
        						        <option value='<?=$res_strm['name'];?>'><?=$res_strm['name'];?></option>
        							 <?php
        							 }
							        }
							    ?>
							</select>
						</div>

					</div>
					<div class="col-md-6">
						<div id="imageContainer"><i class="fa-solid fa-certificate"></i></div>
					</div>

					<div class="col-md-12">

						<button type="submit" class="btn btn-primary">ଦାଖଲ କରନ୍ତୁ</button>
					</div>

				</div>
			</form>
		</div>
	</section>

	<!-- ================================================section end ======================================== -->

	<!-- -------------footer start---------- -->

	<?php include "include/before-footer.php";?>
	<div id="imageContainer"></div>

	<script>
    const uploadInput = document.getElementById('img');
    const imageContainer = document.getElementById('imageContainer');

    uploadInput.addEventListener('change', (event) => {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                const img = new Image();
                img.src = e.target.result;
                img.alt = 'Uploaded Image';
                imageContainer.innerHTML = '';

                const adjectives = [
                    "ବାଃ ଚମତ୍କାର! ଆପଣଙ୍କ ଉଜ୍ଜ୍ଵଳ ଭବିଷ୍ୟତ ପାଇଁ ",
                    "ବାଃ, ବହୁତ ସୃଜନଶୀଳ!",
                    "ଆଶ୍ଚର୍ଯ୍ୟଜନକ, ଆପଣ ପ୍ରକୃତରେ ଆପଣଙ୍କ ଭବିଷ୍ୟତ ବିଷୟରେ ଗଭୀର ଭାବରେ ଚିନ୍ତା କରିଛନ୍ତି!"
                ];

                const randomAdjective = adjectives[Math.floor(Math.random() * adjectives.length)];

                // Create card element
                const card = document.createElement('div');
                card.classList.add('card', 'cards'); // Add both 'card' and 'cards' classes
                card.textContent = randomAdjective; // Display the randomly selected adjective

                // Create image element
                const customImage = document.createElement('img');
                customImage.src = 'badge.png'; // Adjust the path to your image
                customImage.classList.add('custom-image');

                // Append image, card, and custom image to container
                imageContainer.appendChild(img);
                imageContainer.appendChild(card);
                imageContainer.appendChild(customImage);
            };
            reader.readAsDataURL(file);
        }
    });
</script>



</body>

</html>