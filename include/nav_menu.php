

<style>

    .responsText-ai-li button{

        background-color: transparent;

    border: none;

    font-weight: 600;

    margin-left: 40px;

    }

    /*connected shortly start*/

.connected-card {

    background-color: #0f3970;

    border-radius: 10px;

    height: 25px;

    padding-bottom: 0px;

    padding-top: 15px;

    margin-bottom: -160px;

}

.connected-text{

    display: flex;

}

.connected-text p{

    font-size: 18px;

    width: 50%;

    font-weight: 500;

}

.btn-contact {

    background-color: #fff;

    color: #0f3970;

    font-weight: 600;

    padding: 0px 5px;

    font-size: 18px;

    border-radius: 0px;

    margin-left: 25px;

    height: 25px;

    margin-top: -3px;

}

</style>			

	<nav class="navbar navbar-expand-md  navbar-dark">

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">

			<span class="navbar-toggler-icon"></span>

		</button>

		<div class="collapse navbar-collapse" id="collapsibleNavbar">

			<ul class="navbar-nav me-auto">

				<li class="nav-item">

					<a class="nav-link" href="index.php">Home</a>

				</li>



				<li class="nav-item dropdown">

					<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">

					Resources

					</a>

					<div class="dropdown-menu">

					<a class="dropdown-item" href="career-collateral.php" onclick="trackPageClick(['career-collateral'], this)">Career Collateral</a>

					<a class="dropdown-item" href="youtube.php" onclick="trackPageClick(['youtube'], this)">Youtube</a>

					<a class="dropdown-item" href="know-yourself.php">Know Yourself</a>



					</div>

				</li>



				<li class="nav-item">

<a class="nav-link" href="stream.php" onclick="trackPageClick(['careers'], this)">Careers</a>

				</li>

				<li class="nav-item">

<a class="nav-link" href="college-chnge.php" onclick="trackPageClick(['institutions'],this)">Institutions</a>

				</li>

				<li class="nav-item">

<a class="nav-link" href="entrance-exams.php" onclick="trackPageClick(['entrance_exam'],this)">Entrance Exams</a>

				</li>

				<li class="nav-item">

<a class="nav-link" href="oldscholarships1.php" onclick="trackPageClick(['scholarship'],this)">Scholarships</a>

					<!--<a class="nav-link" href="oldscholarships.php">Scholarships</a>-->

				</li>

                <li class="nav-item">

<a class="nav-link" href="event.php" onclick="trackPageClick(['events'],this)">Events</a>
				</li>



				<li class="nav-item">

					<a class="nav-link" href="feedback.php">Feedback</a>

				</li>

				

				<li class="nav-item">

					<a class="nav-link" href="disclaimers.php">Disclaimers</a>

				</li>

				

				



			</ul>

		</div>

	</nav>

	

	

<p  class="btn" id="toggleButton" onclick="toggleAccessibilityPanel(1)"><img src='img/accessibility.png' style="width: 30px;"><br><span style="font-size:15px">Reading<br>Options</span></p>



<div id="accessibilityPanel" class="accessibility-panel">

     <!--<h2>Accessibility Tools</h2> -->

    <button onclick="toggleGrayscale()">Grayscale</button>

    <button onclick="increaseText()">Increase Text</button>

    <button onclick="decreaseText()">Decrease Text</button>

    <button onclick="toggleHighContrast()">High Contrast</button>

    <button onclick="toggleReadable()">Readable</button>

    <button onclick="resetStyles()">Reset</button>

</div>

<style>

  .card-flipper {

            position: relative;

            float: left;

            width: 100%;

            text-align: center;

            height: 450px;

            border: 2px solid #0f3970;

        }



    #toggleButton{

            position: fixed;

            z-index: 100000;

            top: 25%;

            right: 0;

            color: white;

            background: #0F3970;

    }

    .accessibility-panel {

    position: fixed;

    top: 50%;

    right: -300px; /* Initially hidden */

    transform: translate(0, -50%);

    background-color: white;

    padding: 20px;

    border-left: 2px solid #ccc;

    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);

    transition: right 0.3s ease;

    z-index:99999;

}



.accessibility-panel h2 {

    margin-top: 0;

}



.accessibility-panel button {

    display: block;

    margin: 10px auto;

}



.show-panel {

    right: 0; /* Display accessibility panel */

}

.grayscale_pass {

    filter: grayscale(100%);

}

.high-contrast h1,

.high-contrast h2,

.high-contrast h3,

.high-contrast h4,

.high-contrast h5,

