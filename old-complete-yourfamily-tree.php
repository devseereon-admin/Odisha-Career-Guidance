<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Ama Career</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=evice-width, initial-scale=1.0">

	
		<?php include "include/script.php";?>
	<script>
	$(document).ready(function(){
		setTimeout(function () {
		$("#myModal").moal('show');
         }, 1000);
	});
</script>
<?php include "include/header_css.php";?>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-K43FK2HL');</script>
<!-- End Google Tag Manager -->

	</head>
	<style>
    #imageContainer img {
        height: 320px;
        width: 100%;
    }

    .custom-image {
        position: absolute;
        top: -38px;
        left: 460px;
        width: 40px !important;
        height: 40px !important;
    }

    #tree-container {
        background-image: url(img/Career-Tree-cl44.png);
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        height: 730px;
        position: relative;
        margin-bottom: 20px;
        margin-top: 50px;
    }

    .content-box {
        position: absolute;
        color: #fff;
        font-size: 14px;
        padding: 5px;
        border-radius: 5px;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .card-body {
        position: absolute;
        color: #fff;
        font-size: 12px;
        font-weight: 600;
        border-radius: 5px;
        padding: 3px;
        background-color: rgb(177 255 185 / 0%);
        width: 22%;
        border: none !important;
    }
    body{
        overflow-x: hidden;
    }

    @media screen and (max-width: 767px) {
        #tree-container {
            background-size: 117%;
            height: 360px;
        }

        .card-body {
            width: 29%;
            font-size: 9px;
        }

        .t-content-1 {
            top: 5.47px !important;
            left: 167.508px !important;
        }

        .t-content-2 {
            top: 31.526px !important;
            left: 248.55px !important;
        }

        .t-content-3 {
            top: 33.74px !important;
            left: 61.408px !important;
        }

        .t-content-4 {
            top: 38.172px !important;
            left: 162.463px !important;
        }

        .t-content-5 {
            top: 93.172px !important;
            left: 103.463px !important;
        }

        .t-content-6 {
            top: 92.172px !important;
            left: 187.463px !important;
        }

        .t-content-7 {
            top: 141.172px !important;
            left: 154.463px !important;
        }

        .t-content-8 {
            left: 11.463px !important;
            top: 84.172px !important;
        }

        .t-content-9 {
            top: 144.172px !important;
            left: 260.463px !important;
        }
        .t-content-10{
            top: 141.172px !important;
            left: 15.463px !important;
            
        }

        .t-content-11 {
            top: 92.172px !important;
            left: 280.463px !important;
        }
        .tree-8{
            padding-left: 0px;
            padding-right: 0px;
        }
    }

    .botIcon {
        display: none !important;
    }
</style>




