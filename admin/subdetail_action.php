<?php
include "dbconn.php";
if (!empty($_POST['action']) && $_POST['action'] == "add") {
	extract($_POST);
	//var_dump($_POST);
	
	$target_dir = "../about-image/";
	$target_file = $target_dir . basename($_FILES["abt_img"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$abt_img=rand(1,999999)."".time().".".$imageFileType;
	$chk_about=move_uploaded_file($_FILES["abt_img"]["tmp_name"], $target_dir.$abt_img);
	
	$target_dir = "../roadmap-image/";
	$target_file = $target_dir . basename($_FILES["road_map"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$road_map=rand(1,999999)."".time().".".$imageFileType;
	$chk_road_map=move_uploaded_file($_FILES["road_map"]["tmp_name"], $target_dir.$road_map);
	
		$target_dir = "../banner-image/";
	$target_file = $target_dir . basename($_FILES["banner"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$banner=rand(1,999999)."".time().".".$imageFileType;
	$chk_banner=move_uploaded_file($_FILES["banner"]["tmp_name"], $target_dir.$banner);
	
	$target_dir = "../successtory-image/";
	
	$target_file = $target_dir . basename($_FILES["success_strimg"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$success_strimg=rand(1,999999)."".time().".".$imageFileType;
	$chk_sucees=move_uploaded_file($_FILES["success_strimg"]["tmp_name"], $target_dir.$success_strimg);
	
	$target_file = $target_dir . basename($_FILES["enterpre_succ_img"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$enterpre_succ_img=rand(1,999999)."".time().".".$imageFileType;
	$chk_enterpre_succ=move_uploaded_file($_FILES["enterpre_succ_img"]["tmp_name"], $target_dir.$enterpre_succ_img);
	
	$sub_subcat_det = mysqli_fetch_assoc(mysqli_query($conn ,"select * from `sub_subcategory` where id='$sbid' and status='1' "));
	$sub_subcatname = $sub_subcat_det['name'];
	
	
$insert = mysqli_query($conn , "INSERT INTO `detail` (`subcat_id`, `name`, `about`, `road_map`, `clg_in`, `clg_od`, `clg_ab`, `enxm_in`, `enxm_od`, `enxm_ab`, `schlr_od`, `schlr_national`, `enterprener`, `differenty_abled`,`aboiut_img`, `skill_required`, `success_strimg`, `sucees_stitle`, `success_slink`, `success_cont`,`enterpre_succ_titl`, `enterpre_succ_img`, `enterpre_succ_con`, `enterpre_succ_source`,`banner`) 
 VALUES ('$sbid' ,'$sub_subcatname' ,'$about','$road_map','$clg_in','$clg_od','$clg_ab','$enxm_in','$enxm_od','$enxm_ab','$schlr_od','$schlr_national','$enterprener','$differenty_abled','$abt_img','$skill_required' ,'$success_strimg','$sucees_stitle','$success_slink','$success_cont','$enterpre_succ_titl','$enterpre_succ_img','$enterpre_succ_con','$enterpre_succ_source' ,'$banner')");
//exit;
if($insert){
        
        $msg = "subcatagory added";
        $alert = "success";
		
    }else{
        $msg = "Unable to add subcatagory";
        $alert = "danger";
    }

	
	header("Location:croption.php");
}

if (!empty($_POST['action']) && $_POST['action'] == "update") {
	extract($_POST);
	//var_dump($_POST);
	
	$sub_sub_cat_det = mysqli_fetch_assoc(mysqli_query($conn , "select * from detail where `subcat_id`='$sbid' and status='1'"));
	
	if($_FILES["abt_img"]["name"] !=''){
		$target_dir = "../about-image/";
	$target_file = $target_dir . basename($_FILES["abt_img"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$abt_img=rand(1,999999)."".time().".".$imageFileType;
	$chk_about=move_uploaded_file($_FILES["abt_img"]["tmp_name"], $target_dir.$abt_img);
	}else{
		$abt_img = $sub_sub_cat_det['aboiut_img'];
	}
	
	if($_FILES["success_strimg"]["name"] !=''){
		
		$target_dir = "../successtory-image/";
	
	$target_file = $target_dir . basename($_FILES["success_strimg"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$success_strimg=rand(1,999999)."".time().".".$imageFileType;
	$chk_sucees=move_uploaded_file($_FILES["success_strimg"]["tmp_name"], $target_dir.$success_strimg);
	}else{
		$success_strimg = $sub_sub_cat_det['success_strimg'];
	}
	
	if($_FILES["enterpre_succ_img"]["name"] !=''){
		
		$target_dir = "../successtory-image/";
	
	$target_file = $target_dir . basename($_FILES["enterpre_succ_img"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$enterpre_succ_img=rand(1,999999)."".time().".".$imageFileType;
	$chk_enterpre_succ=move_uploaded_file($_FILES["enterpre_succ_img"]["tmp_name"], $target_dir.$enterpre_succ_img);
	}else{
		$enterpre_succ_img = $sub_sub_cat_det['enterpre_succ_img'];
	}
	
	if($_FILES["road_map"]["name"] !=''){
		
		$target_dir = "../roadmap-image/";
	$target_file = $target_dir . basename($_FILES["road_map"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$road_map=rand(1,999999)."".time().".".$imageFileType;
	$chk_road_map=move_uploaded_file($_FILES["road_map"]["tmp_name"], $target_dir.$road_map);
	}else{
		$road_map = $sub_sub_cat_det['road_map'];
	}
	
		if($_FILES["banner"]["name"] !=''){
		
	
		$target_dir = "../banner-image/";
	$target_file = $target_dir . basename($_FILES["banner"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$banner=rand(1,999999)."".time().".".$imageFileType;
	$chk_banner=move_uploaded_file($_FILES["banner"]["tmp_name"], $target_dir.$banner);
	}else{
		$banner = $sub_sub_cat_det['banner'];
	}
	
$update = mysqli_query($conn ,"UPDATE `detail` SET `name`='$sub_subcatname',`about`='$about',`road_map`='$road_map',`clg_in`='$clg_in',
`clg_od`='$clg_od',`clg_ab`='$clg_ab',`enxm_in`='$enxm_in',`enxm_od`='$enxm_od',`enxm_ab`='$enxm_ab',`schlr_od`='$schlr_od',
`schlr_national`='$schlr_national',`enterprener`='$enterprener',`differenty_abled`='$differenty_abled',`aboiut_img`='$abt_img',
`skill_required`='$skill_required',`success_strimg`='$success_strimg',`sucees_stitle`='$sucees_stitle',`success_slink`='$success_slink',`success_cont`='$success_cont',
`enterpre_succ_titl`='$enterpre_succ_titl',`enterpre_succ_img`='$enterpre_succ_img',
`enterpre_succ_con`='$enterpre_succ_con',`enterpre_succ_source`='$enterpre_succ_source',`banner`='$banner' WHERE subcat_id='$sbid' ");

if($update){
        
        $msg = "subcatagory added";
        $alert = "success";
		
    }else{
        $msg = "Unable to add subcatagory";
        $alert = "danger";
    }

	
	header("Location:croption.php");
}
?>