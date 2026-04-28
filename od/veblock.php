<?php
include "admin/dbconn.php";
extract($_POST);
$catdet_block = mysqli_query($conn,"select * from college_block_wise where district_id='$DistrictB' and block_id='$block' and status='1' order by `name` asc");
//$catnm = $catdet['name'];
$cnt_insti_block  = mysqli_num_rows($catdet_block);

$html  = "<div class='search-result-one'>";
if($cnt_insti_block!=0){
$i=1;

while($res_list_block = mysqli_fetch_array($catdet_block)){

	$name = $res_list_block['name'];
	$id = $res_list_block['id'];
	$link = $res_list_block['link'];
	
	
	$html .= "<h4 onclick='viewBlockInstituion($id)'>$name</h4>";
	$html .= "<a href='javascript:void(0);' onclick='viewBlockInstituion($id)'>ଅଧିକ ଜାଣନ୍ତୁ</a>&nbsp;&nbsp;<a href='$link' target='_blank'>ପରିଦର୍ଶନ କରନ୍ତୁ</a>";
	
	$i++;
	
}
}else{
  $html .= "<p>Will upload the data shortly</p>";  
}

$html .= "</div>";
echo $html;

?> 