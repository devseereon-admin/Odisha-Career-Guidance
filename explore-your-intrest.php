<!DOCTYPE html>
<!-- saved from url=(0048)draw-your-future.php -->
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Ama Career</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">


<?php include "include/header_css.php";?>
<?php include "include/script.php";?>

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
		
        .card-img-img{
            margin-top: 5%;
            margin-bottom: 5%;
            height: 220px;
        }
        
        .card-body-card{
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        a.prev{
            background-color:#660000;
            color:white;
            border-radius:0px;
            margin-right:10px;
        }
        a.next{
            background-color:#265828;
            color:white;
            border-radius:0px;
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
			
			</div>
			<div class="col-md-2 col-6">
				<nav class="navbar navbar-expand-sm navbar-dark">
			      	<div class="d-flex language">
			      	<div class="language-en">
			      		<a href="explore-your-intrest.php" class="language-eng">English</a>
			      	</div>
			        <div class="language-od">
			        <a href="od/explore-your-intrest.php" class="language-odia">ଓଡିଆ</a>
			      	</div>
			      	</div>
				</nav> 
			</div>
			</div>      
		</section>
	<!------ header end ------------->

	<!-- ================================================section start======================================= -->

	<style>
	.card {
	    border: none !important;
	}
    
    .card-img-img{
        cursor: pointer;
    }
    .card-img-img{
        background-color: #fff !important;
            height: 320px;
    }
    .card-title{
        font-size: 18px !important;
        text-align: center !important;
        font-weight: 600 !important;
        color: #000 !important;
    }
    .card-body-card{
        text-align: center !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
    }
    .card-img-img img{
        height: 240px;
    }
    .card-img-selected {
       background-color:#0F3970;
    }
    
    .card-img-selected .card-body-card
    {
        background-color:#0F3970;
        
    }
     .card-img-selected .card-body-card h5
    {
        color:#fff !important;
        
    }
</style>

<section>
  <h1 class="heading-one1 mt-3">Explore Your Interests</h1>
  <h3 style="text-align: center">Click on any of these pictures/Activities that you find interesting</h3>
  <div class="container">
    <div class="tab-content">
      <div class="tab-pane  active in" id="first">
        <div class="row">
          <div class="col-md-12 mb-4">
            <h5 style="margin-left: -32px;">Round 1 :</h5>
            <div class="image-six-card">
              <div class="row">
                <div class="col-md-4" onclick="selectImage(this)" data-code="R" >
                  <div class="card card-img-img">
                    <img src="img/explore/GARDENING.jpg" class="card-img-top" alt="...">
                    <div class="card-body card-body-card">
                      <h5 class="card-title">Working in the school kitchen garden </h5>

                    </div>
                  </div>
                </div>
                <div class="col-md-4" onclick="selectImage(this)" data-code="C">
                  <div class="card card-img-img">
                    <img src="img/explore/SOLVING MATHEMATICS.png" class="card-img-top" alt="...">
                    <div class="card-body card-body-card">
                      <h5 class="card-title">Solving mathematics sums </h5>

                    </div>
                  </div>
                </div>
                <div class="col-md-4" onclick="selectImage(this)" data-code="S">
                  <div class="card card-img-img">
                    <img src="img/explore/HELPING THE ELDERLY.png" class="card-img-top" alt="...">
                    <div class="card-body card-body-card">
                      <h5 class="card-title">Helping the elderly </h5>

                    </div>
                  </div>
                </div>
                <div class="col-md-4" onclick="selectImage(this)" data-code="I">
                  <div class="card card-img-img">
                    <img src="img/explore/PERFORMING SCIENCE ACTIVITY IN THE SCIENCE LAB.png" class="card-img-top" alt="...">
                    <div class="card-body card-body-card">
                      <h5 class="card-title">Performing science experiments in the science lab </h5>

                    </div>
                  </div>
                </div>
                <div class="col-md-4" onclick="selectImage(this)" data-code="A">
                  <div class="card card-img-img">
                    <img src="img/explore/5a.png" class="card-img-top" alt="...">
                    <div class="card-body card-body-card">
                      <h5 class="card-title">Playing a Musical Instrument </h5>

                    </div>
                  </div>
                </div>
                <div class="col-md-4" onclick="selectImage(this)" data-code="E">
                  <div class="card card-img-img">
                    <img src="img/explore/Leading a School Cabinet, House, or Club.png" class="card-img-top" alt="...">
                    <div class="card-body card-body-card">
                      <h5 class="card-title">Leading a School Cabinet, House, or Club </h5>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="my-5 d-flex justify-content-center">
                <a class="btn next" href="#">Next</a>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="second">
        <div class="row">
          <div class="col-md-12 mb-4">
            <h5 style="margin-left: -32px;">Round 2 :</h5>
            <div class="image-six-card">
              <div class="row">
                <div class="col-md-4" onclick="selectImage(this)" data-code="R">
                  <div class="card card-img-img">
                    <img src="img/explore/7a.png" class="card-img-top" alt="...">
                    <div class="card-body card-body-card">
                      <h5 class="card-title">Repairing a bicycle </h5>

                    </div>
                  </div>
                </div>
                <div class="col-md-4" onclick="selectImage(this)" data-code="C">
                  <div class="card card-img-img">
                    <img src="img/explore/8a.png" class="card-img-top" alt="...">
                    <div class="card-body card-body-card">
                      <h5 class="card-title">Managing money  </h5>

                    </div>
                  </div>
                </div>
                <div class="col-md-4" onclick="selectImage(this)" data-code="S">
                  <div class="card card-img-img">
                    <img src="img/explore/Helping your friends.png" class="card-img-top" alt="...">
                    <div class="card-body card-body-card">
                      <h5 class="card-title">Helping your friends </h5>

                    </div>
                  </div>
                </div>
                <div class="col-md-4" onclick="selectImage(this)" data-code="I">
                  <div class="card card-img-img">
                    <img src="img/explore/Making maps of your school or village.jpg" class="card-img-top" alt="...">
                    <div class="card-body card-body-card">
                      <h5 class="card-title">Making maps of your school or village </h5>

                    </div>
                  </div>
                </div>
                <div class="col-md-4" onclick="selectImage(this)" data-code="A">
                  <div class="card card-img-img">
                    <img src="img/explore/10a.png" class="card-img-top" alt="...">
                    <div class="card-body card-body-card">
                      <h5 class="card-title">Singing in school/at home </h5>

                    </div>
                  </div>
                </div>
                <div class="col-md-4" onclick="selectImage(this)" data-code="E">
                  <div class="card card-img-img">
                    <img src="img/explore/Exchanging or bartering items with your friends.png" class="card-img-top" alt="...">
                    <div class="card-body card-body-card">
                      <h5 class="card-title">Exchanging or bartering items with your friends </h5>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="my-5 d-flex justify-content-center">
                <a class="btn prev" href="#">Previous</a>
                <a class="btn next" href="#">Next</a>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="third">
        <div class="row">
          <div class="col-md-12 mb-4">
            <h5 style="margin-left: -32px;">Round 3 :</h5>
            <div class="image-six-card">
              <div class="row">
                <div class="col-md-4" onclick="selectImage(this)" data-code="R">
                  <div class="card card-img-img">
                    <img src="img/explore/12a.png" class="card-img-top" alt="...">
                    <div class="card-body card-body-card">
                      <h5 class="card-title">Making clay pots or bamboo baskets </h5>

                    </div>
                  </div>
                </div>
                <div class="col-md-4" onclick="selectImage(this)" data-code="C">
                  <div class="card card-img-img">
                    <img src="img/explore/makeing-list.png" class="card-img-top" alt="...">
                    <div class="card-body card-body-card">
                      <h5 class="card-title">Making a list of students in your class for different activities </h5>

                    </div>
                  </div>
                </div>
                <div class="col-md-4" onclick="selectImage(this)" data-code="S">
                  <div class="card card-img-img">
                    <img src="img/explore/14a.png" class="card-img-top" alt="...">
                    <div class="card-body card-body-card">
                      <h5 class="card-title">Helping animals </h5>

                    </div>
                  </div>
                </div>
                <div class="col-md-4" onclick="selectImage(this)" data-code="I">
                  <div class="card card-img-img">
                    <img src="img/explore/Interviewing people for a school project.png" class="card-img-top" alt="...">
                    <div class="card-body card-body-card">
                      <h5 class="card-title">Interviewing people for a school project </h5>

                    </div>
                  </div>
                </div>
                <div class="col-md-4" onclick="selectImage(this)" data-code="A">
                  <div class="card card-img-img">
                    <img src="img/explore/Dancing in your schoolhome.png" class="card-img-top" alt="...">
                    <div class="card-body card-body-card">
                      <h5 class="card-title">Dancing in your school/home </h5>

                    </div>
                  </div>
                </div>
                <div class="col-md-4" onclick="selectImage(this)" data-code="E">
                  <div class="card card-img-img">
                    <img src="img/explore/17a.png" class="card-img-top" alt="...">
                    <div class="card-body card-body-card">
                      <h5 class="card-title">Overseeing your class’s stalls during a school exhibition </h5>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="my-5 d-flex justify-content-center">
                <a class="btn prev" href="#">Previous</a>
                <a class="btn next" href="#">Next</a>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="fourth">
        <div class="row">
          <div class="col-md-12 mb-4">
            <h5 style="margin-left: -32px;">Round 4 :</h5>
            <div class="image-six-card">
              <div class="row">
                <div class="col-md-4" onclick="selectImage(this)" data-code="R">
                  <div class="card card-img-img">
                    <img src="img/explore/18a.png" class="card-img-top" alt="...">
                    <div class="card-body card-body-card">
                      <h5 class="card-title">Helping your parent/grandparent plant seeds  </h5>

                    </div>
                  </div>
                </div>
                <div class="col-md-4" onclick="selectImage(this)" data-code="C">
                  <div class="card card-img-img">
                    <img src="img/explore/Using computers in your e-library to analyse information.png" class="card-img-top" alt="...">
                    <div class="card-body card-body-card">
                      <h5 class="card-title">Using computers in your e-library to analyse information </h5>

                    </div>
                  </div>
                </div>
                <div class="col-md-4" onclick="selectImage(this)" data-code="S">
                  <div class="card card-img-img">
                    <img src="img/explore/Helping younger students study.png" class="card-img-top" alt="...">
                    <div class="card-body card-body-card">
                      <h5 class="card-title">Helping younger students study </h5>

                    </div>
                  </div>
                </div>
                <div class="col-md-4" onclick="selectImage(this)" data-code="I">
                  <div class="card card-img-img">
                    <img src="img/explore/Finding a new way of doing something for a school project.jpg" class="card-img-top" alt="...">
                    <div class="card-body card-body-card">
                      <h5 class="card-title">Finding a new way of doing something for a school project </h5>

                    </div>
                  </div>
                </div>
                <div class="col-md-4" onclick="selectImage(this)" data-code="A">
                  <div class="card card-img-img">
                    <img src="img/explore/22a.png" class="card-img-top" alt="...">
                    <div class="card-body card-body-card">
                      <h5 class="card-title">Cooking</h5>

                    </div>
                  </div>
                </div>
                <div class="col-md-4" onclick="selectImage(this)" data-code="E">
                  <div class="card card-img-img">
                    <img src="img/explore/Leading a school cleanliness drive with all students (2).png" class="card-img-top" alt="...">
                    <div class="card-body card-body-card">
                      <h5 class="card-title">Leading a school cleanliness drive with all students </h5>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="my-5 d-flex justify-content-center">
                <a class="btn prev" href="#">Previous</a>
                <a class="btn next" href="#">Next</a>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="fifth">
        <div class="row">
          <div class="col-md-12 mb-4">
            <h5 style="margin-left: -32px;">Round 5 :</h5>
            <div class="image-six-card">
              <div class="row">
                <div class="col-md-4" onclick="selectImage(this)" data-code="R">
                  <div class="card card-img-img">
                    <img src="img/explore/Learning about electronic equipment in vocational classes.png" class="card-img-top" alt="...">
                    <div class="card-body card-body-card">
                      <h5 class="card-title">Learning about electronic equipment in vocational classes </h5>

                    </div>
                  </div>
                </div>
                <div class="col-md-4" onclick="selectImage(this)" data-code="C">
                  <div class="card card-img-img">
                    <img src="img/explore/Managing and sorting school waste as biodegradable, non-biodegradable & recyclable.png" class="card-img-top" alt="...">
                    <div class="card-body card-body-card">
                      <h5 class="card-title">Managing and sorting school waste as biodegradable, non-biodegradable & recyclable </h5>

                    </div>
                  </div>
                </div>
                <div class="col-md-4" onclick="selectImage(this)" data-code="S">
                  <div class="card card-img-img">
                    <img src="img/explore/26a.png" class="card-img-top" alt="...">
                    <div class="card-body card-body-card">
                      <h5 class="card-title">Helping friends who have disabilities </h5>

                    </div>
                  </div>
                </div>
                <div class="col-md-4" onclick="selectImage(this)" data-code="I">
                  <div class="card card-img-img">
                    <img src="img/explore/27a.png" class="card-img-top" alt="...">
                    <div class="card-body card-body-card">
                      <h5 class="card-title">Wanting to know more about the past: history and culture </h5>

                    </div>
                  </div>
                </div>
                <div class="col-md-4" onclick="selectImage(this)" data-code="A">
                  <div class="card card-img-img">
                    <img src="img/explore/Drawing and painting.png" class="card-img-top" alt="...">
                    <div class="card-body card-body-card">
                      <h5 class="card-title">Drawing and painting </h5>

                    </div>
                  </div>
                </div>
                <div class="col-md-4" onclick="selectImage(this)" data-code="E">
                  <div class="card card-img-img">
                    <img src="img/explore/29a.png" class="card-img-top" alt="...">
                    <div class="card-body card-body-card">
                      <h5 class="card-title">Helping the PE teacher manage Sports Day for the whole school </h5>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-center">
            <button type="button" onclick="printResult()" class="btn btn-primary mt-3 mb-5">Submit</button>
</div>
<div class="modal fade" id="careerSuccessModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header  text-white">
        <h5 class="modal-title">Success</h5>
        <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body text-center">
        <p class="modal-strength-msg"></p>
      </div>

    </div>
  </div>
</div>
            <!-- <div class="msg-box"> -->
            </div>
            <div class="my-5 d-flex justify-content-center">
      

                  <a class="btn prev" href="#">Previous</a>
                  <!--<a class="btn next " href="#">Next</a>-->
            </div>
              
          </div>
        </div>
      </div>
    </div>



  </div>

</section>

<script>

    $(function() {
  $("#mytabs a:first").tab("show");

  $(".next").on("click", function() {
    const $active = $(".tab-pane.active");
    const $next = $active.next();

    if ($next.length) {
      $active.removeClass("active show");
      $next.addClass("active show");
    }
  });

  $(".prev").on("click", function() {
    const $active = $(".tab-pane.active");
    const $prev = $active.prev();

    if ($prev.length) {
      $active.removeClass("active show");
      $prev.addClass("active show");
    }
  });
});

</script>

       <script>
        function selectImage(element) {
        // Remove "selected" class from all elements within the parent container
            const parentContainer = element.closest('.row');
            const selectedElements = parentContainer.querySelectorAll('.card-img-selected');
            selectedElements.forEach(selectedElement => {
                selectedElement.classList.remove('card-img-selected');
            });
            
            // Add "selected" class to the clicked element
            element.classList.add('card-img-selected');
        }
        function printResult()
        {
            if ($('div.card-img-selected').length < 5) 
            {
                document.querySelector('.msg-box').innerHTML = '<div class="alert alert-warning" role="alert">Warning! Kindly check your field if some step has been skipped.</div>';
            }
            else
            {
                var selected = $(".card-img-selected");
                var str = "";
                selected.each(function(){
                    console.log()
                    str += $(this).attr('data-code');
            })
                var letterCounts = {};
                for (var i = 0; i < str.length; i++) {
                    var letter = str[i].toLowerCase(); // Convert to lowercase to handle case sensitivity
                    if (letterCounts[letter]) {
                        letterCounts[letter]++;
                    } else {
                        letterCounts[letter] = 1;
                    }
            }
                const entries = Object.entries(letterCounts);
                const sortedEntries = entries.sort(([, value1], [, value2]) => value2 - value1);
                /*var careers = [];
                var message = ""
                if(sortedEntries[0][1] >= 3) 
                {
                    if(sortedEntries[0][0] == 'r')
                    {
                        message = "Wow, so you like to use your physical abilities and are action-oriented. Did you know that people like you are very good <a href='detail.php?id=5'>Agriculturists</a>, <a href='detail.php?id=18'>Sports Managers</a>, <a href='drone-pilot.php'>Drone Pilot</a> and also <a href='detail.php?id=7'>Engineer</a>?";
                        careers.push("Agriculturists","Sports Coach","Drone Pilot","Engineer");
                    }
                    else if(sortedEntries[0][0] == 'c')
                    {
                        message = "Amazing, you are so organized! Did you know that people like you do very well as <a href='cost%20accountant.php'>accountants</a>, and in <a href='career-option.php?id=6'>government services</a>?";
                    }
                    else if(sortedEntries[0][0] == 's')
                    {
                        message = "You my friend, are a helper by nature! Did you know that caring people like you are very good <a href=' detail.php?id=22'>teachers</a>, <a href='detail.php?id=4'>nurses</a>, counsellors and <a href='salesperson.php'>salespersons</a>?";
                    }
                    
                    else if(sortedEntries[0][0] == 'i')
                    {
                        message = "Wow, you are a deep thinker! Did you know that people like you are fantastic <a href='detail.php?id=8'>scientists</a>, <a href='detail.php?id=33'>journalists</a>, and private investigators/detectives?";
                    }
                    else if(sortedEntries[0][0] == 'a')
                    {
                        message = "You are so creative and innovative! Did you know that people like you are renowned <a href='fashion%20designer.php'>fashion designers</a>, <a href='detail.php?id=17'>musicians</a>, <a href='detail.php?id=17'>writers</a> and <a href='detail.php?id=17'>filmmakers</a>?";
                    }
                    else if(sortedEntries[0][0] == 'e')
                    {
                        message = "You are independent and you like to lead others! Did you know that people like you are transforming the world as <a href='business%20management%20administrator.php'>entrepreneurs</a> and <a href='business%20management%20administrator.php'>business owners</a>?";
                    }
            }
                else 
                {
                    var message = "Wow, ";
                    for(var k = 0; k<3;k++)
                    {
                         if(sortedEntries[k][0] == 'r')
                        {
                            message += " You like to use your physical abilities and are action-oriented. Did you know that people like you are very good <a href='detail.php?id=5'>agriculturists</a>, <a href='detail.php?id=18'>sports managers</a> and also <a href='detail.php?id=4'>doctors</a>?";
                        }
                        else if(sortedEntries[k][0] == 'c')
                        {
                            message += " You are so organized! Did you know that people like you do very well as <a href='cost%20accountant.php'>accountants</a>, and in <a href='career-option.php?id=6'>government services</a>?";
                        }
                        else if(sortedEntries[k][0] == 's')
                        {
                            message += " You my friend, you are a helper by nature! Did you know that caring people like you are very good <a href=' detail.php?id=22'>teachers</a>, <a href='detail.php?id=4'>nurses</a>, counsellors and <a href='salesperson.php'>salespersons</a>?";
                        }
                        
                        else if(sortedEntries[k][0] == 'i')
                        {
                            message += " You are a deep thinker! Did you know that people like you are fantastic <a href='detail.php?id=8'>scientists</a>, <a href='detail.php?id=33'>journalists</a>, and private investigators/detectives?";
                        }
                        else if(sortedEntries[k][0] == 'a')
                        {
                            message = " You are so creative and innovative! Did you know that people like you are renowned <a href='fashion%20designer.php'>fashion designers</a>, <a href='detail.php?id=17'>musicians</a>, <a href='detail.php?id=17'>writers</a> and <a href='detail.php?id=17'>filmmakers</a>?";
                        }
                        else if(sortedEntries[k][0] == 'e')
                        {
                            message = " You are independent and you like to lead others! Did you know that people like you are transforming the world as <a href='business%20management%20administrator.php'>entrepreneurs</a> and <a href='business%20management%20administrator.php'>business owners</a>?";
                        }
                    }
                    // if([0][1] ==2 )
                // console.log(message);
            }*/
            
            
            var careers = [];
            var message = "";
            
            if (sortedEntries[0][1] >= 3) {
                if (sortedEntries[0][0] == 'r') {
                    message = "Wow, so you like to use your physical abilities and are action-oriented. Did you know that people like you are very good <a href='detail.php?id=5'>Agriculturists</a>, <a href='detail.php?id=18'>Sports Managers</a>, <a href='drone-pilot.php'>Drone Pilot</a> and also <a href='detail.php?id=7'>Engineer</a>?";
                    careers.push("Agriculturists", "Sports Coach", "Drone Pilot", "Engineer");
                } else if (sortedEntries[0][0] == 'c') {
                    message = "Amazing, you are so organized! Did you know that people like you do very well as <a href='cost%20accountant.php'>accountants</a>, and in <a href='career-option.php?id=6'>government services</a>?";
                    careers.push("Accountant", "Government Services");
                } else if (sortedEntries[0][0] == 's') {
                    message = "You my friend, are a helper by nature! Did you know that caring people like you are very good <a href=' detail.php?id=22'>teachers</a>, <a href='detail.php?id=4'>nurses</a>, counsellors and <a href='salesperson.php'>salespersons</a>?";
                    careers.push("Teacher", "Nurse", "Counsellor", "Salesperson");
                } else if (sortedEntries[0][0] == 'i') {
                    message = "Wow, you are a deep thinker! Did you know that people like you are fantastic <a href='detail.php?id=8'>scientists</a>, <a href='detail.php?id=33'>journalists</a>, and private investigators/detectives?";
                    careers.push("Scientist", "Journalist", "Private Investigator");
                } else if (sortedEntries[0][0] == 'a') {
                    message = "You are so creative and innovative! Did you know that people like you are renowned <a href='fashion%20designer.php'>fashion designers</a>, <a href='detail.php?id=17'>musicians</a>, <a href='detail.php?id=17'>writers</a> and <a href='detail.php?id=17'>filmmakers</a>?";
                    careers.push("Fashion Designer", "Musician", "Writer", "Filmmaker");
                } else if (sortedEntries[0][0] == 'e') {
                    message = "You are independent and you like to lead others! Did you know that people like you are transforming the world as <a href='business%20management%20administrator.php'>entrepreneurs</a> and <a href='business%20management%20administrator.php'>business owners</a>?";
                    careers.push("Entrepreneur", "Business Owner");
                }
            } else {
                message = "Wow, ";
                for (var k = 0; k < 3; k++) {
                    if (sortedEntries[k][0] == 'r') {
                        message += " You like to use your physical abilities and are action-oriented. Did you know that people like you are very good <a href='detail.php?id=5'>agriculturists</a>, <a href='detail.php?id=18'>sports managers</a> and also <a href='detail.php?id=4'>doctors</a>?";
                        careers.push("Agriculturist", "Sports Coach", "Doctor");
                    } else if (sortedEntries[k][0] == 'c') {
                        message += " You are so organized! Did you know that people like you do very well as <a href='cost%20accountant.php'>accountants</a>, and in <a href='career-option.php?id=6'>government services</a>?";
                        careers.push("Accountant", "Government Services");
                    } else if (sortedEntries[k][0] == 's') {
                        message += " You my friend, are a helper by nature! Did you know that caring people like you are very good <a href=' detail.php?id=22'>teachers</a>, <a href='detail.php?id=4'>nurses</a>, counsellors and <a href='salesperson.php'>salespersons</a>?";
                        careers.push("Teacher", "Nurse", "Counsellor", "Salesperson");
                    } else if (sortedEntries[k][0] == 'i') {
                        message += " You are a deep thinker! Did you know that people like you are fantastic <a href='detail.php?id=8'>scientists</a>, <a href='detail.php?id=33'>journalists</a>, and private investigators/detectives?";
                        careers.push("Scientist", "Journalist", "Private Investigator");
                    } else if (sortedEntries[k][0] == 'a') {
                        message += " You are so creative and innovative! Did you know that people like you are renowned <a href='fashion%20designer.php'>fashion designers</a>, <a href='detail.php?id=17'>musicians</a>, <a href='detail.php?id=17'>writers</a> and <a href='detail.php?id=17'>filmmakers</a>?";
                        careers.push("Fashion Designer", "Musician", "Writer", "Filmmaker");
                    } else if (sortedEntries[k][0] == 'e') {
                        message += " You are independent and you like to lead others! Did you know that people like you are transforming the world as <a href='business%20management%20administrator.php'>entrepreneurs</a> and <a href='business%20management%20administrator.php'>business owners</a>?";
                        careers.push("Entrepreneur", "Business Owner");
                    }
                }
            }

                // console.log(careers);
                $.ajax({
                    type:"post",
                    url:"backend/store-data.php",
                    data : {
                        tab : 101,
                        page_name: 'Weak strenghth',
                        career_name : careers
                    },
                    success:function(resp){
                      if(resp == "1")
{
    // Set message inside modal
    $(".modal-strength-msg").html(message);

    // Show modal popup
    $("#careerSuccessModal").modal("show");
}
                        else
                        {
                            alert("Error: Something went wrong, please try again later");
                            // window.location.reload();
                        }
                    }
                });
                
            
            }
            
            
        }
    </script>
        


	<!-- ================================================section end ======================================== -->

	<!-- -------------footer start---------- -->
	<?php include "include/before-footer.php";?>
	<!-- -------------footer end---------- -->
	<div id="imageContainer"></div>

	<script>
		const uploadInput = document.getElementById('img');
		const imageContainer = document.getElementById('imageContainer');

		uploadInput.addEventListener('change', (event) => {
			const file = event.target.files[0];
			if (file) {
				const reader = new FileReader();
				reader.onload = (e) => {
					const img = new Image();
					img.src = e.target.result;
					img.alt = 'Uploaded Image';
					imageContainer.innerHTML = '';

					const adjectives = [
						"Wonderful! All the best for your future",
						"Wow, so creative!",
						"Amazing, you have really thought deeply about your future!"
					];

					const randomAdjective = adjectives[Math.floor(Math.random() * adjectives.length)];

					// Create card element
					const card = document.createElement('div');
					card.classList.add('card');
					card.textContent = randomAdjective; // Display the randomly selected adjective

					// Create image element
					const customImage = document.createElement('img');
					customImage.src = 'badge.png'; // Adjust the path to your image
					customImage.classList.add('custom-image');

					// Append image, card, and star to container
					imageContainer.appendChild(img);
					imageContainer.appendChild(card);
					imageContainer.appendChild(customImage);
				};
				reader.readAsDataURL(file);
			}
		});
	</script>

</body>

</html>