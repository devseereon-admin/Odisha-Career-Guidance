<?php
session_start();
include "dbconn.php";

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Log that we reached this file
error_log("=== edit_clgaction.php started ===");
error_log("POST data: " . print_r($_POST, true));

if (!empty($_POST['action']) && $_POST['action'] == "update") {

    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    error_log("Updating ID: " . $id);

    $name          = mysqli_real_escape_string($conn, $_POST['name']);
    $about         = mysqli_real_escape_string($conn, $_POST['about']);
    $link          = mysqli_real_escape_string($conn, $_POST['link']);
    $institute_typ = mysqli_real_escape_string($conn, $_POST['institute_typ']);
    $strm          = mysqli_real_escape_string($conn, $_POST['strm']);
    $location      = mysqli_real_escape_string($conn, $_POST['location']);
    
    // Handle state based on location
    $state = 0; // Default state for International
    
    // If location is National (0), get the state value
    if($location == 0) {
        $state = isset($_POST['state']) ? mysqli_real_escape_string($conn, $_POST['state']) : 0;
    }
    
    // Initialize with default values
    $district = 0;
    $block = 0;
    
    // Only set district and block if:
    // 1. Location is National (0)
    // 2. State is Odisha (id=1)
    // 3. Values are provided
    if($location == 0 && $state == 1) {
        $district = !empty($_POST['district']) ? intval($_POST['district']) : 0;
        $block    = !empty($_POST['block']) ? intval($_POST['block']) : 0;
    }

    $sciencecourse = mysqli_real_escape_string($conn, $_POST['sciencecourse']);
    $comercourse   = mysqli_real_escape_string($conn, $_POST['comercourse']);
    $othercourse   = mysqli_real_escape_string($conn, $_POST['othercourse']);
    $subcat        = !empty($_POST['subcat']) ? intval($_POST['subcat']) : 0;

    error_log("Processed data - Location: $location, State: $state, District: $district, Block: $block");

    // Validate required fields
    $errors = array();
    if(empty($name)) $errors[] = "Name is required";
    if(empty($institute_typ)) $errors[] = "Institute type is required";
    if(empty($strm)) $errors[] = "Stream is required";
    if($location === '') $errors[] = "Location is required";
    
    // Only validate state if location is National
    if($location == 0 && empty($state)) {
        $errors[] = "State is required for National location";
    }

    if(empty($errors)) {
        // Build the query
        $sql = "UPDATE college SET 
                name='$name',
                description='$about',
                link='$link',
                institute_typ='$institute_typ',
                stream='$strm',
                location='$location',
                state='$state',
                district='$district',
                block='$block',
                sciencecourse='$sciencecourse',
                comercourse='$comercourse',
                othercourse='$othercourse',
                subcat='$subcat'
                WHERE id='$id'";
        
        error_log("SQL Query: " . $sql);
        
        $update = mysqli_query($conn, $sql);

        if($update) {
            error_log("Update successful for ID: " . $id);
            $_SESSION['message'] = "College Updated Successfully";
            $_SESSION['message_type'] = "success";
        } else {
            $db_error = mysqli_error($conn);
            error_log("Update failed: " . $db_error);
            $_SESSION['message'] = "Unable to update college: " . $db_error;
            $_SESSION['message_type'] = "danger";
        }
    } else {
        $error_string = implode("<br>", $errors);
        error_log("Validation errors: " . $error_string);
        $_SESSION['message'] = $error_string;
        $_SESSION['message_type'] = "danger";
    }

    error_log("Redirecting to college.php");
    header("Location: college.php");
    exit();
} else {
    error_log("Invalid action or no action specified");
    $_SESSION['message'] = "Invalid action";
    $_SESSION['message_type'] = "danger";
    header("Location: college.php");
    exit();
}
?>