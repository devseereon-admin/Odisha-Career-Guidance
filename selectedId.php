<?php
include "admin/dbconn.php";
extract($_POST);
$catdet_block = mysqli_query($conn,"select description from college_block_wise where id='$id' and status='1'");
//$catnm = $catdet['name'];
$cnt_insti_block  = mysqli_num_rows($catdet_block);
if($cnt_insti_block!=0){
    $res_list_block = mysqli_fetch_array($catdet_block);
    // print_r($res_list_block['0']);exit;
    $html = $res_list_block['0'];
}
else
{
    $html = "We will upload shortly";
}
echo $html;

?> 