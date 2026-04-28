<?php
// This file is in the root directory
include "admin/dbconn.php"; // Note: now includes from admin folder

// Check if this is the new AJAX request from edit_clg.php
if(isset($_POST['ajax']) && $_POST['ajax'] == '1') {
    
    $state_id = isset($_POST['ditrid']) ? mysqli_real_escape_string($conn, $_POST['ditrid']) : 0;
    
    if($state_id > 0) {
        $dist_sql = mysqli_query($conn, "SELECT * FROM district WHERE state_id='$state_id' AND status='1' ORDER BY name");
        
        $options = "<option value=''>Select District</option>";
        
        if($dist_sql && mysqli_num_rows($dist_sql) > 0) {
            while($res_dist = mysqli_fetch_array($dist_sql)) {
                $did = $res_dist['id'];
                $dname = htmlspecialchars($res_dist['name']);
                $options .= "<option value='$did'>$dname</option>";
            }
        } else {
            $options = "<option value=''>No districts found</option>";
        }
        
        echo $options;
    } else {
        echo "<option value=''>Select District</option>";
    }
    exit();
}

// Original code - preserved exactly for other files
if(isset($_POST['ditrid']) && $_POST['ditrid'] == 1) {
    $html = "<label class='form-label' for='field-2'>District</label>";
    $html .= "<select class='custom-select' name='District' onchange='getblock(this.value);' >";
    $html .= "<option>Select District</option>";

    $dist_sql = mysqli_query($conn, "SELECT * FROM district WHERE status='1' ORDER BY name");
    if($dist_sql) {
        while($res_dist = mysqli_fetch_array($dist_sql)) {
            $did = $res_dist['id'];
            $dname = $res_dist['name'];
            $html .= "<option value='$did'>$dname</option>";
        }
    }
    
    $html .= "</select>";
    echo $html;
}
?>