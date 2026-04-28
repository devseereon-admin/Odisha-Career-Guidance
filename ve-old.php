<?php
include "admin/dbconn.php";
extract($_POST);
$catdet = mysqli_fetch_assoc(mysqli_query($conn,"select * from catagory where id='$Domain' and status='1' order by `name`"));
$catnm = $catdet['name'];
$page  = $_POST['page'];
$limit = 10;
$District = $State == 1?$District:0;
					
//$District = $_POST['District'];

if(isset($_POST['Domain']) && $_POST['Domain']!=0 && $_POST['State']==0 && $_POST['subcat']==0){
    
    $res = mysqli_query($conn ,"SELECT COUNT(*) AS total FROM college where `institute_typ`='$institute' and `stream`='$Domain' and status='1' group by `name`  order by `name`");
    $total = $res->num_rows;
    $start = ($page - 1) * $limit;
	$total_pages = ceil($total / $limit);
	
    $clglist_sql = mysqli_query($conn ,"select * from college where `institute_typ`='$institute' and `stream`='$Domain' and status='1' group by `name`  order by `name` LIMIT $start, $limit");
   // echo "select * from college where `institute_typ`='$institute' and `stream`='$Domain' and status='1'  order by `name`";

    
}elseif(isset($_POST['Domain']) && $_POST['Domain']!=0 && $_POST['subcat']!=0 && $_POST['State']==0){
    $res = mysqli_query($conn ,"SELECT COUNT(*) AS total FROM college where `institute_typ`='$institute' and `stream`='$Domain' and `subcat`='$subcat' and status='1'   order by `name` ");
    $total = $res->num_rows;
    $start = ($page - 1) * $limit;
	$total_pages = ceil($total / $limit);
	
    $clglist_sql = mysqli_query($conn ,"select * from college where `institute_typ`='$institute' and `stream`='$Domain' and `subcat`='$subcat' and status='1'   order by `name` LIMIT $start, $limit");
  //  echo "select * from college where `institute_typ`='$institute' and `stream`='$Domain' and `subcat`='$subcat' and status='1'   order by `name`";
}

