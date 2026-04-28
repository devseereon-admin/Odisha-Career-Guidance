<!-- USER INFO - START -->

<div class="profile-info row">

    <div class="profile-image col-lg-4 col-md-4 col-4">

        <a href="dashboard.php">

            <img src="data/profile/profile.png" class="img-fluid rounded-circle">

        </a>

    </div>

    <div class="profile-details col-lg-8 col-md-8 col-8">

        <h3>

            <a href="dashboard.php">Ama career</a>

            <span class="profile-status online"></span>

        </h3>

    </div>

</div>

<!-- USER INFO - END -->



<ul class='wraplist'>	

    <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'dashboard.php') ? 'active' : ''; ?>"> 

        <a href="dashboard.php">

            <i class="fa fa-dashboard"></i>

            <span class="title">Dashboard</span>

        </a>

    </li>

    <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'stream.php') ? 'active' : ''; ?>">

        <a href="stream.php"> <i class="fa fa-suitcase"></i>STREAMS(Catagory)</a>

    </li>

    <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'croption.php') ? 'active' : ''; ?>">

        <a href="croption.php"> <i class="fa fa-suitcase"></i>CAREER OPTIONS(SubCatagory)</a>

    </li>

    

    <li class="<?php echo (in_array(basename($_SERVER['PHP_SELF']), ['profesion.php', 'detail.php'])) ? 'active open' : ''; ?>"> 

        <a href="javascript:void(0);">

            <i class="fa fa-suitcase"></i>

            <span class="title">PROFESSIONS(Sub-SubCatagory)</span>

        </a>

        <ul class="sub-menu">

            <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'profesion.php') ? 'active' : ''; ?>">

                <a href="profesion.php">PROFESSIONS LIST</a>

            </li>

            <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'detail.php') ? 'active' : ''; ?>">

                <a href="detail.php">DETAILS</a>

            </li>

        </ul>

    </li>

    

    <li class="<?php echo (in_array(basename($_SERVER['PHP_SELF']), ['qualification.php', 'entrance_exm.php'])) ? 'active open' : ''; ?>"> 

        <a href="javascript:void(0);">

            <i class="fa fa-suitcase"></i>

            <span class="title">Entrance Exam</span>

        </a>

        <ul class="sub-menu">

            <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'qualification.php') ? 'active' : ''; ?>">

                <a href="qualification.php">Qualification</a>

            </li>

            <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'entrance_exm.php') ? 'active' : ''; ?>">

                <a href="entrance_exm.php">Exam List</a>

            </li>

        </ul>

    </li>

    

    <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'scholarship.php') ? 'active' : ''; ?>">

        <a href="scholarship.php"> <i class="fa fa-suitcase"></i>Scholarship</a>

    </li>

    <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'block.php') ? 'active' : ''; ?>">

        <a href="block.php"> <i class="fa fa-suitcase"></i>BLOCKS</a>

    </li>

    <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'college.php') ? 'active' : ''; ?>">

        <a href="college.php"> <i class="fa fa-suitcase"></i>Colleges</a>

    </li>

    <!-- <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'events-photos.php') ? 'active' : ''; ?>">

        <a href="events-photos.php"> <i class="fa fa-suitcase"></i>Events Photos</a>

    </li> -->
     <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'events-list.php') ? 'active' : ''; ?>">

        <a href="events-list.php"> <i class="fa fa-suitcase"></i>Events </a>

    </li>

    <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'events-videos.php') ? 'active' : ''; ?>">

        <a href="events-videos.php"> <i class="fa fa-suitcase"></i>Events Videos</a>

    </li>
     <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'my-career-images.php') ? 'active' : ''; ?>">

        <a href="my-career-images.php"> <i class="fa fa-suitcase"></i>Career Photos</a>

    </li>

    <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'notification_manage.php') ? 'active' : ''; ?>">

       <a href="notification_manage.php"> <i class="fa fa-suitcase"></i>notification management</a>

    </li>

    <li>

        <a href="logout.php"> <i class="fa fa-suitcase"></i>Log Out</a>

    </li>

</ul>



<script>

// Prevent links from opening in new tab and handle active states

document.addEventListener('DOMContentLoaded', function() {

    // Remove target="_blank" from all sidebar links

    const sidebarLinks = document.querySelectorAll('.wraplist a[href]');

    sidebarLinks.forEach(link => {

        link.removeAttribute('target');

        link.removeAttribute('rel');

    });

    

    // Add click event to update active state

    sidebarLinks.forEach(link => {

        link.addEventListener('click', function(e) {

            // Remove active class from all li elements

            document.querySelectorAll('.wraplist li').forEach(li => {

                li.classList.remove('active');

            });

            

            // Add active class to clicked item's parent li

            let parentLi = this.closest('li');

            if (parentLi) {

                parentLi.classList.add('active');

                

                // If it's a submenu item, also activate the parent dropdown

                let parentDropdown = parentLi.closest('.sub-menu');

                if (parentDropdown) {

                    let mainLi = parentDropdown.closest('li');

                    if (mainLi) {

                        mainLi.classList.add('active', 'open');

                    }

                }

            }

        });

    });

});

</script>



<style>

/* Active link styles */

.wraplist li.active > a {

    background-color: #2c3e50 !important;

    color: #ffffff !important;

    border-left: 3px solid #3498db !important;

}



.wraplist li.active > a i.fa {

    color: #3498db !important;

}



.wraplist .sub-menu li.active > a {

    background-color: #34495e !important;

    color: #ffffff !important;

    font-weight: bold;

}



/* Ensure dropdown stays open when active */

.wraplist li.active.open .sub-menu {

    display: block !important;

}

</style>