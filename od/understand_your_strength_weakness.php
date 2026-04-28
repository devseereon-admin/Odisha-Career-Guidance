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





    <?php include "include/script.php"; ?>

    <script>
        $(document).ready(function() {

            setTimeout(function() {

                $("#myModal").modal('show');

            }, 1000);

        });
    </script>

    <?php include "include/header_css.php"; ?>

    <style>
        .weakness-msg-box {

            padding-top: 40%;

        }

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

        .submit-button {

            color: #fff;

            background-color: #0f3970;

            border-color: #0f3970;

            padding: 8px 25px;

        }

        .submit-button:hover {

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









<body cz-shortcut-listen="true">



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

                <div class="col-md-2 col-6">

                    <nav class="navbar navbar-expand-sm navbar-dark">

                        <div class="d-flex language">

                            <div class="language-en">

                                <a href="../understand_your_strength_weakness.php" class="language-eng">English</a>

                            </div>

                            <div class="language-od">

                                <a href="understand_your_strength_weakness.php" class="language-odia">ଓଡିଆ</a>

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

        .editable-field {
            display: inline-block;
            min-width: 140px;
            padding: 3px 6px;
            margin-left: 5px;
            border-bottom: 1px solid #ccc;
            background: #fff;
            color: black;
        }

        /* Placeholder */
        .editable-field:empty:before {
            content: attr(data-placeholder);
            color: #999;
            pointer-events: none;
        }


        .card-container .card.selected {

            background-color: #0f3970 !important;

        }



        .card-container .card {

            text-align: center;

        }



        button {

            margin-bottom: 2%;

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

        .card-flipper {

            border: none !important;

        }

        .card__back .card {

            border-radius: 0px !important;

        }

        .strength-card {

            font-size: 15px;

            padding-bottom: 10px;

            font-weight: 500;

        }

        .strength-card1 {

            font-size: 15px;

            padding-bottom: 10px;

            font-weight: 500;

            display: flex;

            align-items: center;

        }

        .strength-card2 {

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

        .strenth-weak-tab {
            gap: 10px !important;
        }

        @media (max-width: 768px) {

            .select-tab-weak {

                width: 255%;

            }

            .strenth-weak-tab {

                width: 310%;

            }

            body {

                padding-bottom: 140px !important;

            }

            .img-card {

                flex: 1 1 calc(50% - 20px);
                /* Ensures two cards per row on smaller screens, accounting for gap */

                max-width: calc(50% - 20px);

            }

            .strength-card {

                font-size: 0px;

                padding-bottom: 10px;

                font-weight: 500;

                display: flex;

                gap: 10px;

            }

            .strength-card1 {

                font-size: 15px;

                padding-bottom: 10px;

                font-weight: 500;

                display: flex;

                align-items: center;

            }

            .strength-card2 {

                font-size: 15px;

                padding-bottom: 10px;

                font-weight: 500;

                display: flex;

                align-items: center;

                gap: 10px;

            }

            .padding-left-right {

                padding-left: 7px !important;

                padding-right: 7px !important
            }

        }
    </style>

    <div class="col-md-12">



        <form id="multiStepForm" class="d-block">

            <h1 class="heading-one1 mt-2">ନିଜର ସାମର୍ଥ୍ୟ ଓ ଦୁର୍ବଳତାକୁ ବୁଝନ୍ତୁ</h1>

            <!-- Step 1 -->

            <div class="step">

                <section class="weaknss-strength pb-5">

                    <div class="container">

                        <!--start crocodile -->

                        <div class="row pb-3">

                            <div class="col-12">

                                <h3 class="text-center my-5 can-h3"> ଆପଣ ଏହି ଜୀବ ମାନଙ୍କର ସାମର୍ଥ୍ୟ ଏବଂ ଦୁର୍ବଳତା ଜାଣିପାରିବେ କି?</h3>

                            </div>

                            <div class="col-md-4 d-flex align-items-center">

                                <img src="img/crocodile.webp" class="question-image">

                            </div>

                            <div class="col-md-8">

                                <div class="row">

                                    <div class="col-md-6">

                                        <div class="card-flipper effect__hover" data-id="1">

                                            <div class="card__front d-flex justify-content-center align-items-center"

                                                style="background-color: #0f3970">

                                                <h4 class="text-white">ସାମର୍ଥ୍ୟ କାର୍ଡ</h4>

                                            </div>

                                            <div class="card__back" style="position: relative;">

                                                <div class="card card-01">

                                                    <div class="card-body text-center" style="position: relative;">

                                                        <ul class="good-ul"

                                                            style="list-style-type: none; text-align: left;">

                                                            <li class="strength-card">

                                                                <input type="radio" name="skill"

                                                                    value=" ଚିତ୍ରାଙ୍କନରେ ଭଲ" id="Good-at-Painting"

                                                                    onchange="checkAnswer('.strong-ans-box-1', 'Good-at-Painting', 'Good-at-Hunting')">

                                                                <label for="Good-at-Painting"> ଚିତ୍ରାଙ୍କନରେ ଭଲ</label>

                                                            </li>

                                                            <li class="strength-card">

                                                                <input type="radio" name="skill"

                                                                    value="ସହରରେ ରହିବାରେ ଭଲ"

                                                                    id="Good-at-living-in-cities"

                                                                    onchange="checkAnswer('.strong-ans-box-1', 'Good-at-living-in-cities', 'Good-at-Hunting')">

                                                                <label for="Good-at-living-in-cities">ସହରରେ ରହିବାରେ ଭଲ</label>

                                                            </li>

                                                            <li class="strength-card">

                                                                <input type="radio" name="skill" value="ଶିକାର କରିବାରେ ଭଲ" id="Good-at-Hunting"

                                                                    onchange="checkAnswer('.strong-ans-box-1', 'Good-at-Hunting', 'Good-at-Hunting')">

                                                                <label for="Good-at-Hunting">ଶିକାର କରିବାରେ ଭଲ</label>

                                                            </li>

                                                            <li class="strength-card">

                                                                <input type="radio" name="skill"

                                                                    value="ମଜବୁତ ମୁଖ ମାଂସପେଶୀ ଖୋଲିବା "

                                                                    id="Strong-Jaw-Opening-Muscles"

                                                                    onchange="checkAnswer('.strong-ans-box-1', 'Strong-Jaw-Opening-Muscles', 'Good-at-Hunting')">

                                                                <label for="Strong-Jaw-Opening-Muscles">ମଜବୁତ ମୁଖ ମାଂସପେଶୀ ଖୋଲିବା </label>

                                                            </li>

                                                        </ul>

                                                        <div class="strong-ans-box-1 text-center">ଉତ୍ତର: </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="card-flipper effect__hover" data-id="1">

                                            <div class="card__front d-flex justify-content-center align-items-center"

                                                style="background-color: #0f3970">

                                                <h4 class="text-white">ଦୁର୍ବଳତା କାର୍ଡ</h4>

                                            </div>

                                            <div class="card__back" style="position: relative;">

                                                <div class="card card-01">

                                                    <div class="card-body text-center" style="position: relative;">

                                                        <ul class="good-ul"

                                                            style="list-style-type: none; text-align: left;">

                                                            <li class="strength-card">

                                                                <input type="radio" name="option" id="weak-jaw-muscles"

                                                                    value="ଦୁର୍ବଳ ମୁଖ ମାଂସପେଶୀ ଖୋଲିବା"

                                                                    onchange="checkAnswer('.weak-ans-box-1', 'weak-jaw-muscles', 'weak-jaw-muscles')">

                                                                <label for="weak-jaw-muscles">ଦୁର୍ବଳ ମୁଖ ମାଂସପେଶୀ ଖୋଲିବା</label>

                                                            </li>

                                                            <li class="strength-card">

                                                                <input type="radio" name="option" id="sweating"

                                                                    value="ଗରମରେ ବହୁତ ଝାଳ ବାହାରେ "

                                                                    onchange="checkAnswer('.weak-ans-box-1', 'sweating', 'weak-jaw-muscles')">

                                                                <label for="sweating">ଗରମରେ ବହୁତ ଝାଳ ବାହାରେ </label>

                                                            </li>

                                                            <li class="strength-card">

                                                                <input type="radio" name="option" id="weakness-swimming"

                                                                    value="ଧୀର ସନ୍ତରଣକାରୀ"

                                                                    onchange="checkAnswer('.weak-ans-box-1', 'weakness-swimming', 'weak-jaw-muscles')">

                                                                <label for="weakness-swimming">ଧୀର ସନ୍ତରଣକାରୀ</label>

                                                            </li>

                                                            <li class="strength-card">

                                                                <input type="radio" name="option" id="eyesight-hearing"

                                                                    value="ଦୃଷ୍ଟି ଓ ଶ୍ରବଣ ଶକ୍ତି କମ୍"

                                                                    onchange="checkAnswer('.weak-ans-box-1', 'eyesight-hearing', 'weak-jaw-muscles')">

                                                                <label for="eyesight-hearing">ଦୃଷ୍ଟି ଓ ଶ୍ରବଣ ଶକ୍ତି କମ୍</label>

                                                            </li>

                                                        </ul>

                                                        <div class="weak-ans-box-1">ଉତ୍ତର : </div>

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

                                <img src="img/Porcupine.jpeg" class="question-image">

                            </div>

                            <div class="col-md-8">

                                <div class="row">

                                    <div class="col-md-6">

                                        <div class="card-flipper effect__hover" data-id="1">

                                            <div class="card__front d-flex justify-content-center align-items-center"

                                                style="background-color: #0f3970">

                                                <h4 class="text-white">ସାମର୍ଥ୍ୟ କାର୍ଡ</h4>

                                            </div>

                                            <div class="card__back" style="position: relative;">

                                                <div class="card card-01">

                                                    <div class="card-body text-center" style="position: relative;">

                                                        <ul class="good-ul"

                                                            style="list-style-type: none; text-align: left;">

                                                            <li class="strength-card">

                                                                <input type="radio" name="skill"

                                                                    value="ମାଂସ ଖାଇବାରେ ଭଲ" id="Good-at-eating-meet"

                                                                    onchange="checkAnswer('.strong-ans-box-2','Good-at-eating-meet','Good-at-Singing')">

                                                                <label for="Good-at-eating-meet">ମାଂସ ଖାଇବାରେ ଭଲ</label>

                                                            </li>

                                                            <li class="strength-card">

                                                                <input type="radio" name="skill" value="ଶବ୍ଦ ତିଆରି କରିବାରେ ଭଲ "

                                                                    id="Good-at-Singing"

                                                                    onchange="checkAnswer('.strong-ans-box-2','Good-at-Singing','Good-at-Singing')">

                                                                <label for="Good-at-Singing">ଶବ୍ଦ ତିଆରି କରିବାରେ ଭଲ </label>

                                                            </li>

                                                            <li class="strength-card">

                                                                <input type="radio" name="skill"

                                                                    value="ଅନ୍ୟ ପ୍ରାଣୀଙ୍କୁ ଶିକାର କରିବାରେ ଭଲ"

                                                                    id="Good-at-hunting-others-animal"

                                                                    onchange="checkAnswer('.strong-ans-box-2','Good-at-hunting-others-animal','Good-at-Singing')">

                                                                <label for="Good-at-hunting-others-animal">ଅନ୍ୟ ପ୍ରାଣୀଙ୍କୁ ଶିକାର କରିବାରେ ଭଲ</label>

                                                            </li>

                                                            <li class="strength-card">

                                                                <input type="radio" name="skill"

                                                                    value="ତୀକ୍ଷ୍ଣ ଗୁଳି ଚାଳନା"

                                                                    id="Shooting-sharp-quills"

                                                                    onchange="checkAnswer('.strong-ans-box-2','Shooting-sharp-quills','Good-at-Singing')">

                                                                <label for="Shooting-sharp-quills">ତୀକ୍ଷ୍ଣ ଗୁଳି ଚାଳନା</label>

                                                            </li>

                                                        </ul>

                                                        <div class="strong-ans-box-2">

                                                            <p class="">ଉତ୍ତର:</p>

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

                                                <h4 class="text-white">ଦୁର୍ବଳତା କାର୍ଡ</h4>

                                            </div>

                                            <div class="card__back" style="position: relative;">

                                                <div class="card card-01">

                                                    <div class="card-body text-center" style="position: relative;">

                                                        <ul class="good-ul"

                                                            style="list-style-type: none; text-align: left;">

                                                            <li class="strength-card">

                                                                <input type="radio" name="option"

                                                                    id="Not-very-active-during-daytime"

                                                                    value="ଦିନବେଳା ଅଧିକ ସକ୍ରିୟ ନୁହେଁ"

                                                                    onchange="checkAnswer('.weak-ans-box-2','Not-very-active-during-daytime','Not-very-active-during-daytime')">

                                                                <label for="Not-very-active-during-daytime">ଦିନବେଳା ଅଧିକ ସକ୍ରିୟ ନୁହେଁ</label>

                                                            </li>

                                                            <li class="strength-card">



                                                                <input type="radio" name="option" id="No-tail"

                                                                    value="ଲାଞ୍ଜ ନାହିଁ"

                                                                    onchange="checkAnswer('.weak-ans-box-2','No-tail','Not-very-active-during-daytime')">

                                                                <label for="No-tail">ଲାଞ୍ଜ ନାହିଁ</label>

                                                            </li>

                                                            <li class="strength-card">

                                                                <input type="radio" name="option"

                                                                    id="Weak-in-climbing-trees"

                                                                    value="ଗଛ ଚଢ଼ିବାରେ ଦୁର୍ବଳ"

                                                                    onchange="checkAnswer('.weak-ans-box-2','Weak-in-climbing-trees','Not-very-active-during-daytime')">

                                                                <label for="Weak-in-climbing-trees">ଗଛ ଚଢ଼ିବାରେ ଦୁର୍ବଳ</label>

                                                            </li>

                                                            <li class="strength-card">

                                                                <input type="radio" name="option"

                                                                    id="Bad-at-adapting-to-different-places"

                                                                    value="ପରିସ୍ଥିତି ସହ ଖାପ ଖୁଆଇ ଚଳିବାରେ ଅସମର୍ଥ "

                                                                    onchange="checkAnswer('.weak-ans-box-2','Bad-at-adapting-to-different-places','Not-very-active-during-daytime')">

                                                                <label for="Bad-at-adapting-to-different-places">ପରିସ୍ଥିତି ସହ ଖାପ ଖୁଆଇ ଚଳିବାରେ ଅସମର୍ଥ </label>

                                                            </li>

                                                        </ul>

                                                        <div class="weak-ans-box-2">ଉତ୍ତର : </div>

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

                                                <h4 class="text-white">ସାମର୍ଥ୍ୟ କାର୍ଡ</h4>

                                            </div>

                                            <div class="card__back" style="position: relative;">

                                                <div class="card card-01">

                                                    <div class="card-body text-center" style="position: relative;">

                                                        <ul class="good-ul"

                                                            style="list-style-type: none; text-align: left; padding: 0;">

                                                            <li class="strength-card1">

                                                                <input type="radio" name="skill"

                                                                    value="ଲମ୍ବା ପାଟି "

                                                                    id="Having-a-long-beak"

                                                                    onchange="checkAnswer('.strong-ans-box-3','Having-a-long-beak','Being-good-at-socialising')"

                                                                    style="margin-right: 10px;">

                                                                <label for="Having-a-long-beak">ଲମ୍ବା ପାଟି </label>

                                                            </li>

                                                            <li class="strength-card1">

                                                                <input type="radio" name="skill"

                                                                    value="ସାମାଜିକ ଭାବେ ଉତ୍ତମ "

                                                                    id="Being-good-at-socialising"

                                                                    onchange="checkAnswer('.strong-ans-box-3','Being-good-at-socialising','Being-good-at-socialising')"

                                                                    style="margin-right: 10px;">

                                                                <label for="Being-good-at-socialising">ସାମାଜିକ ଭାବେ ଉତ୍ତମ </label>

                                                            </li>

                                                            <li class="strength-card1">

                                                                <input type="radio" name="skill"

                                                                    value="ନିରାମିଷାସୀ" id="Being-vegetarian"

                                                                    onchange="checkAnswer('.strong-ans-box-3','Being-vegetarian','Being-good-at-socialising')"

                                                                    style="margin-right: 10px;">

                                                                <label for="Being-vegetarian">ନିରାମିଷାସୀ</label>

                                                            </li>

                                                            <li class="strength-card1">

                                                                <input type="radio" name="skill"

                                                                    value="ଶ୍ୱାସକ୍ରିୟା ପାଇଁ ପୃଷ୍ଠକୁ ଆସିବା ର ଆବଶ୍ୟକତା ରହିଛି"

                                                                    id="Needing-to-come-up"

                                                                    onchange="checkAnswer('.strong-ans-box-3','Needing-to-come-up','Being-good-at-socialising')"

                                                                    style="margin-right: 10px;">

                                                                <label for="Needing-to-come-up">ଶ୍ୱାସକ୍ରିୟା ପାଇଁ ପୃଷ୍ଠକୁ ଆସିବା ର ଆବଶ୍ୟକତା ରହିଛି</label>

                                                            </li>

                                                        </ul>

                                                        <div class="strong-ans-box-3">ଉତ୍ତର : </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="card-flipper effect__hover" data-id="1">

                                            <div class="card__front d-flex justify-content-center align-items-center"

                                                style="background-color: #0f3970">

                                                <h4 class="text-white">ଦୁର୍ବଳତା କାର୍ଡ</h4>

                                            </div>

                                            <div class="card__back" style="position: relative;">

                                                <div class="card card-01">

                                                    <div class="card-body text-center" style="position: relative;">

                                                        <ul class="good-ul"

                                                            style="list-style-type: none; text-align: left;">

                                                            <li class="strength-card2">

                                                                <input type="radio" name="option" id="Being-playful"

                                                                    value="ଖେଳାଳୀ ହେବା"

                                                                    onchange="checkAnswer('.weak-ans-box-2','Being-playful','Weak-in-the-face-ofwater')">

                                                                <label for="Being-playful">ଖେଳାଳୀ ହେବା</label>

                                                            </li>

                                                            <li class="strength-card2">

                                                                <input type="radio" name="option" id="Using"

                                                                    value="ପାଣି ଭିତରେ ଖେଳିବା, ଶିକାର ଖୋଜିବା ପାଇଁ ଏକ ଶବ୍ଦ ବ୍ୟବହାର କରିବା"

                                                                    onchange="checkAnswer('.weak-ans-box-3','Using','Weak-in-the-face-ofwater')">

                                                                <label for="Using">ପାଣି ଭିତରେ ଖେଳିବା, ଶିକାର ଖୋଜିବା ପାଇଁ ଏକ ଶବ୍ଦ ବ୍ୟବହାର କରିବା ।</label>

                                                            </li>

                                                            <li class="strength-card2">

                                                                <input type="radio" name="option"

                                                                    id="Weak-in-the-face-ofwater"

                                                                    value="ସେମାନଙ୍କ ବାସସ୍ଥାନରେ ଜଳ ପ୍ରଦୂଷଣ ର ଆଶଙ୍କା ରହିଛି।"

                                                                    onchange="checkAnswer('.weak-ans-box-3','Weak-in-the-face-ofwater','Weak-in-the-face-ofwater')">

                                                                <label for="Weak-in-the-face-ofwater">ସେମାନଙ୍କ ବାସସ୍ଥାନରେ ଜଳ ପ୍ରଦୂଷଣ ର ଆଶଙ୍କା ରହିଛି।</label>

                                                            </li>

                                                            <li class="strength-card2">

                                                                <input type="radio" name="option"

                                                                    id="Being-mammals-that"

                                                                    value="ଜଳରେ ବାସ କରୁଥିବା ସ୍ତନ୍ୟପାୟୀ ପ୍ରାଣୀ "

                                                                    onchange="checkAnswer('.weak-ans-box-3','Being-mammals-that','Weak-in-the-face-ofwater')">

                                                                <label for="Being-mammals-that">ଜଳରେ ବାସ କରୁଥିବା ସ୍ତନ୍ୟପାୟୀ ପ୍ରାଣୀ </label>

                                                            </li>

                                                        </ul>

                                                        <div class="weak-ans-box-3">ଉତ୍ତର : </div>

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

                    <button type="button" class="next" onclick="nextStep(1)">ପରବର୍ତ୍ତୀ</button>

                </div>

            </div>

            <!-- Step 2 -->

            <div class="step">

                <section class="cards-section pb-5">

                    <div class="container">

                        <div class="row">

                            <div class="col-12">

                                <h3 class="text-center my-5">ଏହି ଜୀବ ମାନଙ୍କର ସାମର୍ଥ୍ୟ ଓ ଦୁର୍ବଳତାକୁ ବିଶ୍ଳେଷଣ କରିବା ପରେ ଏବେ ନିଜର ସାମର୍ଥ୍ୟ ଓ ଦୁର୍ବଳତାକୁ ଅନୁସନ୍ଧାନ କରିବାର ସମୟ ଆସିଛି।</h>

                            </div>



                            <div class="col-md-12">

                                <h5 class="my-2">Q1. ଆପଣ କେଉଁ କ୍ଷେତ୍ରରେ ଭଲ ଅଟନ୍ତି? </h5>

                                <div class="card-container card-containers strngth-12-cards">

                                    <div class="row">

                                        <div class="col-md-3 col-12 padding-left-right">

                                            <div class="card" id="card1"><i class="fa fa-music"></i><span val="Sing" t="ଗୀତ ଗାଇବା">ଗୀତ ଗାଇବା</span></div>

                                        </div>

                                        <div class="col-md-3 col-12 padding-left-right">

                                            <div class="card" id="card2"><i

                                                    class="fa fa-american-sign-language-interpreting"></i><span val="Dance" t="ନୃତ୍ୟ କରିବା">ନୃତ୍ୟ କରିବା</span>

                                            </div>

                                        </div>

                                        <div class="col-md-3 col-12 padding-left-right">

                                            <div class="card" id="card3"><i

                                                    class="fa fa-paint-brush"></i><span val="Draw/Paint" t="ଚିତ୍ର ଆଙ୍କିବା/ରଙ୍ଗ କରିବା">ଚିତ୍ର ଆଙ୍କିବା/ରଙ୍ଗ କରିବା</span></div>

                                        </div>

                                        <div class="col-md-3 col-12 padding-left-right">

                                            <div class="card" id="card4"><i class="fa fa-leaf"></i><span val="Gardening" t="ବଗିଚା କାମ">ବଗିଚା କାମ</span></div>

                                        </div>

                                        <div class="col-md-3 col-12 padding-left-right">

                                            <div class="card" id="card5"><i class="fa fa-pencil"></i><span val="Write Stories/Poems" t="ଲେଖିବା">ଲେଖିବା</span></div>

                                        </div>

                                        <div class="col-md-3 col-12 padding-left-right">

                                            <div class="card" id="card6"><i class="fa fa-futbol-o"></i><span val="Playig (Games/Sports)" t="ଖେଳିବା/କ୍ରୀଡ଼ା କରିବା">ଖେଳିବା /କ୍ରୀଡ଼ା କରିବା</span></div>

                                        </div>

                                        <div class="col-md-3 col-12 padding-left-right">

                                            <div class="card text-center" id="card7"><i class="fa fa-laptop"></i><span val="Develop ICT/digital resources(e.g. coding)" t="ଡିଜିଟାଲ ସମ୍ବଳର ବିକାଶ">ଡିଜିଟାଲ ସମ୍ବଳର ବିକାଶ</span></div>

                                        </div>

                                        <div class="col-md-3 col-12 padding-left-right">

                                            <div class="card" id="card8"><i class="fa fa-child"></i><span val="Playing with Animals" t="ପଶୁମାନଙ୍କ ସହ ଖେଳିବା ">ପଶୁମାନଙ୍କ ସହ ଖେଳିବା </span></div>

                                        </div>

                                        <div class="col-md-3 col-12 padding-left-right">

                                            <div class="card" id="card9"><i class="fa fa-users"></i><span val="Talking/Discussing" t="ଆଲୋଚନା କରିବା">ଆଲୋଚନା କରିବା</span></div>

                                        </div>

                                        <div class="col-md-3 col-12 padding-left-right">

                                            <div class="card" id="card10"><i class="fa fa-assistive-listening-systems"></i><span val="Listening or Obsering" t="ଶୁଣିବା ଏବଂ ନିରୀକ୍ଷଣ କରିବା">ଶୁଣିବା ଏବଂ ନିରୀକ୍ଷଣ କରିବା</span></div>

                                        </div>

                                        <div class="col-md-3 col-12 padding-left-right">

                                            <div class="card" id="card11"><i class="fa fa-book"></i><span val="Studying" t="ଅଧ୍ୟୟନ କରିବା">ଅଧ୍ୟୟନ କରିବା</span></div>

                                        </div>

                                        <div class="col-md-3 col-12 padding-left-right">
                                            <div class="card" id="card12" onclick="focuselement(this)">
                                                <i class="fa fa-pencil-square-o"></i>
                                                ନିଜ ସାମର୍ଥ୍ୟ ଲେଖନ୍ତୁ
                                                <span
                                                    class="card12 editable-field"
                                                    contenteditable="true"
                                                    oninput="editablefixedcharecter(this);"
                                                    val="edit"
                                                    data-placeholder="ସାମର୍ଥ୍ୟ ଲେଖନ୍ତୁ..."></span>
                                            </div>
                                        </div>

                                    </div>

                                </div>



                            </div>

                            <div class="col-md-12" style="padding-top:5px">




                                <div class="text-center">
                                    <button type="button" class="btn btn-primary"

                                        onclick="weaknessStrengthCard()">ଦାଖଲ କରନ୍ତୁ </button>
                                </div>


                                <div class="modal fade" id="careerSuccessModal2" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">

                                            <div class="modal-header  text-white">
                                                <h5 class="modal-title">ସଫଳତା</h5>
                                                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                                            </div>

                                            <div class="modal-body text-center">
                                                <p class="modal-strength-msg"></p>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="alert alert-success d-none  weaknessstrength-msg-box"

                                    style="margin-top:18px;">

                                    <a  href="#" class="close" data-dismiss="alert" aria-label="close"

                                        title="close">X</a> <br>

                                    <p><strong>ବାଃ!</strong> <span class="strength-msg"></span></p>

                                </div> -->



                            </div>

                            <div class="col-md-12">

                                <div class="straingth-img-con">



                                </div>

                            </div>

                          

                        </div>

                    </div>

                </section>

                <div class="col-md-12" style="text-align: center;">

                    <button type="button" class="previous" onclick="prevStep(0)">ପୂର୍ବ</button>

                    <button type="button" class="next" onclick="nextStep(2)">ପରବର୍ତ୍ତୀ</button>

                </div>

            </div>
            <div class="step">
                  <div class="col-md-12">

                                <h5 class="my-2">Q2. ଆମକୁ ଆପଣଙ୍କ ଦିନ ବିଷୟରେ କୁହନ୍ତୁ </h5>

                                <div class="form-group">

                                    a) ବିଦ୍ୟାଳୟରେ ପାଠ ପଢ଼ିବା ସମେତ ନିଜ ପାଠପଢ଼ାରେ ଦୈନିକ କେତେ ସମୟ ବିତାଉଛନ୍ତି?

                                    <div class="row mb-4 mt-3">

                                        <div class="col-md-3">

                                            <div class="form-check">

                                                <input class="form-check-input" type="radio" name="sec-3a" id="sec-3a-a" value="a" onchange="sec3a('a')">

                                                <label class="form-check-label" for="sec-3a-a">

                                                    ୫ ଘଣ୍ଟା

                                                </label>



                                            </div>



                                        </div>

                                        <div class="col-md-3">

                                            <div class="form-check">

                                                <input class="form-check-input" type="radio" name="sec-3a" id="sec-3a-b" value="b" onchange="sec3a('b')">

                                                <label class="form-check-label" for="sec-3a-b">

                                                    ୬ ଘଣ୍ଟା

                                                </label>

                                            </div>

                                        </div>

                                        <div class="col-md-3">

                                            <div class="form-check">

                                                <input class="form-check-input" type="radio" name="sec-3a" id="sec-3a-c" value="c" onchange="sec3a('c')">

                                                <label class="form-check-label" for="sec-3a-c">

                                                    ୭ ଘଣ୍ଟା

                                                </label>

                                            </div>

                                        </div>

                                        <div class="col-md-3">



                                            <div class="form-check">

                                                <input class="form-check-input" type="radio" name="sec-3a" id="sec-3a-d" value="d" onchange="sec3a('d')">

                                                <label class="form-check-label" for="sec-3a-d">

                                                    ୭ ଘଣ୍ଟାରୁ ଅଧିକ

                                                </label>

                                            </div>

                                        </div>

                                        <div class="alert alert-success mt-3 d-none sec3a-msg" role="alert">

                                        </div>



                                    </div>

                                </div>



                                <div class="form-group">

                                    b) ଆପଣ ଖେଳ ଖେଳିବାରେ ଦୈନିକ କେତେ ସମୟ ବିତାନ୍ତି?

                                    <div class="row mb-4 mt-3">

                                        <div class="col-md-3">

                                            <div class="form-check">

                                                <input class="form-check-input" type="radio" name="sec-3b" id="sec-3b-a" value="a" onchange="sec3b('a')">

                                                <label class="form-check-label" for="sec-3b-a">

                                                    ୩୦ ମିନିଟ୍

                                                </label>



                                            </div>



                                        </div>

                                        <div class="col-md-3">

                                            <div class="form-check">

                                                <input class="form-check-input" type="radio" name="sec-3b" id="sec-3b-b" value="b" onchange="sec3b('b')">

                                                <label class="form-check-label" for="sec-3b-b">

                                                    ୧ ଘଣ୍ଟା

                                                </label>

                                            </div>

                                        </div>

                                        <div class="col-md-3">

                                            <div class="form-check">

                                                <input class="form-check-input" type="radio" name="sec-3b" id="sec-3b-c" value="c" onchange="sec3b('c')">

                                                <label class="form-check-label" for="sec-3b-c">

                                                    ୨ ଘଣ୍ଟା

                                                </label>

                                            </div>

                                        </div>

                                        <div class="col-md-3">



                                            <div class="form-check">

                                                <input class="form-check-input" type="radio" name="sec-3b" id="sec-3b-d" value="d" onchange="sec3b('d')">

                                                <label class="form-check-label" for="sec-3b-d">

                                                    ୩ ଘଣ୍ଟା କିମ୍ବା ୩ ଘଣ୍ଟାରୁ ଅଧିକ

                                                </label>

                                            </div>

                                        </div>

                                        <div class="alert alert-success mt-3 d-none sec3b-msg" role="alert">

                                        </div>



                                    </div>

                                </div>





                                <div class="form-group">

                                    c) ଆପଣ ଦୈନିକ କେତେ ସମୟ ଆପଣଙ୍କ ପରିବାରକୁ ଘର କାମରେ ସାହାଯ୍ୟ କରିବାରେ ବିତାଉଛନ୍ତି?

                                    <div class="row mb-4 mt-3">

                                        <div class="col-md-3">

                                            <div class="form-check">

                                                <input class="form-check-input" type="radio" name="sec-3c" id="sec-3c-a" value="a" onchange="sec3c('a')">

                                                <label class="form-check-label" for="sec-3c-a">

                                                    ୩୦ ମିନିଟ୍ ପର୍ଯ୍ୟନ୍ତ

                                                </label>



                                            </div>



                                        </div>

                                        <div class="col-md-3">

                                            <div class="form-check">

                                                <input class="form-check-input" type="radio" name="sec-3c" id="sec-3c-b" value="b" onchange="sec3c('b')">

                                                <label class="form-check-label" for="sec-3c-b">

                                                    ୩୦ ମିନିଟ୍ to ୧ ଘଣ୍ଟା

                                                </label>

                                            </div>

                                        </div>

                                        <div class="col-md-3">

                                            <div class="form-check">

                                                <input class="form-check-input" type="radio" name="sec-3c" id="sec-3c-c" value="c" onchange="sec3c('c')">

                                                <label class="form-check-label" for="sec-3c-c">

                                                    ୨ ଘଣ୍ଟା

                                                </label>

                                            </div>

                                        </div>

                                        <div class="col-md-3">



                                            <div class="form-check">

                                                <input class="form-check-input" type="radio" name="sec-3c" id="sec-3c-d" value="d" onchange="sec3c('d')">

                                                <label class="form-check-label" for="sec-3c-d">

                                                    ୩ ଘଣ୍ଟା କିମ୍ବା ୩ ଘଣ୍ଟାରୁ ଅଧିକ





                                                </label>

                                            </div>

                                        </div>

                                        <div class="alert alert-success mt-3 d-none sec3c-msg" role="alert">

                                        </div>



                                    </div>

                                </div>



                                <div class="form-group">

                                    d) ଆପଣ ଟିଭି ଦେଖିବା, କିମ୍ବା ଫୋନରେ ଗେମ୍ ଦେଖିବା/ ଖେଳିବାରେ ଦୈନିକ କେତେ ସମୟ ବିତାନ୍ତି?

                                    <div class="row mb-4 mt-3">

                                        <div class="col-md-3">

                                            <div class="form-check">

                                                <input class="form-check-input" type="radio" name="sec-3d" id="sec-3d-a" value="a" onchange="sec3d('a')">

                                                <label class="form-check-label" for="sec-3d-a">

                                                    ୩୦ ମିନିଟ୍ ପର୍ଯ୍ୟନ୍ତ

                                                </label>



                                            </div>



                                        </div>

                                        <div class="col-md-3">

                                            <div class="form-check">

                                                <input class="form-check-input" type="radio" name="sec-3d" id="sec-3d-b" value="b" onchange="sec3d('b')">

                                                <label class="form-check-label" for="sec-3d-b">

                                                    ୩୦ ମିନିଟ୍ to ୧ ଘଣ୍ଟା

                                                </label>

                                            </div>

                                        </div>

                                        <div class="col-md-3">

                                            <div class="form-check">

                                                <input class="form-check-input" type="radio" name="sec-3d" id="sec-3d-c" value="c" onchange="sec3d('c')">

                                                <label class="form-check-label" for="sec-3d-c">

                                                    ୨ ଘଣ୍ଟା

                                                </label>

                                            </div>

                                        </div>

                                        <div class="col-md-3">



                                            <div class="form-check">

                                                <input class="form-check-input" type="radio" name="sec-3d" id="sec-3d-d" value="d" onchange="sec3d('d')">

                                                <label class="form-check-label" for="sec-3d-d">

                                                    ୩ ଘଣ୍ଟା କିମ୍ବା ୩ ଘଣ୍ଟାରୁ ଅଧିକ





                                                </label>

                                            </div>

                                        </div>

                                        <div class="alert alert-success mt-3 d-none sec3d-msg" role="alert">

                                        </div>



                                    </div>

                                </div>



                                <div class="form-group">

                                    e) ଆପଣ ନିଜର ସୌଖ ଏବଂ ଆଗ୍ରହ ପାଇଁ ଦୈନିକ କେତେ ସମୟ ବିତାଉଛନ୍ତି? ଉଦାହରଣ ସ୍ୱରୂପ ଗୀତ ଗାଇବା, ନୃତ୍ୟ କରିବା, ବଗିଚା କରିବା ଇତ୍ୟାଦି ।

                                    <div class="row mb-4 mt-3">

                                        <div class="col-md-3">

                                            <div class="form-check">

                                                <input class="form-check-input" type="radio" name="sec-3e" id="sec-3e-a" value="a" onchange="sec3e('a')">

                                                <label class="form-check-label" for="sec-3e-a">

                                                    ୩୦ ମିନିଟ୍ ପର୍ଯ୍ୟନ୍ତ

                                                </label>



                                            </div>



                                        </div>

                                        <div class="col-md-3">

                                            <div class="form-check">

                                                <input class="form-check-input" type="radio" name="sec-3e" id="sec-3e-b" value="b" onchange="sec3e('b')">

                                                <label class="form-check-label" for="sec-3e-b">

                                                    ୩୦ ମିନିଟ୍ to ୧ ଘଣ୍ଟା

                                                </label>

                                            </div>

                                        </div>

                                        <div class="col-md-3">

                                            <div class="form-check">

                                                <input class="form-check-input" type="radio" name="sec-3e" id="sec-3e-c" value="c" onchange="sec3e('c')">

                                                <label class="form-check-label" for="sec-3e-c">

                                                    ୨ ଘଣ୍ଟା

                                                </label>

                                            </div>

                                        </div>

                                        <div class="col-md-3">



                                            <div class="form-check">

                                                <input class="form-check-input" type="radio" name="sec-3e" id="sec-3e-d" value="d" onchange="sec3e('d')">

                                                <label class="form-check-label" for="sec-3e-d">

                                                    ୩ ଘଣ୍ଟା କିମ୍ବା ୩ ଘଣ୍ଟାରୁ ଅଧିକ





                                                </label>

                                            </div>

                                        </div>

                                        <div class="alert alert-success mt-3 d-none sec3e-msg" role="alert">

                                        </div>



                                    </div>

                                </div>

                 </div>
                  <div class="col-md-12" style="text-align: center;">

                    <button type="button" class="previous" onclick="prevStep(0)">ପୂର୍ବ</button>

                    <button type="button" class="next" onclick="nextStep(3)">ପରବର୍ତ୍ତୀ</button>

                </div>
            </div>

            <!-- Step 3 -->

            <div class="step">

                <section class="cards-section pb-5">

                    <div class="container">

                        <div class="row">

                            <div class="col-12">

                                <h3 class="text-center my-5">ବର୍ତ୍ତମାନ, ଆପଣ କେଉଁଥିରେ ଭଲ ନୁହଁନ୍ତି ସେ ବିଷୟରେ ଚିନ୍ତା କରିବାର ସମୟ ଆସିଛି </h3>

                            </div>

                            <div class="col-md-12">

                                <h5 class="my-2">Q1. କେଉଁ ଶିକ୍ଷା କିମ୍ବା ଦକ୍ଷତାର ଅଭାବ ଅଛି ବୋଲି ଆପଣ ଭାବନ୍ତି?</h5>



                                <div class="card-container card-container-weakness">

                                    <div class="row">

                                        <div class="col-md-3 col-12 padding-left-right">

                                            <div class="card" id="card1"><img src="upload/icon2/stress.png" style="height: 55px;"><span val="ବାରମ୍ବାର ଚାପଗ୍ରସ୍ତ ହୁଅନ୍ତି">ବାରମ୍ବାର ଚାପଗ୍ରସ୍ତ ହୁଅନ୍ତି</span></div>

                                        </div>

                                        <div class="col-md-3 col-12 padding-left-right">

                                            <div class="card" id="card2"><img src="upload/icon2/angry.png" style="height: 55px;"><span val="କ୍ରୋଧ କିମ୍ବା ବିରକ୍ତ ଅନୁଭବ କରନ୍ତି">କ୍ରୋଧ କିମ୍ବା ବିରକ୍ତ ଅନୁଭବ କରନ୍ତି</span></div>

                                        </div>

                                        <div class="col-md-3 col-12 padding-left-right">

                                            <div class="card" id="card3"><img src="upload/icon2/cry.png" style="height: 55px;"><span val="ସହଜରେ ବିରକ୍ତ ହୁଅନ୍ତି ">ସହଜରେ ବିରକ୍ତ ହୁଅନ୍ତି </span></div>

                                        </div>

                                        <div class="col-md-3 col-12 padding-left-right">

                                            <div class="card" id="card4"><img src="upload/icon2/talking.png" style="height: 55px;"><span val="ଗୋଷ୍ଠୀରେ କଥାବାର୍ତ୍ତା/ ଯୋଗାଯୋଗ କିମ୍ବା ଆଲୋଚନା କରିବାରେ ଦୁର୍ବଳ">ଗୋଷ୍ଠୀରେ କଥାବାର୍ତ୍ତା/ ଯୋଗାଯୋଗ କିମ୍ବା ଆଲୋଚନା କରିବାରେ ଦୁର୍ବଳ</span></div>

                                        </div>

                                        <div class="col-md-3 col-12 padding-left-right">

                                            <div class="card" id="card5"><img src="upload/icon2/listeing.png" style="height: 55px;"><span val="ଶୁଣିବା କିମ୍ବା ଦେଖିବାରେ ଦୁର୍ବଳ">ଶୁଣିବା କିମ୍ବା ଦେଖିବାରେ ଦୁର୍ବଳ</span></div>

                                        </div>

                                        <div class="col-md-3 col-12 padding-left-right">

                                            <div class="card" id="card6"><img src="upload/icon2/takling-feedback.png" style="height: 55px;"><span="ମତାମତ କିମ୍ବା ସମାଲୋଚନା ନେବାରେ ଦୁର୍ବଳ">ମତାମତ କିମ୍ବା ସମାଲୋଚନା ନେବାରେ ଦୁର୍ବଳ</span></div>

                                        </div>



                                        <div class="col-md-3 col-12 padding-left-right">

                                            <div class="card text-center" id="card7"><img src="upload/icon2/english.png" style="height: 55px;"><span val="ଇଂରାଜୀ ">ଇଂରାଜୀ </span></div>

                                        </div>

                                        <div class="col-md-3 col-12 padding-left-right">

                                            <div class="card" id="card8"><img src="upload/icon2/math.png" style="height: 55px;"><span val="ଗଣିତ">ଗଣିତ</span></div>

                                        </div>

                                        <div class="col-md-3 col-12 padding-left-right">

                                            <div class="card" id="card9"><img src="upload/icon2/odia.png" style="height: 55px;"><span val="ଓଡ଼ିଆ">ଓଡ଼ିଆ</span></div>

                                        </div>

                                        <div class="col-md-3 col-12 padding-left-right">

                                            <div class="card" id="card10"><img src="upload/icon2/science.png" style="height: 55px;"><span val="ବିଜ୍ଞାନ">ବିଜ୍ଞାନ</span></div>

                                        </div>

                                        <div class="col-md-3 col-12 padding-left-right">

                                            <div class="card" id="card11"><img src="upload/icon2/social-science.png" style="height: 55px;"><span val="ସାମାଜିକ ବିଜ୍ଞାନ">ସାମାଜିକ ବିଜ୍ଞାନ</span>

                                            </div>

                                        </div>

                                        <div class="col-md-3 col-12 padding-left-right">
                                            <div class="card" id="card12" onclick="focuselement(this)">
                                                <i class="fa fa-pencil-square-o"></i>
                                                ନିଜର ଦୁର୍ବଳତା ଲେଖନ୍ତୁ
                                                <span
                                                    class="card12 editable-field"
                                                    contenteditable="true"
                                                    oninput="editablefixedcharecter(this);"
                                                    val="edit"
                                                    data-placeholder="ଦୁର୍ବଳତା ଲେଖନ୍ତୁ..."></span>
                                            </div>
                                        </div>

                                    </div>







                                </div>

                            </div>

                            <div class="col-md-12 mt-3">



                                <h5 class="my-2">Q2. ଅନ୍ୟମାନେ ଆପଣଙ୍କ କେଉଁ ଦୁର୍ବଳତା ବିଷୟରେ କହନ୍ତି?</h5>

                                <div class="form-group">

                                    <label for="field1" class="font-weight-bold"></label>

                                    <input type="text" class="form-control" id="field3">

                                </div>



                                <h5 class="my-2">Q3. ଦୁର୍ବଳତାର ଏହି କ୍ଷେତ୍ରଗୁଡ଼ିକରେ ଆପଣ କିପରି କାମ କରିବାକୁ ଯୋଜନା କରୁଛନ୍ତି? ଏହି ବିକଳ୍ପଗୁଡିକ ମଧ୍ୟରୁ ଚୟନ କରନ୍ତୁ:</h5>

                                <!--<div class="form-group">-->

                                <!--    <input type="text" class="form-control" id="field4">-->

                                <!--</div>-->

                                <div class="tab-container">

                                    <div class="tabs strenth-weak-tab">

                                        <a href="#" class="tab-link active" onclick="openTab(event, 'Tab1')">ଭାବପ୍ରବଣ କ୍ଷେତ୍ର </a>

                                        <a href="#" class="tab-link" onclick="openTab(event, 'Tab2')">ଅଧ୍ୟୟନ କ୍ଷେତ୍ର</a>

                                    </div>

                                    <div id="Tab1" class="tab-content active select-tab-weak">

                                        <div class="form-group">

                                            <select class="form-control" name="" onchange="showCustomInput(this, 'customInput1'); trackDropdown(this, 'emotional_area')">

                                                <option>Select</option>

                                                <option value="ଡାଏରୀରେ ମୋର ଭାବନା ପ୍ରକାଶ କରିବି">ଡାଏରୀରେ ମୋର ଭାବନା ପ୍ରକାଶ କରିବି</option>

                                                <option value="ମୋର ସମସ୍ୟା କୁ ଜଣେ ବନ୍ଧୁଙ୍କ ସହ ଅଂଶୀଦାର କରିବି ">ମୋର ସମସ୍ୟା କୁ ଜଣେ ବନ୍ଧୁଙ୍କ ସହ ଅଂଶୀଦାର କରିବି </option>

                                                <option value="ଶିକ୍ଷକ କିମ୍ବା ଅଭିଭାବକଙ୍କ ସହ ମୋର ସମସ୍ୟା ଅଂଶୀଦାର କରିବି ଅଂଶୀଦାର କରିବି">ଶିକ୍ଷକ କିମ୍ବା ଅଭିଭାବକଙ୍କ ସହ ମୋର ସମସ୍ୟା ଅଂଶୀଦାର କରିବି ଅଂଶୀଦାର କରିବି</option>

                                                <option value="ମୋର ଭାବନାକୁ ପ୍ରକାଶ କରିବା ପାଇଁ ଅଧିକ କ୍ରୀଡ଼ା ଖେଳିବା କିମ୍ବା କଳାକୃତି ସୃଷ୍ଟି କରିବି">ମୋର ଭାବନାକୁ ପ୍ରକାଶ କରିବା ପାଇଁ ଅଧିକ କ୍ରୀଡ଼ା ଖେଳିବା କିମ୍ବା କଳାକୃତି ସୃଷ୍ଟି କରିବି</option>

                                                <option value="">କୌଣସି ଅନ୍ୟ ବିକଳ୍ପ-ଦୟାକରି ଟାଇପ୍ କରନ୍ତୁ</option>

                                            </select>

                                            <input type="text" class="form-control custom-input" id="customInput1" placeholder="ଦୟାକରି ଏଠାରେ ଆପଣଙ୍କର ବିକଳ୍ପ ଟାଇପ୍ କରନ୍ତୁ">

                                        </div>

                                    </div>

                                    <div id="Tab2" class="tab-content select-tab-weak">

                                        <div class="form-group">

                                            <select class="form-control" name="" onchange="showCustomInput(this, 'customInput2'); trackDropdown(this, 'study_area')">

                                                <option>Select</option>

                                                <option value="ସେହି ବିଷୟର ଅଧ୍ୟୟନ ରେ ଅଧିକ ସମୟ ଦେବେ">ସେହି ବିଷୟର ଅଧ୍ୟୟନ ରେ ଅଧିକ ସମୟ ଦେବେ</option>

                                                <option value="ଏହି ବିଷୟରେ ଭଲ ବନ୍ଧୁଙ୍କ ଠାରୁ ମାର୍ଗଦର୍ଶନ ନେବେ">ଏହି ବିଷୟରେ ଭଲ ବନ୍ଧୁଙ୍କ ଠାରୁ ମାର୍ଗଦର୍ଶନ ନେବେ</option>

                                                <option value="ଶିକ୍ଷକଙ୍କ ଠାରୁ ସହଯୋଗ ଲୋଡିବେ ଏବଂ ସେମାନଙ୍କ ର ବ୍ୟବହାରିକ ପରାମର୍ଶ ଚେଷ୍ଟା କରିବେ">ଶିକ୍ଷକଙ୍କ ଠାରୁ ସହଯୋଗ ଲୋଡିବେ ଏବଂ ସେମାନଙ୍କ ର ବ୍ୟବହାରିକ ପରାମର୍ଶ ଚେଷ୍ଟା କରିବେ</option>

                                                <option value="">କୌଣସି ଅନ୍ୟ ବିକଳ୍ପ-ଦୟାକରି ଟାଇପ୍ କରନ୍ତୁ</option>

                                            </select>

                                            <input type="text" class="form-control custom-input" id="customInput2" placeholder="ଦୟାକରି ଏଠାରେ ଆପଣଙ୍କର ବିକଳ୍ପ ଟାଇପ୍ କରନ୍ତୁ">

                                        </div>

                                    </div>

                                </div>

                                <button type="button" style="margin-bottom: 0px;" class="btn btn-primary" onclick="submitWeaknessWithTracking()">ଦାଖଲ କରନ୍ତୁ</button>



                                <div class="modal fade" id="successModal" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">

                                            <div class="modal-header text-white">
                                                <h5 class="modal-title"> ସଫଳତା</h5>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <div class="modal-body text-center">
                                                <p class="modal-weakness-msg"></p>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="weakness-msg-box"></div> -->



                                <div class="last-form-box d-none">

                                    <h4 class="my-2"> ବର୍ତ୍ତମାନ ଯେତେବେଳେ ଆପଣ ନିଜର ସାମର୍ଥ୍ୟ ଏବଂ ଦୁର୍ବଳତା ଜାଣିଛନ୍ତି, ତେବେ କେଉଁ କ୍ୟାରିୟର ଆପଣଙ୍କ ପାଇଁ ଉପଯୁକ୍ତ ହେବ ବୋଲି ଆପଣ ଭାବୁଛନ୍ତି?</h5>

                                        <div class="form-group">

                                            <select name="carrer_pur_future" id="field5" class="form-control" onchange="trackDropdownChange(this)">

                                                <option>ଚୟନ କରନ୍ତୁ </option>



                                                <?php

                                                $sql = "SELECT name FROM all_career_list WHERE status = '1'";

                                                $result = mysqli_query($conn, $sql);

                                                if ($result) {

                                                    while ($res_strm = mysqli_fetch_assoc($result)) {

                                                ?>

                                                        <option value='<?= $res_strm['name']; ?>'><?= $res_strm['name']; ?></option>

                                                <?php

                                                    }
                                                }

                                                ?>

                                            </select>

                                            <input type="button" value="ଦାଖଲ କରନ୍ତୁ" class="mt-2 submit-button" onclick="submitCareerWithTracking()">

                                            <div class="modal fade" id="careerSuccessModal" tabindex="-1" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">

                                                        <div class="modal-header text-white">
                                                            <h5 class="modal-title">ସଫଳତା</h5>
                                                            <button type="button" class="close" id="modalCloseBtn" data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <p id="careerSuccessMessage"></p>
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

                    <button type="button" class="previous" onclick="prevStep(2)">ପୂର୍ବ</button>

                    <!--<button type="button" class="next" onclick="nextStep(3)">Next</button>-->

                </div>

            </div>

    </div>



    </form>





















    <!-- ================================================section end ======================================== -->



    <!-- -------------footer start---------- -->

    <!-- -------------footer end---------- -->

    <?php include "include/before-footer.php"; ?>

    <div id="imageContainer"></div>





    <script>
        function printthankyoureload() {

            var career = $("#field5").val();

            $.ajax({
                type: "post",
                url: "backend/store-data.php",
                data: {
                    tab: 100,
                    page_name: 'Weak strenghth',
                    career_name: career
                },
                success: function(resp) {

                    if (resp == "1") {

                        // ✅ Odia message set here
                        $("#careerSuccessMessage").text("ଆପଣଙ୍କର ଭବିଷ୍ୟତ କେରିୟର ପାଇଁ ଶୁଭେଚ୍ଛା");

                        // ✅ Show modal instead of alert
                        $('#careerSuccessModal').modal('show');

                    } else {
                        alert("Error: Something went wrong, please try again later");
                    }
                }
            });
        }

        $(document).ready(function() {
            $('#modalCloseBtn').on('click', function() {
                window.location.reload();
            });
        });



        function checkAnswer(messg_print_clas, this_ans, right_ans) {

            const correctCheckbox = document.getElementById(right_ans);



            if (correctCheckbox.checked) {

                document.querySelector(messg_print_clas).innerHTML = "<p class='text-success'>ଅଭିନନ୍ଦନ! <br> <b>" + correctCheckbox.value + " </b> ଏହା ହେଉଛି ସଠିକ୍ ଉତ୍ତର</p>";

            } else {

                document.querySelector(messg_print_clas).innerHTML = "<p class='text-danger'> ଓଃ, ସଠିକ୍ ଉତ୍ତର ହେଉଛି : <br> <b>" + correctCheckbox.value + "</b></p>";

            }

        }
    </script>

    <script>
        // script.js

        document.addEventListener('DOMContentLoaded', function() {

            const steps = document.querySelectorAll('.step');

            let currentStep = 0;



            function showStep(step) {

                steps.forEach((s, index) => {

                    s.classList.toggle('active', index === step);

                });

            }



            window.nextStep = function(step) {

                if (step < steps.length) {

                    currentStep = step;

                    showStep(step);

                }

            }



            window.prevStep = function(step) {

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
        document.addEventListener('DOMContentLoaded', function() {

            const cards = document.querySelectorAll('.card');



            cards.forEach(card => {

                card.addEventListener('click', function() {

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

            var o = "";

            var custome_val = "";

            $(".strngth-12-cards .selected").each(function() {

                var selected_value = $(this).find("span").attr('val');

                var selected_value2 = $(this).find("span").attr('t');

                if (selected_value == 'edit')

                {

                    var custome_val = $('.card12').text().substring(0, 25);

                    amazin_at += "<b> " + custome_val + "</b>, ";

                } else

                {



                    amazin_at += "<b> " + selected_value2 + "</b>, ";

                }



                switch (selected_value) {

                    case "Sing":

                        img_src.push({
                            src: 'singing-b.png',
                            cardText: 'ଗୀତ ଗାଇବା'
                        });

                        img_src.push({
                            src: 'singing-g.png',
                            cardText: 'ଗୀତ ଗାଇବା'
                        });

                        break;

                    case "Dance":

                        img_src.push({
                            src: 'Dance-b.png',
                            cardText: 'ନୃତ୍ୟ କରିବା'
                        });

                        img_src.push({
                            src: 'Dance-g.png',
                            cardText: 'ନୃତ୍ୟ କରିବା'
                        });

                        break;

                    case "Draw/Paint":

                        img_src.push({
                            src: 'drawpaint-b.png',
                            cardText: 'ଚିତ୍ରାଙ୍କନ / ଚିତ୍ର'
                        });

                        img_src.push({
                            src: 'drawpaint-g.png',
                            cardText: 'ଚିତ୍ରାଙ୍କନ / ଚିତ୍ର'
                        });

                        break;

                    case "Gardening":

                        img_src.push({
                            src: 'gardening-b.jpg',
                            cardText: 'ବଗିଚା'
                        });

                        img_src.push({
                            src: 'gardening-g.jpg',
                            cardText: 'ବଗିଚା'
                        });

                        break;

                    case "Write Stories/Poems":

                        img_src.push({
                            src: 'writting-stories-b.png',
                            cardText: 'କାହାଣୀ / କବିତା ଲେଖିବା'
                        });

                        img_src.push({
                            src: 'writting.jpg',
                            cardText: 'କାହାଣୀ / କବିତା ଲେଖିବା'
                        });

                        break;

                    case "Playig (Games/Sports)":

                        img_src.push({
                            src: 'Play-b.png',
                            cardText: 'ଖେଳ/କ୍ରୀଡ଼ା'
                        });

                        img_src.push({
                            src: 'playing-g.jpg',
                            cardText: 'ଖେଳ/କ୍ରୀଡ଼ା'
                        });

                        break;

                    case "Develop ICT/digital resources(e.g. coding)":

                        img_src.push({
                            src: 'it-b.png',
                            cardText: 'ଡିଜିଟାଲ ସମ୍ବଳର ବିକାଶ'
                        });

                        img_src.push({
                            src: 'it-g.jpg',
                            cardText: 'ଡିଜିଟାଲ ସମ୍ବଳର ବିକାଶ'
                        });

                        break;

                    case "Playing with Animals":

                        img_src.push({
                            src: 'playing-with-animal1.png',
                            cardText: 'ପଶୁମାନଙ୍କ ସହ ଖେଲିବା '
                        });

                        img_src.push({
                            src: 'playing-with-animal2.jpg',
                            cardText: 'ପଶୁମାନଙ୍କ ସହ ଖେଲିବା '
                        });

                        break;

                    case "Talking/Discussin":

                        img_src.push({
                            src: 'talking B.gif',
                            cardText: 'ଆଲୋଚନା'
                        });

                        img_src.push({
                            src: 'talking G.gif',
                            cardText: 'ଆଲୋଚନା'
                        });

                        break;

                    case "Listening or Obsering":

                        img_src.push({
                            src: 'listening-observing-b.jpg',
                            cardText: 'ଶୁଣିବା ଏବଂ ନିରୀକ୍ଷଣ କରିବା'
                        });

                        img_src.push({
                            src: 'listening-observin-g.jpgg',
                            cardText: 'ଶୁଣିବା ଏବଂ ନିରୀକ୍ଷଣ କରିବା'
                        });

                        break;

                    case "Studying":

                        img_src.push({
                            src: 'study-b.jpg',
                            cardText: 'ଅଧ୍ୟୟନ କରିବା'
                        });

                        img_src.push({
                            src: 'study-g.jpg',
                            cardText: 'ଅଧ୍ୟୟନ କରିବା'
                        });

                        break;

                    case "edit":

                        img_src.push({
                            src: 'edit-B.gif',
                            cardText: custome_val
                        });

                        break;

                    default:

                        break;

                }

            });

            var msg = "";



            $(".strength-msg").html(" ତେଣୁ ଆପଣ ଆଶ୍ଚର୍ଯ୍ୟଜନକ ଅଟନ୍ତି ।  " + amazin_at.trim() + msg);





            let parts = amazin_at.split(',');
            let lastPart = parts.pop();
            amazin_at = parts.join(',') + ' ' + lastPart;

            amazin_at = amazin_at.replace(/\/(?![^<>]*>)/g, ', ');

            var finalMessage = "ତେଣୁ ଆପଣ ଆଶ୍ଚର୍ଯ୍ୟଜନକ ଅଟନ୍ତି । " + amazin_at.trim() + msg;

            // Normal message (optional)
            $(".strength-msg").html(finalMessage);

            // ✅ Modal message
            $(".modal-strength-msg").html("<strong>ବାଃ! </strong>" + finalMessage);

            // ✅ Show modal popup
            $("#careerSuccessModal2").modal("show");





            amazin_at = amazin_at.replace(/\/(?![^<>]*>)/g, ', ');

            $(".strength-msg").html("ତେଣୁ ଆପଣ ଆଶ୍ଚର୍ଯ୍ୟଜନକ ଅଟନ୍ତି ।  " + amazin_at.trim() + msg);





            // Update images and cards in the container with class 'straingth-img-con'

            var imgContainer = $(".straingth-img-con");

            imgContainer.empty(); // Clear any existing images



            img_src.forEach(function(item) {

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



            if (element.textContent.length > 25) {

                element.textContent = element.textContent.substring(0, 25);



                alert("You can't enter more than 25 characters.");

            }

            // $(element).attr('val',element.textContent)

        }



        // function weaknesshCard() {

        //     $(".last-form-box").removeClass("d-none");

        //     var amazin_at = "";



        //     $(".card-container-weakness .selected").each(function () {

        //         var selected_value = $(this).find("span").html();

        //         amazin_at += selected_value + " ";

        //     }); // Close the .each() function properly.



        //     if ($("#field3").val() != "") {

        //         amazin_at += "<b>"+ $("#field3").val()+"</b>";

        //     }

        //     if ($("#field4").val() != "") {

        //         amazin_at += " ଏବଂ <b>" + $("#field4").val();+"</b>" // Corrected concatenation and removed extra quote.

        //     }



        //     $(".weakness-msg-box").html(

        //         '<div class="alert alert-success" style="margin-top: -90px;">' +

        //         '<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>' +

        //         '“ଆପଣଙ୍କ ପ୍ରତିକ୍ରିୟା ପାଇଁ ଧନ୍ୟବାଦ । ମନେରଖନ୍ତୁ ଯେ ଆମ ସମସ୍ତଙ୍କର ସାମର୍ଥ୍ୟ ଏବଂ ଦୁର୍ବଳତା ଅଛି, ଏବଂ ଏହା ହିଁ ଆମକୁ ଅନନ୍ୟ କରିଥାଏ | ଆପଣ ନିଜର ଶକ୍ତିକୁ ତୀବ୍ର କରିପାରିବେ ଏବଂ ନିଜର ଦୁର୍ବଳତା କ୍ଷେତ୍ରରେ କାମ କରିପାରିବେ । କିନ୍ତୁ ସର୍ବଦା ମନେ ରଖନ୍ତୁ ଯେ ଆତ୍ମବିଶ୍ୱାସ, ଇଚ୍ଛାଶକ୍ତି ଏବଂ କଠିନ ପରିଶ୍ରମ ଦ୍ୱାରା ଅଧିକାଂଶ ଆହ୍ୱାନକୁ ଅତିକ୍ରମ କରାଯାଇପାରିବ । ଶୁଭେଚ୍ଛା!”  ' +

        //         amazin_at + ' ଏଗୁଡ଼ିକ ହେଉଛି ଦୁର୍ବଳତା ଯାହା ଉପରେ ଆପଣ କାମ କରିପାରିବେ। </div>'

        //     );

        // }


        function weaknesshCard() {

            $(".last-form-box").removeClass("d-none");

            var amazin_at = "";

            // Get selected cards
            $(".card-container-weakness .selected").each(function() {
                var selected_value = $(this).find("span").html();
                if (selected_value) {
                    amazin_at += "<b>" + selected_value + "</b>, ";
                }
            });

            // Remove last comma
            amazin_at = amazin_at.replace(/, $/, "");

            // Custom fields
            if ($("#field3").val()) {
                amazin_at += (amazin_at ? ", " : "") + "<b>" + $("#field3").val() + "</b>";
            }

            if ($("#field4").val()) {
                amazin_at += (amazin_at ? " ଏବଂ " : "") + "<b>" + $("#field4").val() + "</b>";
            }

            // ✅ Main static message
            var finalMessage = "“ଆପଣଙ୍କ ପ୍ରତିକ୍ରିୟା ପାଇଁ ଧନ୍ୟବାଦ । ମନେରଖନ୍ତୁ ଯେ ଆମ ସମସ୍ତଙ୍କର ସାମର୍ଥ୍ୟ ଏବଂ ଦୁର୍ବଳତା ଅଛି, ଏବଂ ଏହା ହିଁ ଆମକୁ ଅନନ୍ୟ କରିଥାଏ । ଆପଣ ନିଜର ଶକ୍ତିକୁ ତୀବ୍ର କରିପାରିବେ ଏବଂ ନିଜର ଦୁର୍ବଳତା କ୍ଷେତ୍ରରେ କାମ କରିପାରିବେ । କିନ୍ତୁ ସର୍ବଦା ମନେ ରଖନ୍ତୁ ଯେ ଆତ୍ମବିଶ୍ୱାସ, ଇଚ୍ଛାଶକ୍ତି ଏବଂ କଠିନ ପରିଶ୍ରମ ଦ୍ୱାରା ଅଧିକାଂଶ ଆହ୍ୱାନକୁ ଅତିକ୍ରମ କରାଯାଇପାରିବ । ଶୁଭେଚ୍ଛା!”";

            // ✅ Add dynamic part ONLY if exists
            if (amazin_at.trim() !== "") {
                finalMessage += "<br><br>ଏବଂ " + amazin_at + " ଏଗୁଡ଼ିକ ହେଉଛି ଦୁର୍ବଳତା ଯାହା ଉପରେ ଆପଣ କାମ କରିପାରିବେ।";
            }

            // Show modal
            $(".modal-weakness-msg").html(finalMessage);
            $("#successModal").modal("show");
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







        //Multiple Choice Question and answer

        function sec3a(data)

        {

            if (data == 'a' || data == 'b' || data == 'c')

            {

                $(".sec3a-msg").html(`ଆଶ୍ଚର୍ଯ୍ୟଜନକ! ଆପଣ ଆପଣଙ୍କ ସମୟକୁ ଭଲ ଭାବରେ ସନ୍ତୁଳନ କରନ୍ତି ଏବଂ ଅଧ୍ୟୟନ, ଖେଳ ଏବଂ ଆପଣଙ୍କ ରୁଚିରେ ନିୟୋଜିତ ଅଟନ୍ତି । ବହୁତ ଭଲ!`);

                $(".sec3a-msg").removeClass('d-none');

            } else if (data == 'd')

            {

                $(".sec3a-msg").html(`ଏହା ବହୁତ ଭଲ ଯେ ତୁମେ ଜଣେ ପରିଶ୍ରମୀ ଶିକ୍ଷାର୍ଥୀ! ତଥାପି, ସାମଗ୍ରିକ ଭାବରେ ଅର୍ଥାତ୍ ଶାରୀରିକ, ଭାବନାତ୍ମକ ଏବଂ ସାମାଜିକ ଭାବରେ ବିକଶିତ ହେବା ପାଇଁ, ଖେଳରେ ସମୟ ଅତିବାହିତ କରନ୍ତୁ! ଆପଣ ନିଜର ସୌଖ ପୂରଣ କରିବା ପାଇଁ ଅଧିକ ସମୟ ମଧ୍ୟ ଦେଇପାରନ୍ତି । ମନେରଖନ୍ତୁ, ସୁସ୍ଥ ମସ୍ତିଷ୍କ ପାଇଁ ସୁସ୍ଥ ଶରୀର, ସୁସ୍ଥ ଭାବନା ଓ ସୁସ୍ଥ ସମ୍ପର୍କ ଦରକାର।`);

                $(".sec3a-msg").removeClass('d-none');

            }

        }



        function sec3b(data)

        {

            if (data == 'a' || data == 'b' || data == 'c')

            {

                $(".sec3b-msg").html(`ଆଶ୍ଚର୍ଯ୍ୟଜନକ! ଆପଣ ଆପଣଙ୍କ ସମୟକୁ ଭଲ ଭାବରେ ସନ୍ତୁଳନ କରନ୍ତି ଏବଂ ଅଧ୍ୟୟନ, ଖେଳ ଏବଂ ଆପଣଙ୍କ ରୁଚିରେ ନିୟୋଜିତ ଅଟନ୍ତି । ବହୁତ ଭଲ ଚାଲିଛି!`);

                $(".sec3b-msg").removeClass('d-none');

            } else if (data == 'd')

            {

                $(".sec3b-msg").html(`ଏହା ଲାଗୁଛି ଯେ ଆପଣ ଖେଳ ଏବଂ ମଜା ପାଇଁ ଅଧିକ ସମୟ ଦିଅନ୍ତି | ଏଗୁଡ଼ିକ ଆମ ପାଇଁ ଜରୁରୀ, କିନ୍ତୁ ସଠିକ୍ ପରିମାଣରେ ପାଠପଢ଼ା ସହିତ ସଠିକ ଭାବରେ ସନ୍ତୁଳନ କରି, ଆମର ସୌଖ ପୂରଣ କରିବା ଏବଂ ଆମ ପରିବାରକୁ ସାହାଯ୍ୟ କରିବା ।`);

                $(".sec3b-msg").removeClass('d-none');

            }

        }



        function sec3c(data)

        {

            if (data == 'a' || data == 'b' || data == 'c')

            {

                $(".sec3c-msg").html(`ଆଶ୍ଚର୍ଯ୍ୟଜନକ! ଆପଣ ଆପଣଙ୍କ ସମୟକୁ ଭଲ ଭାବରେ ସନ୍ତୁଳନ କରନ୍ତି ଏବଂ ଅଧ୍ୟୟନ, ଖେଳ ଏବଂ ଆପଣଙ୍କ ରୁଚିରେ ନିୟୋଜିତ ଅଟନ୍ତି । ନିଜ ପରିବାରକୁ ସାହାଯ୍ୟ କରିବା ପାଇଁ ସମୟ ମଧ୍ୟ ଦିଅନ୍ତୁ। ବହୁତ ଭଲ ଚାଲିଛି!`);

                $(".sec3c-msg").removeClass('d-none');

            } else if (data == 'd')

            {

                $(".sec3c-msg").html(`ବାଃ, ତୁମେ ବହୁତ ସାହାଯ୍ୟକାରୀ ପିଲା! ତଥାପି, ଯଦି ସମ୍ଭବ, ତେବେ ଆପଣ କିପରି ପାଠପଢ଼ା, ଖେଳ/ କ୍ରୀଡ଼ା ଏବଂ ସୌଖକୁ ଅଧିକ ସମୟ ଦେଇପାରିବେ ତାହା ଅନୁସନ୍ଧାନ କରନ୍ତୁ। ଏହାଦ୍ୱାରା ଆପଣ ଉପଯୁକ୍ତ ଜ୍ଞାନ ଓ ଦକ୍ଷତା ବିକଶିତ କରିବେ । ଏହା ମଧ୍ୟ ମନେରଖନ୍ତୁ, ଝିଅ ହେଉ କି ପୁଅ- ଆମେ ସମସ୍ତେ ଆମ ପରିବାରକୁ ସାହାଯ୍ୟ କରିବା, ପାଠ ପଢ଼ିବା, ଖେଳିବା ଏବଂ ଆମର ସୌଖକୁ ସମାନ ଭାବରେ ଅନୁସରଣ କରିବାରେ ଯୋଗଦାନ କରିବା ଉଚିତ୍!`);

                $(".sec3c-msg").removeClass('d-none');

            }

        }

        function sec3d(data)

        {

            if (data == 'a')

            {

                $(".sec3d-msg").html(`ଆଶ୍ଚର୍ଯ୍ୟଜନକ! ଆପଣ ଆପଣଙ୍କ ସମୟକୁ ଭଲ ଭାବରେ ସନ୍ତୁଳନ କରନ୍ତି ଏବଂ ଅଧ୍ୟୟନ, ଖେଳ ଏବଂ ଆପଣଙ୍କ ରୁଚିରେ ନିୟୋଜିତ ଅଟନ୍ତି । ବହୁତ ଭଲ ଚାଲିଛି!`);

                $(".sec3d-msg").removeClass('d-none');

            } else if (data == 'd' || data == 'b' || data == 'c')

            {

                $(".sec3d-msg").html(`ଆପଣ ମନୋରଞ୍ଜନ ଏବଂ ମଜା ପାଇଁ ଅଧିକ ସମୟ ଦେଉଥିବା ପରି ମନେ ହୁଏ । ଏଗୁଡ଼ିକ ଆମ ଦିନ ପାଇଁ ଜରୁରୀ, କିନ୍ତୁ ସଠିକ୍ ପରିମାଣରେ ଏବଂ ସେମାନଙ୍କୁ ପାଠପଢ଼ା ସହିତ ସଠିକ ଭାବରେ ସନ୍ତୁଳନ କରି, ଆମର ସୌଖ ପୂରଣ କରିବା ଏବଂ ଆମ ପରିବାରକୁ ସାହାଯ୍ୟ କରିବା । ସ୍କ୍ରିନ୍ କମ୍ ସମୟ ଦେଖିବାକୁ ଚେଷ୍ଟା କରନ୍ତୁ, ଏବଂ ଚିନ୍ତା କରନ୍ତୁ ଯେ ଆପଣ କିପରି ଆପଣଙ୍କ ର ସାମର୍ଥ୍ୟକୁ ଉନ୍ନତ କରିବା ପାଇଁ ଅଧିକ ସମୟ ବିତାଇପାରିବେ!`);

                $(".sec3d-msg").removeClass('d-none');

            }

        }

        function sec3e(data)

        {

            if (data == 'a' || data == 'b' || data == 'c')

            {

                $(".sec3e-msg").html(`ଆଶ୍ଚର୍ଯ୍ୟଜନକ! ଆପଣ ଆପଣଙ୍କ ସମୟକୁ ଭଲ ଭାବରେ ସନ୍ତୁଳନ କରନ୍ତି ଏବଂ ଅଧ୍ୟୟନ, ଖେଳ ଏବଂ ଆପଣଙ୍କ ରୁଚିରେ ନିୟୋଜିତ ଅଟନ୍ତି । ବହୁତ ଭଲ ଚାଲିଛି!`);

                $(".sec3e-msg").removeClass('d-none');

            } else if (data == 'd')

            {

                $(".sec3e-msg").html(`ଏହା ବହୁତ ଭଲ ଯେ ଆପଣ ନିଜର ସୌଖ ଏବଂ ଆଗ୍ରହ ଉପରେ ସମୟ ବିତାଉଛନ୍ତି! ତେବେ ସନ୍ତୁଳିତ ଜୀବନ ପାଇଁ ପାଠପଢ଼ା, ଖେଳିବା ଓ ପରିବାରକୁ ସାହାଯ୍ୟ କରିବା ପାଇଁ ଅଧିକ ସମୟ ଦେବାକୁ ଚେଷ୍ଟା କରନ୍ତୁ। ଏହା ଆପଣଙ୍କୁ ଜଣେ ଭଲ ବ୍ୟକ୍ତି ହେବାରେ ସାହାଯ୍ୟ କରିବ ।`);

                $(".sec3e-msg").removeClass('d-none');

            }

        }
    </script>

    <!--click tracking part js-->

    <script>
        // --- TRACK WEAKNESS FORM ---

        function trackWeaknessSelections() {

            const formType = 'weakness_follow';



            // Emotional area

            const emotionalSelect = document.querySelector('#Tab1 select');

            if (emotionalSelect && emotionalSelect.value && emotionalSelect.value !== 'Select') {

                const itemName = emotionalSelect.value.trim();

                const itemId = generateItemId(itemName);



                fetch('admin/track_form_click.php', {

                        method: 'POST',

                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },

                        body: `form_type=${formType}&click_type=emotional_area&item_id=${itemId}&item_name=${encodeURIComponent(itemName)}`

                    })

                    .then(r => r.text())

                    .then(d => console.log("Emotional:", d));

            }



            // Study area

            const studySelect = document.querySelector('#Tab2 select');

            if (studySelect && studySelect.value && studySelect.value !== 'Select') {

                const itemName = studySelect.value.trim();

                const itemId = generateItemId(itemName);



                fetch('admin/track_form_click.php', {

                        method: 'POST',

                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },

                        body: `form_type=${formType}&click_type=study_area&item_id=${itemId}&item_name=${encodeURIComponent(itemName)}`

                    })

                    .then(r => r.text())

                    .then(d => console.log("Study:", d));

            }

        }



        // --- TRACK CAREER ---

        function trackCareerSelection() {

            const select = document.getElementById('field5');



            if (select && select.value && select.value !== 'Select') {

                const itemName = select.value.trim();

                const itemId = generateItemId(itemName);



                fetch('admin/track_form_click.php', {

                        method: 'POST',

                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },

                        body: `form_type=weakness_follow&click_type=career_selection&item_id=${itemId}&item_name=${encodeURIComponent(itemName)}`

                    })

                    .then(r => r.text())

                    .then(d => console.log("Career:", d));

            }

        }



        // --- HASH ID GENERATOR ---

        function generateItemId(text) {

            let hash = 0;

            for (let i = 0; i < text.length; i++) {

                const char = text.charCodeAt(i);

                hash = ((hash << 5) - hash) + char;

                hash = hash & hash;

            }

            return Math.abs(hash).toString();

        }



        // --- FINAL SUBMIT BUTTONS CORRECTED ---

        function submitWeaknessWithTracking() {

            trackWeaknessSelections();

            weaknesshCard(); // FIXED NAME

        }



        function submitCareerWithTracking() {

            trackCareerSelection();

            printthankyoureload();

        }

        function trackDropdown(selectElement, category) {

            let value = selectElement.value;

            // Handle "Any Other Option"
            if (value === "") {
                value = "other";
            }

            trackPageClick([
                category, // parent_page
                value // selected option
            ]);
        }


   $(document).on('click', '.card', function (e) {

    let text = '';

    if ($(this).attr('id') === 'card12') {
        text = $(this).find('.editable-field').text().trim();

        if (!text) {
            text = "Custom Strength";
        }
    } else {
        text = $(this).find('span').attr('t') || $(this).text().trim();
    }

    let flow = ["Strength Selection", text];

    trackPageClick(flow, this);
});
        function trackDropdownChange(el) {

            let value = el.value;

            if (value !== "Select" && value !== "") {
                trackPageClick([
                    "career_selection",
                    // "dropdown_change",
                    value
                ], el);
            }
        }
    </script>







</body>



</html>