<?php
include "dbconn.php";
mysqli_select_db($conn, "ama_career");

$event_id = $_GET['id'] ?? '';
$delete_id = $_GET['delete_id'] ?? '';

if (!$event_id) {
    echo "Invalid Event";
    exit;
}

/* ---------- DELETE IMAGE ---------- */
if ($delete_id) {

    $getImg = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM event_images WHERE id='$delete_id'"));

    if ($getImg) {
        $file = "../upload/events/" . $getImg['image'];

        if (file_exists($file)) {
            unlink($file);
        }

        mysqli_query($conn, "DELETE FROM event_images WHERE id='$delete_id'");
    }

    echo "<script>window.location='event-gallery.php?id=$event_id';</script>";
    exit;
}

/* FETCH EVENT */
$event = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM events WHERE id='$event_id'"));
?>

<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<title>Event Photos</title>

<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/fonts/font-awesome/css/font-awesome.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">
<link href="assets/css/responsive.css" rel="stylesheet">

<link href="assets/plugins/datatables/css/datatables.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<style>
.img-thumb {
    width: 100px;
    height: 80px;
    object-fit: cover;
    border-radius: 6px;
}
.table-container {
    overflow-x: auto;
}
</style>

</head>

<body>

<div class='page-topbar'>
    <div class='logo-area'></div>
</div>

<div class="page-container row-fluid">

    <div class="page-sidebar">
        <div class="page-sidebar-wrapper" id="main-menu-wrapper">
            <?php include "admcommon/side-menu.php"; ?>
        </div>
    </div>

    <section id="main-content">
        <section class="wrapper main-wrapper">

            <div class="col-xl-12">
                <div class="page-title">
                    <h1 class="title">
                        EVENT PHOTOS (<?= $event['event_name'] ?>)
                    </h1>
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
                        <h2 class="title float-left">List Of Photos</h2>

                        <div class="actions panel_actions float-right">
                            <a href="add-event-images.php?id=<?= $event_id ?>"
                               style="background:#0f3970;color:#fff;padding:10px;border-radius:10px;">
                                Add New
                            </a>
                        </div>
                    </header>

                    <div class="content-body">

                        <div class="table-container">
                            <table id="example-11" class="table table-striped display" width="100%">

                                <thead>
                                    <tr>
                                        <!-- <th>Thumbnail</th> -->
                                        <th>Image</th>
                                        <th>Priority</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>

                                <?php
                                $sql = mysqli_query($conn, "SELECT * FROM event_images WHERE event_id='$event_id' ORDER BY priority ASC");

                                while($row = mysqli_fetch_assoc($sql)){
                                ?>
                                    <tr>

                                        <!-- <td>
                                            <img src="../upload/events/<?= $row['image'] ?>" class="img-thumb">
                                        </td> -->

                                        <td>
                                            <img src="../upload/events/<?= $row['image'] ?>" class="img-thumb">
                                        </td>

                                        <td><?= $row['priority'] ?></td>

                                        <td>
                                            <a href="add-event-images.php?id=<?= $event_id ?>&img_id=<?= $row['id'] ?>">
                                                Edit
                                            </a> |

                                            <a href="event-gallery.php?id=<?= $event_id ?>&delete_id=<?= $row['id'] ?>"
                                               onclick="return confirm('Delete this image?')">
                                               Delete
                                            </a>
                                        </td>

                                    </tr>
                                <?php } ?>

                                </tbody>

                            </table>
                        </div>

                    </div>
                </section>
            </div>

        </section>
    </section>

</div>

<script src="assets/js/jquery-3.4.1.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/plugins/datatables/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function () {
    $('#example-11').DataTable({
        pageLength: 10,
        lengthMenu: [5,10,25,50,100],
        scrollX: true
    });
});
</script>

</body>
</html>