<?php
include "admin/dbconn.php";
$page = isset($_GET['page']) ? $_GET['page'] : 1; 
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Ama Career</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

	
	<?php include "include/header_css.php";?>
	<style>
	.College form select.form-select{
		border-radius: 0 !important;
	}
	.content h4 {
        padding: 0px !important;
        font-size: 20px !important;
    }
	</style>
		<style>
	.College form select.form-select{
		border-radius: 0 !important;
	}
	.content h4 {
    padding: 0px !important;
    font-size: 20px !important;
   
}

    .pagination {
        margin: 20px 0;
    }
.pagination .prev-next {
    background: #eee;
    padding: 5px;
    color: #000;
    text-decoration: none;
}

.pagination  a.page {
    background: #ddd;
    padding: 4px 7px;
}

.pagination  a.page.active {
    background: #0D6EFD;
    color: white;
}

</style>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-K43FK2HL');</script>
<!-- End Google Tag Manager -->

	</head>
	<body>
	    
	    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K43FK2HL"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

		<!-- -------------header start---------- -->
		<!--<section class="top-logo">-->
		<!--	<div class="container">-->
		<!--		<div class="row">-->
		<!--			<div class="col-md-4 col-8 img-one" >-->
		<!--				<img src="img/Logo-1.png" class="img-fluid">-->
		<!--			</div>-->
		<!--			<div class="col-md-4 col-2 img-two">-->
		<!--				<img src="img/Logo-2.png" class="img-fluid">-->
		<!--			</div>-->
		<!--			<div class="col-md-4 col-2 img-three" >-->
		<!--				<img src="img/Unicef-logo.gif" class="img-fluid">-->
		<!--			</div>-->
		<!--		</div>-->
		<!--	</div>-->
		<!--</section>-->
		<section class="top-logo">
			<div class="container">
				<?php include "include/top_bar.php";?>
			</div>
		</section>
		<section class ="bg-pattern header-menubg" >
			<div class="container">
			<div class="row">
			<div class="col-md-10 col-6">
				<?php include "include/nav_menu.php";?>
			</div>
			<div class="col-md-2 col-6">
			<nav class="navbar navbar-expand-sm navbar-dark">
			      	<div class="d-flex language">
			      	<div class="language-od">
			      	
					  <a href="../college-chnge.php" class="language-odia">English</a>
			      	</div>
			        <div class="language-en">
			        <a href="college-chnge.php" class="language-odia">ଓଡିଆ</a>
			      	</div>
			      	</div>
				</nav> 
			</div>
			</div>
			</div>      
		</section>
		<!------ header end ------------->

		<section class="College">
			<div class="container">
				<div class="College-round">
				<h1 class="heading-one" style="text-align:center !important;"> ଶିକ୍ଷା ଅନୁଷ୍ଠାନ</h1>
				<div class="row">
					
					<div class="col-md-3">
					<div class="filterfrm" style="background-color: #d5dde9;padding: 10px;">
						<form  name="clgfrm" method="post" id='clgrtfrm'>
						
						     <select class="form-select" name="institute" id="institute" required>
						     <option value="">ଅନୁଷ୍ଠାନ ଚୟନ କରନ୍ତୁ।</option>
						     <option value='1'>ସରକାରୀ</option>
						     <option value='2'>ବେସରକାରୀ</option>
						   </select>
						   
						   <select class="form-select" name="Domain" id="Domain" onchange ="displayloc(this.value)" required>
						     <option value="">ପ୍ରଭାବକ୍ଷେତ୍ର ଚୟନ କରନ୍ତୁ।</option>
							 <?php
							 
							 $strm_sql = mysqli_query($conn,"select * from catagory where status='1' ");
							 while($res_strm = mysqli_fetch_array($strm_sql))
							 {
							 ?>
						     <option value='<?=$res_strm['id'];?>'><?=$res_strm['name'];?></option>
						     
							 <?php
							 }
							 ?>
						   </select>
						      <div id='displaycarr' style="display:none;">
						       <select class="form-select" name='subcat' id="subcat" >
						        <option value=""> ଚୟନ କରନ୍ତୁ।</OPTION>
						        <?php
						           $crr = mysqli_query($conn,"select * from `subcatagory` where `cat_id`='6' and status='1' ");
						           while($rescrr = mysqli_fetch_array($crr)){
						           ?>
						           <option value='<?=$rescrr['id'];?>'><?=$rescrr['name'];?></option>
						           <?php
						           }
						           ?>
						       </select>
						   </div>
						    <div id="displayloccc">
						  <div class="form-group">
									<label class="control-label">ସ୍ଥାନ ଚୟନ କରନ୍ତୁ</label><br>
									<div class="custom-control custom-radio">
										<input type="radio" name="customRadio" id="National" onclick="show1()" value="0" checked> 
										ଜାତୀୟ
										<!--<input type="radio"  name="customRadio" id="Internatinal" onclick="show2()" value="1">-->
										<!--ଆନ୍ତର୍ଜାତୀୟ-->
											
									</div>
							</div>
						  
						   <div id='national_content' >
						   <select class="form-select" name="State" id="State"  onchange="showdist(this.value);">
						     <option value="0">ରାଜ୍ୟ ଚୟନ କରନ୍ତୁ</option>
							 <?php
							 $state_sql = mysqli_query($conn,"select * from state where status='1' ");
							 while($res_stat = mysqli_fetch_array($state_sql)){
							 ?>
						     <option value="<?=$res_stat['id'];?>"><?=$res_stat['name'];?></option>
							 <?php
							 }
							 ?>
						   </select>
						   <div id="distdiv" style="display:none;">
						   <select class="form-select" name="District" id="District" >
						     <option value="0">ଜିଲ୍ଲା ଚୟନ କରନ୍ତୁ</option>
							 
							 <?php
							 $dist_sql = mysqli_query($conn,"select * from district where status='1'");
							 while($res_dist = mysqli_fetch_array($dist_sql)){
							 ?>
						     <option value="<?=$res_dist['id'];?>"><?=$res_dist['name'];?></option>
							 <?php
							 }
							 ?>
						   </select>
						   </div>
						   </div></div>
						   
						 
						   <button type="submit" id="submit"  name="submit" value="submit" class="btn btn-primary">ଦାଖଲ କର</button>
					  </form> 
					
						
					
					</div>	
					<BR></BR>
					<p>ଯଦି ଆପଣ ଓଡ଼ିଶାର ବ୍ଲକ ଅନୁଯାୟୀ ଶିକ୍ଷାନୁଷ୍ଠାନ ଦେଖିବାକୁ ଚାହୁଁଛନ୍ତି ତେବେ ଏଠାରେ କ୍ଲିକ୍ କରନ୍ତୁ</p>
					<div class="filterfrm" style="background-color: #d5dde9;padding: 10px;">
						<form  name="blockfrm" method="post" id='blockfrm'>
						  
						   <select class="form-select" name="DistrictB" onchange="getblock(this.value);">
						     <option value="0">ଜିଲ୍ଲା ଚୟନ କରନ୍ତୁ</option>
							 <?php
							 $blockD_sql = mysqli_query($conn,"select * from district where status='1' ");
							 while($res_blockD = mysqli_fetch_array($blockD_sql)){
							 ?>
						     <option value="<?=$res_blockD['id'];?>"><?=$res_blockD['name'];?></option>
							 <?php
							 }
							 ?>
						   </select>
						   <br>
						   
						   <div id="diZ" class="mb-2"></div>
						   
						  
						   
						   
						   
						 
						   <button type="submit" id="submit"  name="submit" value="submit" class="btn btn-primary">Submit</button>
					  </form> 
					
						
					
					</div>