<body cz-shortcut-listen="true">
    
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K43FK2HL"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

	<!-- -------------header start---------- -->
		<section class="top-logo">
			<div class="container">
				<?php include "include/top_bar.php";?>
			</div>
		</section>
		<section class ="bg-pattern header-menubg" >
			<div class="container">
			<div class="row">
			<div class="col-md-10 col-6">
		
			<?php  include "include/nav_menu.php";?> 
			</div>
			<div class="col-md-2 col-6">
				<nav class="navbar navbar-expand-sm navbar-dark">
			      	<div class="d-flex language">
			      	<div class="language-en">
			      		<a href="complete-yourfamily-tree.php" class="language-eng">English</a>
			      	</div>
			        <div class="language-od">
			        <a href="od/complete-yourfamily-tree.php" class="language-odia">ଓଡିଆ</a>
			      	</div>
			      	</div>
				</nav> 
			</div>
			</div>
			</div>      
		</section>
	<!------ header end ------------->

	<!-- ================================================section start======================================= -->

	<section class="draw-your-future pb-5">
	    <h1 class="heading-one1 mt-3">Complete Your Family Career Tree</h1>
		<div class="container">
        <div class="row">
            <div class="col-12"><p class='my-3'>Welcome to your family career tree! Write down the careers of your family members on the different branches. You can also save this tree after completing and share it with your teacher and family members.</p></div>
            <div class="col-12"><p class="my-3"><b>Remember, farmer, homemaker, labourer are also careers and ways of working to contribute to the family, society and economy! So don’t forget to mention them.</b></p></div>
            <!-- Left Column (Form Input) -->
           <div class="col-md-4">
                    <h2 style="font-size: 1.8rem;">Enter Content for Tree:</h2>
                    <form id="contentForm" action="download_complete_your_family_career_image.php" method="post">
                        <?php
                        $array = ["Me", "Mother's Career", "Father's Career", "Brother or Cousin's Career", "Sister or Cousin's Career", "Paternal Uncle's Career", "Paternal Aunt's Career", "Maternal Uncle's Career", "Maternal Aunt's Career", "Paternal Grandfather's Career", "Paternal Grandmother's Career", "Maternal Grandfather's Career", "Maternal Grandmother's Career"];
                        for ($i = 1; $i <= count($array); $i++) : ?>
                            <div class="form-group">
                                <h5 style="font-weight: 600;"><?= $array[$i - 1] ?> :</h5>
                                <div class="row">
                                    <div class="col-md-6 col-6">
                                        <label for="name<?= $i ?>">Enter Name:</label>
                                <textarea class="form-control" id="name<?= $i ?>" name="name<?= $i ?>" rows="1" cols="20" oninput="updatetreecareerprofile('<?= $i ?>', 'name', this.value)"></textarea>
                                    </div>
                                    <div class="col-md-6 col-6">
                                         <label for="designation<?= $i ?>">Enter career:</label>
                                <textarea class="form-control" id="designation<?= $i ?>" name="designation<?= $i ?>" rows="1" cols="20" oninput="updatetreecareerprofile('<?= $i ?>', 'designation', this.value)"></textarea>
                                    </div>
                                    
                                </div>
                                

                               
                            </div>
                        <?php endfor; ?>
                        <!--<button type="button" class="btn btn-primary" onclick="updateTree()">Update Tree</button>-->
                        <button id="downloadLink" type="submit" class="btn btn-success">Download Content</button>
                    </form>
                </div>
            
            <!-- Right Column (Tree Display) -->
           <div class="col-md-8 tree-8">
                    <div id="tree-container">
                        <div class="card card-body t-content-1 d-none" style="top: 30.47px;left: 311.508px;">1</div>
                        <div class="card card-body t-content-2 d-none" style="top: 78.526px;left: 178.55px;">2</div>
                        <div class="card card-body t-content-3 d-none" style="top: 128.74px;left: 375.408px;">3</div>
                        <div class="card card-body t-content-4 d-none" style="top: 76.172px;left: 562.463px;">4</div>
                        <div class="card card-body t-content-5 d-none" style="top: 49.133px;left: 429.463px;">5</div>
                        <div class="card card-body t-content-6 d-none" style="top: 138.172px;left: 112.463px;">6</div>
                        <div class="card card-body t-content-7 d-none" style="top: 183.172px;left: 312.463px;">7</div>
                        <div class="card card-body t-content-8 d-none" style="top: 203.172px;left: 86.463px;">8</div>
                        <div class="card card-body t-content-9 d-none" style="top: 235.172px;left: 532.463px;">9</div>
                        <div class="card card-body t-content-10 d-none" style="top: 294.172px;left: 112.463px;">10</div>
                        <div class="card card-body t-content-11 d-none" style="top: 249.172px;left: 325.463px;">11</div>
                        <div class="card card-body t-content-12 d-none" style="top: 151.172px;left: 602.463px;">12</div>
                        <div class="card card-body t-content-13 d-none" style="top: 311.172px;left: 637.463px;">13</div>
                    </div>
                </div>
        </div>
		</div>
	</section>

	<!-- ================================================section end ======================================== -->

	<!-- -------------footer start---------- -->
	<!--<section class="footer">-->
	<!--	<div class="container">-->
	<!--		<div class="row">-->
	<!--			<div class="col-md-2 col-5">-->
	<!--				<p>Notification Bar:</p>-->
	<!--			</div>-->
	<!--			<div class="col-md-10 col-7">-->
	<!--				<marquee>NATIONAL ELIGIBILITY CUM ENTRANCE TEST [ NEET (UG) 2024] will be conducted by the National-->
	<!--					Testing Agency (NTA) on Sunday, 05 May 2024 (Sunday) in Pen and Paper mode in 13 languages.<a-->
	<!--						href="https://jeemain.nta.ac.in/">https://jeemain.nta.ac.in/ </a>NTA has announced JEE Main-->
	<!--					2024 session 2 exam dates for Papers 1 and 2. The B.Tech paper is scheduled on April 4, 5, 6, 8,-->
	<!--					and 9, 2024 and the B.Arch/B.Plan paper is scheduled for April 12, 2024 </marquee>-->
	<!--			</div>-->
	<!--		</div>-->
	<!--	</div>-->
	<!--</section>
	<?php include "include/before-footer.php";?>
	<!-- -------------footer end---------- ---->
	<div id="imageContainer"></div>


<!--<script>-->
<!--function updatetreecareerprofile(i, data) {-->
<!--    var prefix =  [ "Me","Mother's Career", "Father's Career","Brother/Cousin's Career", "Sister/Cousin's Career","P. Uncle's Career","P. Aunt's Career","M. Uncle's Career","M. Aunt's Career", "P. Grandfather's Career","P. Grandmother's Career", "M. Grandfather's Career","M. Grandmother's Career"];-->
<!-- var prefix =  [ "Me","Mother's Career", "Father's Career","Brother or Cousin's Career", "Sister or Cousin's Career","Paternal Uncle's Career","Paternal Aunt's Career","Maternal Uncle's Career","Maternal Aunt's Career", "Paternal Grandfather's Career","Paternal Grandmother's Career", "Maternal Grandfather's Career","Maternal Grandmother's Career"];
<!--    document.querySelector(".t-content-" + i).innerHTML = prefix[i-1]+" : "+data;-->
<!--   document.querySelector(".t-content-" + i).classList.remove('d-none');-->

<!--}-->
<!--</script>-->
 <script>
        function updatetreecareerprofile(id, type, data) {
            var prefix = ["Me", "Mother's Career", "Father's Career", "Brother/Cousin's Career", "Sister/Cousin's Career", "P. Uncle's Career", "P. Aunt's Career", "M. Uncle's Career", "M. Aunt's Career", "P. Grandfather's Career", "P. Grandmother's Career", "M. Grandfather's Career", "M. Grandmother's Career"];
            var relation = prefix[parseInt(id) - 1];

            var element = document.querySelector(".t-content-" + id);
            var content = element.innerHTML.split("<br>");

            if (content.length < 2) {
                content = ["", ""];
            }

            if (type === "name") {
                content[0] = data + " (" + relation + ")";
            } else if (type === "designation") {
                content[1] = "" + data;
            }

            element.innerHTML = content.join("<br>");
            element.classList.remove('d-none');
        }
    </script>

</body>

</html>