elseif(isset($_POST['District']) && $_POST['District']!=0 && $_POST['State']!=0 && $catnm =='Arts Areas'){
	$res = mysqli_query($conn ,"SELECT COUNT(*) AS total FROM college where `institute_typ`='$institute' and description!=''  and `location`='$customRadio' and `state`='$State'and `district`='$District' and status='1' order by `name`");
	$total = $res->num_rows;
    $start = ($page - 1) * $limit;
	$total_pages = ceil($total / $limit);
	$clglist_sql = mysqli_query($conn ,"select * from college where `institute_typ`='$institute' and description!=''  and `location`='$customRadio' and `state`='$State'and `district`='$District' and status='1' order by `name` LIMIT $start, $limit ");
//echo "select * from college where `institute_typ`='$institute' and description!='' or `stream`='$Domain'   and `location`='$customRadio'and `state`='$State'and `district`='$District' and status='1' ";

}elseif(isset($_POST['District']) && $_POST['District']!=0 && $catnm =='Science Areas'){
	
	//echo "select * from college where `institute_typ`='$institute' and sciencecourse!='' or `stream`='$Domain'   and `location`='$customRadio'and `state`='$State'and `district`='$District' and status='1' ";
    $res = mysqli_query($conn ,"SELECT COUNT(*) AS total FROM college where `institute_typ`='$institute' and sciencecourse!='' and `location`='$customRadio'and `state`='$State'and `district`='$District' and status='1' order by `name`");
	$total = $res->num_rows;
    $start = ($page - 1) * $limit;
	$total_pages = ceil($total / $limit);
	$clglist_sql = mysqli_query($conn ,"select * from college where `institute_typ`='$institute' and sciencecourse!='' and `location`='$customRadio'and `state`='$State'and `district`='$District' and status='1' order by `name` LIMIT $start, $limit ");
}
elseif(isset($_POST['District']) && $_POST['District']!=0 && $catnm =='Commerce Areas'){
    $res = mysqli_query($conn ,"SELECT COUNT(*) AS total FROM college where `institute_typ`='$institute' and comercourse!='' and `location`='$customRadio'and `state`='$State'and `district`='$District' and status='1' order by `name` ");
    $total = $res->num_rows;
    $start = ($page - 1) * $limit;
	$total_pages = ceil($total / $limit);
    $clglist_sql = mysqli_query($conn ,"select * from college where `institute_typ`='$institute' and comercourse!='' and `location`='$customRadio'and `state`='$State'and `district`='$District' and status='1' order by `name` LIMIT $start, $limit ");	
}elseif(isset($_POST['District']) && $_POST['District']!=0 ){
	$res = mysqli_query($conn ,"SELECT COUNT(*) AS total FROM college where `institute_typ`='$institute' and `stream`='$Domain'  and `location`='$customRadio'and `state`='$State' and `district`='$District' and status='1' order by `name` ");
	$total = $res->num_rows;
    $start = ($page - 1) * $limit;
	$total_pages = ceil($total / $limit);
	$clglist_sql = mysqli_query($conn ,"select * from college where `institute_typ`='$institute' and `stream`='$Domain'  and `location`='$customRadio'and `state`='$State' and `district`='$District' and status='1' order by `name` LIMIT $start, $limit");	
//echo "select * from college where `institute_typ`='$institute' and `stream`='$Domain'  and `location`='$customRadio'and `state`='$State' and `district`='$District' and status='1' ";

}
elseif(!isset($_POST['District']) &&  $catnm =='Arts Areas' ){
    	$res = mysqli_query($conn ,"SELECT COUNT(*) AS total FROM college where `institute_typ`='$institute' and description!='' and `location`='$customRadio'and `state`='$State'and `district`='0' and status='1' order by `name`  ");
        $total = $res->num_rows;
        $start = ($page - 1) * $limit;
	    $total_pages = ceil($total / $limit);
        $clglist_sql = mysqli_query($conn ,"select * from college where `institute_typ`='$institute' and description!='' and `location`='$customRadio'and `state`='$State'and `district`='0' and status='1' order by `name` LIMIT $start, $limit ");	
//echo "select * from college where `institute_typ`='$institute' and `stream`='$Domain' and `location`='$customRadio'and `state`='$State' and `district`='0'  and status='1' ";
}elseif(!isset($_POST['District']) && $catnm =='Science Areas' ){
    $res = mysqli_query($conn ,"SELECT COUNT(*) AS total FROM college where `institute_typ`='$institute' and sciencecourse!='' and `location`='$customRadio'and `state`='$State'and `district`='0' and status='1' order by `name` ");
    $total = $res->num_rows;
    $start = ($page - 1) * $limit;
	$total_pages = ceil($total / $limit);
    $clglist_sql = mysqli_query($conn ,"select * from college where `institute_typ`='$institute' and sciencecourse!='' and `location`='$customRadio'and `state`='$State'and `district`='0' and status='1' order by `name` LIMIT $start, $limit ");	
}elseif(!isset($_POST['District']) && $catnm =='Commerce Areas' ){
    $res = mysqli_query($conn ,"SELECT COUNT(*) AS total FROM college where `institute_typ`='$institute' and comercourse!='' and `location`='$customRadio'and `state`='$State'and `district`='0' and status='1' order by `name`");
    $total = $res->num_rows;
    $start = ($page - 1) * $limit;
	$total_pages = ceil($total / $limit);
    $clglist_sql = mysqli_query($conn ,"select * from college where `institute_typ`='$institute' and comercourse!='' and `location`='$customRadio'and `state`='$State'and `district`='0' and status='1' order by `name` LIMIT $start, $limit ");	
}else{
    $res = mysqli_query($conn ,"SELECT COUNT(*) AS total FROM college where `institute_typ`='$institute' and `stream`='$Domain' and `location`='$customRadio'and `state`='$State' and `district`='0'  and status='1' order by `name` ");
    $total = $res->num_rows;
    $start = ($page - 1) * $limit;
	$total_pages = ceil($total / $limit);
    $clglist_sql = mysqli_query($conn ,"select * from college where `institute_typ`='$institute' and `stream`='$Domain' and `location`='$customRadio'and `state`='$State' and `district`='0'  and status='1' order by `name` LIMIT $start, $limit ");	  
}

