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
		<meta name="viewport" content="width=evice-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	
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
    .btn-primary {
    color: #fff;
    background-color: #0f3970;
    border-color: #0f3970;
    padding: 8px 25px;
}
.btn-primary:hover {
    color: #0f3970;
    background-color: transparent;
    border-color: #0f3970;
    font-weight: 600;
}
.submit-button{
     color: #fff;
    background-color: #0f3970;
    border-color: #0f3970;
    padding: 8px 25px;
}
.submit-button:hover{
    color: #0f3970;
    background-color: transparent;
    border-color: #0f3970;
    font-weight: 600;
}
.tab-container {
            width: 50%;
            padding-top: 50px;
        }

        .tabs {
            display: flex;
            /*justify-content: space-around;*/
            width: 143%;
            /*padding-left: 65px;*/
        }

        .tab-link {
            background-color: #4db946;
            padding: 15px 20px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-decoration: none;
            color: white;
            outline: none;
            font-weight: 600;
            width: 30%;
            text-align: center;
        }

        .tabs a {
            text-decoration: none;
            color: #fff;
        }

        .tab-link:hover {
            background-color: #ddd;
        }

        .tab-link.active {
            background-color: #0f3970;
        }

        .tab-content {
            display: none;
            padding: 20px;
            border: 1px solid transparent;
            border-top: none;
            padding-left: 0px;
            padding-right: 95px;
        }

        .tab-content.active {
            display: block;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .custom-input {
            display: none;
            margin-top: 10px;
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
			      		<a href="understand_your_strength_weakness.php" class="language-eng">English</a>
			      	</div>
			        <div class="language-od">
			        <a href="od/understand_your_strength_weakness.php" class="language-odia">ଓଡିଆ</a>
			      	</div>
			      	</div>
				</nav> 
			</div>
			</div>
			</div>      
		</section>
	<!------ header end ------------->

	<!-- ================================================section start======================================= -->

    <style>
        .card-flipper {
            position: relative;
            float: left;
            width: 100%;
            text-align: center;
            height: 320px !important;
            /*border: 2px solid #0f3970;*/
            border-top: transparent !important;
        }

        .card__front,
        .card__back {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 320px;
        }

        .card__back .card {
            width: 100%;
            height: 320px;
        }

        .card__front,
        .card__back {
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            -webkit-transition: 0.3s;
            transition: 0.3s;
        }


        .card__back {
            background-color: #1e1e1e;
            -webkit-transform: rotateY(-180deg);
            -ms-transform: rotateY(-180deg);
            transform: rotateY(-180deg);
        }

        .card-flipper.effect__hover:hover .card__front {
            -webkit-transform: rotateY(-180deg);
            -ms-transform: rotateY(-180deg);
            transform: rotateY(-180deg);
        }

        .card-flipper.effect__hover:hover .card__back {
            -webkit-transform: rotateY(0);
            -ms-transform: rotateY(0);
            transform: rotateY(0);
        }

        .card-flipper.effect__random.flipped .card__front {
            -webkit-transform: rotateY(-180deg);
            -ms-transform: rotateY(-180deg);
            transform: rotateY(-180deg);
        }

        .card-flipper.effect__random.flipped .card__back {
            -webkit-transform: rotateY(0);
            -ms-transform: rotateY(0);
            transform: rotateY(0);
        }

        .question-image {
            width: 100%;
            /* object-fit: cover; */
            height: 320px;

        }

        .good-ul {
            padding-left: 0px;
        }

        /* step card */
        form {
            background-color: #ffffff00;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .step {
            display: none;
        }

        .step.active {
            display: block;
        }

        .step button {
            margin-top: 20px;
        }

        .card-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            width: 100%;
        }

        .card-container-weakness {
            grid-template-columns: repeat(4, 1fr);
        }

        .card-container .card {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 150px;
            border-radius: 8px;
            color: white;
            font-size: 17px;
            font-weight: bold;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .card-container .card i {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .card-container .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }



        #card1 {
            background-color: #5B9BD5;
            margin-bottom: 15px;
        }

        #card2 {
            background-color: #58ADD2;
            margin-bottom: 15px;
        }

        #card3 {
            background-color: #56BFCF;
            margin-bottom: 15px;
        }

        #card4 {
            background-color: #53CCC8;
            margin-bottom: 15px;
        }

        #card5 {
            background-color: #51C9B0;
            margin-bottom: 15px;
        }

        #card6 {
            background-color: #4FC699;
            margin-bottom: 15px;
        }

        #card7 {
            background-color: #4CC382;
            margin-bottom: 15px;
        }

        #card8 {
            background-color: #4AC06B;
            margin-bottom: 15px;
        }

        #card9 {
            background-color: #48BC55;
            margin-bottom: 15px;
        }

        #card10 {
            background-color: #4DB946;
            margin-bottom: 15px;
        }

        #card11 {
            background-color: #60B347;
            margin-bottom: 15px;
        }

        #card12 {
            background-color: #70AD47;
            margin-bottom: 15px;
        }

        .card-container .card.selected {
            background-color: #0f3970 !important;
        }

        .card-container .card {
            text-align: center;
        }

        button {
            margin-bottom: 10%;
            text-align: center;
        }

        .previous {}

        .next {
            background-color: green;
            color: #fff;
            padding: 10px 30px;
            border: none;
        }

        .previous {
            background-color: red;
            color: #fff;
            padding: 10px 30px;
            border: none;
        }

        .straingth-img-con {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            /* Adjust space to ensure proper alignment */
            gap: 20px;
            /* Space between the images */
        }

        .img-card {
            flex: 1 1 calc(25% - 20px);
            /* Ensures four cards per row, accounting for gap */
            box-sizing: border-box;
            text-align: center;
            max-width: calc(25% - 20px);
            /* Ensures cards don't exceed the row width */
            width: 80%;
        }

        .straingth-img-con img {
            width: 100%;
            /* Image takes the full width of its container */
            display: block;
            margin: 0 auto;
            /* Center the image within the container */
        }

        .cards {
            margin-top: 10px;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
        }
        .card-flipper{
            border :none !important;
        }
        .card__back .card {
            border-radius: 0px !important;
        }
        .strength-card{
            font-size: 15px; 
            padding-bottom: 10px; 
            font-weight: 500;
        }
        .strength-card1{
          font-size: 15px; 
          padding-bottom: 10px; 
          font-weight: 500; 
          display: flex; 
          align-items: center;  
        }
        .strength-card2{
          font-size: 15px; 
          padding-bottom: 10px; 
          font-weight: 500; 
          display: flex; 
          align-items: center;
          gap: 10px;
        }
        .card-container {
            gap: 20px;
            width: 100%;
            grid-template-columns: unset;
            display: grid;
        }
        
        @media (max-width: 768px) {
    .img-card {
        flex: 1 1 calc(50% - 20px); /* Ensures two cards per row on smaller screens, accounting for gap */
        max-width: calc(50% - 20px);
    }
    .strength-card{
            font-size: 0px; 
            padding-bottom: 10px; 
            font-weight: 500;
            display: flex;
            gap: 10px;
        }
        .strength-card1{
          font-size: 15px; 
          padding-bottom: 10px; 
          font-weight: 500; 
          display: flex; 
          align-items: center;  
        }
        .strength-card2{
          font-size: 15px; 
          padding-bottom: 10px; 
          font-weight: 500; 
          display: flex; 
          align-items: center;
          gap: 10px;
        }
        .padding-left-right{
            padding-left: 7px !important;
            padding-right: 7px !important
        }
}
    </style>
    <div class="col-md-12">

        <form id="multiStepForm" class="d-block">
            <h1 class="heading-one1 mt-2">Understand Your Strength and Weakness</h1>
            <!-- Step 1 -->
            <div class="step">
                <section class="weaknss-strength pb-5">
                    <div class="container">
                        <!--start crocodile -->
                        <div class="row pb-3">
                            <div class="col-12">
                                <h3 class="text-center my-5 can-h3">Can you find out the strengths and weaknesses of these
                                    animals?</h3>
                            </div>
                            <div class="col-md-4 d-flex align-items-center">
                                <img src="img/croc.png" class="question-image">
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card-flipper effect__hover" data-id="1">
                                            <div class="card__front d-flex justify-content-center align-items-center"
                                                style="background-color: #0f3970">
                                                <h4 class="text-white">Strength Card</h4>
                                            </div>
                                            <div class="card__back" style="position: relative;">
                                                <div class="card card-01">
                                                    <div class="card-body text-center" style="position: relative;">
                                                        <ul class="good-ul"
                                                            style="list-style-type: none; text-align: left;">
                                                            <li class="strength-card">
                                                                <input type="radio" name="skill"
                                                                    value="Good at painting" id="Good-at-Painting"
                                                                    onchange="checkAnswer('.strong-ans-box-1', 'Good-at-Painting', 'Good-at-Hunting')">
                                                                <label for="Good-at-Painting">Good at painting</label>
                                                            </li>
                                                            <li class="strength-card">
                                                                <input type="radio" name="skill"
                                                                    value="Good at living in cities"
                                                                    id="Good-at-living-in-cities"
                                                                    onchange="checkAnswer('.strong-ans-box-1', 'Good-at-living-in-cities', 'Good-at-Hunting')">
                                                                <label for="Good-at-living-in-cities">Good at living in
                                                                    cities</label>
                                                            </li>
                                                            <li class="strength-card">
                                                                <input type="radio" name="skill" value="Good at hunting"
                                                                    id="Good-at-Hunting"
                                                                    onchange="checkAnswer('.strong-ans-box-1', 'Good-at-Hunting', 'Good-at-Hunting')">
                                                                <label for="Good-at-Hunting">Good at hunting</label>
                                                            </li>
                                                            <li class="strength-card">
                                                                <input type="radio" name="skill"
                                                                    value="Strong jaw opening muscles"
                                                                    id="Strong-Jaw-Opening-Muscles"
                                                                    onchange="checkAnswer('.strong-ans-box-1', 'Strong-Jaw-Opening-Muscles', 'Good-at-Hunting')">
                                                                <label for="Strong-Jaw-Opening-Muscles">Strong Jaw
                                                                    Opening Muscles</label>
                                                            </li>
                                                        </ul>
                                                        <div class="strong-ans-box-1 text-center">Answer : </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-flipper effect__hover" data-id="1">
                                            <div class="card__front d-flex justify-content-center align-items-center"
                                                style="background-color: #0f3970">
                                                <h4 class="text-white">Weakness Card</h4>
                                            </div>
                                            <div class="card__back" style="position: relative;">
                                                <div class="card card-01">
                                                    <div class="card-body text-center" style="position: relative;">
                                                        <ul class="good-ul"
                                                            style="list-style-type: none; text-align: left;">
                                                            <li class="strength-card">
                                                                <input type="radio" name="option" id="weak-jaw-muscles"
                                                                    value="Weak jaw opening muscles"
                                                                    onchange="checkAnswer('.weak-ans-box-1', 'weak-jaw-muscles', 'weak-jaw-muscles')">
                                                                <label for="weak-jaw-muscles">Weak Jaw Opening
                                                                    Muscles</label>
                                                            </li>
                                                            <li class="strength-card">
                                                                <input type="radio" name="option" id="sweating"
                                                                    value="sweats-a-lot"
                                                                    onchange="checkAnswer('.weak-ans-box-1', 'sweating', 'weak-jaw-muscles')">
                                                                <label for="sweating">Sweating a lot in the heat</label>
                                                            </li>
                                                            <li class="strength-card">
                                                                <input type="radio" name="option" id="weakness-swimming"
                                                                    value="slow-swimmer"
                                                                    onchange="checkAnswer('.weak-ans-box-1', 'weakness-swimming', 'weak-jaw-muscles')">
                                                                <label for="weakness-swimming">Slow swimmer</label>
                                                            </li>
                                                            <li class="strength-card">
                                                                <input type="radio" name="option" id="eyesight-hearing"
                                                                    value="poor-eyesight-hearing"
                                                                    onchange="checkAnswer('.weak-ans-box-1', 'eyesight-hearing', 'weak-jaw-muscles')">
                                                                <label for="eyesight-hearing">Poor eyesight and hearing</label>
                                                            </li>
                                                        </ul>
                                                        <div class="weak-ans-box-1">Answer : </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!--start porcupine-->
                        <div class="row pb-3">
                            <div class="col-md-4 d-flex align-items-center">
                                <img src="img/proc.png" class="question-image">
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card-flipper effect__hover" data-id="1">
                                            <div class="card__front d-flex justify-content-center align-items-center"
                                                style="background-color: #0f3970">
                                                <h4 class="text-white">Strength Card</h4>
                                            </div>
                                            <div class="card__back" style="position: relative;">
                                                <div class="card card-01">
                                                    <div class="card-body text-center" style="position: relative;">
                                                        <ul class="good-ul"
                                                            style="list-style-type: none; text-align: left;">
                                                            <li class="strength-card">
                                                                <input type="radio" name="skill"
                                                                    value="Good at eating meat" id="Good-at-eating-meet"
                                                                    onchange="checkAnswer('.strong-ans-box-2','Good-at-eating-meet','Good-at-Singing')">
                                                                <label for="Good-at-eating-meet">Good at eating meat</label>
                                                            </li>
                                                            <li class="strength-card">
                                                                <input type="radio" name="skill" value="Good at making sounds" 
                                                                    id="Good-at-Singing"
                                                                    onchange="checkAnswer('.strong-ans-box-2','Good-at-Singing','Good-at-Singing')">
                                                                <label for="Good-at-Singing">Good at making sounds</label>
                                                            </li>
                                                            <li class="strength-card">
                                                                <input type="radio" name="skill"
                                                                    value="Good at hunting others animal"
                                                                    id="Good-at-hunting-others-animal"
                                                                    onchange="checkAnswer('.strong-ans-box-2','Good-at-hunting-other-animal','Good-at-Singing')">
                                                                <label for="Good-at-hunting-others-animal">Good at
                                                                    hunting other animals</label>
                                                            </li>
                                                            <li class="strength-card">
                                                                <input type="radio" name="skill"
                                                                    value="Shooting sharp quills"
                                                                    id="Shooting-sharp-quills"
                                                                    onchange="checkAnswer('.strong-ans-box-2','Shooting-sharp-quills','Good-at-Singing')">
                                                                <label for="Shooting-sharp-quills">Shooting sharp
                                                                    quills</label>
                                                            </li>
                                                        </ul>
                                                        <div class="strong-ans-box-2">
                                                            <p class="">Answer:</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-flipper effect__hover" data-id="1">
                                            <div class="card__front d-flex justify-content-center align-items-center"
                                                style="background-color: #0f3970">
                                                <h4 class="text-white">Weakness Card</h4>
                                            </div>
                                            <div class="card__back" style="position: relative;">
                                                <div class="card card-01">
                                                    <div class="card-body text-center" style="position: relative;">
                                                        <ul class="good-ul"
                                                            style="list-style-type: none; text-align: left;">
                                                            <li class="strength-card">
                                                                <input type="radio" name="option"
                                                                    id="Not-very-active-during-daytime"
                                                                    value="Not very active during daytime"
                                                                    onchange="checkAnswer('.weak-ans-box-2','Not-very-active-during-daytime','Not-very-active-during-daytime')">
                                                                <label for="Not-very-active-during-daytime">Not very
                                                                    active during daytime</label>
                                                            </li>
                                                            <li class="strength-card">
                                                                <input type="radio" name="option" id="No-tail"
                                                                    value="No tail"
                                                                    onchange="checkAnswer('.weak-ans-box-2','No-tail','Not-very-active-during-daytime')">
                                                                <label for="No-tail">No tail</label>
                                                            </li>
                                                            <li class="strength-card">
                                                                <input type="radio" name="option"
                                                                    id="Weak-in-climbing-trees"
                                                                    value="Weak in climbing trees"
                                                                    onchange="checkAnswer('.weak-ans-box-2','Weak-in-climbing-trees','Not-very-active-during-daytime')">
                                                                <label for="Weak-in-climbing-trees">Weak in climbing
                                                                    trees</label>
                                                            </li>
                                                            <li class="strength-card">
                                                                <input type="radio" name="option"
                                                                    id="Bad-at-adapting-to-different-places"
                                                                    value="Bad at adapting to different places"
                                                                    onchange="checkAnswer('.weak-ans-box-2','Bad-at-adapting-to-different-places','Not-very-active-during-daytime')">
                                                                <label for="Bad-at-adapting-to-different-places">Bad at
                                                                    adapting to different places</label>
                                                            </li>
                                                        </ul>
                                                        <div class="weak-ans-box-2">Answer : </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!--start dolphin-->
                        <div class="row pb-3">
                            <div class="col-md-4 d-flex align-items-center">
                                <img src="img/dolphin.jpg" class="question-image">
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card-flipper effect__hover" data-id="1">
                                            <div class="card__front d-flex justify-content-center align-items-center"
                                                style="background-color: #0f3970">
                                                <h4 class="text-white">Strength Card</h4>
                                            </div>
                                            <div class="card__back" style="position: relative;">
                                                <div class="card card-01">
                                                    <div class="card-body text-center" style="position: relative;">
                                                        <ul class="good-ul"
                                                            style="list-style-type: none; text-align: left; padding: 0;">
                                                            <li class="strength-card1">
                                                                <input type="radio" name="skill"
                                                                    value="Having a long beak/mouth"
                                                                    id="Having-a-long-beak"
                                                                    onchange="checkAnswer('.strong-ans-box-3','Having-a-long-beak','Being-good-at-socialising')"
                                                                    style="margin-right: 10px;">
                                                                <label for="Having-a-long-beak">Having a long
                                                                    beak/mouth</label>
                                                            </li>
                                                            <li class="strength-card1">
                                                                <input type="radio" name="skill"
                                                                    value="Being good at socialising/Being very social"
                                                                    id="Being-good-at-socialising"
                                                                    onchange="checkAnswer('.strong-ans-box-3','Being-good-at-socialising','Being-good-at-socialising')"
                                                                    style="margin-right: 10px;">
                                                                <label for="Being-good-at-socialising">Being good at
                                                                    socialising/Being very social</label>
                                                            </li>
                                                            <li class="strength-card1">
                                                                <input type="radio" name="skill"
                                                                    value="Being vegetarian" id="Being-vegetarian"
                                                                    onchange="checkAnswer('.strong-ans-box-3','Being-vegetarian','Being-good-at-socialising')"
                                                                    style="margin-right: 10px;">
                                                                <label for="Being-vegetarian">Being vegetarian</label>
                                                            </li>
                                                            <li class="strength-card1">
                                                                <input type="radio" name="skill"
                                                                    value="Needing to come up to the surface to breathe"
                                                                    id="Needing-to-come-up"
                                                                    onchange="checkAnswer('.strong-ans-box-3','Needing-to-come-up','Being-good-at-socialising')"
                                                                    style="margin-right: 10px;">
                                                                <label for="Needing-to-come-up">Needing to come up to
                                                                    the surface to breathe</label>
                                                            </li>
                                                        </ul>
                                                        <div class="strong-ans-box-3">Answer : </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-flipper effect__hover" data-id="1">
                                            <div class="card__front d-flex justify-content-center align-items-center"
                                                style="background-color: #0f3970">
                                                <h4 class="text-white">Weakness Card</h4>
                                            </div>
                                            <div class="card__back" style="position: relative;">
                                                <div class="card card-01">
                                                    <div class="card-body text-center" style="position: relative;">
                                                        <ul class="good-ul"
                                                            style="list-style-type: none; text-align: left;">
                                                            <li class="strength-card2">
                                                                <input type="radio" name="option" id="Being-playful"
                                                                    value="Being playful"
                                                                    onchange="checkAnswer('.weak-ans-box-2','Being-playful','Weak-in-the-face-ofwater')">
                                                                <label for="Being-playful">Being playful</label>
                                                            </li>
                                                            <li class="strength-card2">
                                                                <input type="radio" name="option" id="Using"
                                                                    value="Using 'echolocation' or using sound underwater to find prey"
                                                                    onchange="checkAnswer('.weak-ans-box-3','Using','Weak-in-the-face-ofwater')">
                                                                <label for="Using">Using 'echolocation' or using sound
                                                                    underwater to find prey</label>
                                                            </li>
                                                            <li class="strength-card2">
                                                                <input type="radio" name="option"
                                                                    id="Weak-in-the-face-ofwater"
                                                                    value="Weak in the face of water pollution in their habitat"
                                                                    onchange="checkAnswer('.weak-ans-box-3','Weak-in-the-face-ofwater','Weak-in-the-face-ofwater')">
                                                                <label for="Weak-in-the-face-ofwater">Weak in the face
                                                                    of water pollution in their habitat</label>
                                                            </li>
                                                            <li class="strength-card2">
                                                                <input type="radio" name="option"
                                                                    id="Being-mammals-that"
                                                                    value="Being mammals that live in water"
                                                                    onchange="checkAnswer('.weak-ans-box-3','Being-mammals-that','Weak-in-the-face-ofwater')">
                                                                <label for="Being-mammals-that">Being mammals that live
                                                                    in water</label>
                                                            </li>
                                                        </ul>
                                                        <div class="weak-ans-box-3">Answer : </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
                <div class="col-md-12" style="text-align: center;">
                    <button type="button" class="next" onclick="nextStep(1)">Next</button>
                </div>
            </div>
            <!-- Step 2 -->
            <div class="step">
                <section class="cards-section pb-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="text-center mt-5">Just like Animals have Strengths and Weaknesses, we also have Strengths and Weaknesses!</h3>
                                <h3 class="text-center mb-5">Now it is time to explore your own strengths and weaknesses!</h3>
                            </div>
                            
                            <div class="col-md-12">
                                <h5 class="my-2">Q1. What do you do very well and enjoy doing? </h5>
                                <div class="card-container card-containers strngth-12-cards">
                                    <div class="row">
                                        <div class="col-md-3 col-12 padding-left-right">
                                            <div class="card" id="card1"><i class="fa fa-music"></i><span val="Singing">Singing</span></div>
                                        </div>
                                        <div class="col-md-3 col-12 padding-left-right">
                                            <div class="card" id="card2"><i
                                            class="fa fa-american-sign-language-interpreting"></i><span val="Dancing">Dancing</span>
                                    </div>
                                        </div>
                                        <div class="col-md-3 col-12 padding-left-right">
                                            <div class="card" id="card3"><i
                                            class="fa fa-paint-brush"></i><span val="Drawing/Painting">Drawing/Painting</span></div>
                                        </div>
                                        <div class="col-md-3 col-12 padding-left-right">
                                            <div class="card" id="card4"><i class="fa fa-leaf"></i><span val="Gardening">Gardening</span></div>
                                        </div>
                                        <div class="col-md-3 col-12 padding-left-right">
                                            <div class="card" id="card5"><i class="fa fa-pencil"></i><span val="Writing Stories/Poems">Writing Stories/Poems</span></div>
                                        </div>
                                        <div class="col-md-3 col-12 padding-left-right">
                                            <!--changing the span value playig to playing-->
                                            <div class="card" id="card6"><i class="fa fa-futbol-o"></i><span val="Playing (Games/Sports)">Playing (Games/Sports)</span></div>
                                        </div>
                                        <div class="col-md-3 col-12 padding-left-right">
                                            <div class="card text-center" id="card7"><i class="fa fa-laptop"></i><span val="Developing ICT/digital resources(e.g. coding)">Developing ICT/digital resources(e.g. coding)</span></div>
                                        </div>
                                        <div class="col-md-3 col-12 padding-left-right">
                                            <div class="card" id="card8"><i class="fa fa-child"></i><span val="Playing with Animals">Playing with Animals</span></div>
                                        </div>
                                        <div class="col-md-3 col-12 padding-left-right">
                                            <div class="card" id="card9"><i class="fa fa-users"></i><span val="Talking/Discussing">Talking/Discussing</span></div>
                                        </div>
                                        <div class="col-md-3 col-12 padding-left-right">
                                            <!--changing the span value Listening or Obsering to Listening and Observing-->
                                            <div class="card" id="card10"><i class="fa fa-assistive-listening-systems"></i><span val="Listening and Observing">Listening and Observing</span></div>
                                        </div>
                                        <div class="col-md-3 col-12 padding-left-right">
                                            <div class="card" id="card11"><i class="fa fa-book"></i><span val="Studying">Studying</span></div>
                                        </div>
                                        <div class="col-md-3 col-12 padding-left-right">
                                            <div class="card " id="card12" onclick="focuselement(this)"><i class="fa fa-pencil-square-o"></i>Type your own
                                            strength<span class="card12" contenteditable="true" oninput="editablefixedcharecter(this);" val='edit' style="border:none;border-bottom:1px solid #ccc;" ></span></div>
                                </div>
                                        </div>
                                    </div>

                            </div>
                            <div class="col-md-12" style="padding-top:25px">
                                 <h5 class="my-2">Q2. What do others say that you do very well ? </h5>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="str-field1">
                                </div>
                                
                                <h5 class="my-2">Q3. What are the things you have done that you are very proud of ? </h5>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="str-field2">
                                </div>
                                
                                <h5 class="my-2">Q4. Doing what makes you happy ?</h5>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="str-field3">
                                </div>

                                <button type="button" class="btn btn-primary"
                                    onclick="weaknessStrengthCard()"  style="margin-bottom: 0px;">Submit</button>
                                <div class="alert alert-success d-none  weaknessstrength-msg-box"
                                    style="margin-top:18px;">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close"
                                        title="close">×</a>
                                    <strong>Wow!</strong> <span class="strength-msg"></span>
                                </div>
                                
                            </div>
                            <div class="col-md-12" style="margin-top: 5%;">
                                <div class="straingth-img-con">

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="col-md-12" style="text-align: center;">
                    <button type="button" class="previous" onclick="prevStep(0)">Previous</button>
                    <button type="button" class="next" onclick="nextStep(2)">Next</button>
                </div>
            </div>
            <!-- Step 3 -->
            <div class="step">
                <section class="cards-section pb-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="text-center my-5">Now, time to think about what you are not so good at</h3>
                            </div>
                            <div class="col-md-12">
                                <h5 class="my-2">Q1. What learning or skills do you think you are lacking?</h5>
                               
                                <div class="card-container card-container-weakness">
                                    <div class="row">
                                        <div class="col-md-3 col-12 padding-left-right">
                                            <div class="card" id="card1"><img src="upload/icon2/stress.png" style="height: 55px;">
                                            <span>Get stressed out often</span></div>
                                        </div>
                                        <div class="col-md-3 col-12 padding-left-right">
                                            <div class="card" id="card2"><img src="upload/icon2/angry.png" style="height: 55px;"><span>Feel angry or irritated</span></div>
                                        </div>
                                        <div class="col-md-3 col-12 padding-left-right">
                                            <div class="card" id="card3"><img src="upload/icon2/cry.png" style="height: 55px;"><span>Easily get upset </span></div>
                                        </div>
                                     
                                        <div class="col-md-3 col-12 padding-left-right">
                                            <div class="card" id="card4"><img src="upload/icon2/talking.png" style="height: 55px;"><span>Weak at talking/communicating or discussing in a group</span></div>
                                        </div>
                                        <div class="col-md-3 col-12 padding-left-right">
                                            <div class="card" id="card5"><img src="upload/icon2/listeing.png" style="height: 55px;"><span>Weak at listening or observing</span></div>
                                        </div>
                                        <div class="col-md-3 col-12 padding-left-right">
                                            <div class="card" id="card6"><img src="upload/icon2/takling-feedback.png" style="height: 55px;"><span>Weak at taking feedback or criticism</span></div>
                                        </div>
                                        
                                        <div class="col-md-3 col-12 padding-left-right">
                                            <div class="card text-center" id="card7"><img src="upload/icon2/english.png" style="height: 55px;"><span>English</span></div>
                                        </div>
                                        <div class="col-md-3 col-12 padding-left-right">
                                            <div class="card" id="card8"><img src="upload/icon2/math.png" style="height: 55px;"><span>Maths</span></div>
                                        </div>
                                        <div class="col-md-3 col-12 padding-left-right">
                                             <div class="card" id="card9"><img src="upload/icon2/odia.png" style="height: 55px;"><span>Odia</span></div>
                                        </div>
                                        <div class="col-md-3 col-12 padding-left-right">
                                            <div class="card" id="card10"><img src="upload/icon2/science.png" style="height: 55px;"><span>Science</span></div>
                                        </div>
                                        <div class="col-md-3 col-12 padding-left-right">
                                            <div class="card" id="card11"><img src="upload/icon2/social-science.png" style="height: 55px;"><span>Social Science</span>
                                    </div>
                                        </div>
                                        <div class="col-md-3 col-12 padding-left-right">
                                             <div class="card " id="card12" onclick="focuselement(this)"><i class="fa fa-pencil-square-o"></i>Type your own
                                            weakness<span contenteditable="true" oninput="editablefixedcharecter(this);" val='Studying' style="border:none;border-bottom:1px solid #ccc;" ></span></div>
                                            </div>
                                    </div>
                                    
                                    
                                   
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                
                                <h5 class="my-2">Q2. What do others tell you about your weaknesses?</h5>
                                <div class="form-group">
                                    <label for="field1" class="font-weight-bold"></label>
                                    <input type="text" class="form-control" id="field3">
                                </div>
                                
                                <h5 class="my-2">Q3.  How do you plan to work on these areas of weakness? Choose from the following options:</h5>
                                    <!--<input type="text" class="form-control" id="field4">-->
                                <div class="tab-container">
        <div class="tabs">
            <a href="#" class="tab-link active" onclick="openTab(event, 'Tab1')">Emotional Areas</a>
            <a href="#" class="tab-link" onclick="openTab(event, 'Tab2')">Study Areas</a>
        </div>
        <div id="Tab1" class="tab-content active">
            <div class="form-group">
                <select class="form-control" name="" onchange="showCustomInput(this, 'customInput1')">
                    <option>Select</option>
                    <option value="Will express my feelings in a diary">Will express my feelings in a diary</option>
                    <option value="Will share my problems with a friend">Will share my problems with a friend</option>
                    <option value="Will share my problems with my teacher or parent">Will share my problems with my teacher or parent</option>
                    <option value="Will play more sports or create artwork to express my emotions">Will play more sports or create artwork to express my emotions</option>
                    <option value="">Any Other Option-Please Type</option>
                </select>
                <input type="text" class="form-control custom-input" id="customInput1" placeholder="Please type your option here">
            </div>
        </div>
        <div id="Tab2" class="tab-content">
            <div class="form-group">
                <select class="form-control" name="" onchange="showCustomInput(this, 'customInput2')">
                    <option>Select</option>
                    <option value="Will devote more time to studying that subject">Will devote more time to studying that subject</option>
                    <option value="Will seek guidance from a friend who is good at the subject">Will seek guidance from a friend who is good at the subject</option>
                    <option value="Will seek support from a teacher and try their practical advice">Will seek support from a teacher and try their practical advice</option>
                    <option value="">Any Other Option-Please Type</option>
                </select>
                <input type="text" class="form-control custom-input" id="customInput2" placeholder="Please type your option here">
            </div>
        </div>
    </div>
                                   


                                <button type="button" style="margin-bottom: 0px;" class="btn btn-primary first-submit"  onclick="weaknesshCard()">Submit</button>
                                <div class="weakness-msg-box"></div>
                                
                                <div class="last-form-box d-none">
                                    <h4 class="my-2"> Now that you know your strengths and weaknesses, what career do you think would be suitable for you?</h4>
                                    <div class="form-group">
                                        <select name="carrer_pur_future" id="carrer_pur_future" class="form-control">
            							    <option>Select</option>
            							    
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
                                        <input type="button" value="submit" class="mt-2 submit-button" onclick="printthankyoureload()">
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </section>
                <div class="col-md-12" style="text-align: center;">
                    <button type="button" class="previous" onclick="prevStep(1)">Previous</button>
                    <!--<button type="button" class="next" onclick="nextStep(3)">Next</button>-->
                </div>
            </div>
    </div>

    </form>


    <!-- ================================================section end ======================================== -->

    <!-- -------------footer start---------- -->
    <!--<section class="footer">-->
    <!--    <div class="container">-->
    <!--        <div class="row">-->
    <!--            <div class="col-md-2 col-5">-->
    <!--                <p>Notification Bar:</p>-->
    <!--            </div>-->
    <!--            <div class="col-md-10 col-7">-->
    <!--                <marquee>NATIONAL ELIGIBILITY CUM ENTRANCE TEST [ NEET (UG) 2024] will be conducted by the National-->
    <!--                    Testing Agency (NTA) on Sunday, 05 May 2024 (Sunday) in Pen and Paper mode in 13 languages.<a-->
    <!--                        href="https://jeemain.nta.ac.in/">https://jeemain.nta.ac.in/ </a>NTA has announced JEE Main-->
    <!--                    2024 session 2 exam dates for Papers 1 and 2. The B.Tech paper is scheduled on April 4, 5, 6, 8,-->
    <!--                    and 9, 2024 and the B.Arch/B.Plan paper is scheduled for April 12, 2024 </marquee>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section> 
    <?php include "include/before-footer.php";?>
    <!-- -------------footer end---------- -->
    <div id="imageContainer"></div>


    <script>
    function printthankyoureload()
    {
        alert("Wish you all the best for your future career");
        window.location.reload();
    }
        function checkAnswer(messg_print_clas, this_ans, right_ans) {
            const correctCheckbox = document.getElementById(right_ans);

            // Check if the correct checkbox is checked
            if (correctCheckbox.checked) {
                document.querySelector(messg_print_clas).innerHTML = "<p class='text-success'>Congratulations! <br> " + correctCheckbox.value + " is the right answer</p>";
                // alert(correctCheckbox.value + "is right ans");
            }

            else {
                document.querySelector(messg_print_clas).innerHTML = "<p class='text-danger'> Oops! The right answer is : <br>" + correctCheckbox.value;
                // alert("Oops! The right answer is :"+correctCheckbox.value);
            }
        }
        
    </script>
    <script>
        // script.js
        document.addEventListener('DOMContentLoaded', function () {
            const steps = document.querySelectorAll('.step');
            let currentStep = 0;

            function showStep(step) {
                steps.forEach((s, index) => {
                    s.classList.toggle('active', index === step);
                });
            }

            window.nextStep = function (step) {
                if (step < steps.length) {
                    currentStep = step;
                    showStep(step);
                }
            }

            window.prevStep = function (step) {
                if (step >= 0) {
                    currentStep = step;
                    showStep(step);
                }
            }

            // Initially show the first step
            showStep(currentStep);
        });

    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const cards = document.querySelectorAll('.card');

            cards.forEach(card => {
                card.addEventListener('click', function () {
                    card.classList.toggle('selected');
                });

            });
        });
        function focuselement(ele) {
            if (!$(ele).hasClass('selected')) {
                var spanElement = $(ele).find('span');
                    spanElement.focus();
                
            }
        }
        
        function setvalueofhtml(ele)
        {
            alert(ele);
        }


    </script>
    <script>
        function weaknessStrengthCard() {
            $(".weaknessstrength-msg-box").removeClass("d-none");

            var img_src = [];
            var amazin_at = "";

            $(".strngth-12-cards .selected").each(function () {
                var selected_value = $(this).find("span").attr('val');
                var custome_val = '';
                if(selected_value == 'edit')
                {
                    var custome_val = $('.card12').text().substring(0, 25);
                    amazin_at += "<b> "+custome_val + "</b>, ";
                }
                else
                {
                    
                amazin_at += "<b> "+selected_value + "</b>, ";
                }

                switch (selected_value) {
                    case "Singing":
                        img_src.push({ src: 'singing-b.png', cardText: 'Singing' });
                        img_src.push({ src: 'singing-g.png', cardText: 'Singing' });
                        break;
                    case "Dancing":
                        img_src.push({ src: 'Dance-b.png', cardText: 'Dancing' });
                        img_src.push({ src: 'Dance-g.png', cardText: 'Dancing' });
                        break;
                    case "Drawing/Painting":
                        img_src.push({ src: 'drawpaint-b.png', cardText: 'Drawing/Painting' });
                        img_src.push({ src: 'drawpaint-g.png', cardText: 'Drawing/Painting' });
                        break;
                    case "Gardening":
                        img_src.push({ src: 'gardening-b.jpg', cardText: 'Gardening' });
                        img_src.push({ src: 'gardening-g.jpg', cardText: 'Gardening' });
                        break;
                    case "Writing Stories/Poems":
                        img_src.push({ src: 'writting-stories-b.png', cardText: 'Writing Stories/Poems' });
                        img_src.push({ src: 'writting.jpg', cardText: 'Writing Stories/Poems' });
                        break;
                    case "Playing (Games/Sports)":
                        img_src.push({ src: 'Play-b.png', cardText: 'Playing (Games/Sports)' });
                        img_src.push({ src: 'playing-g.jpg', cardText: 'Playing (Games/Sports)' });
                        break;
                    case "Developing ICT/digital resources(e.g. coding)":
                        img_src.push({ src: 'it-b.png', cardText: 'Developing ICT/digital resources' });
                        img_src.push({ src: 'it-g.jpg', cardText: 'Developing ICT/digital resources' });
                        break;
                    case "Playing with Animals":
                        img_src.push({ src: 'playing-with-animal1.png', cardText: 'Playing with Animals' });
                        img_src.push({ src: 'playing-with-animal2.jpg', cardText: 'Playing with Animals' });
                        break;
                    case "Talking/Discussin":
                        img_src.push({ src: 'talking B.gif', cardText: 'Talking/Discussing' });
                        img_src.push({ src: 'talking G.gif', cardText: 'Talking/Discussing' });
                        break;
                    case "Listening and Observing":
                        img_src.push({ src: 'listening-observing-b.jpg', cardText: 'Listening or Observing' });
                        img_src.push({ src: 'listening-observin-g.jpg', cardText: 'Listening or Observing' });
                        break;
                    case "Studying":
                        img_src.push({ src: 'study-b.jpg', cardText: 'Studying' });
                        img_src.push({ src: 'study-g.jpg', cardText: 'Studying' });
                        break;
                    case "edit":
                        img_src.push({ src: 'edit-B.gif', cardText: custome_val });
                        break;
                    default:
                        break;
                }
            });
            var msg = "";
            if($("#str-field1").val() != "")
            {
                msg += ". Others appreciate you for your strength in <b>" + $("#str-field1").val()+"</b>";
            }
            
            if($("#str-field2").val() != "")
            {
                msg += " and doing <b>" + $("#str-field3").val() + "</b> makes you happy.";
            }
            if($("#str-field3").val() != "")
            {
                msg += "  Do you see a pattern emerging ? These are your STRENGTHS, your superpowers";
            }
            let parts = amazin_at.split(',');
            let lastPart = parts.pop();
            amazin_at = parts.join(',') + ' ' + lastPart;
            
            
            amazin_at = amazin_at.replace(/\/(?![^<>]*>)/g, ', ');
            $(".strength-msg").html("so you are amazing at " + amazin_at.trim() + msg);

            // Update images and cards in the container with class 'straingth-img-con'
            var imgContainer = $(".straingth-img-con");
            imgContainer.empty(); // Clear any existing images
           
            img_src.forEach(function (item) {
                var imgCard = $("<div>").addClass("img-card");
                var img = $("<img>").attr("src", "img/" + item.src);
                var card = $("<div>").addClass("cards").text(item.cardText);
                imgCard.append(img).append(card);
                imgContainer.append(imgCard);
            });
        }

    </script>
    <script>
        function editablefixedcharecter(element) {
            if(element.textContent.length >1)
            {
                if (element.textContent.length > 25) {
                    element.textContent = element.textContent.substring(0, 25);
                    alert("You can't enter more than 25 characters.");
                }
                else
                {
                    // $(element).attr('val',element.textContent)
                }
            }
        }
        
        function weaknesshCard() {
            $(".last-form-box").removeClass("d-none");
            var amazin_at = "";
        
            $(".card-container-weakness .selected").each(function () {
                var selected_value = $(this).find("span").html();
                amazin_at += "<b>"+selected_value + ",</b> ";
            }); // Close the .each() function properly.
            
            amazin_at = amazin_at.replace(/\/(?![^<>]*>)/g, ', ');
            let parts = amazin_at.split(',');
            let lastPart = parts.pop();
            amazin_at = parts.join(',') + ' ' + lastPart;
            
            if ($("#field3").val() != "") {
                amazin_at += "<b>"+ $("#field3").val()+" </b>";
            }
            if ($("#field4").val() != "") {
                amazin_at += " and <b>" + $("#field4").val()+" </b>";
            }
        
        
            $(".weakness-msg-box").html(
                '<div class="alert alert-success" style="margin-top:18px;">' +
                '<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>' +
                'Thank you for your response. Remember that all of us have strengths and weaknesses, and that is what makes us unique. You can sharpen your strengths and work on your areas of weakness. But always keep in mind that with <strong>confidence</strong>, <strong>willpower</strong> and <strong>hard work</strong>, most challenges can be overcome. All the best!</div>'
            );
        }

        
    </script>
    <script>
        function openTab(evt, tabName) {
            evt.preventDefault(); // Prevent the default anchor behavior

            var i, tabContent, tabLinks;

            // Get all elements with class="tab-content" and hide them
            tabContent = document.getElementsByClassName("tab-content");
            for (i = 0; i < tabContent.length; i++) {
                tabContent[i].style.display = "none";
            }

            // Get all elements with class="tab-link" and remove the class "active"
            tabLinks = document.getElementsByClassName("tab-link");
            for (i = 0; i < tabLinks.length; i++) {
                tabLinks[i].className = tabLinks[i].className.replace(" active", "");
            }

            // Show the current tab, and add an "active" class to the button that opened the tab
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        // Show the first tab by default
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelector(".tab-content").style.display = "block";
            document.querySelector(".tab-link").classList.add("active");
        });

        function showCustomInput(selectElement, inputId) {
            var inputElement = document.getElementById(inputId);
            if (selectElement.value === "") {
                inputElement.style.display = "block";
            } else {
                inputElement.style.display = "none";
            }
        }
    </script>
   

</body>

</html>