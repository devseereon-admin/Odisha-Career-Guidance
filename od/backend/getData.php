<?php
include "../admin/dbconn.php";
    $option = isset($_POST['tab'])?$_POST['tab']:null;
    $errmsg = "";
    $data = array();
    if($option == 100)
    {
        $det_sub = mysqli_query($conn ,"select * from  catagory where status='1'  order by priority asc");
        
        if($det_sub->num_rows > 0)
        {
            while ($row = mysqli_fetch_assoc($det_sub)) {
                if($row['id'] == 7 || $row['id'] == '8')
                {
                    
                }
                else
                {
                    
                    $data[] = $row;
                }
            }        
            $errmsg = array(
                "response" => "1",
                "data" => $data,
                "message" => "Data found successfully",
                "statusCode" => 200,
            );
        }
        else
        {
                   
            $errmsg = array(
                "response" => "0",
                "data" => $data,
                "message" => "Data not found",
                "statusCode" => 404,
            );
        }
    }
    else if($option == 101)
    {
        
        $cid = $_POST['id'];
        $subCategory = mysqli_query($conn ,"select * from subcatagory where `cat_id`='$cid' and status = '1' ");
        if($subCategory->num_rows > 0)
        {
            while ($row = mysqli_fetch_assoc($subCategory)) {
                $subCategoryId = $row['id'];
                $subSubCategoryCheck = mysqli_query($conn, "SELECT COUNT(*) AS count FROM sub_subcategory WHERE `subcat_id`='$subCategoryId'");
                $subSubCategoryResult = mysqli_fetch_assoc($subSubCategoryCheck);
                if ($subSubCategoryResult['count'] > 0) {
                    $row['is_sub_subcategory'] = '1'; // or you can store the ID if needed
                } else {
                    $row['is_sub_subcategory'] = '0';
                }

                $data[] = $row;
            }  
            $errmsg = array(
                "response" => "1",
                "data" => $data,
                "message" => "Data found successfully",
                "statusCode" => 200,
            );
        }
        else
        {
                   
            $errmsg = array(
                "response" => "0",
                "data" => $data,
                "message" => "Data not found",
                "statusCode" => 404,
            );
        }
    }
    else if($option == 102)
    {
        $cid = $_POST['id'];
        $det_sub = mysqli_query($conn ,"select * from  sub_subcategory where  subcat_id = '$cid' ");
        if($det_sub->num_rows > 0)
        {
            while ($row = mysqli_fetch_assoc($det_sub)) {
                $data[] = $row;
            }        
            $errmsg = array(
                "response" => "1",
                "data" => $data,
                "message" => "Data found successfully",
                "statusCode" => 200,
            );
        }
        else
        {
                   
            $errmsg = array(
                "response" => "0",
                "data" => $data,
                "message" => "Data not found",
                "statusCode" => 404,
            );
        }
    }
    else if($option == 200)
    {
        $det_sub = mysqli_query($conn ,"select * from catagory where status='1' ");
        if($det_sub->num_rows > 0)
        {
            while ($row = mysqli_fetch_assoc($det_sub)) {
                $data[] = $row;
            }        
            $errmsg = array(
                "response" => "1",
                "data" => $data,
                "message" => "Data found successfully",
                "statusCode" => 200,
            );
        }
        else
        {
                   
            $errmsg = array(
                "response" => "0",
                "data" => $data,
                "message" => "Data not found",
                "statusCode" => 404,
            );
        }
    }
    else if($option == 201)
    {
        $det_sub = mysqli_query($conn ,"select * from state where status='1'");
        if($det_sub->num_rows > 0)
        {
            while ($row = mysqli_fetch_assoc($det_sub)) {
                $data[] = $row;
            }        
            $errmsg = array(
                "response" => "1",
                "data" => $data,
                "message" => "Data found successfully",
                "statusCode" => 200,
            );
        }
        else
        {
                   
            $errmsg = array(
                "response" => "0",
                "data" => $data,
                "message" => "Data not found",
                "statusCode" => 404,
            );
        }
    }
    else if($option == 202)
    {
        $stateId = $_POST['stateId'];
        $det_sub = mysqli_query($conn ,"select * from district where status='1'");
        if($det_sub->num_rows > 0)
        {
            while ($row = mysqli_fetch_assoc($det_sub)) {
                $data[] = $row;
            }        
            $errmsg = array(
                "response" => "1",
                "data" => $data,
                "message" => "Data found successfully",
                "statusCode" => 200,
            );
        }
        else
        {
                   
            $errmsg = array(
                "response" => "0",
                "data" => $data,
                "message" => "Data not found",
                "statusCode" => 404,
            );
        }
    }
    /*else if($option == 203)
    {
        // data : {'tab' : '203',stateId,insType,catId,distId},
        $state_id = $_POST['stateId'];
        if($_POST['insType'] == "Government"){$insType = 1;}else{$insType = 2;}
        $catId = $_POST['catId'];
        $distId = !empty($_POST['distId']) ? $_POST['distId'] : null;
        if($distId != null)
        {
            $det_sub = mysqli_query($conn ,"select name,id,link from college where state ='$state_id' and district = '$distId' and institute_typ ='$insType' and stream = '$catId' and status='1'");
        }
        else
        {
            $det_sub = mysqli_query($conn ,"select name,id,link from college where state ='$state_id' and institute_typ ='$insType' and stream = '$catId' and status='1'");
        }
        if($det_sub->num_rows > 0)
        {
            while ($row = mysqli_fetch_assoc($det_sub)) {
                $data[] = $row;
            }        
            $errmsg = array(
                "response" => "1",
                "data" => $data,
                "message" => "Data found successfully",
                "statusCode" => 200,
            );
            // header('status':200);
        }
        else
        {
                   
            $errmsg = array(
                "response" => "0",
                "data" => $data,
                "message" => "Data not found",
                "statusCode" => 404,
            );
        }
    } */
    else if($option == 203)
    {
        $state_id = $_POST['stateId'];
        if($_POST['insType'] == "Government"){$insType = 1;}else{$insType = 2;}
        $catId = $_POST['catId'];
        $distId = !empty($_POST['distId']) ? $_POST['distId'] : null;
        $data = [];
        if($catId == 4)
        {
            if($distId != null)
            {
                $det_sub = mysqli_query($conn ,"select name,id,link from college where state ='$state_id' and district = '$distId' and institute_typ ='$insType' and comercourse <>''  and status='1'");
            }
            else
            {
                 $det_sub = mysqli_query($conn ,"select name,id,link from college where state ='$state_id' and institute_typ ='$insType' and comercourse <>''  and status='1'");
            }
        }
        else
        {
            if($distId != null)
            {
                $det_sub = mysqli_query($conn ,"select name,id,link from college where state ='$state_id' and district = '$distId' and institute_typ ='$insType' and stream = '$catId' and status='1'");
            }
            else
            {
                 $det_sub = mysqli_query($conn ,"select name,id,link from college where state ='$state_id' and institute_typ ='$insType' and stream = '$catId' and status='1'");
            }
        }
        if($det_sub->num_rows > 0)
        {
            while ($row = mysqli_fetch_assoc($det_sub)) {
                $data[] = $row;
            }        
            $errmsg = array(
                "response" => "1",
                "data" => $data,
                "message" => "Data found successfully",
                "statusCode" => 200,
            );
        }
        else
        {
                   
            $errmsg = array(
                "response" => "0",
                "data" => $data,
                "message" => "Data not found",
                "statusCode" => 404,
            );
        }
        // print_r($errmsg);
        // exit;
    }
    else if($option == 204)
    {
        if($_POST['instype'] == "Government"){$insType = 1;}else{$insType = 2;}
        $catId = $_POST['cat_id'];
        
        $det_sub = mysqli_query($conn ,"select name,id,link from college where  institute_typ ='$insType' and stream = '$catId' and status='1'");
        
        if($det_sub->num_rows > 0)
        {
            while ($row = mysqli_fetch_assoc($det_sub)) {
                $data[] = $row;
            }        
            $errmsg = array(
                "response" => "1",
                "data" => $data,
                "message" => "Data found successfully",
                "statusCode" => 200,
            );
            // header('status':200);
        }
        else
        {
                   
            $errmsg = array(
                "response" => "0",
                "data" => $data,
                "message" => "Data not found",
                "statusCode" => 404,
            );
        }
    }
    
    
    else if($option == 205)
    {
        
        if($_POST['instype'] == "Government"){$insType = 1;}else{$insType = 2;}
        $catId = $_POST['cat_id'];
        
        $det_sub = mysqli_query($conn ,"select * from `subcatagory` where `cat_id`='$catId' and status='1'");
        
        if($det_sub->num_rows > 0)
        {
            while ($row = mysqli_fetch_assoc($det_sub)) {
                $data[] = $row;
            }        
            $errmsg = array(
                "response" => "1",
                "data" => $data,
                "message" => "Data found successfully",
                "statusCode" => 200,
            );
            // header('status':200);
        }
        else
        {
                   
            $errmsg = array(
                "response" => "0",
                "data" => $data,
                "message" => "Data not found",
                "statusCode" => 404,
            );
        }
       
    }
    else if($option == 206)
    {
        
        if($_POST['instype'] == "Government"){$insType = 1;}else{$insType = 2;}
        $catId = $_POST['cat_id'];
        $subcat = $_POST['sub_cat_id'];
        // echo "select * from college where `institute_typ`='$insType' and `stream`='6' and `subcat`='$subcat' and status='1'   order by `name` asc";
        $det_sub = mysqli_query($conn ,"select * from college where `institute_typ`='$insType' and `stream`='6' and `subcat`='$subcat' and status='1'   order by `name` asc");
        // $det_sub = mysqli_query($conn ,"select * from `subcatagory` where `cat_id`='$catId' and status='1'");
       
        if($det_sub->num_rows > 0)
        {
            while ($row = mysqli_fetch_assoc($det_sub)) {
                $data[] = $row;
            }        
            $errmsg = array(
                "response" => "1",
                "data" => $data,
                "message" => "Data found successfully",
                "statusCode" => 200,
            );
          
        }
        else
        {
                   
            $errmsg = array(
                "response" => "0",
                "data" => $data,
                "message" => "Data not found",
                "statusCode" => 404,
            );
        }
    }
    else if($option == 300)
    {
        $id = $_POST['id'];
        $det_sub = mysqli_query($conn ,"SELECT * FROM `scholarship` where `type` = '$id'");
        if($det_sub->num_rows > 0)
        {
            while ($row = mysqli_fetch_assoc($det_sub)) {
                
                $data[] = $row;
            }        
            $errmsg = array(
                "response" => "1",
                "data" => $data,
                "message" => "Data found successfully",
                "statusCode" => 200,
            );
        }
        else
        {
                   
            $errmsg = array(
                "response" => "0",
                "data" => $data,
                "message" => "Data not found",
                "statusCode" => 404,
            );
        }
    }
      else if($option == 301)
    {
        $id = $_POST['id'];
        $cls = $_POST['cls'];
        $det_sub = mysqli_query($conn ,"SELECT * FROM `scholarship` where `type` = '$id' and class='$cls' and  status='1' order by `name` ");
        if($det_sub->num_rows > 0)
        {
            while ($row = mysqli_fetch_assoc($det_sub)) {
                
                $data[] = $row;
            }        
            $errmsg = array(
                "response" => "1",
                "data" => $data,
                "message" => "Data found successfully",
                "statusCode" => 200,
            );
        }
        else
        {
                   
            $errmsg = array(
                "response" => "0",
                "data" => $data,
                "message" => "Data not found",
                "statusCode" => 404,
            );
        }
    }
    else if($option == 400)
    {
        $id = $_POST['id'];
        $det_sub = mysqli_query($conn ,"SELECT * FROM `qualification` where `institute_typ` = '$id' order by `name` asc");
        if($det_sub->num_rows > 0)
        {
            while ($row = mysqli_fetch_assoc($det_sub)) {
                
                $data[] = $row;
            }        
            $errmsg = array(
                "response" => "1",
                "data" => $data,
                "message" => "Data found successfully",
                "statusCode" => 200,
            );
        }
        else
        {
                   
            $errmsg = array(
                "response" => "0",
                "data" => $data,
                "message" => "Data not found",
                "statusCode" => 404,
            );
        }
    }
    else if($option == 401)
    {
        
        $location_id = $_POST['location_id'];
        $institute_typ = $_POST['institute_typ'];
        $qualification_id = $_POST['qualification_id'];
        $det_sub = mysqli_query($conn ,"SELECT * FROM `entnace_exam` where `type` = '$institute_typ' and `qualification` = '$qualification_id' and `location` = '$location_id'");
 
        if($det_sub->num_rows > 0)
        {
            while ($row = mysqli_fetch_assoc($det_sub)) {
                
                $data[] = $row;
            }        
            $errmsg = array(
                "response" => "1",
                "data" => $data,
                "message" => "Data found successfully",
                "statusCode" => 200,
            );
            
        }
        else
        {
                   
            $errmsg = array(
                "response" => "0",
                "data" => $data,
                "message" => "Data not found",
                "statusCode" => 404,
            );
        }
    }

    else if($option == 500)
    {
        $id = $_POST['id'];
        $det_sub = mysqli_query($conn ,"select name,id,link,description,sciencecourse,comercourse,othercourse from college where id = '$id'");
        $res_list = mysqli_fetch_assoc($det_sub);
        
        $link = $res_list['link'];
        $name = $res_list['name'];
        $description = $res_list['description'];
        $sciencecourse = $res_list['sciencecourse'];
        $comercourse = $res_list['comercourse'];
        $othercourse = $res_list['othercourse'];
        $html = "";  
        
        $html .= "<div class='modal'  id='instituteDetails-modal'>";
        $html .= "<div class='modal-dialog  modal-xl'>";
        $html .= "<div class='modal-content'>";
        $html .= "<div class='modal-header'>";
        $html .= "<h4 class='modal-title' style='color:#fff;padding:0;'>$name</h4>";
        $html .= "<button type='button' class='close' data-dismiss='modal'>&times;</button>";
        $html .= "</div>";
        $html .= " <div class='modal-body'>";
        $html .= " <table class='table table-hover table-bordered table-responsive'>";
        $html .="<thead><tr>";
        
        if($description!=''){
        
        $html .="<th>କଳା ପାଠ୍ୟକ୍ରମ</th>";
        }
        if($sciencecourse!=''){
        $html .="<th>ବିଜ୍ଞାନ ପାଠ୍ୟକ୍ରମ</th>";
        }
        if($comercourse!=''){
        $html .="<th>ବାଣିଜ୍ୟ ପାଠ୍ୟକ୍ରମ</th>";
        }
        if($othercourse!=''){
        $html .="<th>ପାଠ୍ୟକ୍ରମ</th>";
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
        $errmsg = array(
            "response" => "1",
            "data" => $html,
            "message" => "success",
            "statusCode" => 200,
        );
    }
    else if($option == 501)
    {
        $id = $_POST['id'];
        $det_sub = mysqli_query($conn ,"select link,name,description,eligibility_criteria,stipend from scholarship  where id = '$id'");
        $res_list = mysqli_fetch_assoc($det_sub);
        
        $link = $res_list['link'];
        $name = $res_list['name'];
        $description = $res_list['description'];
        $eligibility_criteria = $res_list['eligibility_criteria'];
        $stipend = $res_list['stipend'];

        $html = "";  
        
        $html .= "<div class='modal' id='instituteDetails-modal'>";
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

        $errmsg = array(
            "response" => "1",
            "data" => $html,
            "message" => "success",
            "statusCode" => 200,
        );
    }
    else
    {
        $errmsg = array(
            "response" => "0",
            "data" => "",
            "message" => "Something went wrong",
            "statusCode" => 500,
        );
    }

    echo json_encode($errmsg);
?>