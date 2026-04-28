<?php

include "dbconn.php";

?>

<!DOCTYPE html>

<html class=" ">

    <head>

        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />

        <meta charset="utf-8" />

        <title>Ama Career Admin</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <meta content="" name="description" />

        <meta content="" name="author" />

        <?php include 'notification_css_js/notification_js.php'; ?>

    </head>







    <body class=" ">

        <div class='page-topbar '>

            <div class='logo-area'></div>

        </div>

        <!-- START CONTAINER -->

        <div class="page-container row-fluid">

            <!-- MAIN MENU - START -->

            <div class="page-sidebar ">

                <div class="page-sidebar-wrapper" id="main-menu-wrapper"> 

                 <?php include "admcommon/side-menu.php"; ?>

                </div>

            </div>

            

            <section id="main-content">

                <section class="wrapper main-wrapper">

                    

                  <div class="container">

                    <div class="d-flex justify-content-between mb-3">

                      <h3>Notification Manager</h3>

                      <button class="btn btn-primary" onclick="openAdd()">+ Add Notification</button>

                    </div>

                  

                    <input type="text" id="search" class="form-control mb-3" placeholder="Search...">

                  

                    <div id="tableData"></div>

                  </div>

                  

                  

                  <!-- Modal -->

                    <div class="modal fade" id="notifModal">

                      <div class="modal-dialog modal-lg">

                        <div class="modal-content">

                          <div class="modal-header">

                            <h5 id="modalTitle">Add Notification</h5>

                            <button class="btn-close" data-bs-dismiss="modal"></button>

                          </div>

                          <div class="modal-body">

                            <input type="hidden" id="id">

                    

                            <div class="mb-2">

                              <label>Title</label>

                              <input type="text" id="title" class="form-control">

                            </div>

                    

                            <div class="mb-2">

                              <label>Message</label>

                              <textarea id="message" class="form-control"></textarea>

                            </div>

                    

                            <div class="mb-2">

                              <label>Type</label>

                              <select id="type" class="form-control">

                                <option value="text">Text</option>

                                <option value="link">Link</option>

                                <option value="image">Image</option>

                                <option value="pdf">PDF</option>

                              </select>

                            </div>

                    

                            <div class="mb-2" id="linkField" style="display:none;">

                              <label>Link URL</label>

                              <input type="text" id="file_url" class="form-control">

                            </div>

                    

                            <div class="mb-2" id="fileField" style="display:none;">

                              <label>Upload File</label>

                              <input type="file" id="file" class="form-control">

                              <div id="preview" class="mt-2"></div>

                            </div>

                    

                            <div class="mb-2">

                              <label>Status</label>

                              <select id="status" class="form-control">

                                <option value="active">Active</option>

                                <option value="inactive">Inactive</option>

                              </select>

                            </div>

                            <div class="mb-2" id="priorityField" style="display:none;">

                              <label>Priority</label>

                              <input type="number" id="priority" class="form-control" min="1">

                            </div>



                            <div class="row">

                              <div class="col">

                                <label>Start Date</label>

                                <input type="date" id="start_date" class="form-control">

                              </div>

                              <div class="col">

                                <label>End Date</label>

                                <input type="date" id="end_date" class="form-control">

                              </div>

                            </div>

                    

                          </div>

                          <div class="modal-footer">

                            <button class="btn btn-success" id="saveBtn" onclick="saveNotif()">Add</button>

                          </div>

                        </div>

                      </div>

                    </div>

                  

                  

                  

                </section>

            </section>

            <div class="project-info"></div>

        </div>

        <!-- END CONTAINER -->

          <?php include 'notification_css_js/notification_css.php'; ?>

          

          <script>

let currentPage = 1;



// Load table data

function loadData(page=1){

  currentPage = page;

  $.get("notif_ajax.php", {

    action: "list",

    page: page,

    search: $("#search").val()

  }, function(html){

    $("#tableData").html(html);

  });

}



// Search

$("#search").on("keyup", function(){

  loadData(1);

});



// Open Add Modal

