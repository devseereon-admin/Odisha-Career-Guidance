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



		<!--<link rel="stylesheet" href="css/bootstrap.min.css">-->

	<?php include "include/header_css.php";?>

	

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

			</div><div class="col-md-2 col-6">

				<nav class="navbar navbar-expand-sm navbar-dark">

			      	<div class="d-flex language">

			      	    <div class="language-od">

			        <a href="../oldscholarships1.php" class="language-odia">English</a>

			      	</div>

			      	<div class="language-en">

			      		<a href="oldscholarships.php" class="language-eng">ଓଡିଆ</a>

			      	</div>

			        

			      	</div>

				</nav> 

			</div>

			</div>

			</div>      

		</section>

		<!------ header end ------------->



		<section class="College">

			<div class="container">

				<div class="College-round">

				<h1 class="heading-one">ମେଧାବୃତ୍ତି</h1>

				<div class="row">

					<div class="col-md-3">

					<div class="filterfrm" style="background-color: #d5dde9;padding: 10px;">

					<form name="schlrfrm" method="post" id='schlrfrm'>

						   <select class="form-select" name="type" onchange="getschool(this.value)" required>

						     <option value="">ପ୍ରକାର ଚୟନ କରନ୍ତୁ।</option>

						     <option value="1"> ଜାତୀୟ</option>

						     <option value="2">ଓଡ଼ିଶା ରାଜ୍ୟ ସରକାର</option>

						     <option value="3">ବେସରକାରୀ </option>

						     <option value="4">ପି ଏସ ୟୁ</option>

						   </select>

						   

						    <div  id="dis"></div>

						    <button type="submit" id="submit"  name="submit" value="submit" class="btn btn-primary">ଦାଖଲ କର</button>

					  </form> 

					  </div>

					</div>

					<div class="col-md-9">

						   

						<div class="search-result-college">

						<div class="search-result-two">

						<?php

						$clg_exe = mysqli_query($conn ,"select * from scholarship where status = '1'");

						$c=1;

						while($res_clgex = mysqli_fetch_array($clg_exe)){

							$description = $res_clgex['description'];

							$eligibility_criteria = $res_clgex['eligibility_criteria'];

	$stipend = $res_clgex['stipend'];

							

						?>

						<div class="content" style="padding-bottom:7px;">

						<h4 data-toggle='modal' data-target='#myModal<?=$c;?>' style="cursor:pointer;"><?=$res_clgex['name'];?></h4>

						<a data-toggle='modal' data-target='#myModal<?=$c;?>' style="cursor:pointer;">ଅଧିକ ଜାଣନ୍ତୁ</a>&nbsp;&nbsp;<a href='<?=$res_clgex['link'];?>' target='_blank'>ପରିଦର୍ଶନ କରନ୍ତୁ</a>

	</div>

	

	<div class='modal' id='myModal<?=$c;?>'>

	<div class='modal-dialog  modal-xl'>

	<div class='modal-content'>

	<div class='modal-header'>

	<h4 class='modal-title' style="padding: 0;"></h4>

	<button type='button' class='close' data-dismiss='modal'>&times;</button>

	</div>

	<div class='modal-body'>

	<table class='table table-hover table-bordered'>

	<thead>

	<tr>

	

	<th>ବର୍ଣ୍ଣନା </th>

	<th>ଯୋଗ୍ୟତା ମାନଦଣ୍ଡ</th>

	<th>ଷ୍ଟାଇପେଣ୍ଡ୍</th>

	</tr>

	</thead>

	<tbody><tr>

	

	<td><?=$res_clgex['description']; ?></td>

	<td><?=$eligibility_criteria; ?></td>

	<td><?=$stipend; ?></td>

	</tr></tbody></table>

	

	</div>

	<div class='modal-footer'>

	

	</div>

	</div>

	</div>

	</div>

						<?php

						$c++;

						}

						?>

						</div>

						

						

						</div>

					</div>		

				

				</div>

				</div>

			</div>

		</section>

		<?php include "include/before-footer.php";?>

		

		<!-- -------------footer start---------- -->

		<!-- -------------footer end---------- -->

			<?php include "include/script.php";?>

	<script>

$(document).ready(function() {



    // Initialize Select2

    $('.js-example-basic-single').select2();





    // ======================

    //  ODIA SCHOLARSHIP FORM

    // ======================

    document.getElementById('schlrfrm').addEventListener('submit', function(e) {

        e.preventDefault();   // Stop form submission refresh



        const formType = "scholarship";



        // Scholarship TYPE dropdown

        const typeValue  = document.querySelector('[name="type"]').value;



        // Class / School dropdown (dynamic)

        const classElem  = document.querySelector('[name="school"]');

        const classValue = classElem ? classElem.value : "";





        // ⭐ Track Scholarship Type (Odia)

        if (typeValue && typeValue !== "0") {

            fetch('admin/track_form_click.php', {

                method: 'POST',

                headers: {'Content-Type': 'application/x-www-form-urlencoded'},

                body: `form_type=${formType}&click_type=scholarship_type&item_id=${typeValue}`

            });

        }



        // ⭐ Track Class (Odia)

        if (classValue && classValue !== "0") {

            fetch('admin/track_form_click.php', {

                method: 'POST',

                headers: {'Content-Type': 'application/x-www-form-urlencoded'},

                body: `form_type=${formType}&click_type=class&item_id=${classValue}`

            });

        }



        console.log("Odia Scholarship Tracking Done ✔");





        // ⭐ YOUR EXISTING AJAX (unchanged)

        $.ajax({

            type: "POST",

            url: "schlr.php",

            data: $(this).serialize(),

            success: function(data){

                $('.search-result-college').html(data);

            }

        });



    });



});







// ================================

//   GET SCHOOL (your original)

// ================================

function getschool(catid){

    $.ajax({

        type:'POST',

        url:"et_schl.php",

        data:{catid:catid},

        beforeSend:function(json){

            $('.preloader').show();

        },

        success:function(result){

            $('#dis').html(result);

        },

        complete:function(json){

            $('.preloader').hide();

        }

    });

}

  document.getElementById('schlrfrm').addEventListener('submit', function(e) {

    e.preventDefault();

    const typeText = document.querySelector('[name="type"] option:checked')?.text || '';

    // dynamic select (class)
    let classText = '';
    const classElement = document.querySelector('#dis select');

    if (classElement && classElement.value !== '') {
        classText = classElement.options[classElement.selectedIndex].text;
    }

    // ✅ FINAL FLOW
    const levels = [
        // "Scholarship",   
        typeText,
        classText
    ].filter(Boolean);

    console.log("Tracking:", levels); // debug

    // 🔥 TRACK
    trackPageClick(levels);

    // ✅ LOAD FILTER RESULT
    $.ajax({
        type: "POST",
        url: "schlr.php",
        data: $(this).serialize(),
        success: function(data) {
            $('.search-result-college').html(data);
        }
    });

});


</script>



	</body>

</html>