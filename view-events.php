<?php
include 'admin/dbconn.php';

$id = $_GET['id'] ?? '';

if (!$id) {
    echo "Invalid Event";
    exit;
}

$event_id = $id;

// Fetch event
$query = mysqli_query($conn, "SELECT * FROM events WHERE id='$event_id'");
$event = mysqli_fetch_assoc($query);

if (!$event) {
    echo "Event not found";
    exit;
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

    

    <style>
        /* ===== TEXT ===== */
        .description-text {
            font-size: 15px;
            line-height: 30px;
            text-align: justify;
        }

        /* ===== GALLERY GRID ===== */
        .img-wrapper {
            position: relative;
            margin-top: 15px;
        }

        .img-wrapper img {
            width: 100%;
            border-radius: 10px;
        }

        .img-overlay {
            background: rgba(0, 0, 0, 0.7);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;

            display: flex;
            justify-content: center;
            align-items: center;

            opacity: 0;
            transition: 0.4s;
        }

        .img-overlay i {
            color: #fff;
            font-size: 30px;
        }

        .img-wrapper:hover .img-overlay {
            opacity: 1;
        }

        /* ===== LIGHTBOX ===== */
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
        }

        #overlay img {
            width: 80%;
            height: auto;
            object-fit: contain;
            padding: 5%;
        }

        /* Responsive */
        @media (min-width:768px) {
            #overlay img {
                width: 60%;
            }
        }

        @media (min-width:1200px) {
            #overlay img {
                width: 50%;
            }
        }

        /* Buttons */
        #prevButton,
        #nextButton,
        #exitButton {
            position: absolute;
            color: #fff;
            font-size: 30px;
            cursor: pointer;
        }

        #prevButton {
            left: 20px;
        }

        #nextButton {
            right: 20px;
        }

        #exitButton {
            top: 20px;
            right: 20px;
        }
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

      @media (max-width: 576px) {
    .reports-btn .btn {
        font-size: 16px;
        padding: 6px 10px; /* adjust size */
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
</head>

<body>

   
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

    <!-- EVENT DETAILS -->
    <div class="container mt-5">

        <h1 class="heading-one1">Our Events</h1>

        <div class="mt-4">
            <h2><b><?= strtoupper($event['event_name']) ?></b></h2>

            <p>
                <i class="fa fa-calendar"></i> <?= $event['event_date'] ?><br>
                <i class="fa fa-map-marker"></i> <?= $event['location'] ?>
            </p>
        </div>

        <div class="row mt-3">
            <div class="col-12 col-md-8">
                <p class="description-text">
                    <b>Description:</b><br>
                    <?= $event['description'] ?>
                </p>
                <!-- BUTTONS -->
                <div class="mt-3 mb-3 reports-btn ">
                    <!-- REPORT -->
                    <?php if (!empty($event['report_file'])) { ?>
                        <a href="upload/events/reports<?= $event['report_file'] ?>"
                            class="btn btn-primary" target="_blank">
                            Get Details
                        </a>
                    <?php } ?>
                    <?php if (!empty($event['youtube_link']) && $event['show_youtube']) { ?>
                        <a href="<?= $event['youtube_link'] ?>"
                            class="btn btn-primary " target="_blank">
                            View More
                        </a>
                    <?php } ?>
                    <?php if (!empty($event['attendance_link']) && $event['show_attendance']) { ?>
                        <a href="<?= $event['attendance_link'] ?>"
                            class="btn btn-primary" target="_blank">
                            Attendance
                        </a>
                    <?php } ?>

                </div>
            </div>

            <div class="col-md-4 col-12 text-center">
                <img src="upload/events/<?= $event['cover_image'] ?>" class="img-fluid rounded">
            </div>
        </div>

    </div>

    <!-- ===== GALLERY ===== -->
    <section id="gallery" class="container mt-5">

        <h3 class="heading-one1">Gallery</h3>

        <div id="image-gallery">
            <div class="row">

                <?php
                $images = mysqli_query($conn, "SELECT * FROM event_images WHERE event_id='$event_id' ORDER BY priority ASC");

                while ($img = mysqli_fetch_assoc($images)) {
                ?>
                    <div class="col-md-3 col-sm-6 image">
                        <div class="img-wrapper">

                            <a href="upload/events/<?= $img['image'] ?>">
                                <img src="upload/events/<?= $img['image'] ?>" class="img-fluid">
                            </a>

                            <div class="img-overlay">
                                <i class="fa fa-plus-circle"></i>
                            </div>

                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>

    </section>

    <?php include "include/before-footer.php"; ?>

    <!-- ===== JS ===== -->
    <script>
        // Hover animation
        $(".img-wrapper").hover(
            function() {
                $(this).find(".img-overlay").animate({
                    opacity: 1
                }, 300);
            },
            function() {
                $(this).find(".img-overlay").animate({
                    opacity: 0
                }, 300);
            }
        );

        // Lightbox
        var $overlay = $('<div id="overlay"></div>');
        var $image = $("<img>");
        var $prevButton = $('<div id="prevButton"><i class="fa fa-chevron-left"></i></div>');
        var $nextButton = $('<div id="nextButton"><i class="fa fa-chevron-right"></i></div>');
        var $exitButton = $('<div id="exitButton"><i class="fa fa-times"></i></div>');

        $overlay.append($image).prepend($prevButton).append($nextButton).append($exitButton);
        $("#gallery").append($overlay);
        $overlay.hide();

        // Click
        $(".img-overlay").click(function(e) {
            e.preventDefault();
            var src = $(this).prev().attr("href");
            $image.attr("src", src);
            $overlay.fadeIn();
        });

        // Close
        $overlay.click(function() {
            $overlay.fadeOut();
        });

        // Prevent close on image click
        $image.click(function(e) {
            e.stopPropagation();
        });

        // Next
        $nextButton.click(function(e) {
            e.stopPropagation();

            var current = $image.attr("src");
            var img = $('#image-gallery img[src="' + current + '"]');
            var next = img.closest(".image").next().find("img");

            if (next.length) {
                $image.attr("src", next.attr("src"));
            } else {
                $image.attr("src", $("#image-gallery img").first().attr("src"));
            }
        });

        // Prev
        $prevButton.click(function(e) {
            e.stopPropagation();

            var current = $image.attr("src");
            var img = $('#image-gallery img[src="' + current + '"]');
            var prev = img.closest(".image").prev().find("img");

            if (prev.length) {
                $image.attr("src", prev.attr("src"));
            }
        });

        // Exit
        $exitButton.click(function() {
            $overlay.fadeOut();
        });
    </script>

</body>

</html>