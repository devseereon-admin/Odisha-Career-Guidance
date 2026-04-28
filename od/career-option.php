<?php

include "admin/dbconn.php"; 

$cid = $_GET['id'];

$cq_et = mysqli_fetch_assoc(mysqli_query($conn , "select * from catagory where `id`='$cid' and status = '1' "));



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

		<style>

.pagination {

    text-align: center !important;

    margin: 20px 41px;

}

.pagination button {

    padding: 5px 31px;

    margin: 0 5px;

    cursor: pointer;

    outline: 1px solid #494a4f;

    border-radius: 1px;

    border: none;

}



.hidden {

  clip: rect(0 0 0 0);

  clip-path: inset(50%);

  height: 1px;

  overflow: hidden;

  position: absolute;

  white-space: nowrap;

  width: 1px;

}



.pagination button.active {

    background-color: #0f3970;

    color: white;

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



		<!-- -------------header start---------- -->

		<!--<section class="top-logo">-->

		<!--	<div class="container">-->

		<!--		<div class="row">-->

		<!--			<div class="col-md-4 col-8 img-one" >-->

		<!--				<img src="img/Logo-1.png" class="img-fluid">-->

		<!--			</div>-->

		<!--			<div class="col-md-4 col-2 img-two">-->

		<!--				<img src="img/Logo-2.png" class="img-fluid">-->

		<!--			</div>-->

		<!--			<div class="col-md-4 col-2 img-three" >-->

		<!--				<img src="img/Unicef-logo.gif" class="img-fluid">-->

		<!--			</div>-->

		<!--		</div>-->

		<!--	</div>-->

		<!--</section>-->

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

			        <a href="#" class="language-odia">ଓଡିଆ</a>

			      	</div>

			      	</div>

				</nav> 

			</div>

			</div>

			</div>      

		</section>

		<!------ header end ------------->



		<section class="arts">

			<div class="container">

				<div class="arts-round">

				<h1 class="heading-one" style="text-align:center !important;"><?=$cq_et['name'];?></h1>

				<div class="row">

					<div class="col-md-2"></div>

					<div class="col-md-8">

						<!--<div class="search-btn">-->

					 <!--   <form action="/action_page.php">-->

					 <!--     <input type="text" placeholder="Search.." name="search">-->

					 <!--     <button type="submit"><i class="fa fa-search"></i></button>-->

					 <!--   </form>-->

					 <!-- 	</div>-->

						<article class="content">

						  <section>

						   <div class="row">

							<?php

							$subcatagory_et = mysqli_query($conn ,"select * from subcatagory where `cat_id`='$cid' and status = '1' ");

							while($res_subcatagory_et = mysqli_fetch_array($subcatagory_et)){

								$ssid = $res_subcatagory_et['id'];

								$slug = $res_subcatagory_et['slug'];

								$chk_subsubcat = mysqli_num_rows(mysqli_query($conn ,"select * from sub_subcategory where subcat_id='$ssid' and status='1' "));

							?>

						        <div class="col-md-6"> 

								

						    		<div class="btn-arts">

									<?php

									if($chk_subsubcat!=0){

									?>

<a href="detail.php?id=<?=$ssid;?>" 
   class="btn-art-link"
  onclick="trackPageClick(['car2','<?=$res_subcatagory_et['name'];?>'], this)">
   <?=$res_subcatagory_et['name'];?>
</a>
									<?php

									}else{

									?>

<a href="<?=$slug;?>.php" 
   class="btn-art-link"
  onclick="trackPageClick(['car2','<?=$res_subcatagory_et['name'];?>'], this)">
   <?=$res_subcatagory_et['name'];?>
</a>								<?php

									}

									?>

									

						    		</div>

						    	</div>

								<?php

							}

								?>

						    	

						    	

						    </div>

						  </section>

						  

						 

						</article>

					</div>

					<div class="col-md-2"></div>

				</div>

				</div>

			</div>

		</section>

		<?php include "include/before-footer.php";?>

		

		<!-- -------------footer start---------- -->

		<!--<section class="footer">-->

		<!--	<div class="container">-->

		<!--		<div class="row">-->

		<!--		<div class="col-md-2 col-5"><p>Notification Bar:</p></div>-->

		<!--		<div class="col-md-10 col-7"><marquee >NEET official notification 2023 by NTA expected to be out by January 4 at <a href="https://neet.nta.nic.in/">http://neet.nta.nic.in</a></marquee></div>-->

		<!--		</div>-->

		<!--	</div>-->

		<!--</section>-->

		<!-- -------------footer end---------- -->



		<script>

			document.addEventListener('DOMContentLoaded', function () {

  const content = document.querySelector('.content'); 

  const itemsPerPage = 1; // set number of items per page

  let currentPage = 0;

  const items = Array.from(content.getElementsByTagName('section')).slice(0); // tag name set to section and slice set to 0



function showPage(page) {

  const startIndex = page * itemsPerPage;

  const endIndex = startIndex + itemsPerPage;

  items.forEach((item, index) => {

    item.classList.toggle('hidden', index < startIndex || index >= endIndex);

  });

  updateActiveButtonStates();

}



function createPageButtons() {

  const totalPages = Math.ceil(items.length / itemsPerPage);

  const paginationContainer = document.createElement('div');

  const paginationDiv = document.body.appendChild(paginationContainer);

  paginationContainer.classList.add('pagination');



  // Add page buttons

  for (let i = 0; i < totalPages; i++) {

    const pageButton = document.createElement('button');

    pageButton.textContent = i + 1;

    pageButton.addEventListener('click', () => {

      currentPage = i;

      showPage(currentPage);

      updateActiveButtonStates();

    });



      content.appendChild(paginationContainer);

      paginationDiv.appendChild(pageButton);

    }

}



function updateActiveButtonStates() {

  const pageButtons = document.querySelectorAll('.pagination button');

  pageButtons.forEach((button, index) => {

    if (index === currentPage) {

      button.classList.add('active');

    } else {

      button.classList.remove('active');

    }

  });

}



  createPageButtons(); // Call this function to create the page buttons initially

  showPage(currentPage);

});

		</script>

	</body>

</html>