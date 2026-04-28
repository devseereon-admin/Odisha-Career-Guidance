<?php
include "dbconn.php";

/* ---------- SELECT DATABASE ---------- */
mysqli_select_db($conn, "ama_career");
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

<link href="assets/plugins/datatables/css/datatables.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<style>
.table-container {
    width: 100%;
    overflow-x: auto;
}
table.dataTable td {
    white-space: nowrap;
    max-width: 250px;
    overflow: hidden;
    text-overflow: ellipsis;
}
table.dataTable td:hover {
    white-space: normal;
}
.event-img {
    width: 100px;
    height: 80px;
    object-fit: cover;
    border-radius: 6px;
}
</style>

</head>

<body>

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

            <div class='col-xl-12'>
                <div class="page-title">
                    <div class="float-left">
                        <h1 class="title">Events List</h1>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="col-xl-12">
                <section class="box">

                    <header class="panel_header">
                        <h2 class="title float-left">All Events</h2>

                        <div class="actions panel_actions float-right">
                            <a href="add-event.php"
                               style="background-color:#0f3970;color:#fff;padding:10px;border-radius:10px;">
                                Add Event
                            </a>
                        </div>
                    </header>

                    <div class="content-body">

                        <div class="table-container">
                            <table id="example-11" class="table table-striped display" width="100%">

                                <thead>
                                    <tr>
                                        <th>Cover</th>
                                        <th>Event Name</th>
                                        <th>Location</th>
                                        <th>Date</th>
                                        <th>Gallery</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>

                                <?php
                                $sql = mysqli_query($conn, "SELECT * FROM events ORDER BY id DESC");

                                while($row = mysqli_fetch_assoc($sql)){
                                    
                                    $event_id = $row['id'];

                                    // Count gallery images
                                    $count = mysqli_fetch_assoc(mysqli_query($conn, 
                                        "SELECT COUNT(*) as total FROM event_images WHERE event_id='$event_id'"
                                    ));
                                ?>
                                    <tr>

                                        <!-- COVER IMAGE -->
                                        <td>
                                            <img src="../upload/events/<?=$row['cover_image']?>" class="event-img">
                                        </td>

                                        <!-- NAME -->
                                        <td><?=$row['event_name']?></td>

                                        <!-- LOCATION -->
                                        <td><?=$row['location']?></td>

                                        <!-- DATE -->
                                        <td><?=$row['event_date']?></td>

                                        <!-- GALLERY COUNT -->
                                        <td><?=$count['total']?> Images</td>

                                        <!-- ACTION -->
                                        <td>
                                            <a href="add-event.php?id=<?=$row['id']?>">Edit</a> |

                                            <a href="add-event.php?delete_id=<?=$row['id']?>"
onclick="return confirm('Delete this event?')">
Delete
</a> |

                                            <a href="event-gallery.php?id=<?=$row['id']?>">View Gallery</a>
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

<!-- JS -->
<script src="assets/js/jquery-3.4.1.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/plugins/datatables/js/dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function () {
    $('#example-11').DataTable({
        pageLength: 10,
        lengthMenu: [5,10,25,50,100],
        scrollX: true,
        autoWidth: false
    });
});
</script>

</body>
</html>