</div>					
					<div class="col-md-9">
					
					<div class="search-result-college">
						<div class="search-result-two">
						<?php
						$res = mysqli_query($conn ,"SELECT COUNT(*) AS total FROM college where status = '1' group by `name` order by `name`");
						$total = $res->num_rows;
						$limit = 10;
						$start = ($page - 1) * $limit;
						$total_pages = ceil($total / $limit);
						$clg_exe = mysqli_query($conn ,"select * from college where status = '1' group by `name` order by `name` LIMIT $start, $limit");
				// 		$clg_exe = mysqli_query($conn ,"select * from college where status = '1'");
						$c=1;
						while($res_clgex = mysqli_fetch_array($clg_exe)){
							$description = $res_clgex['description'];
							$sciencecourse = $res_clgex['sciencecourse'];
							$comercourse = $res_clgex['comercourse'];
							$othercourse = $res_clgex['othercourse'];
						?>
						<div class="content" style="padding-bottom:7px;">
						<h4 data-toggle='modal' data-target='#myModal<?=$c;?>' style="cursor:pointer;"><?=$res_clgex['name'];?></h4>
						<a data-toggle='modal' data-target='#myModal<?=$c;?>' style="cursor:pointer;">ଅଧିକ ଜାଣନ୍ତୁ</a>&nbsp;&nbsp;<a href='<?=$res_clgex['link'];?>' target='_blank'>ପରିଦର୍ଶନ କରନ୍ତୁ</a>
	</div>
	
	<div class='modal' id='myModal<?=$c;?>'>
	<div class='modal-dialog  modal-xl'>
	<div class='modal-content'>
	<div class='modal-header'>
	<h4 class='modal-title' style="padding: 0;"></h4>
	<button type='button' class='close' data-dismiss='modal'>&times;</button>
	</div>
	<div class='modal-body'>
	<table class='table table-hover table-bordered'>
	<thead>
	<tr>
	<?php
	if($description!=''){
	?>
	<th>କଳା ପାଠ୍ୟକ୍ରମର ତାଲିକା</th>
	<?php
	}
	?>
	<?php
	if($sciencecourse!=''){
	?>
	<th>ବିଜ୍ଞାନ ପାଠ୍ୟକ୍ରମର ତାଲିକା</th>
	<?php
	}
	?>
	<?php
	if($comercourse!=''){
	?>
	<th>ବାଣିଜ୍ୟ ପାଠ୍ୟକ୍ରମର ତାଲିକା</th>
	<?php
	}
	?>
	<?php
	if($othercourse!=''){
	?>
	<th>ଅନ୍ୟାନ୍ୟ ପାଠ୍ୟକ୍ରମର ତାଲିକା</th>
	<?php
	}
	?>
	</tr>
	</thead>
	<tbody><tr>
	<?php
	if($description!=''){
	?>
	<td><?=$res_clgex['description']; ?></td>
	<?php
	}
	?>
		<?php
	if($sciencecourse!=''){
	?>
	<td><?=$res_clgex['sciencecourse']; ?></td>
	<?php
	}
	?>
	<?php
	if($comercourse!=''){
	?>
	<td><?=$res_clgex['comercourse']; ?></td>
	<?php
	}
	?>
	<?php
	if($othercourse!=''){
	?>
	<td><?=$res_clgex['othercourse']; ?></td>
	<?php
	}
	?>
	</tr></tbody></table>
	
	</div>
	<div class='modal-footer'>
	
	</div>
	</div>
	</div>
	</div>
						<?php
						$c++;
						}
						?>
						
						
						
						
						<?php
						  echo "<div class='pagination'><center>";

                                // Previous button
                                if ($page > 1) {
                                    echo "<a class='prev-next' href='?page=" . ($page - 1) . "'>&laquo; Prev</a> ";
                                }
                            
                                // Middle pages
                                $mid_pages_start = max(1, $page - 2);
                                $mid_pages_end = min($total_pages, $page + 2);
                            
                                if ($mid_pages_start > 1) {
                                    $active = $page==1?'active':'';
                                    echo "<a class='page $active' href='?page=1'>1</a> ... ";
                                }
                                for ($i = $mid_pages_start; $i <= $mid_pages_end; $i++) {
                                    $active = $page==$i?'active':'';
                                    echo "<a class='page $active' href='?page=" . $i . "'>" . $i . "</a> ";
                                }
                                if ($mid_pages_end < $total_pages) {
                                    $active = $page==$i?'active':'';
                                    echo "... <a class='page $active' href='?page=" . $total_pages . "'>" . $total_pages . "</a> ";
                                }
                            
                                // Next button
                                if ($page < $total_pages) {
                                    echo "<a class='prev-next' href='?page=" . ($page + 1) . "'>Next &raquo;</a>";
                                }
                                echo "</center></div>";
                            
                            
                            ?>
						
						
						
						
						
						
						
						
						
						</div>
						</div>
					</div>
				</div>
				</div>
			</div>
		</section>
		
		<?php include "include/before-footer.php";?>
		
