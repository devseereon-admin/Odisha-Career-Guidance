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

			

			</div>

			<div class="col-md-2 col-6">

				<nav class="navbar navbar-expand-sm navbar-dark">

			      	<div class="d-flex language">

			      	<div class="language-en">

			      		<a href="entrance-exams.php" class="language-eng">English</a>

			      	</div>

			        <div class="language-od">

			        <a href="od/entrance-exams.php" class="language-odia">ଓଡିଆ</a>

			      	</div>

			      	</div>

				</nav> 

			</div>

			</div>      

		</section>

		<!------ header end ------------->



		<section class="College">

			<div class="container">

				<div class="College-round">

				<h1 class="heading-one1">Entrance Exams</h1>

				<div class="row">

				  <div class="col-md-3">

					<div class="filterfrm" style="background-color: #d5dde9;padding: 10px;">

					

					   <form name="entrcfrm" method="post" id='entrcfrm'>

						   <select class="form-select" name="Domain" required onchange="getqualific(this.value);">

						     <option value="">Select Type</option>

						     <option value='1'>Under Graduate</option>

						     <option value='2'>Post Graduate</option>

						     <option value='3'>Competitive exam for job</option>

						   

						   </select>

						  

						   <select class="form-select" name="Qual" id="dis" required>

						     <option value="">Select Qualification</option>

							 

							 

						   </select>

						   <select class="form-select" name="Loc" required>

						     <option value="">Choose Your Location</option>

						     <option value="1">Odisha</option>

						     <option value="2">All India</option>

						   </select>

						    <button type="submit" id="submit"  name="submit" value="submit" class="btn btn-primary">Submit</button>

					   </form>

					  

					 <script>

                      document.getElementById('entrcfrm').addEventListener('submit', function(e) {

                          e.preventDefault(); // prevent reload

                          

                          const examType = document.getElementById('Domain').value;

                          const qualification = document.getElementById('Qual').value;

                          const location = document.getElementById('Loc').value;

                          const formType = 'examination'; // Add form type

                      

                          // Track the form click using the same file

                          fetch('admin/track_form_click.php', {

                              method: 'POST',

                              headers: {'Content-Type': 'application/x-www-form-urlencoded'},

                              body: `form_type=${formType}&exam_type=${examType}&qualification=${qualification}&location=${location}`

                          })

                          .then(res => res.text())

                          .then(data => console.log(data))

                          .catch(err => console.error(err));

                      });

                     </script>

				   </div>

				</div>

					<div class="col-md-9">

						   

						<div class="search-result-college">

						<div class="search-result-two">

						<?php

						$clg_exe = mysqli_query($conn ,"select * from entnace_exam where status = '1' group by `name` order by `name`");

						$c=1;

						while($res_clgex = mysqli_fetch_array($clg_exe)){

							$description = $res_clgex['description'];

							

						?>

						<div class="content" style="padding-bottom:7px;">

						<h4 data-toggle='modal' data-target='#myModal<?=$c;?>'style="cursor:pointer;"><?=$res_clgex['name'];?></h4>

						<a data-toggle='modal' data-target='#myModal<?=$c;?>' style="cursor:pointer;">Explore</a>&nbsp;&nbsp;<a href="<?=$res_clgex['link'];?>" target="_blank"
onclick="
trackEntranceExam(
    'Entrance Exam',
    $('select[name=Domain] option:selected').text(),     // level1 = UG/PG
    $('select[name=Qual] option:selected').text(),       // level2 = Qualification
    $('select[name=Loc] option:selected').text(),        // level3 = Location
    '<?=$res_clgex['name'];?>',                          // level4 = Exam name
    'visit'                                              // level5 = visit
);
">
Visit
</a>
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

	<?php

	if($description!=''){

	?>

	<th>Description</th>

	<?php

	}

	?>

	</tr>

	</thead>

	<tbody><tr>

	<?php

	if($description!=''){

	?>

	<td><?=$res_clgex['description']; ?></td>

	<?php

	}

	?>

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

		

		

		<!-- -------------footer start---------- -->

		<!--<section class="footer">

			<div class="container">

				<div class="row">

				<div class="col-md-2 col-5"><p>Notification Bar:</p></div>

				<div class="col-md-10 col-7"><marquee >NEET official notification 2023 by NTA expected to be out by January 4 at <a href="https://neet.nta.nic.in/">http://neet.nta.nic.in</a></marquee></div>

				</div>

			</div>

		</section> -->

		<?php include "include/before-footer.php";?>

		<!-- -------------footer end---------- -->

		<?php include "include/script.php";?>

         <script>

         function getqualific(ditrid) {

           $.ajax({

             type: 'POST',

             url: "et_qualif.php",

             data: { ditrid: ditrid },

             beforeSend: function() { $('.preloader').show(); },

             success: function(result) { $('#dis').html(result); },

             complete: function() { $('.preloader').hide(); }

           });

         }

         

         $("#entrcfrm").submit(function(e) {

           e.preventDefault(); // ✅ prevent normal form submit

         

           // collect form data

           const examType = $("select[name='Domain']").val();

           const qualification = $("select[name='Qual']").val();

           const location = $("select[name='Loc']").val();

           const formType = 'examination';

         

           // 1️⃣ Track the click in DB

           fetch('admin/track_form_click.php', {

             method: 'POST',

             headers: { 'Content-Type': 'application/x-www-form-urlencoded' },

             body: `form_type=${formType}&click_type=exam_type&item_id=${examType}`

           });

         

           fetch('admin/track_form_click.php', {

             method: 'POST',

             headers: { 'Content-Type': 'application/x-www-form-urlencoded' },

             body: `form_type=${formType}&click_type=qualification&item_id=${qualification}`

           });

         

           fetch('admin/track_form_click.php', {

             method: 'POST',

             headers: { 'Content-Type': 'application/x-www-form-urlencoded' },

             body: `form_type=${formType}&click_type=location&item_id=${location}`

           });

         

           // 2️⃣ Load results normally via entex.php

           $.ajax({

             type: "POST",

             url: "entex.php",

             data: $(this).serialize(),

             success: function(data) {

               $('.search-result-college').html(data);

             }

           });

         });


// $("#entrcfrm").submit(function(e) {
//   e.preventDefault();

//  const examText = $("select[name='Domain'] option:selected").text();
//  const qualText = $("select[name='Qual'] option:selected").text();
//  const locText = $("select[name='Loc'] option:selected").text();

//   trackEntranceExam(
//     'Entrance Exam',
//     examText,     // ✅ TEXT instead of ID
//     qualText,
//     locText,
//     examText, // <-- THIS is level4
//     ''
//   );

//   // existing code...
// });

document.getElementById('entrcfrm').addEventListener('submit', function(e) {

    e.preventDefault();

    const examTypeText = document.querySelector('[name="Domain"] option:checked')?.text || '';
    const qualificationText = document.querySelector('[name="Qual"] option:checked')?.text || '';
    const locationText = document.querySelector('[name="Loc"] option:checked')?.text || '';

    const levels = [
        examTypeText,
        qualificationText,
        locationText
    ].filter(Boolean);

    console.log("Tracking:", levels); // ✅ DEBUG

    // 🔥 TRACK
    trackPageClick(levels);

    // ✅ LOAD RESULT (optional)
    $.ajax({
        type: "POST",
        url: "entex.php",
        data: $(this).serialize(),
        success: function(data) {
            $('.search-result-college').html(data);
        }
    });

});
         </script>



	</body>

</html>