<?php

include 'admin/dbconn.php';

?>

<!DOCTYPE html>

<html>


<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Ama Career</title>

  <meta name="description" content="">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <style>
    .event-card {
      background: #fff;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      transition: 0.3s;
    }

    /* .event-card:hover {
  transform: translateY(-5px);
} */

    .event-img {
      position: relative;
    }

    .event-img img {
      width: 100%;
      height: 220px;
      object-fit: cover;
    }

    /* Overlay effect */
    .event-img::after {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      height: 100%;
      width: 100%;
      background: rgba(0, 0, 0, 0.3);
      opacity: 0;
      transition: 0.3s;
    }

    .event-card:hover .event-img::after {
      opacity: 1;
    }

    .event-content {
      padding: 15px;
    }

    .event-content h5 {
      font-weight: 600;
      margin-bottom: 10px;
    }

    .event-date,
    .event-location {
      font-size: 14px;
      color: #666;
      margin-bottom: 5px;
    }

    #gallery {

      padding-top: 40px;

    }

    @media screen and (min-width: 991px) {

      #gallery {

        padding: 30px 30px 60px 30px;

      }

    }



    .img-wrapper {

      position: relative;

      margin-top: 15px;

    }

    .img-wrapper img {

      width: 100%;

    }



    .img-overlay {

      background: rgba(0, 0, 0, 0.7);

      width: 100%;

      height: 100%;

      position: absolute;

      top: 0;

      left: 0;

      display: flex;

      justify-content: center;

      align-items: center;

      opacity: 0;

    }

    .img-overlay i {

      color: #fff;

      font-size: 3em;

    }



    #overlay {

      background: rgba(0, 0, 0, 0.7);

      width: 100%;

      height: 100%;

      position: fixed;

      top: 0;

      left: 0;

      display: flex;

      justify-content: center;

      align-items: center;

      z-index: 999;

      -webkit-user-select: none;

      -moz-user-select: none;

      -ms-user-select: none;

      user-select: none;

    }

    #overlay img {

      margin: 0;

      width: 80%;

      height: auto;

      object-fit: contain;

      padding: 5%;

    }

    @media screen and (min-width:768px) {

      #overlay img {

        width: 60%;

      }

    }

    @media screen and (min-width:1200px) {

      #overlay img {

        width: 50%;

      }

    }



    #nextButton {

      color: #fff;

      font-size: 2em;

      transition: opacity 0.8s;

    }

    #nextButton:hover {

      opacity: 0.7;

    }

    @media screen and (min-width:768px) {

      #nextButton {

        font-size: 3em;

      }

    }



    #prevButton {

      color: #fff;

      font-size: 2em;

      transition: opacity 0.8s;

    }

    #prevButton:hover {

      opacity: 0.7;

    }

    @media screen and (min-width:768px) {

      #prevButton {

        font-size: 3em;

      }

    }



    #exitButton {

      color: #fff;

      font-size: 2em;

      transition: opacity 0.8s;

      position: absolute;

      top: 15px;

      right: 15px;

    }

    #exitButton:hover {

      opacity: 0.7;

    }

    @media screen and (min-width:768px) {

      #exitButton {

        font-size: 3em;

      }

    }
  </style>



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

              <a href="event.php" class="language-eng">English</a>

            </div>

            <div class="language-od">

              <a href="od/event.php" class="language-odia">ଓଡିଆ</a>

            </div>

          </div>

        </nav>

      </div>

    </div>

  </section>

  <!------ header end ------------->



  <section id="gallery">
    <div class="container">
      <h1 class="heading-one1"> Our Events</h1>

      <div class="row">
        <?php
        $stm_sql = mysqli_query($conn, "SELECT * FROM events ORDER BY priority ASC");
        while ($res_stm = mysqli_fetch_array($stm_sql)) {
        ?>

          <div class="col-lg-4 col-md-6 mb-4">
            <a href="view-events.php?id=<?= $res_stm['id'] ?>" style="text-decoration:none;color:inherit;">

              <div class="event-card">

                <div class="event-img">
                  <img src="upload/events/<?= $res_stm['cover_image'] ?>" alt="event">
                </div>

                <div class="event-content">
                  <h5><?= $res_stm['event_name'] ?></h5>

                  <p class="event-date">
                    <i class="fa fa-calendar"></i> <?= $res_stm['event_date'] ?>
                  </p>

                  <p class="event-location">
                    <i class="fa fa-map-marker"></i> <?= $res_stm['location'] ?>
                  </p>
                </div>

              </div>

            </a>
          </div>

        <?php } ?>
      </div>
    </div>
  </section>









  <!-- -------------footer start---------- -->

  <?php include "include/before-footer.php"; ?>

  <!-- -------------footer end---------- -->

