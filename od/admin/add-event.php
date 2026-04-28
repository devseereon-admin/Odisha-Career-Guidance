<?php
include "dbconn.php";

/* ---------- SELECT DATABASE ---------- */
mysqli_select_db($conn, "ama_career_odia");

/* ---------- TABLES ---------- */
mysqli_query($conn, "CREATE TABLE IF NOT EXISTS events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    event_name VARCHAR(255),
    description TEXT,
    location VARCHAR(255),
    event_date DATE,
    cover_image VARCHAR(255),
    priority INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");

mysqli_query($conn, "CREATE TABLE IF NOT EXISTS event_images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    event_id INT,
    image VARCHAR(255),
    priority INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");

/* ---------- FUNCTIONS ---------- */
function isImage($ext)
{
    return in_array($ext, ['jpg', 'jpeg', 'png', 'gif']);
}

function uploadFile($file, $path)
{
    if ($file['error'] != 0) return null;

    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!isImage($ext)) return null;

    if (!file_exists($path)) mkdir($path, 0777, true);

    $name = time() . rand(1000, 9999) . "." . $ext;
    move_uploaded_file($file['tmp_name'], $path . $name);
    return $name;
}

function getNextPriority($conn)
{
    $q = mysqli_query($conn, "SELECT MAX(priority) as p FROM events");
    $r = mysqli_fetch_assoc($q);
    return ($r['p'] ?? 0) + 1;
}

function uploadDocument($file, $path)
{

    if (!isset($file) || $file['error'] != 0) {
        return null;
    }

    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    if (!in_array($ext, ['pdf', 'doc', 'docx'])) {
        return null;
    }

    if (!file_exists($path)) {
        mkdir($path, 0777, true);
    }

    $name = time() . rand(1000, 9999) . "." . $ext;

    if (move_uploaded_file($file['tmp_name'], $path . $name)) {
        return $name;
    } else {
        return null;
    }
}

/* ---------- EDIT FETCH ---------- */
$id = $_GET['id'] ?? '';
$event = [];

if (!empty($id)) {
    $res = mysqli_query($conn, "SELECT * FROM events WHERE id='$id'");
    $event = mysqli_fetch_assoc($res);
}

/* ---------- DELETE ---------- */
if (isset($_GET['delete_id'])) {

    $deleteId = $_GET['delete_id'];

    // delete cover
    $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT cover_image FROM events WHERE id='$deleteId'"));
    if (!empty($row['cover_image'])) {
        $file = "../od/upload/events/" . $row['cover_image'];
        if (file_exists($file)) unlink($file);
    }

    // delete gallery
    $imgs = mysqli_query($conn, "SELECT image FROM event_images WHERE event_id='$deleteId'");
    while ($img = mysqli_fetch_assoc($imgs)) {
        $file = "../od/upload/events/" . $img['image'];
        if (file_exists($file)) unlink($file);
    }

    mysqli_query($conn, "DELETE FROM event_images WHERE event_id='$deleteId'");
    mysqli_query($conn, "DELETE FROM events WHERE id='$deleteId'");

    header("Location: events-list.php");
    exit;
}

/* ---------- AJAX SAVE ---------- */
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['ajax_submit'])) {

    $res = ['success' => false];

    $id = $_POST['id'] ?? '';

    $event_name = $_POST['event_name'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $event_date = $_POST['event_date'];
    $priority = $_POST['priority'];

    if (empty($priority)) {
        $priority = getNextPriority($conn);
    }


    $uploadDir = "../od/upload/events/";
    if (!file_exists($uploadDir)) mkdir($uploadDir, 0777, true);

    $newCover = uploadFile($_FILES['cover_image'], $uploadDir);

    $reportDir = "../od/upload/events/reports/";

    if (!file_exists($reportDir)) {
        mkdir($reportDir, 0777, true);
    }

    $report = null;

    if (isset($_FILES['report_file']) && $_FILES['report_file']['error'] == 0) {
        $report = uploadDocument($_FILES['report_file'], $reportDir);
    }

    $youtube_link = $_POST['youtube_link'];
    $attendance_link = $_POST['attendance_link'];

    $show_youtube = isset($_POST['show_youtube']) ? 1 : 0;
    $show_attendance = isset($_POST['show_attendance']) ? 1 : 0;

    /* ---------- INSERT ---------- */
    if (empty($id)) {

        if (!$newCover) {
            $res['message'] = "Cover image required";
            echo json_encode($res);
            exit;
        }

        mysqli_query($conn, "INSERT INTO events(event_name,description,location,event_date,cover_image,priority,report_file,youtube_link,attendance_link,show_youtube,show_attendance)
        VALUES('$event_name','$description','$location','$event_date','$newCover','$priority','$report','$youtube_link','$attendance_link','$show_youtube','$show_attendance')");

        $event_id = mysqli_insert_id($conn);
    }
    /* ---------- UPDATE ---------- */ else {

        $old = mysqli_fetch_assoc(mysqli_query($conn, "SELECT cover_image, report_file FROM events WHERE id='$id'"));

        $cover = $old['cover_image'];
        $reportFile = $old['report_file'];

        /* COVER UPDATE */
        if ($newCover) {
            if (file_exists($uploadDir . $cover)) {
                unlink($uploadDir . $cover);
            }
            $cover = $newCover;
        }

        /* REPORT UPDATE */
        if ($report) {
            if (!empty($reportFile) && file_exists($uploadDir . $reportFile)) {
                unlink($uploadDir . $reportFile);
            }
            $reportFile = $report;
        }

        mysqli_query($conn, "UPDATE events SET
    event_name='$event_name',
    description='$description',
    location='$location',
    event_date='$event_date',
    cover_image='$cover',
    priority='$priority',
    report_file='$reportFile',
    youtube_link='$youtube_link',
    attendance_link='$attendance_link',
    show_youtube='$show_youtube',
    show_attendance='$show_attendance'
WHERE id='$id'");

        $event_id = $id;
    }
    function getNextImagePriority($conn, $event_id)
    {
        $q = mysqli_query($conn, "SELECT MAX(priority) as p FROM event_images WHERE event_id='$event_id'");
        $r = mysqli_fetch_assoc($q);
        return ($r['p'] ?? 0) + 1;
    }
    /* ---------- GALLERY ---------- */
    if (isset($_FILES['gallery'])) {

        $nextPriority = getNextImagePriority($conn, $event_id);

        for ($i = 0; $i < count($_FILES['gallery']['name']); $i++) {

            if ($_FILES['gallery']['error'][$i] == 0) {

                $ext = strtolower(pathinfo($_FILES['gallery']['name'][$i], PATHINFO_EXTENSION));
                if (!isImage($ext)) continue;

                $new = time() . rand(1000, 9999) . "_" . $i . "." . $ext;
                move_uploaded_file($_FILES['gallery']['tmp_name'][$i], $uploadDir . $new);

                mysqli_query($conn, "INSERT INTO event_images(event_id,image,priority)
            VALUES('$event_id','$new','$nextPriority')");

                $nextPriority++; // ✅ increment for next image
            }
        }
    }
    $res['success'] = true;
    $res['message'] = "Saved Successfully";

    echo json_encode($res);
    exit;
}
?>

<!DOCTYPE html>
<html class=" ">

<head>

    <meta charset="utf-8">
    <title>Ama Career - Add Event</title>

    <!-- CORE CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/fonts/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet">

    <style>
        .image-ratio-info {
            background: #f8f9fa;
            border-left: 4px solid #007bff;
            padding: 10px;
            margin-top: 5px;
        }

        .preview img {
            max-width: 200px;
            margin-top: 10px;
        }

        .loader {
            display: none;
            position: fixed;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.8);
            text-align: center;
            padding-top: 20%;
            z-index: 9999;
        }
    </style>

</head>

<body>

    <!-- LOADER -->
    <div class="loader">
        <i class="fa fa-spinner fa-spin fa-3x"></i>
        <h4>Processing...</h4>
    </div>

    <!-- TOPBAR -->
    <div class='page-topbar'>
        <div class='logo-area'></div>
    </div>

    <div class="page-container row-fluid">

        <!-- SIDEBAR -->
        <div class="page-sidebar">
            <div class="page-sidebar-wrapper" id="main-menu-wrapper">
                <?php include "admcommon/side-menu.php"; ?>
            </div>
        </div>

        <!-- CONTENT -->
        <section id="main-content">
            <section class="wrapper main-wrapper">

                <div class="col-xl-12">


                    <div class="page-title">
                        <h1 class="title">Add Event</h1>
                    </div>

                    <!-- Back Button -->

                    <div class="back-btn">

                        <a href="events-list.php" class="btn btn-secondary">

                            <i class="fa fa-arrow-left"></i> Back to Events List

                        </a>

                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="col-xl-12">
                    <section class="box">

                        <header class="panel_header">
                            <h2 class="title float-left">Add Event Details</h2>
                        </header>

                        <div class="content-body">

                            <form id="eventForm" enctype="multipart/form-data">
                                <input type="hidden" name="ajax_submit" value="1">
                                <input type="hidden" name="id" value="<?= $id ?>">
                                <div class="form-group">
                                    <label>Event Name <span class="text-danger">*</span></label>
                                    <input type="text" name="event_name" class="form-control"
                                        value="<?= $event['event_name'] ?? '' ?>" required>
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control"><?= $event['description'] ?? '' ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Location</label>
                                    <input type="text" name="location" class="form-control"
                                        value="<?= $event['location'] ?? '' ?>">
                                </div>

                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="date" name="event_date" class="form-control"
                                        value="<?= $event['event_date'] ?? '' ?>">
                                </div>

                                <div class="form-group">
                                    <label>Priority</label>
                                    <input type="number" name="priority" class="form-control"
                                        value="<?= $event['priority'] ?? '' ?>">
                                </div>

                                <!-- COVER -->
                                <div class="form-group">
                                    <label>Cover Image <span class="text-danger">*</span></label>

                                    <input type="file" id="cover" name="cover_image" class="form-control">

                                    <div class="image-ratio-info">
                                        ✔ Max 5MB <br>
                                        ✔ JPG PNG GIF
                                    </div>

                                    <!-- EXISTING IMAGE -->
                                    <?php if (!empty($event['cover_image'])) { ?>
                                        <div class="preview" style="display:block;">
                                            <label>Current Cover:</label><br>
                                            <img src="../od/upload/events/<?= $event['cover_image'] ?>">
                                        </div>
                                    <?php } ?>

                                    <!-- NEW PREVIEW -->
                                    <div class="preview" id="coverPreview"></div>
                                </div>

                                <!-- GALLERY -->
                                <div class="form-group">
                                    <label>Gallery Images</label>

                                    <input type="file" name="gallery[]" multiple class="form-control">

                                    <div class="image-ratio-info">
                                        ✔ Multiple images <br>
                                        ✔ Max 3MB each
                                    </div>
                                    <?php
                                    if (!empty($id)) {
                                        $gallery = mysqli_query($conn, "SELECT * FROM event_images WHERE event_id='$id'");

                                        if (mysqli_num_rows($gallery) > 0) {
                                    ?>
                                            <div class="form-group">
                                                <label>Current Gallery:</label><br>

                                                <?php while ($g = mysqli_fetch_assoc($gallery)) { ?>
                                                    <div style="display:inline-block; margin:5px; text-align:center;">
                                                        <img src="../od/upload/events/<?= $g['image'] ?>"
                                                            style="width:120px; height:90px; object-fit:cover; border:1px solid #ddd; padding:5px;">
                                                    </div>
                                                <?php } ?>

                                            </div>
                                    <?php }
                                    } ?>
                                </div>
                                <div class="form-group">
    <label>Upload Report (PDF/DOC)</label>
    <input type="file" name="report_file" class="form-control">

    <?php if(!empty($event['report_file'])){ ?>
        <a href="../upload/events/reports/<?= $event['report_file'] ?>" target="_blank">
            View Current Report
        </a>
    <?php } ?>
</div>

<!-- YOUTUBE -->
<div class="form-group">
    <label>YouTube Livestream Link</label>
    <input type="text" name="youtube_link" class="form-control"
           value="<?= $event['youtube_link'] ?? '' ?>">

    <label>
        <input type="checkbox" name="show_youtube"
        <?= !empty($event['show_youtube']) ? 'checked' : '' ?>>
        Show Button
    </label>
</div>

<!-- ATTENDANCE -->
<div class="form-group">
    <label>Attendance Link</label>
    <input type="text" name="attendance_link" class="form-control"
           value="<?= $event['attendance_link'] ?? '' ?>">

    <label>
        <input type="checkbox" name="show_attendance"
        <?= !empty($event['show_attendance']) ? 'checked' : '' ?>>
        Show Button
    </label>
</div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-corner" id="submitBtn">
                                        <i class="fa fa-save"></i> Submit
                                    </button>
                                    <a href="events-list.php" class="btn btn-secondary btn-corner">
                                        <i class="fa fa-times"></i> Cancel
                                    </a>
                                </div>
                            </form>

                        </div>
                    </section>
                </div>

            </section>
        </section>

    </div>

    <!-- JS -->
    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

    <script>
        $("#cover").change(function() {
            let file = this.files[0];

            if (file) {
                let reader = new FileReader();
                reader.onload = e => {
                    $("#coverPreview").html('<img src="' + e.target.result + '">');
                }
                reader.readAsDataURL(file);
            }
        });

        $("#eventForm").submit(function(e) {
            e.preventDefault();

            let file = $("#cover")[0].files[0];
            let hasOldCover = <?= !empty($event['cover_image']) ? 'true' : 'false' ?>;

            // ✅ Only required for new event
            if (!file && !hasOldCover) {
                swal("Error", "Cover required", "error");
                return;
            }

            // ✅ Validate only if new file selected
            if (file) {

                let ext = file.name.split('.').pop().toLowerCase();
                if (!['jpg', 'jpeg', 'png', 'gif'].includes(ext)) {
                    swal("Error", "Invalid format", "error");
                    return;
                }

                if (file.size > 5 * 1024 * 1024) {
                    swal("Error", "Max 5MB", "error");
                    return;
                }
            }

            // ✅ Direct submit (no dimension or ratio check)
            submitForm();
        });

        function submitForm() {

            $(".loader").show();

            let formData = new FormData($("#eventForm")[0]);

            $.ajax({
                url: "",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                dataType: "json",
                success: function(res) {

                    $(".loader").hide();

                    if (res.success) {
                        swal("Success", res.message, "success");
                        $("#eventForm")[0].reset();
                        $("#coverPreview").html('');
                    } else {
                        swal("Error", res.message, "error");
                    }
                }
            });
        }
    </script>

</body>

</html>