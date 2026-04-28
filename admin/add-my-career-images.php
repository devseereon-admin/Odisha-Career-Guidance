<?php
include "dbconn.php";

/* ---------- CONFIG ---------- */
define('EN_DB', 'ama_career');
$EN_DIR = '../upload/my-career/';

/* ---------- CREATE TABLE ---------- */
function checkAndCreateTable($conn)
{
    mysqli_select_db($conn, EN_DB);

    $check = mysqli_query($conn, "SHOW TABLES LIKE 'my_career_images'");
    if (mysqli_num_rows($check) == 0) {
        mysqli_query($conn, "
            CREATE TABLE my_career_images(
                id INT AUTO_INCREMENT PRIMARY KEY,
                image VARCHAR(255),
                priority INT DEFAULT 0,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )
        ");
    }
}
checkAndCreateTable($conn);

/* ---------- FILE UPLOAD ---------- */
function uploadFile($fileKey, $dir)
{
    if (isset($_FILES[$fileKey]) && $_FILES[$fileKey]['error'] == 0) {

        if (!file_exists($dir)) mkdir($dir, 0777, true);

        $ext = strtolower(pathinfo($_FILES[$fileKey]["name"], PATHINFO_EXTENSION));

        if (!in_array($ext, ['jpg','jpeg','png','gif'])) return null;

        $fileName = time().rand(1000,9999).".".$ext;

        if (move_uploaded_file($_FILES[$fileKey]["tmp_name"], $dir.$fileName)) {
            return $fileName;
        }
    }
    return null;
}

/* ---------- PRIORITY ---------- */
function getNextPriority($conn)
{
    mysqli_select_db($conn, EN_DB);

    $res = mysqli_query($conn, "SELECT MAX(priority) as maxp FROM my_career_images");
    $row = mysqli_fetch_assoc($res);
    return ($row['maxp'] ?? 0) + 1;
}

/* ---------- INSERT ---------- */
function insertData($conn, $image, $priority)
{
    mysqli_select_db($conn, EN_DB);

    $q = $conn->prepare("INSERT INTO my_career_images(image, priority) VALUES(?, ?)");
    $q->bind_param("si", $image, $priority);
    return $q->execute();
}

/* ---------- UPDATE ---------- */
function updateData($conn, $id, $image, $priority)
{
    mysqli_select_db($conn, EN_DB);

    if ($image) {
        $q = $conn->prepare("UPDATE my_career_images SET image=?, priority=? WHERE id=?");
        $q->bind_param("sii", $image, $priority, $id);
    } else {
        $q = $conn->prepare("UPDATE my_career_images SET priority=? WHERE id=?");
        $q->bind_param("ii", $priority, $id);
    }

    return $q->execute();
}

/* ---------- DELETE ---------- */
function deleteData($conn, $id)
{
    mysqli_select_db($conn, EN_DB);

    $q = $conn->prepare("DELETE FROM my_career_images WHERE id=?");
    $q->bind_param("i", $id);
    return $q->execute();
}

/* ---------- GET DATA ---------- */
$id = $_GET['id'] ?? '';
$image = '';
$priority = '';

if (!empty($id)) {
    mysqli_select_db($conn, EN_DB);

    $q = $conn->prepare("SELECT * FROM my_career_images WHERE id=?");
    $q->bind_param("i", $id);
    $q->execute();
    $res = $q->get_result();

    if ($res->num_rows > 0) {
        $row = $res->fetch_assoc();
        $image = $row['image'];
        $priority = $row['priority'];
    }
}

/* ---------- DELETE REQUEST ---------- */
if (isset($_GET['delete_id'])) {

    $deleteId = $_GET['delete_id'];

    mysqli_select_db($conn, EN_DB);

    $q = $conn->prepare("SELECT image FROM my_career_images WHERE id=?");
    $q->bind_param("i", $deleteId);
    $q->execute();
    $res = $q->get_result()->fetch_assoc();

    $imageName = $res['image'] ?? '';

    if (!empty($imageName)) {
        $file = $EN_DIR . $imageName;
        if (file_exists($file)) unlink($file);
    }

    deleteData($conn, $deleteId);

    header("Location: my-career-images.php");
    exit;
}

/* ---------- AJAX ---------- */
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['ajax_submit'])) {

    $response = ['success'=>false];

    $id = $_POST['id'] ?? '';
    $priority = $_POST['priority'];

    if (empty($priority)) {
        $priority = getNextPriority($conn);
    }

    /* INSERT */
    if (empty($id)) {

        $image = uploadFile('image', $EN_DIR);

        if ($image) {
            insertData($conn, $image, $priority);
            $response['success'] = true;
        } else {
            $response['message'] = "Upload failed!";
        }

    }
    /* UPDATE */
    else {

        $newImage = uploadFile('image', $EN_DIR);

        updateData($conn, $id, $newImage, $priority);

        $response['success'] = true;
    }

    header("Content-Type: application/json");
    echo json_encode($response);
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Ama Career Admin</title>

    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/fonts/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">

    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

    <style>
        .image-ratio-info {
            background: #f8f9fa;
            border-left: 4px solid #007bff;
            padding: 10px;
            margin-top: 5px;
            font-size: 13px;
        }

        .loader {
            display: none;
            position: fixed;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.8);
            top: 0;
            left: 0;
            z-index: 9999;
            text-align: center;
            padding-top: 20%;
        }

        .image-preview {
            display: none;
            margin-top: 10px;
        }

        .image-preview img {
            max-width: 200px;
            border: 1px solid #ddd;
            padding: 5px;
        }
    </style>