<div class='modal' id='blockinstitionmodal'>
<div class='modal-dialog  modal-xl'>
<div class='modal-content'>
<div class='modal-header'>
<h4 class='modal-title' style="padding: 0;"></h4>
<button type='button' class='close' data-dismiss='modal'>&times;</button>
</div>
<div class='modal-body'>
<table class='table table-hover table-bordered'>
<thead>
<tr>
<th>ବିଭାଗ
</th>
</tr>
</thead>
<tbody>
<tr>
<td id="blockinstitiondescription"></td>
</tr>
</tbody>
</table>

</div>
<div class='modal-footer'>

</div>
</div>
</div>
</div>
		
		<!-- -------------footer start---------- -->
		<!-- -------------footer end---------- -->

	<?php include "include/script.php";?>
<!-- Latest compiled JavaScript -->

		<script>
			// In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
		</script>

<script>

	$("#clgrtfrm").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    //var actionUrl = form.attr('action');
    
    $.ajax({
        type: "POST",
        url: "ve.php",
        data: form.serialize(), // serializes the form's elements.
        success: function(data)
        {
            // console.log(data);
          	$('.search-result-college').html(data);// show response from the php script.
        }
    });
    
});


function getInstitute(page)
{
     $.ajax({
        type: "POST",
        url: "ve.php",
        data: {
            page,
            institute : $("#institute").val(),
            Domain : $("#Domain").val(),
            subcat : $("#subcat").val(),
            National : $("#National").val(),
            customRadio : $("#National").val(),
            State : $("#State").val(),
            District : $("#District").val(),
        }, // serializes the form's elements.
        success: function(data)
        {
			
          	$('.search-result-college').html(data);// show response from the php script.
        }
    });
}

  function displayloc(loccc){
	     if(loccc==6){
	         	$('#displayloccc').hide();
	         	$('#displaycarr').show();
	         	showAllOptions('State');
	     }
	     else if(loccc==3){
	         	$('#displaycarr').hide();
	         	hideOptionsExceptOne('State', '1');
	         	
	     }
	     
	     else if(loccc==7 || loccc==8 || loccc==9){
	         	$('#displayloccc').hide();
	         	$('#displaycarr').hide();
	         	showAllOptions('State');
	     }else{
	         	$('#displayloccc').show();
	         	$('#displaycarr').hide();
	         	showAllOptions('State');
	     }
		
	}
