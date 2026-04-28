<?php
include "admin/dbconn.php";
extract($_POST);
$catdet = mysqli_fetch_assoc(mysqli_query($conn,"select * from catagory where id='$Domain' and status='1'"));
//echo "select * from catagory where id='$Domain' and status='1'";
$catnm = $catdet['name'];
//$District = $_POST['District'];
if(isset($_POST['Domain']) && $_POST['Domain']!=0 && $_POST['State']==0 && $_POST['subcat']==0){
    
    $clglist_sql = mysqli_query($conn ,"select * from college where `institute_typ`='$institute' and `stream`='$Domain' and status='1' group by `name`  order by `name`");
   
   // echo "select * from college where `institute_typ`='$institute' and `stream`='$Domain' and status='1'  order by `name`";

    
}elseif(isset($_POST['Domain']) && $_POST['Domain']!=0 && $_POST['subcat']!=0 && $_POST['State']==0){
   
    $clglist_sql = mysqli_query($conn ,"select * from college where `institute_typ`='$institute' and `stream`='$Domain' and `subcat`='$subcat' and status='1'   order by `name`");
   
  //  echo "select * from college where `institute_typ`='$institute' and `stream`='$Domain' and `subcat`='$subcat' and status='1'   order by `name`";
}

elseif(isset($_POST['District']) && $_POST['District']!=0 && $_POST['State']!=0 && $catnm == 'କଳା କ୍ଷେତ୍ର' ){
	
	$clglist_sql = mysqli_query($conn ,"select * from college where `institute_typ`='$institute' and description!=''  and `location`='$customRadio' and `state`='$State'and `district`='$District' and status='1' ");
		
//echo "select * from college where `institute_typ`='$institute' and description!='' or `stream`='$Domain'   and `location`='$customRadio'and `state`='$State'and `district`='$District' and status='1' ";

}elseif(isset($_POST['District']) && $_POST['District']!=0 && $catnm =='ବାଣିଜ୍ୟ କ୍ଷେତ୍ର'){
	
	//echo "select * from college where `institute_typ`='$institute' and sciencecourse!='' or `stream`='$Domain'   and `location`='$customRadio'and `state`='$State'and `district`='$District' and status='1' ";
	
	$clglist_sql = mysqli_query($conn ,"select * from college where `institute_typ`='$institute' and comercourse!='' and `location`='$customRadio'and `state`='$State'and `district`='$District' and status='1' ");

}elseif(isset($_POST['District']) && $_POST['District']!=0 && $catnm =='ବିଜ୍ଞାନ କ୍ଷେତ୍ର'){
//echo "select * from college where `institute_typ`='$institute' and comercourse!='' and `location`='$customRadio'and `state`='$State'and `district`='$District' and status='1' ";

$clglist_sql = mysqli_query($conn ,"select * from college where `institute_typ`='$institute' and sciencecourse!='' and `location`='$customRadio'and `state`='$State'and `district`='$District' and status='1' ");	

}elseif(isset($_POST['District']) && $_POST['District']!=0 ){
	
	$clglist_sql = mysqli_query($conn ,"select * from college where `institute_typ`='$institute' and `stream`='$Domain'  and `location`='$customRadio'and `state`='$State' and `district`='$District' and status='1' ");	
//echo "select * from college where `institute_typ`='$institute' and `stream`='$Domain'  and `location`='$customRadio'and `state`='$State' and `district`='$District' and status='1' ";

}
elseif(isset($_POST['District']) && $catnm == 'କଳା କ୍ଷେତ୍ର' ){
    
$clglist_sql = mysqli_query($conn ,"select * from college where `institute_typ`='$institute' and description!='' and `location`='$customRadio'and `state`='$State'and `district`='0' and status='1' ");	
//echo "select * from college where `institute_typ`='$institute' and description!='' and `location`='$customRadio'and `state`='$State'and `district`='0' and status='1' ";

    
}elseif(isset($_POST['District']) && $catnm == 'ବିଜ୍ଞାନ କ୍ଷେତ୍ର'){
    $clglist_sql = mysqli_query($conn ,"select * from college where `institute_typ`='$institute' and sciencecourse!='' and `location`='$customRadio'and `state`='$State'and `district`='0' and status='1' ");	
   
   // echo "select * from college where `institute_typ`='$institute' and sciencecourse!='' and `location`='$customRadio'and `state`='$State'and `district`='0' and status='1' ";

    
}elseif(isset($_POST['District']) && $catnm == 'ବାଣିଜ୍ୟ କ୍ଷେତ୍ର' ){
   
    $clglist_sql = mysqli_query($conn ,"select * from college where `institute_typ`='$institute' and comercourse!='' and `location`='$customRadio'and `state`='$State'and `district`='0' and status='1' ");	

    //echo "select * from college where `institute_typ`='$institute' and comercourse!='' and `location`='$customRadio'and `state`='$State'and `district`='0' and status='1' ";
}else{
    $clglist_sql = mysqli_query($conn ,"select * from college where `institute_typ`='$institute' and `stream`='$Domain' and `location`='$customRadio'and `state`='$State' and `district`='0'  and status='1' ");	  

   // echo "select * from college where `institute_typ`='$institute' and `stream`='$Domain' and `location`='$customRadio'and `state`='$State' and `district`='0'  and status='1' ";
}
//$cnt = mysqli_num_rows($clglist_sql);
$cnt_insti = mysqli_num_rows($clglist_sql);
	
