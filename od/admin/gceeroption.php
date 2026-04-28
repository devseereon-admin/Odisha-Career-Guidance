<?php
require_once('check-validate.php');
include "dbconn.php";
extract($_POST);

$html = "<label class='form-label' for='field-2'>Career</label>";
$html .= "<select class='custom-select' id='inputGroupSelect01' name='career' >";
$html .= "<option selected>Choose...</option>";

// Check if request is from add_Prof.php
if (isset($_POST['from_prof']) && $_POST['from_prof'] == 1) {
    // Only show subcatagory which has has_sub = 1
    $cree_sql = mysqli_query($conn , "
        SELECT * FROM `subcatagory` 
        WHERE cat_id='$strmid' 
        AND status='1' 
        AND has_sub='1'
    ");
} else {
    // Old behavior (no filter)
    $cree_sql = mysqli_query($conn , "
        SELECT * FROM `subcatagory` 
        WHERE cat_id='$strmid' 
        AND status='1'
    ");
}

while($res_career = mysqli_fetch_array($cree_sql))
{
    $subctnm = $res_career['name'];
    $subctid = $res_career['id'];
    $html .= "<option value='$subctid'>".$subctnm."</option>";
}

$html .="</select>";

echo $html;
?>