</script>

<script>
	
function show1(){
  document.getElementById('national_content').style.display ='block';
}
function show2(){
  document.getElementById('national_content').style.display = 'none';
}
function showdist(distidd){
	console.log(distidd);
	if(distidd == 1){
		document.getElementById('distdiv').style.display = 'block';
	}else{
		document.getElementById('distdiv').style.display = 'none';
	}
  
}

$("#blockfrm").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    //var actionUrl = form.attr('action');
    
    $.ajax({
        type: "POST",
        url: "veblock.php",
        data: form.serialize(), // serializes the form's elements.
        success: function(data)
        {
			
          	$('.search-result-college').html(data);// show response from the php script.
        }
    });
    
});


  function getblock(blockid){
		$.ajax({
			type:'POST',
			url:"get_block.php",
			data:{blockid:blockid},
			beforeSend:function(json)
			{
				$('.preloader').show();
			},
			success:function(result){
				$('#diZ').html(result);
				
				
			},
			complete:function(json)
			{
				$('.preloader').hide();
			}
		});
	}
	
	
	
	// show only selected option
	function hideOptionsExceptOne(selectId, keepValue) {
      const select = document.getElementById(selectId);
      for (let option of select.options) {
        if (option.value !== keepValue) {
          option.style.display = 'none'; // Hide all options except the one you want to keep visible
          option.removeAttribute('selected'); // Remove the selected attribute from hidden options
        }
        else {
          option.style.display = 'block'; // Ensure the desired option is visible
          option.setAttribute('selected', 'selected'); // Add the selected attribute to the visible option
          select.value = keepValue; // Ensure the select element shows the correct value
        }
      }
      showdist(1);
    }
    
    // show all section
    function showAllOptions(selectId) {
      const select = document.getElementById(selectId);
      for (let option of select.options) {
          if(option.value == 0)
          {
            option.setAttribute('selected', 'selected');
              
          }
          else
          {
            option.removeAttribute('selected');
              
          }
        option.style.display = 'block'; // Make all options visible again
      }
    }
    
    function viewBlockInstituion(id)
    {
        $.ajax({
			type:'POST',
			url:"selectedId.php",
			data:{id},
			beforeSend:function(json)
			{
				$('.preloader').show();
			},
			success:function(result){
				$('#blockinstitiondescription').html(result);
				$('#blockinstitionmodal').modal('show');
				
				
			},
			complete:function(json)
			{
				$('.preloader').hide();
			}
		});
    }
	
	</script>
	</body>
</html>