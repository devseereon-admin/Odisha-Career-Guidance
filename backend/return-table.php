<?php
include "../admin/dbconn.php";
    $option = isset($_POST['tab'])?$_POST['tab']:null;
    $errmsg = "";
    $data = array();
    
    
    if($option == 100)
    {
        $id = $_POST['domainId'];
        
        $html = "
            <div class='form-group'>
                <label class='control-label'>Choose Your Location</label><br>
                <div class='custom-control custom-radio'>
                    <input type='radio' name='location' id='location' value='0' checked> National
                </div>
            </div>";
            
            $html .= "
            <select class='form-select' name='State' id='State' required onchange='showhidestate(this.value);'>
                <option value>Select State</option>";
            
            $state_sql = mysqli_query($conn, "SELECT * FROM state WHERE status='1'");
            while ($res_stat = mysqli_fetch_array($state_sql)) {
                $html .= "<option value='" . $res_stat['id'] . "'>" . $res_stat['name'] . "</option>";
            }
            
            $html .= "</select>";
            $html .= "<div id='dist-box'></div>";

        
        
        $errmsg = array(
            "response" => "1",
            "data" => $html,
            "message" => "success",
            "statusCode" => 200,
        );
    }
    else if($option == 101)
    {
        $html = "
            <select class='form-select' name='dist' id='dist' required >
                <option value>Select dist</option>";
            
            $state_sql = mysqli_query($conn, "SELECT * FROM district WHERE  status='1'");
            while ($res_stat = mysqli_fetch_array($state_sql)) {
                $html .= "<option value='" . $res_stat['id'] . "'>" . $res_stat['name'] . "</option>";
            }
            
        $html .= "</select>";
        
        $errmsg = array(
            "response" => "1",
            "data" => $html,
            "message" => "success",
            "statusCode" => 200,
        );
    }
    else if($option ==102)
    {
        $html = '';
        $institute = $_POST['institute'];
        $Domain = $_POST['Domain'];
        $location = $_POST['location'];
        $State = $_POST['State'];
        $state = $_POST['State'];
        $dist = $_POST['dist'];
        $squ = "";
        if($Domain == 1)
        {
            $squ = " AND description <> '' ";
        }
        else if($Domain == 2)
        {
            $squ = " AND sciencecourse <> '' ";
        }
        else if($Domain == 4)
        {
            $squ = " AND comercourse <> '' ";
        }
        
        $sql = "SELECT id,name,link FROM college WHERE status = '1' AND institute_typ = '$institute'  AND state='$State' and district = '$dist'  $squ GROUP BY name ORDER BY name ASC";
        $state_sql = mysqli_query($conn, $sql);
        if($state_sql->num_rows <1)
        {
            $html .= "<div class='content' style='padding-bottom:7px;'>";
                $html .= "<h4 style='cursor:pointer;' '>No Instituition Found !</h4>";
                
                $html .= "</div>";
        }
        else
        {
            while ($row = mysqli_fetch_array($state_sql)) {
                $id=$row['id'];
                $name=$row['name'];
                $link=$row['link'];
                $html .= "<div class='content' style='padding-bottom:7px;'>";
                $html .= "<h4 style='cursor:pointer;' onclick='viewInstituitionDetails($id)'>$name</h4>";
                $html .= "<a href='javascript:void(0)' onclick='viewInstitutionDetails($id)'  style='cursor:pointer;'>Explore</a>&nbsp;&nbsp;<a href='$link' target='_blank'>Visit</a>";
                $html .= "</div>";
            }
        }

        echo $html;
        exit;;
        
        
        
    }
    
    // ===================================================arts science commerce area end==================================
    
    // ===================================================== Vocational start ==================================================
    else if($option == 103)
    {
        //vocational code start
        $id = $_POST['domainId'];
        
        $html = "
            <div class='form-group'>
                <label class='control-label'>Choose Your Location</label><br>
                <div class='custom-control custom-radio'>
                    <input type='radio' name='location' id='location' value='0' checked> National
                </div>
            </div>";
            
            $html .= "
            <select class='form-select' name='State' id='State' required onchange='showhidestate(this.value);'>";
            
            $state_sql = mysqli_query($conn, "SELECT * FROM state WHERE id='1'");
            while ($res_stat = mysqli_fetch_array($state_sql)) {
                $html .= "<option value='" . $res_stat['id'] . "'>" . $res_stat['name'] . "</option>";
            }
            
        $html .= "</select>";
        $html .= "
            <select class='form-select' name='dist' id='dist' required >
                <option value>Select dist</option>";
            
            $state_sql = mysqli_query($conn, "SELECT * FROM district WHERE  status='1'");
            while ($res_stat = mysqli_fetch_array($state_sql)) {
                $html .= "<option value='" . $res_stat['id'] . "'>" . $res_stat['name'] . "</option>";
            }
            
        $html .= "</select>";

        
        
        $errmsg = array(
            "response" => "1",
            "data" => $html,
            "message" => "success",
            "statusCode" => 200,
        );
        
    }
    else if($option ==104)
    {
        $html = '';
        $institute = $_POST['institute'];
        $Domain = $_POST['Domain'];
        $location = $_POST['location'];
        $State = $_POST['State'];
        $state = $_POST['State'];
        $dist = $_POST['dist'];
        $squ = "";
         if($Domain == 3)
        {
            $squ = " AND othercourse <> '' ";
        }
        
        $sql = "SELECT id,name,link FROM college WHERE status = '1' AND institute_typ = '$institute' AND stream = '$Domain'  AND state='$State' and district = '$dist'  $squ GROUP BY name ORDER BY name ASC";
        $state_sql = mysqli_query($conn, $sql);
        if($state_sql->num_rows <1)
        {
            $html .= "<div class='content' style='padding-bottom:7px;'>";
                $html .= "<h4 style='cursor:pointer;' '>No Instituition Found !</h4>";
                
                $html .= "</div>";
        }
        else
        {
            while ($row = mysqli_fetch_array($state_sql)) {
                $id=$row['id'];
                $name=$row['name'];
                $link=$row['link'];
                $html .= "<div class='content' style='padding-bottom:7px;'>";
                $html .= "<h4 style='cursor:pointer;' onclick='viewInstituitionDetails($id)'>$name</h4>";
                $html .= "<a href='javascript:void(0)' onclick='viewInstitutionDetails($id)'  style='cursor:pointer;'>Explore</a>&nbsp;&nbsp;<a href='$link' target='_blank'>Visit</a>";
                $html .= "</div>";
            }
        }

        echo $html;
        exit;;
        
        
        
    }
    
    // ========================================================Vocational end=======================================================
    
    // ======================================================== nutral start=====================================================
    
    
    else if($option == 105)
    {
        //vocational code start
        $id = $_POST['domainId'];
        $html = "
            <select class='form-select' name='subcat' id='subcat' required >
                <option value>Select Option</option>";
            
            $state_sql = mysqli_query($conn, "select * from `subcatagory` where `cat_id`='5' and status='1'");
            while ($res_stat = mysqli_fetch_array($state_sql)) {
                $html .= "<option value='" . $res_stat['id'] . "'>" . $res_stat['name'] . "</option>";
            }
            
        $html .= "</select>";

        echo $html;
        exit;
        
    }
    
    else if($option ==106)
    {
        $html = '';
        $institute = $_POST['institute'];
        $Domain = $_POST['Domain'];
        $subcat = $_POST['subcat'];
        $squ = "";
        $squ = " AND subcat = '$subcat' AND othercourse <> '' ";
        
        
        $sql = "SELECT id,name,link FROM college WHERE status = '1' AND institute_typ = '$institute' AND stream = '$Domain'  $squ GROUP BY name ORDER BY name ASC";
        $state_sql = mysqli_query($conn, $sql);
        if($state_sql->num_rows <1)
        {
            $html .= "<div class='content' style='padding-bottom:7px;'>";
                $html .= "<h4 style='cursor:pointer;' '>No Instituition Found !</h4>";
                
                $html .= "</div>";
        }
        else
        {
            while ($row = mysqli_fetch_array($state_sql)) {
                $id=$row['id'];
                $name=$row['name'];
                $link=$row['link'];
                $html .= "<div class='content' style='padding-bottom:7px;'>";
                $html .= "<h4 style='cursor:pointer;' onclick='viewInstituitionDetails($id)'>$name</h4>";
                $html .= "<a href='javascript:void(0)' onclick='viewInstitutionDetails($id)'  style='cursor:pointer;'>Explore</a>&nbsp;&nbsp;<a href='$link' target='_blank'>Visit</a>";
                $html .= "</div>";
            }
        }

        echo $html;
        exit;;
        
        
        
    }
    
    // ======================================================== nutral end  =====================================================
    
    // ==========================================================Medical engneering and compatetive===========================
    else if($option ==108)
    {
        $html = '';
        $institute = $_POST['institute'];
        $Domain = $_POST['Domain'];
        $squ = "";
        $squ = " AND othercourse <> '' ";
        
        
        $sql = "SELECT id,name,link FROM college WHERE status = '1' AND institute_typ = '$institute' AND stream = '$Domain'  $squ GROUP BY name ORDER BY name ASC";
        $state_sql = mysqli_query($conn, $sql);
        if($state_sql->num_rows <1)
        {
            $html .= "<div class='content' style='padding-bottom:7px;'>";
                $html .= "<h4 style='cursor:pointer;' '>No Instituition Found !</h4>";
                
                $html .= "</div>";
        }
        else
        {
            while ($row = mysqli_fetch_array($state_sql)) {
                $id=$row['id'];
                $name=$row['name'];
                $link=$row['link'];
                $html .= "<div class='content' style='padding-bottom:7px;'>";
                $html .= "<h4 style='cursor:pointer;' onclick='viewInstituitionDetails($id)'>$name</h4>";
                $html .= "<a href='javascript:void(0)' onclick='viewInstitutionDetails($id)'  style='cursor:pointer;'>Explore</a>&nbsp;&nbsp;<a href='$link' target='_blank'>Visit</a>";
                $html .= "</div>";
            }
        }

        echo $html;
        exit;;
        
        
        
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
   echo  json_encode($errmsg);
?>