.high-contrast h6,

.high-contrast p,

.high-contrast li,

.high-contrast a,

.high-contrast button {

    color: green !important;

}



.high-contrast img{

    filter: contrast(500%) brightness(250%);

}







.high-contrast div{

    background-color: black;

}



.styled {

    color: blue;

    font-family: Arial, sans-serif;

    font-weight: bolder;

}



.iconInner{

left: 90px;

    position: relative;

}



.may-card{

padding: 7px 15px !important;



}



@keyframes pulse {

            0% {

                transform: scale(1);

            }

            50% {

                transform: scale(1.1);

            }

            100% {

                transform: scale(1);

            }

        }



        



</style>





<script>

function toggleAccessibilityPanel(check) {

    document.getElementById('accessibilityPanel').classList.toggle('show-panel');

    // ✅ GTM event
    window.dataLayer = window.dataLayer || [];
    dataLayer.push({
        event: 'accessibility_toggle',
        action: 'reading_options_clicked'
    });

    // ✅ Custom tracking (DB)
    trackPageClick(
        ["Accessibility", "Reading Options "],
        document.getElementById('toggleButton')
    );
}

// function toggleAccessibilityPanel(check) {

//     document.getElementById('accessibilityPanel').classList.toggle('show-panel');

//     let deviceId = localStorage.getItem("device_id");
//     let today = new Date().toISOString().split('T')[0];

//     let key = "clicked_reading_options_" + today;

//     // prevent multiple clicks per day
//     if (localStorage.getItem(key)) {
//         return;
//     }

//     localStorage.setItem(key, "true");

//     // send to backend
//     $.ajax({
//         type: "POST",
//         url: "backend/track_page.php",
//         data: {
//             page: "reading_options",
//             device_id: deviceId
//         }
//     });

//     // (optional) GTM tracking
//     window.dataLayer = window.dataLayer || [];
//     dataLayer.push({
//         'event': 'accessibility_toggle',
//         'action': 'reading_options_clicked'
//     });
// }



let currentFontSize = 18; // Initial font size



function increaseText() {

    currentFontSize += 2; // Increase font size by 2px

    if (currentFontSize > 120) {

        currentFontSize = 120; // Limit maximum font size to 120px

    }

    document.body.style.fontSize = currentFontSize + "px";

}



function decreaseText() {

    currentFontSize -= 2; // Decrease font size by 2px

    if (currentFontSize < 18) {

        currentFontSize = 18; // Limit minimum font size to 16px

    }

    document.body.style.fontSize = currentFontSize + "px";

}



function toggleGrayscale() {

    document.body.classList.toggle("grayscale_pass");

}

// function toggleGrayscale() {

//             var image = document.querySelector('img'); // Get the image element

//             if (image) {

//                 image.classList.toggle("grayscale_pass"); // Apply grayscale to the image

//             }

//             var body = document.body;

//             if (body.classList.contains("grayscale_pass")) {

//                 // If grayscale mode is activated

//                 body.style.color = "gray"; // Change text color to gray

//             } else {

//                 // If grayscale mode is deactivated

//                 body.style.color = ""; // Revert to default text color

//       }

// }



 function toggleHighContrast() {

    const htmlElement = document.documentElement;

    htmlElement.classList.toggle("high-contrast");

}





function toggleReadable() {

    

    $('h1, h2, h3, h4, h5, h6, p, span, div').toggleClass('styled');



    

}



function resetStyles() {

    currentFontSize = 18; 

    document.body.style.fontSize = currentFontSize + "px";

    document.body.classList.remove("grayscale_pass", "high-contrast", "readable");

    document.body.style.backgroundColor = "";

    document.body.style.color = "";

    document.body.style.fontFamily = "";

    

    const htmlElement = document.documentElement;

    htmlElement.classList.remove("high-contrast");

    $('h1, h2, h3, h4, h5, h6, p, span, div').removeClass('styled');

}


// Generate unique device ID (runs once per user)
// if (!localStorage.getItem("device_id")) {
//     localStorage.setItem("device_id", 'dev-' + Math.random().toString(36).substr(2, 12));
// }

// function trackPageClick(parentPage, subPage = null) {

//     let deviceId = localStorage.getItem("device_id");

//     let key = "clicked_" + parentPage + "_" + (subPage || 'no_sub');

//     if (localStorage.getItem(key)) {
//         return;
//     }

//     localStorage.setItem(key, "true");

//     $.ajax({
//         type: "POST",
//         url: "backend/track_page.php",
//         data: {
//             parent_page: parentPage,
//             sub_page: subPage,
//             device_id: deviceId
//         }
//     });
// }
</script>





