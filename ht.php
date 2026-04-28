<?php
extract($_POST);


if($domainid==1){
          

$html .= "<option>Select Qualification</option>";
$html .= "<option value='1'>Economics</option>";
$html .= "<option value='2'>Geology</option>";
$html .= "<option value='3'>Archaeology</option>";
}else{
$html .= "<option>Select Qualification</option>";
$html .= "<option value='1'>Economics</option>";
$html .= "<option value='2'>Geology</option>";

    
}


echo $html;

?>