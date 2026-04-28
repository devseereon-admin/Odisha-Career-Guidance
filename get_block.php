<?php
include "admin/dbconn.php";
extract($_POST);	
						   
$html = "<label class='form-label' for='field-2'>block</label>";
$html  = "<select class='custom-select' name='block'  >";
$html .= "<option>Select block</option>";

$dist_sql = mysqli_query($conn,"select * from block where dist='$blockid' and status='1' ");
while($res_dist = mysqli_fetch_array($dist_sql)){
	$did = $res_dist['id'];
	$dname = $res_dist['name'];

$html .= "<option value='$did'>$dname</option>";

}
$html .= "</select>";

echo $html;



?> 