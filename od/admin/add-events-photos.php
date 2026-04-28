<?php
include "dbconn.php";

function isImage($fileExtension) {
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    return in_array($fileExtension, $allowedExtensions);
}

// Function to upload file
function uploadFile($fileKey) {
    if (isset($_FILES[$fileKey]) && $_FILES[$fileKey]['error'] == UPLOAD_ERR_OK) {
        $targetDir = "../upload/";
        $uniqueId = uniqid() . rand(1000, 9999);
        $originalFileName = pathinfo($_FILES[$fileKey]["name"], PATHINFO_FILENAME);
        $extension = strtolower(pathinfo($_FILES[$fileKey]["name"], PATHINFO_EXTENSION));
        $targetFile = $targetDir . $originalFileName . '_' . $uniqueId . '.' . $extension;

        if (isImage($extension)) {
            if (move_uploaded_file($_FILES[$fileKey]["tmp_name"], $targetFile)) {
                return $originalFileName . '_' . $uniqueId . '.' . $extension;
            }
        }
    }
    return null;
}

// Function to get next priority
function getNextPriority($conn) {
    $query = "SELECT MAX(CAST(priority AS UNSIGNED)) as max_priority FROM events_photos";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return ($row['max_priority'] ?? 0) + 1;
}

// Function to create table if not exists
function checkAndCreateTable($conn) {
    $checkTableQuery = "SHOW TABLES LIKE 'events_photos'";
    $result = mysqli_query($conn, $checkTableQuery);

    if (mysqli_num_rows($result) == 0) {
        $createTableQuery = "
            CREATE TABLE events_photos (
                id INT AUTO_INCREMENT PRIMARY KEY,
                image VARCHAR(255) NULL,
                thumbnail VARCHAR(255) NULL,
                priority INT NULL,
                is_display_home ENUM('0', '1') DEFAULT '0',
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )
        ";
        mysqli_query($conn, $createTableQuery);
    }
}

// Check and create table on script execution
checkAndCreateTable($conn);