</body>

<script>
  // Gallery image hover

  $(".img-wrapper").hover(

    function() {

      $(this).find(".img-overlay").animate({
        opacity: 1
      }, 600);

    },
    function() {

      $(this).find(".img-overlay").animate({
        opacity: 0
      }, 600);

    }

  );



  // Lightbox

  var $overlay = $('<div id="overlay"></div>');

  var $image = $("<img>");

  var $prevButton = $('<div id="prevButton"><i class="fa fa-chevron-left"></i></div>');

  var $nextButton = $('<div id="nextButton"><i class="fa fa-chevron-right"></i></div>');

  var $exitButton = $('<div id="exitButton"><i class="fa fa-times"></i></div>');



  // Add overlay

  $overlay.append($image).prepend($prevButton).append($nextButton).append($exitButton);

  $("#gallery").append($overlay);



  // Hide overlay on default

  $overlay.hide();



  // When an image is clicked

  $(".img-overlay").click(function(event) {

    // Prevents default behavior

    event.preventDefault();

    // Adds href attribute to variable

    var imageLocation = $(this).prev().attr("href");

    // Add the image src to $image

    $image.attr("src", imageLocation);

    // Fade in the overlay

    $overlay.fadeIn("slow");

  });



  // When the overlay is clicked

  $overlay.click(function() {

    // Fade out the overlay

    $(this).fadeOut("slow");

  });



  // When next button is clicked

  $nextButton.click(function(event) {

    // Hide the current image

    $("#overlay img").hide();

    // Overlay image location

    var $currentImgSrc = $("#overlay img").attr("src");

    // Image with matching location of the overlay image

    var $currentImg = $('#image-gallery img[src="' + $currentImgSrc + '"]');

    // Finds the next image

    var $nextImg = $($currentImg.closest(".image").next().find("img"));

    // All of the images in the gallery

    var $images = $("#image-gallery img");

    // If there is a next image

    if ($nextImg.length > 0) {

      // Fade in the next image

      $("#overlay img").attr("src", $nextImg.attr("src")).fadeIn(800);

    } else {

      // Otherwise fade in the first image

      $("#overlay img").attr("src", $($images[0]).attr("src")).fadeIn(800);

    }

    // Prevents overlay from being hidden

    event.stopPropagation();

  });



  // When previous button is clicked

  $prevButton.click(function(event) {

    // Hide the current image

    $("#overlay img").hide();

    // Overlay image location

    var $currentImgSrc = $("#overlay img").attr("src");

    // Image with matching location of the overlay image

    var $currentImg = $('#image-gallery img[src="' + $currentImgSrc + '"]');

    // Finds the next image

    var $nextImg = $($currentImg.closest(".image").prev().find("img"));

    // Fade in the next image

    $("#overlay img").attr("src", $nextImg.attr("src")).fadeIn(800);

    // Prevents overlay from being hidden

    event.stopPropagation();

  });



  // When the exit button is clicked

  $exitButton.click(function() {

    // Fade out the overlay

    $("#overlay").fadeOut("slow");

  });
</script>

</html>