$cnt_insti = mysqli_num_rows($clglist_sql);
//$cnt = mysqli_num_rows($clglist_sql);
	
$html  = "<div class='search-result-one'>";
if($cnt_insti!=0){
$i=1;
while($res_list = mysqli_fetch_array($clglist_sql)){
	
	$id = $res_list['id'];
	$link = $res_list['link'];
	$name = $res_list['name'];
	$description = $res_list['description'];
	$sciencecourse = $res_list['sciencecourse'];
	$comercourse = $res_list['comercourse'];
	$othercourse = $res_list['othercourse'];
	
        $non_empty_count = 0;

        if (!empty($description)) {
            $non_empty_count++;
        }
        if (!empty($sciencecourse)) {
            $non_empty_count++;
        }
        if (!empty($comercourse)) {
            $non_empty_count++;
        }
        if (!empty($othercourse)) {
            $non_empty_count++;
        }
        
        // Set the modal size based on the number of non-empty variables
        // $modal_size = ($non_empty_count > 2) ? 'xl' : 'xs';
        $modal_size = ($non_empty_count > 2) ? 'modal-xl' : 'modal-md';
        $table_responsive = ($non_empty_count > 2) ? 'table-responsive' : '';
        
	
	$html .= "<h4 onclick='viewInstituteDetails(\"$id\")'>$name</h4>";
	$html .= "<a href='javascript:void(0);' onclick='viewInstituteDetails(\"$id\")'>explore</a>&nbsp;&nbsp;<a href='$link' target='_blank'>Visit</a>";
	
	
	$html .= "<div class='modal' id='myModal$i'>";
	$html .= "<div class='modal-dialog $modal_size'>";
	$html .= "<div class='modal-content'>";
	$html .= "<div class='modal-header'>";
	$html .= "<h4 class='modal-title' style='color:#fff;padding:0;'></h4>";
	$html .= "<button type='button' class='close' data-dismiss='modal'>&times;</button>";
	$html .= "</div>";
	$html .= " <div class='modal-body'>";
	$html .= " <table class='table table-hover table-bordered $table_responsive'>";
	$html .="<thead><tr>";
	
	if($description!=''){
	
	$html .="<th>Arts Courses</th>";
	}
	if($sciencecourse!=''){
	$html .="<th>Science Courses</th>";
	}
	if($comercourse!=''){
	$html .="<th>Commerce Courses</th>";
	}
	if($othercourse!=''){
	$html .="<th>Courses</th>";
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

$html .= "<div class='pagination'><center>";

// Previous button
if ($page > 1) {
    $html .= "<a class='prev-next' href='javascript:void(0);' onclick='getInstitute(" . ($page - 1) . ")'>&laquo; Prev</a> ";
}

// Middle pages
$mid_pages_start = max(1, $page - 2);
$mid_pages_end = min($total_pages, $page + 2);

if ($mid_pages_start > 1) {
    $active = $page == 1 ? 'active' : '';
    $html .= "<a class='page $active' href='javascript:void(0);' onclick='getInstitute(1)'>1</a> ... ";
}
for ($i = $mid_pages_start; $i <= $mid_pages_end; $i++) {
    $active = $page == $i ? 'active' : '';
    $html .= "<a class='page $active' href='javascript:void(0);' onclick='getInstitute(" . $i . ")'>" . $i . "</a> ";
}
if ($mid_pages_end < $total_pages) {
    $active = $page == $i ? 'active' : '';
    $html .= "... <a class='page $active' href='javascript:void(0);' onclick='getInstitute(" . $total_pages . ")'>" . $total_pages . "</a> ";
}

// Next button
if ($page < $total_pages) {
    $html .= "<a class='prev-next' href='javascript:void(0);' onclick='getInstitute(" . ($page + 1) . ")'>Next &raquo;</a>";
}
$html .= "</center></div>";



}else{
  $html .= "<p>Will upload the data shortly</p>";  
}

$html .= "</div>";
echo $html;

?> 
 
 