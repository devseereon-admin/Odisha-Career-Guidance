<?php
include "admin/dbconn.php";
extract($_POST);	
						   
if($ditrid==1){
$html  = "<select class='form-select' name='District'>";
$html .= "<option>Select District</option>";

$dist_sql = mysqli_query($conn,"select * from district where status='1'");
while($res_dist = mysqli_fetch_array($dist_sql)){
	$did = $res_dist['id'];
	$dname = $res_dist['name'];

$html .= "<option value='$did'>$dname</option>";

}
$html .= "</select>";


}

echo $html;
?>  
						    
                    
                     