function openAdd(){

  $("#modalTitle").text("Add Notification");

  $("#saveBtn").text("Add");



  // Reset all fields

  $("#id").val('');

  $("#title").val('');

  $("#message").val('');

  $("#file_url").val('');

  $("#status").val('active');

  $("#start_date").val('');

  $("#end_date").val('');

  $("#priority").val('');

  $("#file").val('');

  $("#preview").html('');



  // Hide priority on Add

  $("#priorityField").hide();



  // Reset type and related fields

  $("#type").val("text");

  $("#linkField").hide();

  $("#fileField").hide();



var myModal = new bootstrap.Modal(document.getElementById('notifModal'));
myModal.show();
}



// Edit Notification

function editNotif(id){

  $.get("notif_ajax.php",{action:"get",id:id},function(res){

    let d = JSON.parse(res);



    $("#modalTitle").text("Edit Notification");

    $("#saveBtn").text("Update");



    $("#id").val(d.id);

    $("#title").val(d.title);

    $("#message").val(d.message);

    $("#type").val(d.type);

    $("#file_url").val(d.file_url);

    $("#status").val(d.status);

    $("#start_date").val(d.start_date);

    $("#end_date").val(d.end_date);

    $("#priority").val(d.priority);



    // Show priority on Edit

    $("#priorityField").show();



    // Reset file & preview

    $("#file").val('');

    $("#preview").html('');



    // Handle type UI

    $("#linkField,#fileField").hide();

    if(d.type=="link"){

      $("#linkField").show();

    }

    if(d.type=="image" || d.type=="pdf"){

      $("#fileField").show();

    }



    // Preview

    if(d.type=="image" && d.file_url){

      $("#preview").html('<img src="'+d.file_url+'" style="max-width:150px;">');

    }

    if(d.type=="pdf" && d.file_url){

      $("#preview").html('<a href="'+d.file_url+'" target="_blank">View PDF</a>');

    }



var myModal = new bootstrap.Modal(document.getElementById('notifModal'));
myModal.show();
  });

}



// Handle Type Change

$("#type").on("change", function(){

  let t = $(this).val();



  $("#linkField,#fileField").hide();

  $("#file").val('');

  $("#preview").html('');



  if(t=="link") $("#linkField").show();

  if(t=="image" || t=="pdf") $("#fileField").show();

});



// File size validation (Max 5MB)

$("#file").on("change", function(){

  let file = this.files[0];

  if(!file) return;



  let maxSize = 5 * 1024 * 1024; // 5MB



  if(file.size > maxSize){

    let sizeMB = (file.size / (1024*1024)).toFixed(2);

    alert("File size should be below 5MB. Your file is " + sizeMB + " MB");



    // Clear file input & preview

    $(this).val('');

    $("#preview").html('');

    return;

  }

});



// Save Notification

function saveNotif(){

  let fd = new FormData();

  fd.append("id", $("#id").val());

  fd.append("title", $("#title").val());

  fd.append("message", $("#message").val());

  fd.append("type", $("#type").val());

  fd.append("file_url", $("#file_url").val());

  fd.append("status", $("#status").val());

  fd.append("priority", $("#priority").val());

  fd.append("start_date", $("#start_date").val());

  fd.append("end_date", $("#end_date").val());



  if($("#file")[0].files[0]){

    fd.append("file", $("#file")[0].files[0]);

  }



  $.ajax({

    url: "notif_ajax.php?action=save",

    type: "POST",

    data: fd,

    processData:false,

    contentType:false,

    success:function(){

var myModal = bootstrap.Modal.getInstance(document.getElementById('notifModal'));
myModal.hide();
      loadData(currentPage);

    }

  });

}



// Toggle Status

function toggleStatus(id){

  $.get("notif_ajax.php",{action:"toggle",id:id}, function(){

    loadData(currentPage);

  });

}



// Soft Delete

function softDelete(id){

  if(confirm("Delete?")){

    $.get("notif_ajax.php",{action:"delete",id:id}, function(){

      loadData(currentPage);

    });

  }

}



// Initial load

$(document).ready(function(){

  loadData();

});

</script>



    </body>

</html>







