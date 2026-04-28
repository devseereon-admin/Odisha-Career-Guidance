<?php
include "dbconn.php";
mysqli_select_db($conn, "ama_career_odia");

$event_id = $_GET['id'] ?? '';
$img_id   = $_GET['img_id'] ?? '';

if (!$event_id) {
    echo "Invalid Event";
    exit;
}

/* ---------- FETCH EVENT ---------- */
$event = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM events WHERE id='$event_id'"));

/* ---------- FETCH IMAGE ---------- */
$editData = null;
if ($img_id) {
    $img_id = intval($img_id);
    $editData = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM event_images WHERE id='$img_id'"));
}

/* ---------- AJAX SAVE ---------- */
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['ajax_submit'])) {

    $response = ['success' => false];
    $uploadDir = "../od/upload/events/";

    if (!file_exists($uploadDir)) mkdir($uploadDir, 0777, true);

    $priority = $_POST['priority'];

    // AUTO PRIORITY
    if (empty($priority)) {
        $res = mysqli_fetch_assoc(mysqli_query($conn,
            "SELECT MAX(priority) as maxp FROM event_images WHERE event_id='$event_id'"
        ));
        $priority = ($res['maxp'] ?? 0) + 1;
    }

    /* ===== UPDATE ===== */
    if ($img_id && $editData) {

        $imageName = $editData['image'];

        if (!empty($_FILES['image']['name'])) {

            $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

            if (in_array($ext, ['jpg','jpeg','png','gif'])) {

                $newName = time().rand(1000,9999).".".$ext;

                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir.$newName)) {

                    if (file_exists($uploadDir.$imageName)) {
                        unlink($uploadDir.$imageName);
                    }

                    $imageName = $newName;
                }
            }
        }

        mysqli_query($conn, "UPDATE event_images 
            SET image='$imageName', priority='$priority' 
            WHERE id='$img_id'");

        $response['success'] = true;
    }

    /* ===== INSERT ===== */
    else {

        if (!empty($_FILES['image']['name'])) {

            $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

            if (in_array($ext, ['jpg','jpeg','png','gif'])) {

                $newName = time().rand(1000,9999).".".$ext;

                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir.$newName)) {

                    mysqli_query($conn, "INSERT INTO event_images(event_id,image,priority)
                    VALUES('$event_id','$newName','$priority')");

                    $response['success'] = true;
                }
            }
        }
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
.loader {
    display:none;
    position:fixed;
    width:100%;
    height:100%;
    background:rgba(255,255,255,0.8);
    top:0;
    left:0;
    z-index:9999;
    text-align:center;
    padding-top:20%;
}
.image-preview {
    display:none;
    margin-top:10px;
}
.image-preview img {
    max-width:200px;
    border:1px solid #ddd;
    padding:5px;
}
</style>

</head>

<body>

<!-- Loader -->

        <div class="loader">

            <i class="fa fa-spinner fa-spin fa-3x"></i>

            <h4>Processing...</h4>

        </div>



        <!-- START TOPBAR -->

        <div class='page-topbar '>

            <div class='logo-area'></div>

        </div>

        <!-- END TOPBAR -->


<div class='page-topbar'><div class='logo-area'></div></div>

<div class="page-container row-fluid">

 <!-- SIDEBAR - START -->

            <div class="page-sidebar ">

                <div class="page-sidebar-wrapper" id="main-menu-wrapper"> 

                    <?php include "admcommon/side-menu.php"; ?>

                </div>

                <div class="project-info"></div>

            </div>

            <!--  SIDEBAR - END -->

<section id="main-content">
<section class="wrapper main-wrapper">

<div class="col-xl-12">
    <h1 class="title">EVENT IMAGE</h1>
</div>

<div class="col-xl-12">

<a href="event-gallery.php?id=<?= $event_id ?>" class="btn btn-secondary">
    <i class="fa fa-arrow-left"></i> Back to Gallery
</a>

<section class="box">
<header class="panel_header">
    <h2 class="title"><?= $img_id ? 'Edit Image' : 'Add Image' ?></h2>
</header>

<div class="content-body">

<form id="eventForm" enctype="multipart/form-data">

<input type="hidden" name="ajax_submit" value="1">

<!-- IMAGE -->
<div class="form-group">
    <label>Image <span class="text-danger">*</span></label>
    <input type="file" name="image" id="image" class="form-control" <?= !$img_id ? 'required' : '' ?>>

    <?php if($editData){ ?>
        <div class="image-preview" style="display:block;">
            <label>Current:</label><br>
            <img src="../od/upload/events/<?= $editData['image'] ?>">
        </div>
    <?php } ?>

    <div class="image-preview" id="preview">
        <img src="">
    </div>
</div>

<!-- PRIORITY -->
<div class="form-group">
    <label>Priority</label>
    <input type="number" name="priority" class="form-control"
        placeholder="Auto-generated if empty"
        value="<?= $editData['priority'] ?? '' ?>">
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

</form>

</div>
</section>

</div>

</section>
</section>
</div>

<script>
$("#image").change(function(){
    let reader = new FileReader();
    reader.onload = function(e){
        $("#preview img").attr("src", e.target.result);
        $("#preview").show();
    }
    reader.readAsDataURL(this.files[0]);
});

$("#eventForm").submit(function(e){
    e.preventDefault();

    let formData = new FormData(this);

    $(".loader").show();

    $.ajax({
        url:"",
        type:"POST",
        data:formData,
        processData:false,
        contentType:false,
        dataType:"json",

        success:function(res){
            $(".loader").hide();

            if(res.success){
                swal("Success","Saved Successfully","success");
                $("#eventForm")[0].reset();
                $("#preview").hide();
            } else {
                swal("Error","Upload failed","error");
            }
        },

        error:function(){
            $(".loader").hide();
            swal("Error","Server Error","error");
        }
    });
});
</script>

</body>
</html>