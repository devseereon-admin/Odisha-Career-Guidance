<?php
include "admin/dbconn.php";
extract($_POST);
if($catid==2){
						   
$html  = "";
 
$html .="<select class='form-select' name='school'  required>";
						  
$html .="<option>select Class</option>";
$html .="<option value='1'>1st - 5th</option>";
$html .="<option value='2'>6th - 8th</option>";
$html .="<option value='3'>9th - 10th</option>";
$html .="<option value='4'>11th - 12th</option>";
$html .="<option value='5'>Under Graduate</option>";
$html .="<option value='6'>Post Graduate</option>";
$html .=" </select>";

echo $html;
}
?>  
						    
                    
                  