// Handle AJAX form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ajax_submit'])) {
    $response = ['success' => false, 'message' => '', 'id' => '', 'image' => '', 'thumbnail' => ''];
    
    $id = $_POST['id'];
    $priority = $_POST['priority'];
    
    // If priority is empty, get next priority
    if (empty($priority)) {
        $priority = getNextPriority($conn);
    }
    
    $is_display_home = '0';
    $image = uploadFile('image');
    $thumbnail = uploadFile('thumbnail');
    
    if (!empty($id)) {
        // Get existing image if ID is set and no new image is uploaded
        $query = $conn->prepare("SELECT image, thumbnail FROM events_photos WHERE id = ?");
        $query->bind_param("i", $id);
        $query->execute();
        $result = $query->get_result();
        $row = $result->fetch_assoc();
        if (empty($image)) {
            $image = $row['image'];
        }
        if (empty($thumbnail)) {
            $thumbnail = $row['thumbnail'];
        }
    }

    if (empty($id)) {
        // Insert new record
        $query = $conn->prepare("INSERT INTO events_photos (image, thumbnail, priority, is_display_home, created_at) VALUES (?, ?, ?, ?, NOW())");
        $query->bind_param("ssss", $image, $thumbnail, $priority, $is_display_home);
    } else {
        // Update existing record
        $query = $conn->prepare("UPDATE events_photos SET image=?, thumbnail=?, priority=?, is_display_home=?, updated_at=NOW() WHERE id=?");
        $query->bind_param("ssssi", $image, $thumbnail, $priority, $is_display_home, $id);
    }

    if ($query->execute()) {
        $response['success'] = true;
        $response['message'] = 'Record saved successfully';
        $response['id'] = empty($id) ? $conn->insert_id : $id;
        $response['image'] = $image;
        $response['thumbnail'] = $thumbnail;
    } else {
        $response['message'] = 'Error saving record: ' . $conn->error;
    }
    
    // Return JSON response for AJAX
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
        <title>Ama Career Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="" name="description" />
        <meta content="" name="author" />

        <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon" />
        <link rel="apple-touch-icon-precomposed" href="assets/images/apple-touch-icon-57-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/apple-touch-icon-144-precomposed.png">

        <!-- CORE CSS FRAMEWORK - START -->
        <link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/fonts/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" type="text/css"/>
        <!-- CORE CSS FRAMEWORK - END -->

        <!-- Sweet Alert CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet" type="text/css" />

        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        <link href="assets/plugins/datatables/css/datatables.min.css" rel="stylesheet" type="text/css" media="screen"/>   
        <link href="assets/plugins/icheck/skins/all.css" rel="stylesheet" type="text/css" media="screen"/>
        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 

        <!-- CORE CSS TEMPLATE - START -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
        <!-- CORE CSS TEMPLATE - END -->

        <!-- Additional CSS for validation -->
        <style>
            .image-ratio-info {
                background-color: #f8f9fa;
                border-left: 4px solid #007bff;
                padding: 10px 15px;
                margin-top: 5px;
                border-radius: 4px;
                font-size: 13px;
                color: #495057;
            }
            .image-ratio-info i {
                color: #007bff;
                margin-right: 5px;
            }
            .back-btn {
                margin-bottom: 20px;
            }
            .existing-image {
                margin-top: 10px;
                padding: 10px;
                background: #f8f9fa;
                border-radius: 4px;
            }
            .existing-image img {
                border: 1px solid #ddd;
                padding: 5px;
                border-radius: 4px;
                max-width: 200px;
                max-height: 200px;
            }
            .loader {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(255,255,255,0.8);
                z-index: 9999;
                text-align: center;
                padding-top: 20%;
            }
            .loader i {
                font-size: 50px;
                color: #007bff;
            }
            .image-preview {
                margin-top: 10px;
                display: none;
            }
            .image-preview img {
                max-width: 200px;
                max-height: 200px;
                border: 1px solid #ddd;
                padding: 5px;
                border-radius: 4px;
            }
            .required-field label:after {
                content: " *";
                color: red;
            }
            .info-text {
                color: #6c757d;
                font-size: 12px;
                margin-top: 5px;
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
        
        <!-- START CONTAINER -->
        <div class="page-container row-fluid">

            <!-- SIDEBAR - START -->
            <div class="page-sidebar ">
                <div class="page-sidebar-wrapper" id="main-menu-wrapper"> 
                    <?php include "admcommon/side-menu.php"; ?>
                </div>
                <div class="project-info"></div>
            </div>
            <!--  SIDEBAR - END -->
            
            <!-- START CONTENT -->
            <section id="main-content">
                <section class="wrapper main-wrapper" style=''>

                    <div class='col-xl-12 col-lg-12 col-md-12 col-12'>
                        <div class="page-title">
                            <div class="float-left">
                                <h1 class="title">Career</h1>                           
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="col-xl-12 col-lg-12 col-12 col-md-12">
                        <!-- Back Button -->
                        <div class="back-btn">
                            <a href="events-photos.php" class="btn btn-secondary">
                                <i class="fa fa-arrow-left"></i> Back to Events Photos
                            </a>
                        </div>

                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title float-left">
                                    <?php echo isset($_GET['id']) ? 'Edit' : 'Add'; ?> Events Photos
                                </h2>
                            </header>
                            <div class="content-body">
                            <?php
                            $id = isset($_GET['id']) ? $_GET['id'] : '';
                            $priority = "";
                            $image = "";
                            $thumbnail = "";

                            if($id != ""){
                                $detqry = mysqli_query($conn, "SELECT * FROM events_photos WHERE id='$id'");
                                if(mysqli_num_rows($detqry) > 0)
                                {
                                    $dettinfooo = mysqli_fetch_assoc($detqry);
                                    $priority = $dettinfooo['priority'];
                                    $image = $dettinfooo['image'];
                                    $thumbnail = $dettinfooo['thumbnail'];
                                }
                            }
                            ?>
                             
                            <form name="strmfrm" method="post" enctype="multipart/form-data" id="eventsPhotoForm">
                                <input type="hidden" name="id" id="record_id" value="<?= $id; ?>">
                                <input type="hidden" name="ajax_submit" value="1">

                                <div class="form-group">
                                    <label class="form-label" for="image">Main Image <?php echo empty($id) ? '<span class="text-danger">*</span>' : ''; ?></label>
                                    <div class="controls">
                                        <input type="file" class="form-control" id="image" name="image" accept="image/jpeg,image/png,image/gif" <?php echo empty($id) ? 'required' : ''; ?>>
                                        <div class="image-ratio-info">
                                            <i class="fa fa-info-circle"></i>
                                            <strong>Main Image Requirements:</strong><br>
                                            - Format: JPG, PNG, GIF only<br>
                                            - Size: Exactly 1920 x 1080 pixels (16:9 ratio)<br>
                                            - Max file size: 5MB
                                        </div>
                                        
                                        <!-- Image Preview for new upload -->
                                        <div class="image-preview" id="imagePreview">
                                            <label>New Image Preview:</label><br>
                                            <img src="" alt="Preview">
                                        </div>
                                        
                                        <?php if (!empty($image)): ?>
                                            <div class="existing-image" id="existingImageContainer">
                                                <label>Current Main Image:</label><br>
                                                <img src="../upload/<?= $image ?>" style="max-width:200px; max-height:200px;">
                                                <input type="hidden" name="existing_image" value="<?= $image ?>">
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="thumbnail">Thumbnail Image <?php echo empty($id) ? '<span class="text-danger">*</span>' : ''; ?></label>
                                    <div class="controls">
                                        <input type="file" class="form-control" id="thumbnail" name="thumbnail" accept="image/jpeg,image/png,image/gif" <?php echo empty($id) ? 'required' : ''; ?>>
                                        <div class="image-ratio-info">
                                            <i class="fa fa-info-circle"></i>
                                            <strong>Thumbnail Requirements:</strong><br>
                                            - Format: JPG, PNG, GIF only<br>
                                            - Size: Exactly 800 x 600 pixels (4:3 ratio)<br>
                                            - Max file size: 2MB
                                        </div>
                                        
                                        <!-- Thumbnail Preview for new upload -->
                                        <div class="image-preview" id="thumbnailPreview">
                                            <label>New Thumbnail Preview:</label><br>
                                            <img src="" alt="Preview">
                                        </div>
                                        
                                        <?php if (!empty($thumbnail)): ?>
                                            <div class="existing-image" id="existingThumbnailContainer">
                                                <label>Current Thumbnail:</label><br>
                                                <img src="../upload/<?= $thumbnail ?>" style="max-width:200px; max-height:200px;">
                                                <input type="hidden" name="existing_thumbnail" value="<?= $thumbnail ?>">
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="priority">Priority</label>
                                    <div class="controls">
                                        <input type="number" class="form-control" id="priority" name="priority" value="<?= htmlspecialchars($priority); ?>" placeholder="Auto-generated if empty">
                                        <small class="text-muted">Leave empty for auto priority (highest +1) | Lower number = higher priority</small>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-corner" id="submitBtn">
                                        <i class="fa fa-save"></i> Submit
                                    </button>
                                    <a href="events-photos.php" class="btn btn-secondary btn-corner">
                                        <i class="fa fa-times"></i> Cancel
                                    </a>
                                </div>
                            </form>
                        </div>
                        </section>
                    </div>
                </section>
            </section>
            <!-- END CONTENT -->
            <div class="chatapi-windows "></div>    
        </div>
        <!-- END CONTAINER -->

        <!-- CORE JS FRAMEWORK - START --> 
        <script src="assets/js/jquery-3.4.1.min.js" type="text/javascript"></script> 
        <script src="assets/js/popper.min.js" type="text/javascript"></script> 
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
        <script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>  
        <script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js" type="text/javascript"></script> 
        <script src="assets/plugins/viewport/viewportchecker.js" type="text/javascript"></script>  
        <!-- CORE JS FRAMEWORK - END --> 

        <!-- Sweet Alert JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        <script src="assets/plugins/datatables/js/dataTables.min.js" type="text/javascript"></script>
        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 

        <!-- CORE TEMPLATE JS - START --> 
        <script src="assets/js/scripts.js" type="text/javascript"></script> 
        <!-- END CORE TEMPLATE JS - END --> 

        <!-- Sidebar Graph - START --> 
        <script src="assets/plugins/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="assets/js/chart-sparkline.js" type="text/javascript"></script>
        <!-- Sidebar Graph - END --> 

        <!-- AJAX Form Submission Script -->
        <script>
        $(document).ready(function() {
            
            // Image preview functionality
            $('#image').on('change', function() {
                var file = this.files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#imagePreview img').attr('src', e.target.result);
                        $('#imagePreview').show();
                    }
                    reader.readAsDataURL(file);
                } else {
                    $('#imagePreview').hide();
                }
            });

            $('#thumbnail').on('change', function() {
                var file = this.files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#thumbnailPreview img').attr('src', e.target.result);
                        $('#thumbnailPreview').show();
                    }
                    reader.readAsDataURL(file);
                } else {
                    $('#thumbnailPreview').hide();
                }
            });

            $('#eventsPhotoForm').on('submit', function(e) {
                e.preventDefault(); // Prevent normal form submission
                
                var recordId = $('#record_id').val();
                var imageFile = $('#image')[0].files[0];
                var thumbnailFile = $('#thumbnail')[0].files[0];
                
                // For new records - validate both images are required
                if (!recordId) {
                    if (!imageFile) {
                        swal("Required Field", "Please select a main image", "error");
                        return false;
                    }
                    if (!thumbnailFile) {
                        swal("Required Field", "Please select a thumbnail image", "error");
                        return false;
                    }
                }
                
                // Validate main image if uploaded (for both new and edit)
                if (imageFile) {
                    var imageExt = imageFile.name.split('.').pop().toLowerCase();
                    if (!['jpg', 'jpeg', 'png', 'gif'].includes(imageExt)) {
                        swal("Invalid File Type", "Main image must be JPG, PNG, or GIF", "error");
                        return false;
                    }

                    if (imageFile.size > 5 * 1024 * 1024) {
                        swal("File Too Large", "Main image must be below 5MB", "error");
                        return false;
                    }
                }
                
                // Validate thumbnail if uploaded (for both new and edit)
                if (thumbnailFile) {
                    var thumbnailExt = thumbnailFile.name.split('.').pop().toLowerCase();
                    if (!['jpg', 'jpeg', 'png', 'gif'].includes(thumbnailExt)) {
                        swal("Invalid File Type", "Thumbnail must be JPG, PNG, or GIF", "error");
                        return false;
                    }

                    if (thumbnailFile.size > 2 * 1024 * 1024) {
                        swal("File Too Large", "Thumbnail must be below 2MB", "error");
                        return false;
                    }
                }

                // Validate both images if both are uploaded
                if (imageFile && thumbnailFile) {
                    validateBothImages(imageFile, thumbnailFile);
                } else if (imageFile) {
                    validateImageDimensions(imageFile, 'main');
                } else if (thumbnailFile) {
                    validateThumbnailDimensions(thumbnailFile);
                } else {
                    // If no new images, submit form directly
                    submitForm();
                }
                
                return false;
            });

            function validateBothImages(imageFile, thumbnailFile) {
                var imageValidated = false;
                var thumbnailValidated = false;
                
                // Validate main image
                var img1 = new Image();
                var objectUrl1 = URL.createObjectURL(imageFile);
                
                img1.onload = function() {
                    URL.revokeObjectURL(objectUrl1);
                    
                    if (this.width != 1920 || this.height != 1080) {
                        swal(
                            "Invalid Main Image Size",
                            "Required size: 1920 x 1080 pixels\nYour Image: " + this.width + " x " + this.height,
                            "error"
                        );
                        return false;
                    } else {
                        imageValidated = true;
                        // Validate thumbnail after main image is done
                        if (!thumbnailValidated) {
                            validateThumbnailDimensions(thumbnailFile);
                        }
                    }
                };
                
                img1.src = objectUrl1;
            }

            function validateImageDimensions(file, type) {
                var img = new Image();
                var objectUrl = URL.createObjectURL(file);
                
                img.onload = function() {
                    URL.revokeObjectURL(objectUrl);
                    
                    if (this.width != 1920 || this.height != 1080) {
                        swal(
                            "Invalid Main Image Size",
                            "Required size: 1920 x 1080 pixels\nYour Image: " + this.width + " x " + this.height,
                            "error"
                        );
                        return false;
                    } else {
                        // If we have thumbnail to validate
                        var thumbnailFile = $('#thumbnail')[0].files[0];
                        if (thumbnailFile) {
                            validateThumbnailDimensions(thumbnailFile);
                        } else {
                            submitForm();
                        }
                    }
                };
                
                img.src = objectUrl;
                return false;
            }

            function validateThumbnailDimensions(file) {
                var img = new Image();
                var objectUrl = URL.createObjectURL(file);
                
                img.onload = function() {
                    URL.revokeObjectURL(objectUrl);
                    
                    if (this.width != 800 || this.height != 600) {
                        swal(
                            "Invalid Thumbnail Size",
                            "Required size: 800 x 600 pixels\nYour Thumbnail: " + this.width + " x " + this.height,
                            "error"
                        );
                        return false;
                    } else {
                        submitForm();
                    }
                };
                
                img.src = objectUrl;
                return false;
            }

            function submitForm() {
                // Show loader
                $('.loader').show();
                
                var formData = new FormData($('#eventsPhotoForm')[0]);
                
                $.ajax({
                    url: window.location.href,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function(response) {
                        $('.loader').hide();
                        
                        if (response.success) {
                            if ($('#record_id').val()) {
                                // Edit mode - update existing images if changed
                                var updated = false;
                                
                                if (response.image && (!$('input[name="existing_image"]').length || response.image !== $('input[name="existing_image"]').val())) {
                                    // Update image preview
                                    if ($('#existingImageContainer').length) {
                                        $('#existingImageContainer').html(
                                            '<label>Current Main Image:</label><br>' +
                                            '<img src="../upload/' + response.image + '?t=' + new Date().getTime() + '" style="max-width:200px; max-height:200px;">' +
                                            '<input type="hidden" name="existing_image" value="' + response.image + '">'
                                        );
                                    } else {
                                        // Add new image container if it doesn't exist
                                        $('#image').closest('.controls').append(
                                            '<div class="existing-image" id="existingImageContainer">' +
                                            '<label>Current Main Image:</label><br>' +
                                            '<img src="../upload/' + response.image + '?t=' + new Date().getTime() + '" style="max-width:200px; max-height:200px;">' +
                                            '<input type="hidden" name="existing_image" value="' + response.image + '">' +
                                            '</div>'
                                        );
                                    }
                                    $('#imagePreview').hide();
                                    $('#image').val('');
                                    updated = true;
                                }
                                
                                if (response.thumbnail && (!$('input[name="existing_thumbnail"]').length || response.thumbnail !== $('input[name="existing_thumbnail"]').val())) {
                                    // Update thumbnail preview
                                    if ($('#existingThumbnailContainer').length) {
                                        $('#existingThumbnailContainer').html(
                                            '<label>Current Thumbnail:</label><br>' +
                                            '<img src="../upload/' + response.thumbnail + '?t=' + new Date().getTime() + '" style="max-width:200px; max-height:200px;">' +
                                            '<input type="hidden" name="existing_thumbnail" value="' + response.thumbnail + '">'
                                        );
                                    } else {
                                        // Add new thumbnail container if it doesn't exist
                                        $('#thumbnail').closest('.controls').append(
                                            '<div class="existing-image" id="existingThumbnailContainer">' +
                                            '<label>Current Thumbnail:</label><br>' +
                                            '<img src="../upload/' + response.thumbnail + '?t=' + new Date().getTime() + '" style="max-width:200px; max-height:200px;">' +
                                            '<input type="hidden" name="existing_thumbnail" value="' + response.thumbnail + '">' +
                                            '</div>'
                                        );
                                    }
                                    $('#thumbnailPreview').hide();
                                    $('#thumbnail').val('');
                                    updated = true;
                                }
                                
                                // Show success message
                                swal({
                                    title: "Success!",
                                    text: response.message,
                                    type: "success",
                                    timer: 2000,
                                    showConfirmButton: true
                                });
                            } else {
                                // New record - clear form for next entry
                                swal({
                                    title: "Success!",
                                    text: response.message,
                                    type: "success",
                                    timer: 2000,
                                    showConfirmButton: true
                                }, function() {
                                    $('#eventsPhotoForm')[0].reset();
                                    $('#imagePreview').hide();
                                    $('#thumbnailPreview').hide();
                                    $('#record_id').val('');
                                    $('#existingImageContainer, #existingThumbnailContainer').remove();
                                });
                            }
                        } else {
                            swal("Error", response.message, "error");
                        }
                    },
                    error: function(xhr, status, error) {
                        $('.loader').hide();
                        swal("Error", "An error occurred: " + error, "error");
                        console.log(xhr.responseText);
                    }
                });
            }
        });
        </script>
    </body>
</html>