<!--//chatbot -->

<div id="instituteModal-box"></div>

<div class="botIcon">

	<div class="botIconContainer">

        <div class="card card-body hide-text" onclick="hideText()" style="padding-top:7px;padding-bottom:7px;color:blue;animation: pulse 1s infinite;cursor:pointer"><span style="

            position: absolute;

            right: 10px;

            top: 2px;

            color: red;

        ">X</span>

Hello! <br> I'm Ama Bot  </div>

		<div class="iconInner">

			<img src="img/bot.png" style="width: 60px;border-radius: 50px;">

		</div>

	</div>

	<div class="Layout Layout-open Layout-expand Layout-right">

		<div class="Messenger_messenger">

			<div class="Messenger_header">

				<h4 class="Messenger_prompt">How can we help you?</h4> 

				<span class="chat_close_icon"><i class="fa fa-window-close" aria-hidden="true"></i></span>

			</div>

			<div class="Messenger_content">

				<div class="Messages">

					<div class="Messages_list"></div>

				</div>

					

			</div>

		<div class="card card-body connected-card">

			    <div class="connected-text">

			        <p>To know more</p>

			        <button class="btn btn-contact" data-toggle="modal" data-target="#myModalw">Contact Us</button>

			    </div>

			    

			</div>

		</div>

	</div>

</div>



<!--contact us modal start-->

<div class="modal" id="myModalw">

    <div class="modal-dialog">

      <div class="modal-content">

      

        <!-- Modal Header -->

        <div class="modal-header">

          <h4 class="modal-title" style="color: #fff">Contact Us</h4>

          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        

        <!-- Modal body -->

        <form id="chatbot-contactform">

        <!--<form id="chatbot-contactform-pop">-->

        <div class="modal-body">

         <div class="col-md-12">

             <div class="form-group">

                 <label>Name<sup style="color: red">*</sup></label>

                 <input type="text" name="name" class="form-control" required placeholder="Enter Your Name">

             </div>

             

         </div>

          <div class="col-md-12">

             <div class="form-group">

                 <label>Mobile Number<sup style="color: red">*</sup></label>

                 <input type="number" name="mobile" class="form-control" required placeholder="Enter Your Mobile Number">

             </div>

             

         </div>

          <div class="col-md-12">

             <div class="form-group">

                 <label>Mail ID<sup style="color: red">*</sup></label>

                 <input type="email" name="email" class="form-control" required placeholder="Enter Your Mail ID">

             </div>

             

         </div>

          <div class="col-md-12">

             <div class="form-group">

                 <label>Message</label>

                 <input type="text" name="message" class="form-control" placeholder="Enter Message">

             </div>

             

         </div>

         <div class="col-md-12">

             <button type="submit" class="btn btn-submit" style="background-color: #0f3970;color: #fff;margin-top: 20px;padding: 7px 25px;">Submit</button>

         </div>

        </div>

        </form

       

        

      </div>

    </div>

  </div>

<script>

    function hideText()

    {

        $('.hide-text').css({'opacity':'0'});

    }


</script>











<!--chatbot modal-->

<div class="modal fade bd-example-modal-lg openchatbotContactModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-lg">

    <div class="modal-content" style="padding: 20px">

     <div class="col-md-12">

         <form id="chatbot-contactform">

         <div class="row">

             <div class="col-md-6">

                 <div class="form-group">

                     <label>Name</label>

                     <input type="text" name="name" class="form-control" placeholder="Enter Name">

                 </div>

                 

             </div>

              <div class="col-md-6">

                 <div class="form-group">

                     <label>Mobile Number</label>

                     <input type="number" name="mobile" class="form-control" placeholder="Enter Mobile Number">

                 </div>

                 

             </div>

              <div class="col-md-6">

                 <div class="form-group">

                     <label>Email</label>

                     <input type="email" name="email" class="form-control" placeholder="Enter Email">

                 </div>

                 

             </div>

              <div class="col-md-6">

                 <div class="form-group">

                     <label>Message</label>

                     <textarea type="text" name="message" class="form-control" placeholder="Enter Message"></textarea>

                 </div>

                 

             </div>

             <div class="col-md-12">

                 <input type="submit"  value="Submit" class="btn btn-submit" style="background-color: green;color: #fff;padding: 10px 25px">

                 

             </div>

             

         </div>

         </form>

         

     </div>

    </div>

  </div>

</div>



<!-- Small modal -->