$html  = "<div class='search-result-one'>";
if($cnt_insti!=0){
$i=1;
while($res_list = mysqli_fetch_array($clglist_sql)){
	
	$link = $res_list['link'];
	$name = $res_list['name'];
	$description = $res_list['description'];
	$sciencecourse = $res_list['sciencecourse'];
	$comercourse = $res_list['comercourse'];
	$othercourse = $res_list['othercourse'];
	
	
	$html .= "<h4 data-toggle='modal' data-target='#myModal$i'>$name</h4>";
	$html .= "<a data-toggle='modal' data-target='#myModal$i' style='cursor:pointer;'>ଅଧିକ ଜାଣନ୍ତୁ </a>&nbsp;&nbsp;<a href='$link' target='_blank'>ପରିଦର୍ଶନ କରନ୍ତୁ</a>";
	
	
	$html .= "<div class='modal' id='myModal$i'>";
	$html .= "<div class='modal-dialog  modal-xl'>";
	$html .= "<div class='modal-content'>";
	$html .= "<div class='modal-header'>";
	$html .= "<h4 class='modal-title' style='color:#fff;padding:0;'></h4>";
	$html .= "<button type='button' class='close' data-dismiss='modal'>&times;</button>";
	$html .= "</div>";
	$html .= " <div class='modal-body'>";
	$html .= " <table class='table table-hover table-bordered table-responsive'>";
	$html .="<thead><tr>";
	
	if($description!=''){
	
	$html .="<th>କଳା ପାଠ୍ୟକ୍ରମର ତାଲିକା</th>";
	}
	if($sciencecourse!=''){
	$html .="<th>ବିଜ୍ଞାନ ପାଠ୍ୟକ୍ରମର ତାଲିକା</th>";
	}
	if($comercourse!=''){
	$html .="<th>ବାଣିଜ୍ୟ ପାଠ୍ୟକ୍ରମର ତାଲିକା</th>";
	}
	if($othercourse!=''){
	$html .="<th>ଅନ୍ୟାନ୍ୟ ପାଠ୍ୟକ୍ରମର ତାଲିକା</th>";
	}
	$html .="</tr></thead>";
	$html .="<tbody><tr>";
	if($description!=''){
	$html .="<td>$description</td>";
	}
	if($sciencecourse!=''){
	$html .="<td>$sciencecourse</td>";
	}
	if($comercourse!=''){
	$html .="<td>$comercourse</td>";
	}
	if($othercourse!=''){
		$html .="<td>$othercourse</td>";
	}
	$html .="</tr></tbody></table>";
	
	$html .= " </div>";
	$html .= "<div class='modal-footer'>";
	$html .= "<button type='button' class='btn btn-danger' data-dismiss='modal'></button>";
	$html .= "</div>";
	$html .= "</div>";
	$html .= "</div>";
	$html .= "</div>";
	
	$i++;
	
}
}else{
  $html .= "<p>ଖୁବ୍ ଶୀଘ୍ର ତଥ୍ୟ ପ୍ରଦାନ କରିବୁ</p>";  
}
$html .= "</div>";
echo $html;

?> 
 
 