</head>

<body>

    <div class="loader">
        <i class="fa fa-spinner fa-spin fa-3x"></i>
        <h4>Processing...</h4>
    </div>

    <div class='page-topbar'>
        <div class='logo-area'></div>
    </div>

    <div class="page-container row-fluid">

        <!-- SIDEBAR -->
        <div class="page-sidebar">
            <div class="page-sidebar-wrapper" id="main-menu-wrapper">
                <?php include "admcommon/side-menu.php"; ?>
            </div>
            <div class="project-info"></div>

        </div>

        <!-- CONTENT -->
        <section id="main-content">
            <section class="wrapper main-wrapper">

                <div class='col-xl-12'>
                    <div class="page-title">
                        <h1 class="title">CAREER</h1>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="col-xl-12">

                    <!-- BACK BUTTON -->
                    <div style="margin-bottom:20px;">
                        <a href="my-career-images.php" class="btn btn-secondary">
                            <i class="fa fa-arrow-left"></i> Back to Career Photos
                        </a>
                    </div>

                    <section class="box">
                        <header class="panel_header">
                            <h2 class="title float-left">Add Career Photo</h2>
                        </header>

                        <div class="content-body">

                            <form id="careerForm" enctype="multipart/form-data">

                                <input type="hidden" name="id" id="record_id" value="<?= $id ?>">
                                <input type="hidden" name="ajax_submit" value="1">

                                <!-- IMAGE -->
                                <div class="form-group">
                                    <label>Main Image <span class="text-danger">*</span></label>

                                    <input type="file" name="image" id="image" class="form-control" <?= empty($id) ? 'required' : '' ?>>
                                    <div class="image-ratio-info">
                                        <strong>Image Requirements:</strong><br>
                                        - Format: JPG, PNG, GIF<br>
                                        - Max size: 5MB
                                    </div>
                                    <?php if (!empty($image)) { ?>
                                        <div class="image-preview" style="display:block;">
                                            <label>Current Image:</label><br>
                                            <img src="../upload/my-career/<?= $image ?>">
                                            <input type="hidden" name="existing_image" value="<?= $image ?>">
                                        </div>
                                    <?php } ?>

                                    <div class="image-preview" id="preview">
                                        <img src="">
                                    </div>
                                </div>

                                <!-- PRIORITY -->
                                <div class="form-group">
                                    <label>Priority</label>
                                    <input type="number"
                                        name="priority"
                                        class="form-control"
                                        placeholder="Auto-generated if empty"
                                        value="<?= isset($priority) ? htmlspecialchars($priority) : '' ?>">

                                    <small class="text-muted">Lower number = higher priority</small>
                                </div>

                                <button type="submit" class="btn btn-success btn-corner">
                                    <i class="fa fa-save"></i> Submit
                                </button>

                                <a href="my-career-images.php" class="btn btn-secondary btn-corner">
                                    Cancel
                                </a>

                            </form>

                        </div>
                    </section>

                </div>

            </section>
        </section>
    </div>

    <script>
        $(document).ready(function() {

            $("#image").change(function() {
                let reader = new FileReader();

                reader.onload = function(e) {
                    $("#preview img").attr("src", e.target.result);
                    $("#preview").show();
                }

                reader.readAsDataURL(this.files[0]);
            });

            $("#careerForm").submit(function(e) {
                e.preventDefault();

                var file = $("#image")[0].files[0];

                var recordId = $("#record_id").val();

                if (!recordId && !file) {
                    swal("Error", "Image required", "error");
                    return;
                }

                if (file.size > 5 * 1024 * 1024) {
                    swal("Error", "Max 5MB allowed", "error");
                    return;
                }

                $(".loader").show();

                var formData = new FormData(this);

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
                            swal("Success", "Saved Successfully", "success");
                            $("#careerForm")[0].reset();
                            $("#preview").hide();
                        } else {
                            swal("Error", res.message, "error");
                        }
                    },

                    error: function() {
                        $(".loader").hide();
                        swal("Error", "Server Error", "error");
                    }
                });
            });

        });
    </script>

</body>

</html>