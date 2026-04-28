<?php
include "dbconn.php";

if(isset($_POST['district_id'])) {
    
    $district_id = mysqli_real_escape_string($conn, $_POST['district_id']);
    
    // Debug - you can remove this after testing
    error_log("Loading blocks for district: " . $district_id);
    
    $block_sql = mysqli_query($conn, "SELECT * FROM block WHERE dist='$district_id' AND status='1' ORDER BY name");
    
    $options = "<option value=''>Select Block</option>";
    
    if($block_sql && mysqli_num_rows($block_sql) > 0) {
        while($res_block = mysqli_fetch_array($block_sql)) {
            $bid = $res_block['id'];
            $bname = htmlspecialchars($res_block['name']);
            $options .= "<option value='$bid'>$bname</option>";
        }
    } else {
        $options = "<option value=''>No blocks found for this district</option>";
        error_log("No blocks found for district: " . $district_id); // Debug
    }
    
    echo $options;
} else {
    echo "<option value=''>Invalid request</option>";
}
?>