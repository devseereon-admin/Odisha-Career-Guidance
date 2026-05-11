<?php
include "dbconn.php";

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
             <div class="project-info"></div>

    </div>

    <!-- CONTENT -->
    <section id="main-content">
        <section class="wrapper main-wrapper">

            <div class='col-xl-12'>
                <div class="page-title">
                    <div class="float-left">
                        <h1 class="title">MY CAREER Photos</h1>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="col-xl-12">
                <section class="box">

                    <header class="panel_header">
                        <h2 class="title float-left">List Of Photos</h2>

                        <div class="actions panel_actions float-right">
                            <a href="add-my-career-images.php" 
                               style="background-color:#0f3970;color:#fff;padding:10px;border-radius:10px;">
                                Add New
                            </a>
                        </div>
                    </header>

                    <div class="content-body">

                        <div class="table-container">
                            <table id="example-11" class="table table-striped display" width="100%">

                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Priority</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>

                                <?php
                                $sql = mysqli_query($conn, "SELECT * FROM my_career_images ORDER BY priority ASC");

                                while($row = mysqli_fetch_assoc($sql)){
                                ?>
                                    <tr>

                                        <td>
                                            <img src="../upload/my-career/<?=$row['image']?>"
                                                 style="width:100px;height:100px;">
                                        </td>

                                        <td><?=$row['priority']?></td>

                                        <td>
                                            <a href="add-my-career-images.php?id=<?=$row['id']?>">Edit</a> |
                                           <a href="add-my-career-images.php?delete_id=<?=$row['id']?>"
                                                  onclick="return confirm('Are you sure?')">
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