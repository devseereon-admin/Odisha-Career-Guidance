<?php
include "admin/dbconn.php";
extract($_POST);
$html  = "<div class='search-result-one'>";
if(isset($_POST['school']) && $_POST['school']!=0){
  $clglist_sql = mysqli_query($conn ,"select * from scholarship where `type`='$type' and class='$school' and  status='1' order by `name` ");  
 // echo "select * from scholarship where `type`='$type' and class='$school' and  status='1' order by `name` ";
}else{
$clglist_sql = mysqli_query($conn ,"select * from scholarship where `type`='$type' and status='1' order by `name` ");
//echo "select * from scholarship where `type`='$type' and status='1' order by `name` ";
}
$cntschlr = mysqli_num_rows($clglist_sql);
if($cntschlr!=''){
$i=1;
while($res_list = mysqli_fetch_array($clglist_sql)){
	
	$link = $res_list['link'];
	$name = $res_list['name'];
	$description = $res_list['description'];
	$eligibility_criteria = $res_list['eligibility_criteria'];
	$stipend = $res_list['stipend'];
	
	
	$html .= "<h4>$name</h4>";
	$html .= "<a data-toggle='modal' data-target='#myModal$i'>explore</a>&nbsp;&nbsp;<a href='$link' target='_blank'>Visit</a>";
	
	
	$html .= "<div class='modal' id='myModal$i'>";
	$html .= "<div class='modal-dialog  modal-xl'>";
	$html .= "<div class='modal-content'>";
	$html .= "<div class='modal-header'>";
	$html .= "<h4 class='modal-title' style='color:#fff;padding:0;'></h4>";
	$html .= "<button type='button' class='close' data-dismiss='modal'>&times;</button>";
	$html .= "</div>";
	$html .= " <div class='modal-body'>";
	$html .= " <table class='table table-hover table-bordered'>";
	$html .="<thead><tr>";
	
	$html .="<th>Description</th><th>Eligbility Criteria</th><th>stipend</th>";
	$html .="</tr></thead>";
	$html .="<tbody><tr>";
	$html .="<td>$description</td>";
	$html .="<td>$eligibility_criteria</td>";
	$html .="<td>$stipend</td>";
	$html .="</tr></tbody></table>";
	
	$html .= " </div>";
	
	$html .= "<div class='modal-footer'>";
	
	$html .= "</div>";
	$html .= "</div>";
	$html .= "</div>";
	$html .= "</div>";
	
	$i++;
	
}
}else{
	$html .= "<h4>No Result Found</h4>";
}
$html .= "</div>";
echo $html;

?> 