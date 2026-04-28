<?php
include "admin/dbconn.php";
extract($_POST);	
						   
$html  = "";

$qual_sql = mysqli_query($conn,"select * from qualification where status='1' and institute_typ='$ditrid'");
while($res_dist = mysqli_fetch_array($qual_sql)){
	$did = $res_dist['id'];
	$dname = $res_dist['name'];

$html .="<option>select qualification</option>";
$html .= "<option value='$did'>$dname</option>";

}
echo $html;
?>  
						    
                    
                  