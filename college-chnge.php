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





    <?php include "include/header_css.php"; ?>

    <style>

        .College form select.form-select {

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



        .pagination a.page {

            background: #ddd;

            padding: 4px 7px;

        }



        .pagination a.page.active {

            background: #0D6EFD;

            color: white;

        }

    </style>

    <?php include "include/script.php";?>

    

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



    <section class="top-logo">

        <div class="container">

            <?php include "include/top_bar.php"; ?>

        </div>

    </section>

    <section class="bg-pattern header-menubg">

        <div class="container">

            <div class="row">

                <div class="col-md-10 col-6">

                    <?php include "include/nav_menu.php"; ?>

                </div>

                

            </div>

            <div class="col-md-2 col-6">

                    <nav class="navbar navbar-expand-sm navbar-dark">

                        <div class="d-flex language">

                            <div class="language-en">

                                <a href="college-chnge.php" class="language-eng">English</a>

                            </div>

                            <div class="language-od">

                                <a href="od/college-chnge.php" class="language-odia">ଓଡିଆ</a>

                            </div>

                        </div>

                    </nav>

                </div>

        </div>

    </section>

    <!------ header end ------------->



    <section class="College">

        <div class="container">

            <div class="College-round">

                <h1 class="heading-one1">Institutions</h1>

                <div class="row">



                    <div class="col-md-3">

                        <div class="filterfrm" style="background-color: #d5dde9;padding: 10px;">

                            <form name="clgfrm" method="post" id='clgrtfrm'>



                                <select class="form-select" name="institute" id="institute" required>

                                    <option value="">Institute Type</option>

                                    <option value='1' id='govt'>Government</option>

                                    <option value='2' id='priv'>Private</option>

                                </select>



                                <select class="form-select" name="Domain" id="Domain" onchange="changeDomain(this.value)" required>

                                    <option value="">Select Domain</option>

                                    <?php



                                    $strm_sql = mysqli_query($conn, "select * from catagory where status='1' ");

                                    while ($res_strm = mysqli_fetch_array($strm_sql)) {

                                        $dm_name = $res_strm['name'];

                                        $dm_id = SUBSTR("$dm_name", 0, 4);

                                        ?>

                                    <option value='<?= $res_strm['id']; ?>' id='<?=$dm_id;?>'>

                                        <?= $res_strm['name']; ?>

                                    </option>



                                    <?php

                                    }

                                    ?>

                                </select>

                                <div id="domainResponce">

                                    

                                </div>

                                

                                

                                

                                <!--<div id='displaycarr' style="display:none;">

                                    <select class="form-select" name='subcat' id='subcat'>

                                        <option value='0'>Select option</option>

                                        <?php

                                        $crr = mysqli_query($conn, "select * from `subcatagory` where `cat_id`='5' and status='1' ");

                                        while ($rescrr = mysqli_fetch_array($crr)) {

                                            ?>

                                        <option value='<?= $rescrr['id']; ?>'>

                                            <?= $rescrr['name']; ?>

                                        </option>

                                        <?php

                                        }

                                        ?>

                                    </select>

                                </div>

                                <div id="displayloccc">

                                    <div class="form-group">

                                        <label class="control-label">Choose Your Location</label><br>

                                        <div class="custom-control custom-radio">

                                            <input type="radio" name="customRadio" id="National" onclick="show1()" value="0" checked>

                                            National



                                        </div>

                                    </div>



                                    <div id='national_content'>

                                        <select class="form-select" name="State" id="State" onchange="getDistrict(this.value);">

                                            <option value="0">Select State</option>

                                            <?php

                                            $state_sql = mysqli_query($conn, "select * from state where status='1' ");

                                            while ($res_stat = mysqli_fetch_array($state_sql)) {

                                                ?>

                                                <option value="<?= $res_stat['id']; ?>"><?= $res_stat['name']; ?></option>

                                                <?php

                                            }

                                            ?>

                                        </select>

                                        <br>



                                        <div id="dis"></div>







                                    </div>

                                </div> -->





                                <button type="submit" id="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>

                            </form>



<script>

document.getElementById('clgrtfrm').addEventListener('submit', function(e) {

    e.preventDefault(); // prevent reload

    

    const institute = document.getElementById('institute').value;

    const domain = document.getElementById('Domain').value;

    const formType = 'college';



    // Track individual clicks

    if (institute) {

        fetch('admin/track_form_click.php', {

            method: 'POST',

            headers: {'Content-Type': 'application/x-www-form-urlencoded'},

            body: `form_type=${formType}&click_type=institute&item_id=${institute}`

        });

    }

    

    if (domain) {

        fetch('admin/track_form_click.php', {

            method: 'POST',

            headers: {'Content-Type': 'application/x-www-form-urlencoded'},

            body: `form_type=${formType}&click_type=domain&item_id=${domain}`

        });

    }

    

    // Track state - check both possible locations for state dropdown

    let stateValue = '0';

    

    // First check if state exists in domainResponce (dynamically loaded for domains 1,2,3,4,5)

    const stateElementInResponse = document.querySelector('#domainResponce #State');

    if (stateElementInResponse && stateElementInResponse.value && stateElementInResponse.value !== '0') {

        stateValue = stateElementInResponse.value;

    }

    // If not found in domainResponce, check if state was previously selected and stored

    else {

        // For domains 6,7,8, we can check if there's a state value from previous selections

        // or use a default value if needed

        const stateElementInMain = document.getElementById('State');

        if (stateElementInMain && stateElementInMain.value && stateElementInMain.value !== '0') {

            stateValue = stateElementInMain.value;

        }

    }

    

    // Track state if we found a valid value

    if (stateValue !== '0') {

        fetch('admin/track_form_click.php', {

            method: 'POST',

            headers: {'Content-Type': 'application/x-www-form-urlencoded'},

            body: `form_type=${formType}&click_type=state&item_id=${stateValue}`

        });

    }

    

    console.log('Tracking completed');

});

</script>



                        </div>

                        <br>

                        <br>

                        <p>If you want to see Block wise Institutions in Odisha then select here</p>

                        <div class="filterfrm" style="background-color: #d5dde9;padding: 10px;">

                            <form name="blockfrm" method="post" id='blockfrm'>



                                <select class="form-select" name="DistrictB" onchange="getblock(this.value);">

                                    <option value="0">Select District</option>

                                    <?php

                                    $blockD_sql = mysqli_query($conn, "select * from district where status='1' ");

                                    while ($res_blockD = mysqli_fetch_array($blockD_sql)) {

                                        ?>

                                        <option value="<?= $res_blockD['id']; ?>"><?= $res_blockD['name']; ?></option>

                                        <?php

                                    }

                                    ?>

                                </select>

                                <br>



                                <div id="diZ" class="mb-2"></div>













                                <button type="submit" id="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>

                            </form>







                        </div>

                    </div>

                    <div class="col-md-9">



                        <div class="search-result-college">

                            <div class="search-result-two">

                                <?php



                                $res = mysqli_query($conn, "SELECT COUNT(*) AS total FROM college where status = '1' group by `name` order by `name`");

                                $total = $res->num_rows;

                                $limit = 10;

                                $start = ($page - 1) * $limit;

                                $total_pages = ceil($total / $limit);

                                $clg_exe = mysqli_query($conn, "select * from college where status = '1' group by `name` order by `name` LIMIT $start, $limit");

                                $c = 1;

                                while ($res_clgex = mysqli_fetch_array($clg_exe)) {

                                    $description = $res_clgex['description'];

                                    $sciencecourse = $res_clgex['sciencecourse'];

                                    $comercourse = $res_clgex['comercourse'];

                                    $othercourse = $res_clgex['othercourse'];

                                    ?>

                                    <div class="content" style="padding-bottom:7px;">

                                        <h4 data-toggle='modal' data-target='#myModal<?= $c; ?>' style="cursor:pointer;"><?= $res_clgex['name']; ?></h4>

                                        <a data-toggle='modal' data-target='#myModal<?= $c; ?>' style="cursor:pointer;">Explore</a>&nbsp;&nbsp;<a href='<?= $res_clgex['link']; ?>' target="_blank">Visit</a>

                                    </div>



                                    <div class='modal' id='myModal<?= $c; ?>'>

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

                                                                if ($description != '') {

                                                                    ?>

                                                                    <th>List of Arts Courses Offered</th>

                                                                    <?php

                                                                }

                                                                ?>

                                                                <?php

                                                                if ($sciencecourse != '') {

                                                                    ?>

                                                                    <th>List of Science Courses Offered</th>

                                                                    <?php

                                                                }

                                                                ?>

                                                                <?php

                                                                if ($comercourse != '') {

                                                                    ?>

                                                                    <th>List of Commerece Courses Offered</th>

                                                                    <?php

                                                                }

                                                                ?>

                                                                <?php

                                                                if ($othercourse != '') {

                                                                    ?>

                                                                    <th>List of Other Courses Offered</th>

                                                                    <?php

                                                                }

                                                                ?>

                                                            </tr>

                                                        </thead>

                                                        <tbody>

                                                            <tr>

                                                                <?php

                                                                if ($description != '') {

                                                                    ?>

                                                                    <td><?= $res_clgex['description']; ?></td>

                                                                    <?php

                                                                }

                                                                ?>

                                                                <?php

                                                                if ($sciencecourse != '') {

                                                                    ?>

                                                                    <td><?= $res_clgex['sciencecourse']; ?></td>

                                                                    <?php

                                                                }

                                                                ?>

                                                                <?php

                                                                if ($comercourse != '') {

                                                                    ?>

                                                                    <td><?= $res_clgex['comercourse']; ?></td>

                                                                    <?php

                                                                }

                                                                ?>

                                                                <?php

                                                                if ($othercourse != '') {

                                                                    ?>

                                                                    <td><?= $res_clgex['othercourse']; ?></td>

                                                                    <?php

                                                                }

                                                                ?>

                                                            </tr>

                                                        </tbody>

                                                    </table>



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

                                    $active = $page == 1 ? 'active' : '';

                                    echo "<a class='page $active' href='?page=1'>1</a> ... ";

                                }

                                for ($i = $mid_pages_start; $i <= $mid_pages_end; $i++) {

                                    $active = $page == $i ? 'active' : '';

                                    echo "<a class='page $active' href='?page=" . $i . "'>" . $i . "</a> ";

                                }

                                if ($mid_pages_end < $total_pages) {

                                    $active = $page == $i ? 'active' : '';

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





    <!-- 2nd modal open -->

    <div class="modal" id="large-details-modal">

        <div class="modal-dialog modal-lg">

            <div class="modal-content">

                <!-- Modal Header -->

                <div class="modal-header">

                    <h4 class="modal-title">Modal Heading 1</h4>

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>



                <!-- Modal body -->

                <div class="modal-body">

                    Modal body..

                </div>



                <!-- Modal footer -->

                <div class="modal-footer">

                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                </div>

            </div>

        </div>

    </div>



    <!--default modal-->

    <div class="modal" id="default-details-modal">

        <div class="modal-dialog">

            <div class="modal-content">



                <!-- Modal Header -->

                <div class="modal-header">

                    <h4 class="modal-title">Modal Heading</h4>

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>



                <!-- Modal body -->

                <div class="modal-body">

                    Modal body..

                </div>



                <!-- Modal footer -->

                <div class="modal-footer">

                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                </div>



            </div>

        </div>

    </div>

    

<div class="content" style="padding-bottom:7px;">

    

    <div class='modal' id='blockinstitionmodal'>

        <div class='modal-dialog  modal-md'>

            <div class='modal-content'>

                <div class='modal-header'>

                    <h4 class='modal-title' style="padding: 0;"></h4>

                    <button type='button' class='close' data-dismiss='modal'>&times;</button>

                </div>

                <div class='modal-body'>

                    <table class='table table-hover table-bordered'>

                        <thead>

                            <tr>

                                <th>Stream</th>

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

</div>





    <!-- -------------footer start---------- -->

    <?php include "include/before-footer.php"; ?>

    <!-- -------------footer end---------- -->



    <?php include "include/script.php"; ?>

    <!-- Latest compiled JavaScript -->



    <script>

        // In your Javascript (external .js resource or <script> tag)

        $(document).ready(function () {

            $('.js-example-basic-single').select2();

        });

    </script>

    

    <script>

        // domain unchange 

        function changeDomain(domainId)

        {

            // for arts science and commorce

            if(domainId == 1 || domainId == 2 || domainId == 4)

            {

                $.ajax({

                    type:"post",

                    url:"backend/return-table.php",

                    data:{

                        tab:100,

                        domainId

                        

                    },

                    beforeSend:function(){

                        

                    },

                    success:function(resp)

                    {

                        var data = JSON.parse(resp);

                        $("#domainResponce").html(data.data);

                    }

                });

            }

//==================================================================================vocational==============================================

            else if(domainId == 3)

            {

                $.ajax({

                    type:"post",

                    url:"backend/return-table.php",

                    data:{

                        tab:103,

                        domainId

                        

                    },

                    beforeSend:function(){

                        

                    },

                    success:function(resp)

                    {

                        var data = JSON.parse(resp);

                        $("#domainResponce").html(data.data);

                    }

                });

            }

            

//=================================================================================Nutral ===================================================



            else if(domainId == 5)

            {

                $.ajax({

                    type:"post",

                    url:"backend/return-table.php",

                    data:{

                        tab:105,

                        domainId

                        

                    },

                    beforeSend:function(){

                        

                    },

                    success:function(resp)

                    {

                        $("#domainResponce").html(resp);

                    }

                });

            }

            else if(domainId == 6 || domainId == 7 || domainId == 8)

            {

                $("#domainResponce").html("");

            }

            

            

        }

        

//=======================================================================for dist show and hide (arts science commerce)========================================

        function showhidestate(state_id)

        {

            if(state_id == 1)

            {

                $.ajax({

                    type:"post",

                    url:"backend/return-table.php",

                    data:{

                        tab:101,

                        state_id

                        

                    },

                    beforeSend:function(){

                        

                    },

                    success:function(resp)

                    {

                        var data = JSON.parse(resp);

                        $("#dist-box").html(data.data);

                    }

                });

            }

            else

            {

                

                $("#dist-box").html('');

            }

        }

        

// ==========================================================================form submit code =================================================

$("#clgrtfrm").submit(function(e){

    e.preventDefault();

    var institute = $("#institute").val();

    var Domain = $("#Domain").val();

    

    // // TRACKING - Add this section

    // const formType = 'college';

    // if (institute) {

    //     fetch('admin/track_form_click.php', {

    //         method: 'POST',

    //         headers: {'Content-Type': 'application/x-www-form-urlencoded'},

    //         body: `form_type=${formType}&click_type=institute&item_id=${institute}`

    //     });

    // }

    

    // if (Domain) {

    //     fetch('admin/track_form_click.php', {

    //         method: 'POST',

    //         headers: {'Content-Type': 'application/x-www-form-urlencoded'},

    //         body: `form_type=${formType}&click_type=domain&item_id=${Domain}`

    //     });

    // }

    

    // // Track state - check both possible locations

    // let stateValue = '0';

    // const stateElementInResponse = document.querySelector('#domainResponce #State');

    // if (stateElementInResponse && stateElementInResponse.value && stateElementInResponse.value !== '0') {

    //     stateValue = stateElementInResponse.value;

    // } else {

    //     const stateElementInMain = document.getElementById('State');

    //     if (stateElementInMain && stateElementInMain.value && stateElementInMain.value !== '0') {

    //         stateValue = stateElementInMain.value;

    //     }

    // }

    

    // if (stateValue !== '0') {

    //     fetch('admin/track_form_click.php', {

    //         method: 'POST',

    //         headers: {'Content-Type': 'application/x-www-form-urlencoded'},

    //         body: `form_type=${formType}&click_type=state&item_id=${stateValue}`

    //     });

    // }

    // // END TRACKING

    

    // Keep the existing AJAX calls exactly as they are - NO CHANGES to the backend calls

    if(Domain == '1' || Domain == 2 || Domain == 4)

    {

        var location = 0;

        var State = $("#State").val();

        var dist = 0;

        if(State == 1)

        {

            dist = $("#dist").val();

        }   

        

        $.ajax({

            type:"post",

            url:"backend/return-table.php",

            data:{

                tab:102,

                institute,

                Domain,

                location,

                State,

                dist

            },

            beforeSend:function(){

                

            },

            success:function(resp)

            {

                $(".search-result-college").html(resp);

            }

        });

    }

    else if(Domain == '3')

    {

        var location = 0;

        var State = $("#State").val();

        var dist = $("#dist").val();

        

        $.ajax({

            type:"post",

            url:"backend/return-table.php",

            data:{

                tab:104,

                institute,

                Domain,

                location,

                State,

                dist

            },

            beforeSend:function(){

                

            },

            success:function(resp)

            {

                $(".search-result-college").html(resp);

            }

        });

    }

    else if(Domain == '5')

    {

        

        var subcat = $("#subcat").val();

        

        $.ajax({

            type:"post",

            url:"backend/return-table.php",

            data:{

                tab:106,

                institute,

                Domain,

                subcat

            },

            beforeSend:function(){

                

            },

            success:function(resp)

            {

                $(".search-result-college").html(resp);

            }

        });

    }

    else if(Domain == 6 || Domain == 7 || Domain == 8)

    {

        // Keep the existing call exactly as it is

        $.ajax({

            type:"post",

            url:"backend/return-table.php",

            data:{

                tab:108,

                institute,

                Domain

            },

            beforeSend:function(){

                

            },

            success:function(resp)

            {

                $(".search-result-college").html(resp);

            }

        });

    }

});

        

        function viewInstitutionDetails(id)

    	{

    	    $.ajax({

            type: 'post',

            url: 'backend/getData.php',

            data: { 'tab': '500', id },

            beforeSend: function () {

                displayLoader();

            },

            success: function (resp) {

                resp = JSON.parse(resp)

    

                if (resp.response == 1) {

                    console.log(resp.data)

                    //  this model is in nav-menu

                    $("#instituteModal-box").html('');

                    $("#instituteModal-box").append(resp.data);

                    $("#instituteDetails-modal").modal('show');

                }

            }

        });

    	}

    	

    	

    	

    	

    // 	======================================block wise view================================

    

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

		$("#blockfrm").submit(function(e) {

            e.preventDefault();

            var form = $(this);

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


document.getElementById('clgrtfrm').addEventListener('submit', function(e) {

    e.preventDefault();

    const instituteText = document.querySelector('#institute option:checked')?.text || '';
    const domainText = document.querySelector('#Domain option:checked')?.text || '';

    let stateText = '';
    let districtText = '';
    let blockText = '';

    // ✅ STATE
    const stateElement =
        document.querySelector('#domainResponce #State') ||
        document.getElementById('State');

    if (stateElement && stateElement.value !== '0') {
        stateText = stateElement.options[stateElement.selectedIndex].text;
    }

    // ✅ DISTRICT
    const districtElement =
        document.querySelector('#domainResponce #dist') ||
        document.getElementById('dist');

    if (districtElement && districtElement.value !== '0') {
        districtText = districtElement.options[districtElement.selectedIndex].text;
    }

    // ✅ BLOCK (if exists)
    const blockElement =
        document.querySelector('#domainResponce #block') ||
        document.getElementById('block');

    if (blockElement && blockElement.value !== '0') {
        blockText = blockElement.options[blockElement.selectedIndex].text;
    }

    // ✅ FINAL FLOW
    const levels = [
        instituteText,
        domainText,
        stateText,
        districtText,
        blockText
    ].filter(Boolean);

    // 🔥 TRACK
    trackPageClick(levels);

});

document.getElementById('blockfrm').addEventListener('submit', function(e) {

    e.preventDefault();

    let districtText = document.querySelector('[name="DistrictB"] option:checked')?.text || '';

    let blockText = '';
    const blockElement = document.querySelector('#diZ select');

    if (blockElement && blockElement.value !== '0') {
        blockText = blockElement.options[blockElement.selectedIndex].text;
    }

    const levels = ['Block Search', districtText, blockText].filter(Boolean);

    trackPageClick(levels);

});
    </script>

    





</body>



</html>