<?php
include "admin/dbconn.php";
extract($_POST);
if($catid==2){
						   
$html  = "";
 
$html .="<select class='form-select' name='school'  required>";
						  
$html .="<option value='0'>ଶ୍ରେଣୀ ଚୟନ କରନ୍ତୁ।</opn>";
$html .="<option value='1'>ପ୍ରଥମ- ପଞ୍ଚମ ଶ୍ରେଣୀ</option>";
$html .="<option value='2'>ଷଷ୍ଠ- ଅଷ୍ଟମ ଶ୍ରେଣୀ</option>";
$html .="<option value='3'>ନବମ-ଦଶମ ଶ୍ରେଣୀ</option>";
$html .="<option value='4'>ଏକାଦଶ-ଦ୍ଵାଦଶ ଶ୍ରେଣୀ</option>";
$html .="<option value='5'>ପ୍ରାକ୍-ସ୍ନାତକ</option>";
$html .="<option value='6'>ସ୍ନାତକୋତ୍ତର</option>";
$html .=" </select>";

echo $html;
}
?>  
						    
                    
                  