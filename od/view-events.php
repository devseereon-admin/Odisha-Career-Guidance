<?php
include 'admin/dbconn.php';

$id = $_GET['id'] ?? '';

if (!$id) {
    echo "ଅବୈଧ ଇଭେଣ୍ଟ";
    exit;
}

// Fetch single event
$query = mysqli_query($conn, "SELECT * FROM events WHERE id='$id'");
$event = mysqli_fetch_assoc($query);
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

    <style>
        .gallery-img {
            width: 100%;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .description-text {
            font-size: 15px;
            font-weight: 400;
            word-break: break-word;
            color: #000;
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

        /* Hover overlay */
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
            background: rgba(0, 0, 0, 0.8);
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
            padding: 5%;
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
        @media (max-width: 576px) {
    .reports-btn .btn {
        font-size: 16px;
        padding: 6px 10px; /* adjust size */
    }
}
       
    </style>
</head>

<body>

    <!-- HEADER -->
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

                            <div class="language-od">
                                <!-- Switch to English -->
                                <a href="../view-events.php?id=<?php echo $id; ?>" class="language-odia">
                                    English
                                </a>
                            </div>

                            <div class="language-en">
                                <!-- Switch to Odia -->
                                <a href="view-events.php?id=<?php echo $id; ?>" class="language-eng">
                                    ଓଡିଆ
                                </a>
                            </div>

                        </div>



                </div>

                </nav>

            </div>

        </div>

        </div>

    </section>

    <!-- ===== EVENT DETAILS ===== -->
    <div class="container mt-5">

        <h1 class="heading-one1 text-center">ଆମର ଇଭେଣ୍ଟଗୁଡ଼ିକ</h1>

        <!-- TITLE -->
        <div class="mt-4">
            <h2><b><?= $event['event_name'] ?></b></h2>

            <p>
                <i class="fa fa-calendar"></i> <?= $event['event_date'] ?> <br>
                <i class="fa fa-map-marker"></i> <?= $event['location'] ?>
            </p>
        </div>

        <!-- DESCRIPTION + IMAGE -->
        <div class="row align-items-center mt-3">

            <!-- DESCRIPTION -->
            <div class="col-md-8">
                <p class="description-text">
                    <b>ବିବରଣୀ:</b><br>
                    <?= $event['description'] ?>
                </p>

                <!-- BUTTONS -->
                <div class="mt-3 mb-3 reports-btn">
                    <?php if (!empty($event['report_file'])) { ?>
                        <a href="../od/od/upload/events/reports/<?= $event['report_file'] ?>"
                            class="btn btn-primary btn-sm text-nowrap px-2">
                            Get Details
                        </a>
                    <?php } ?>

                    <?php if (!empty($event['youtube_link']) && $event['show_youtube']) { ?>
                        <a href="<?= $event['youtube_link'] ?>"
                            class="btn btn-primary btn-sm text-nowrap px-2">
                            View More
                        </a>
                    <?php } ?>

                    <?php if (!empty($event['attendance_link']) && $event['show_attendance']) { ?>
                        <a href="<?= $event['attendance_link'] ?>"
                            class="btn btn-primary btn-sm text-nowrap px-2">
                            Attendance
                        </a>
                    <?php } ?>
                </div>
            </div>

            <!-- IMAGE -->
            <div class="col-md-4 text-center">
                <img src="od/upload/events/<?= $event['cover_image'] ?>" class="img-fluid rounded">
            </div>

        </div>

        <!-- ===== GALLERY ===== -->
        <section id="gallery" class="mt-4">

            <h3 class="text-center heading-one1">ଗ୍ୟାଲେରି</h3>

            <div id="image-gallery">
                <div class="row">

                    <?php
                    $images = mysqli_query($conn, "SELECT * FROM event_images WHERE event_id='$id' ORDER BY priority ASC");

                    while ($img = mysqli_fetch_assoc($images)) {
                    ?>
                        <div class="col-md-3 col-sm-6 image">
                            <div class="img-wrapper">

                                <a href="od/upload/events/<?= $img['image'] ?>">
                                    <img src="od/upload/events/<?= $img['image'] ?>" class="img-fluid">
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

        <script>
            // Overlay create
            var $overlay = $('<div id="overlay"></div>');
            var $image = $("<img>");
            var $prevButton = $('<div id="prevButton"><i class="fa fa-chevron-left"></i></div>');
            var $nextButton = $('<div id="nextButton"><i class="fa fa-chevron-right"></i></div>');
            var $exitButton = $('<div id="exitButton"><i class="fa fa-times"></i></div>');

            $overlay.append($image).prepend($prevButton).append($nextButton).append($exitButton);
            $("#gallery").append($overlay);
            $overlay.hide();

            // Click image
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

            // Prevent close when clicking image
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

            // Exit button
            $exitButton.click(function() {
                $overlay.fadeOut();
            });
        </script>
</body>

</html>