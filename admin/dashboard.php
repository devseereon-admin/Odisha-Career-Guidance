<?php

// =============================================

// LANGUAGE TOGGLE FUNCTIONALITY - ADDED

// =============================================

require_once('check-validate.php');

if (session_status() === PHP_SESSION_NONE) {

    session_start();

}



// Language detection

$current_language = 'english'; // default



if (isset($_GET['lang'])) {

    if ($_GET['lang'] === 'odia') {

        $current_language = 'odia';

        $_SESSION['dashboard_lang'] = 'odia';

    } elseif ($_GET['lang'] === 'english') {

        $current_language = 'english'; 

        $_SESSION['dashboard_lang'] = 'english';

    }

} elseif (isset($_SESSION['dashboard_lang'])) {

    $current_language = $_SESSION['dashboard_lang'];

}



// Database connection for Odia

$odia_db_conn = null;

$active_conn = null;



// First include the default English connection

include "dbconn.php";

$active_conn = $conn; // default to English connection



if ($current_language === 'odia') {

    $servername = "localhost";

    $username = "User__MoCar-New_OdIa_DatABase";

    $password = "w!8-#NJX=mV1)((*&^%@#%U*()";

    $dbname = "MoCar-New_OdIa_DatABase";

    

    $odia_db_conn = new mysqli($servername, $username, $password, $dbname);

    if (!$odia_db_conn->connect_error) {

        mysqli_set_charset($odia_db_conn,"utf8");

        $active_conn = $odia_db_conn;

    }

}



// Simple translation function

function t($key) {

    global $current_language;

    

    $translations = [

        'english' => [

            'dashboard' => 'Dashboard',

            'website_visitors' => 'Website visitors',

            'total_visitor' => 'Total visitor',

            'max_career_search' => 'Max Career search',

            'view_all' => 'View All',

            'analytics_dashboard' => 'Analytics Dashboard',

            'real_time_insights' => 'Real-time insights with visual highlights for quick scanning',

            'total_interactions' => 'Total Interactions',

            'total_records' => 'Total Records',

            'unique_items' => 'Unique Items',

            'active_tracking' => 'Active Tracking',

            'categories' => 'categories',

            'last_updated' => 'Last Updated',

            'top_performing_items' => 'Top Performing Items',

            'most_popular' => 'Most Popular',

            'college_search_analytics' => 'College Search Analytics',

            'complete_breakdown' => 'Complete breakdown with visual highlights',

            'items' => 'items',

            'institute_types' => 'Institute Types',

            'government_vs_private' => 'Government vs Private institutes',

            'study_domains' => 'Study Domains',

            'popular_academic_fields' => 'Popular academic fields',

            'state_preferences' => 'State Preferences',

            'geographical_preferences' => 'Geographical preferences',

            'examination_search_analytics' => 'Examination Search Analytics',

            'exam_types' => 'Exam Types',

            'ug_pg_competitive' => 'UG, PG, Competitive exams',

            'qualifications' => 'Qualifications',

            'educational_levels' => 'Educational qualification levels',

            'locations' => 'Locations',

            'exam_center_preferences' => 'Exam center preferences',

            'scholarship_search_analytics' => 'Scholarship Search Analytics',

            'scholarship_types' => 'Scholarship Types',

            'central_state_private' => 'Central, State, Private scholarships',

            'academic_levels' => 'Academic Levels',

            'class_based_searches' => 'Class-based scholarship searches',

            'understand_your_strength_and_weakness' => 'Understand Your Strength and Weakness',

            'emotional_support' => 'Emotional Support',

            'emotional_coping_strategies' => 'Emotional coping strategies',

            'academic_support' => 'Academic Support',

            'study_improvement_areas' => 'Study improvement areas',

            'career_guidance' => 'Understand Your Strength and Weakness Career choose',

            'career_preference_selections' => 'what career do you think would be suitable for you?',

            'no_data_available' => 'No data available for this section',

            'toggle_odia' => 'ଓଡିଆ',

            'toggle_english' => 'English'

        ],

        'odia' => [

            'dashboard' => 'ଡ୍ୟାସବୋର୍ଡ',

            'website_visitors' => 'ୱେବସାଇଟ ପରିଦର୍ଶକ',

            'total_visitor' => 'ମୋଟ ପରିଦର୍ଶକ',

            'max_career_search' => 'ସର୍ବାଧିକ କ୍ୟାରିୟର ଖୋଜ',

            'view_all' => 'ସମସ୍ତ ଦେଖନ୍ତୁ',

            'analytics_dashboard' => 'ଆନାଲିଟିକ୍ସ ଡ୍ୟାସବୋର୍ଡ',

            'real_time_insights' => 'ଦ୍ରୁତ ସ୍କାନିଂ ପାଇଁ ଭିଜୁଆଲ୍ ହାଇଲାଇଟ୍ ସହିତ ରିଆଲ୍-ଟାଇମ୍ ଇନସାଇଟ୍',

            'total_interactions' => 'ମୋଟ ଇଣ୍ଟରାକ୍ସନ୍',

            'total_records' => 'ମୋଟ ରେକର୍ଡ',

            'unique_items' => 'ଅନନ୍ୟ ଆଇଟମ୍',

            'active_tracking' => 'ସକ୍ରିୟ ଟ୍ରାକିଂ',

            'categories' => 'ବର୍ଗଗୁଡିକ',

            'last_updated' => 'ଶେଷ ଅଦ୍ୟତନ',

            'top_performing_items' => 'ସର୍ବୋଚ୍ଚ ପ୍ରଦର୍ଶନ କରୁଥିବା ଆଇଟମ୍',

            'most_popular' => 'ଅଧିକ ଲୋକପ୍ରିୟ',

            'college_search_analytics' => 'କଲେଜ ଖୋଜ ଆନାଲିଟିକ୍ସ',

            'complete_breakdown' => 'ଦ୍ରୁତ ସ୍କାନିଂ ପାଇଁ ଭିଜୁଆଲ୍ ହାଇଲାଇଟ୍ ସହିତ ସମ୍ପୂର୍ଣ୍ଣ ବିଭାଜନ',

            'items' => 'ଆଇଟମ୍',

            'institute_types' => 'ଅନୁଷ୍ଠାନ ପ୍ରକାର',

            'government_vs_private' => 'ସରକାରୀ ବନାମ ବେସରକାରୀ ଅନୁଷ୍ଠାନ',

            'study_domains' => 'ଅଧ୍ୟୟନ ଡୋମେନ୍',

            'popular_academic_fields' => 'ଲୋକପ୍ରିୟ ଏକାଡେମିକ୍ କ୍ଷେତ୍ର',

            'state_preferences' => 'ରାଜ୍ୟ ପସନ୍ଦ',

            'geographical_preferences' => 'ଭୌଗୋଳିକ ପସନ୍ଦ',

            'examination_search_analytics' => 'ପରୀକ୍ଷା ଖୋଜ ଆନାଲିଟିକ୍ସ',

            'exam_types' => 'ପରୀକ୍ଷା ପ୍ରକାର',

            'ug_pg_competitive' => 'ୟୁଜି, ପିଜି, ପ୍ରତିଯୋଗିତାମୂଳକ ପରୀକ୍ଷା',

            'qualifications' => 'ଯୋଗ୍ୟତା',

            'educational_levels' => 'ଶିକ୍ଷାଗତ ଯୋଗ୍ୟତା ସ୍ତର',

            'locations' => 'ଅବସ୍ଥାନ',

            'exam_center_preferences' => 'ପରୀକ୍ଷା କେନ୍ଦ୍ର ପସନ୍ଦ',

            'scholarship_search_analytics' => 'ଛାତ୍ରବୃତ୍ତି ଖୋଜ ଆନାଲିଟିକ୍ସ',

            'scholarship_types' => 'ଛାତ୍ରବୃତ୍ତି ପ୍ରକାର',

            'central_state_private' => 'କେନ୍ଦ୍ରୀୟ, ରାଜ୍ୟ, ବେସରକାରୀ ଛାତ୍ରବୃତ୍ତି',

            'academic_levels' => 'ଏକାଡେମିକ୍ ସ୍ତର',

            'class_based_searches' => 'କ୍ଲାସ୍-ଆଧାରିତ ଛାତ୍ରବୃତ୍ତି ଖୋଜ',

            'student_support_analytics' => 'ଛାତ୍ର ସହାୟତା ଆନାଲିଟିକ୍ସ',

            'emotional_support' => 'ଭାବନାତ୍ମକ ସମର୍ଥନ',

            'emotional_coping_strategies' => 'ଭାବନାତ୍ମକ କୋପିଂ ରଣନୀତି',

            'academic_support' => 'ଏକାଡେମିକ୍ ସହାୟତା',

            'study_improvement_areas' => 'ଅଧ୍ୟୟନ ଉନ୍ନତି କ୍ଷେତ୍ର',

            'career_guidance' => 'କ୍ୟାରିୟର ମାର୍ଗଦର୍ଶନ',

            'career_preference_selections' => 'କ୍ୟାରିୟର ପସନ୍ଦ ଚୟନ',

            'no_data_available' => 'ଏହି ବିଭାଗ ପାଇଁ କୌଣସି ତଥ୍ୟ ଉପଲବ୍ଧ ନାହିଁ',

            'toggle_odia' => 'ଓଡିଆ',

            'toggle_english' => 'English'

        ]

    ];

    

    return $translations[$current_language][$key] ?? $key;

}

// =============================================

// END LANGUAGE TOGGLE FUNCTIONALITY

// =============================================



// Get ALL categories from database

$all_categories = [];

$categories_result = $active_conn->query("SELECT id, name FROM catagory WHERE status='1' ORDER BY name");

while ($row = $categories_result->fetch_assoc()) {

    $all_categories[$row['id']] = $row['name'];

}



// Fetch college form data for domains

$college_domain_clicks = [];

$college_result = $active_conn->query("

    SELECT item_id, item_name, SUM(click_count) as total_clicks

    FROM form_click_summary 

    WHERE form_type = 'college' AND click_type = 'domain'

    GROUP BY item_id, item_name

");



while ($row = $college_result->fetch_assoc()) {

    $college_domain_clicks[$row['item_id']] = $row['total_clicks'];

}



// Combine all categories with their click counts (0 if not clicked)

$college_domain_data = [];

foreach ($all_categories as $cat_id => $cat_name) {

    $click_count = isset($college_domain_clicks[$cat_id]) ? $college_domain_clicks[$cat_id] : 0;

    $college_domain_data[$cat_name] = $click_count;

}



// Sort by click count descending

arsort($college_domain_data);



// Fetch other college data (institute and state)

$college_other_data = [];

$college_other_result = $active_conn->query("

    SELECT click_type, item_name, SUM(click_count) as total_clicks

    FROM form_click_summary 

    WHERE form_type = 'college' AND click_type IN ('institute', 'state')

    GROUP BY click_type, item_name

    ORDER BY click_type, total_clicks DESC

");



while ($row = $college_other_result->fetch_assoc()) {

    $college_other_data[$row['click_type']][$row['item_name']] = $row['total_clicks'];

}



// Fetch examination form data

$exam_data = [];

$exam_result = $active_conn->query("

    SELECT click_type, item_name, SUM(click_count) as total_clicks

    FROM form_click_summary 

    WHERE form_type = 'examination' 

    GROUP BY click_type, item_name

    ORDER BY click_type, total_clicks DESC

");



while ($row = $exam_result->fetch_assoc()) {

    $exam_data[$row['click_type']][$row['item_name']] = $row['total_clicks'];

}

// ----------------------------

// Fetch scholarship form data

// ----------------------------

$scholarship_data = [];

$scholarship_result = $active_conn->query("

    SELECT click_type, item_name, SUM(click_count) as total_clicks

    FROM form_click_summary 

    WHERE form_type = 'scholarship' 

    GROUP BY click_type, item_name

    ORDER BY click_type, total_clicks DESC

");



while ($row = $scholarship_result->fetch_assoc()) {

    $scholarship_data[$row['click_type']][$row['item_name']] = $row['total_clicks'];

}

?>







<!DOCTYPE html>

<html class=" ">

    <head>

        <!-- 

         * @Package: Ultra Admin - Responsive Theme

         * @Subpackage: Bootstrap

         * @Version: B4-1.3

         * This file is part of Ultra Admin Theme.

        -->

        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />

        <meta charset="utf-8" />

        <title>AMA Career Admin - <?= t('dashboard') ?></title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <meta content="" name="description" />

        <meta content="" name="author" />

         <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">-->

         <!-- Add Bootstrap Icons for the icons used -->

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

         <style>

            .table-responsive {

                border: 1px solid #dee2e6;

            }

            .sticky-top {

                position: sticky;

                top: 0;

                z-index: 10;

            }

            .table tbody tr:nth-child(1),

            .table tbody tr:nth-child(2) {

                background-color: #f8f9fa;

            }

         </style>

         <style>

         

             .card {

                 transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;

             }

             

             .card:hover {

                 transform: translateY(-5px);

                 box-shadow: 0 8px 25px rgba(0,0,0,0.15) !important;

             }

             

             .table th {

                 border-top: none;

                 font-weight: 600;

                 font-size: 0.85rem;

                 text-transform: uppercase;

                 letter-spacing: 0.5px;

             }

             

             .table td {

                 vertical-align: middle;

                 font-size: 0.9rem;

             }

             

             .card-header {

                 border-bottom: 1px solid rgba(0,0,0,0.05);

             }

             

             .sticky-top {

                 z-index: 10;

             }

             

             .badge {

                 font-size: 0.7rem;

             }

         </style>

         <style>

            /* Language Toggle Styles - ADDED */

            .language-toggle {

                position: fixed;

                top: 70px; /* Position below header */

                right: 20px;

                z-index: 1000;

                background: white;

                padding: 5px;

                border-radius: 25px;

                box-shadow: 0 2px 10px rgba(0,0,0,0.1);

            }

            .language-btn {

                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);

                color: white;

                border: none;

                padding: 8px 16px;

                border-radius: 20px;

                font-weight: 600;

                text-decoration: none;

                display: inline-block;

                box-shadow: 0 4px 15px rgba(0,0,0,0.2);

                transition: all 0.3s ease;

                font-size: 0.9rem;

            }

            .language-btn:hover {

                color: white;

                text-decoration: none;

                transform: translateY(-2px);

                box-shadow: 0 6px 20px rgba(0,0,0,0.3);

            }



            

            :root {

                --highlight-high: linear-gradient(135deg, #ff6b6b, #ee5a24);

                --highlight-medium: linear-gradient(135deg, #feca57, #ff9ff3);

                --highlight-low: linear-gradient(135deg, #48dbfb, #0abde3);

                --highlight-normal: #f8f9fa;

            }

            

            .analytics-card {

                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);

                border: none;

                box-shadow: 0 2px 12px rgba(0,0,0,0.08);

                border-radius: 12px;

                border-left: 4px solid transparent;

                background: white;

            }

            

            .analytics-card:hover {

                transform: translateY(-3px);

                box-shadow: 0 8px 25px rgba(0,0,0,0.15);

            }

            

            .highlight-high {

                background: var(--highlight-high) !important;

                color: white !important;

                font-weight: 800 !important;

                border-radius: 6px;

                padding: 2px 8px;

                margin: 1px 0;

            }

            

            .highlight-medium {

                background: var(--highlight-medium) !important;

                color: #2c3e50 !important;

                font-weight: 700 !important;

                border-radius: 6px;

                padding: 2px 8px;

                margin: 1px 0;

            }

            

            .highlight-low {

                background: var(--highlight-low) !important;

                color: white !important;

                font-weight: 600 !important;

                border-radius: 6px;

                padding: 2px 8px;

                margin: 1px 0;

            }

            

            .data-grid {

                display: grid;

                grid-template-columns: 1fr auto;

                gap: 2px 12px;

                align-items: center;

            }

            

            .data-item {

                display: contents;

            }

            

            .data-name {

                font-size: 0.82rem;

                line-height: 1.5;

                color: #2c3e50;

                word-wrap: break-word;

                padding: 4px 0;

                border-radius: 4px;

                transition: all 0.2s ease;

            }

            

            .data-name:hover {

                background: #f8f9fa;

                padding-left: 8px;

            }

            

            .data-count {

                font-size: 0.85rem;

                font-weight: 700;

                color: #2c3e50;

                text-align: right;

                white-space: nowrap;

                background: #f8f9fa;

                padding: 4px 8px;

                border-radius: 6px;

                min-width: 60px;

                text-align: center;

            }

            

            .scroll-container {

                max-height: 350px;

                overflow-y: auto;

                padding: 0.75rem;

                background: #fafbfc;

                border-radius: 0 0 12px 12px;

            }

            

            .stats-grid {

                display: grid;

                grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));

                gap: 1rem;

            }

            

            .overview-card {

                background: white;

                border: 1px solid #e9ecef;

                border-radius: 10px;

                padding: 1rem;

                transition: all 0.3s ease;

                position: relative;

                overflow: hidden;

            }

            

            .overview-card::before {

                content: '';

                position: absolute;

                top: 0;

                left: 0;

                right: 0;

                height: 3px;

                background: linear-gradient(90deg, var(--bs-primary), var(--bs-success));

            }

            

            .section-header {

                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);

                color: white;

                padding: 1.5rem 2rem;

                border-radius: 12px;

                margin-bottom: 1.5rem;

            }

            

            .glass-morphism {

                background: rgba(255, 255, 255, 0.15);

                backdrop-filter: blur(12px);

                border: 1px solid rgba(255, 255, 255, 0.2);

                box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);

                transition: all 0.3s ease;

            }

            

            .glass-morphism:hover {

                background: rgba(255, 255, 255, 0.2);

                transform: translateY(-2px);

                box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);

            }

            

            .highlight-badge {

                font-size: 0.7rem;

                padding: 0.2rem 0.6rem;

                border-radius: 20px;

                font-weight: 600;

            }

            

            .trend-indicator {

                font-size: 0.75rem;

                padding: 0.2rem 0.5rem;

                border-radius: 12px;

                background: #e8f5e8;

                color: #27ae60;

                font-weight: 600;

            }

            

            .quick-stats {

                display: grid;

                grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));

                gap: 0.75rem;

                margin-bottom: 1.5rem;

            }

            

            .stat-item {

                background: white;

                padding: 0.75rem;

                border-radius: 8px;

                border-left: 4px solid var(--bs-primary);

                box-shadow: 0 2px 8px rgba(0,0,0,0.06);

            }

            

            .highlight-section {

                background: linear-gradient(135deg, #fff9e6, #fff3cd);

                border: 1px solid #ffeaa7;

                border-radius: 12px;

                padding: 1.5rem;

                margin-bottom: 2rem;

            }

            

            .highlight-card {

                transition: all 0.3s ease;

                border-left: 4px solid #ffd43b !important;

                background: white !important;

            }

            

            .highlight-card:hover {

                transform: translateY(-3px);

                box-shadow: 0 6px 20px rgba(0,0,0,0.1) !important;

                border-left: 4px solid #f59f00 !important;

            }

            

            .trend-indicator {

                font-size: 0.9rem;

                padding: 0.4rem 0.8rem;

                border-radius: 20px;

                background: linear-gradient(135deg, #51cf66, #40c057);

                color: white;

                font-weight: 600;

            }

            

            .data-visibility {

                font-size: 0.8rem;

                opacity: 0.9;

                transition: all 0.3s ease;

            }

            

            .data-visibility:hover {

                opacity: 1;

                transform: scale(1.02);

            }

            

            /* Custom scrollbar */

            .scroll-container::-webkit-scrollbar {

                width: 6px;

            }

            

            .scroll-container::-webkit-scrollbar-track {

                background: #f1f1f1;

                border-radius: 10px;

            }

            

            .scroll-container::-webkit-scrollbar-thumb {

                background: #c1c1c1;

                border-radius: 10px;

            }

            

            .scroll-container::-webkit-scrollbar-thumb:hover {

                background: #a8a8a8;

            }

            

            /* Pulse animation for highlights */

            @keyframes pulse-highlight {

                0% { transform: scale(1); }

                50% { transform: scale(1.05); }

                100% { transform: scale(1); }

            }

            

            .highlight-high {

                animation: pulse-highlight 2s infinite;

            }

            

            /* Responsive improvements */

            @media (max-width: 768px) {

                .stats-grid {

                    grid-template-columns: 1fr;

                }

                

                .data-grid {

                    grid-template-columns: 1fr;

                    gap: 8px;

                }

                

                .data-count {

                    text-align: left;

                    justify-self: start;

                }

            }

        </style>



        <?php include "admcommon/header_icon.php"; ?>

        <?php include "admcommon/header_css.php"; ?>

    

    </head>

    <!-- END HEAD -->



    <!-- BEGIN BODY -->

    <body class="overflow-x: hidden"style="overflow-x: hidden;">

    <!-- Language Toggle Button - ADDED -->

    <!--<div class="language-toggle">-->

    <!--    <a href="?lang=<?= $current_language === 'english' ? 'odia' : 'english' ?>" -->

    <!--       class="language-btn">-->

    <!--        <i class="bi bi-translate me-1"></i>-->

    <!--        <?= t($current_language === 'english' ? 'toggle_odia' : 'toggle_english') ?>-->

    <!--    </a>-->

    <!--</div>-->



    <!-- START TOPBAR -->

        <div class='page-topbar '>

            <div class='logo-area'>



            </div>

            <div class='quick-area'>

               

            </div>



        </div>

        <!-- END TOPBAR -->

        <!-- START CONTAINER -->

        <div class="page-container row-fluid">



            <!-- SIDEBAR - START -->

            <div class="page-sidebar " style ="top:0">



                <!-- MAIN MENU - START -->

                <div class="page-sidebar-wrapper" id="main-menu-wrapper"> 

                 <?php include "admcommon/side-menu.php"; ?>

                    



                </div>

                <!-- MAIN MENU - END -->







                <div class="project-info"></div>

            </div>

            <!--  SIDEBAR - END -->

            <!-- START CONTENT -->

            <section id="main-content" class=" ">

                <section class="wrapper main-wrapper" style=''>

                    

                    <div class="row">

                              <div class='col-xl-12 col-lg-12 col-md-12 col-12 mb-3'>

                                  <div class="page-title">

          

                                      <div class="float-left">

                                          <h1 class="title"><?= t('dashboard') ?></h1>                            </div>

                                          <img src="ama-career-dashboard.png" class="w-100">

                                          

                                       <!--<div class="card card-body"><h3>Total visitor :  </h3></div>   -->

                                  </div>

                              </div>

                    

                    

                                <div class='col-md-6'>

                                   <div class="card text-white bg-primary mb-3" >

                                       <div class="card-header"><?= t('website_visitors') ?></div>

                                     <div class="card-body">

                                       <h5 class="card-title font-weight-bold text-light"><?= t('total_visitor') ?> : <span id="visitor-count" class="text-light"></span></h5>

                                     </div>

                                   </div>

                               </div>

                               <div class='col-md-4'>

                                  <div class="card text-white bg-danger mb-3" >

                                      <div class="card-header"><?= t('max_career_search') ?> <a href="view-all-carrer-serch.php"><?= t('view_all') ?></a></div>

                                    <div class="card-body">

                                        <?php

                                        $sql = "SELECT career_name, COUNT(*) as career_count FROM career_save_details GROUP BY career_name ORDER BY career_count DESC Limit 1";

                                        $query = $active_conn->query($sql)->fetch_assoc();

                                        $c_name = $query['career_name'];

                                        $c_count = $query['career_count'];

                                        ?>

                                      <h5 class="card-title font-weight-bold text-light"> <?= $c_name; ?> : <span id="visitor-count" class="text-light"><?= $c_count; ?></span></h5>

                                    </div>

                                  </div>

                              </div>

                              

                    <!-- <div class='col-md-4'>-->

                    <!--    <div class="card text-white bg-success mb-3">-->

                    <!--        <div class="card-header">Max Carrer search(<?= date('M') ?>)</div>-->

                    <!--      <div class="card-body">-->

                    <!--          <?php-->

                    <!--          $sql = "SELECT career_name, COUNT(*) as career_count FROM career_save_details WHERE DATE_FORMAT(created_at, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') GROUP BY career_name ORDER BY career_count DESC LIMIT 1;";-->

                    <!--          $query = $conn->query($sql)->fetch_assoc();-->

                    <!--          $c_name = $query['career_name'];-->

                    <!--          $c_count = $query['career_count'];-->

                    <!--          ?>-->

                    <!--        <h5 class="card-title font-weight-bold"> <?= $c_name; ?> : <span id="visitor-count" class="text-light"><?= $c_count; ?></span></h5>-->

                    <!--      </div>-->

                    <!--    </div>-->

                    <!--</div>-->

                    </div>

                    <div class="clearfix">

                        

                    </div>

                    

                 <!--=============================================-->

                 <!--FIXED PHP DATA FETCHING WITHOUT CREATED_AT COLUMN-->

                 <!--=============================================-->

                <?php

                  class FormAnalyticsData {

                    private $conn;

                    

                    public function __construct($connection) {

                        $this->conn = $connection;

                    }

                    

                    public function getAllAnalyticsData() {

                        $data = [

                            'college' => $this->getFormData('college'),

                            'examination' => $this->getFormData('examination'),

                            'scholarship' => $this->getFormData('scholarship'),

                            'weakness' => $this->getFormData('weakness_follow'),
                            'resource' => $this->getFormData('resource'),
                            'career' => $this->getFormData('career'),
                            'totals' => $this->getTotalStats(),

                            'all_data' => $this->getAllFormData(),

                            'highlights' => $this->getTopHighlights()

                        ];

                        

                        return $data;

                    }

 private function getFormData($formType) {

    $data = [];

    // ✅ COLLEGE FROM JSON WITH FILTER
    if ($formType === 'college') {

        $mapping = [
            'institute' => '$[0]',
            'domain'    => '$[1]',
            'state'     => '$[2]'
        ];

        foreach ($mapping as $type => $jsonIndex) {

            $result = $this->conn->query("
                SELECT 
                    JSON_UNQUOTE(JSON_EXTRACT(page_flow, '$jsonIndex')) AS name,
                    COUNT(*) as total_clicks
                FROM page_clicks
                WHERE page_url = 'college-chnge.php'
                AND JSON_UNQUOTE(JSON_EXTRACT(page_flow, '$[0]')) IN ('Private','Government')
                AND JSON_EXTRACT(page_flow, '$jsonIndex') IS NOT NULL
                GROUP BY name
                ORDER BY total_clicks DESC
            ");

            while ($row = $result->fetch_assoc()) {

                if (!empty($row['name'])) {
                    $data[$type][] = [
                        'name' => $row['name'],
                        'clicks' => $row['total_clicks'],
                        'highlight' => $this->isHighlight($row['total_clicks'])
                    ];
                }
            }
        }

        return $data;
    }

    // ============================================
    // ✅ EXAMINATION (NEW JSON LOGIC)
    // ============================================
    if ($formType === 'examination') {

        $mapping = [
            'exam_type'     => '$[0]',
            'qualification' => '$[1]',
            'location'      => '$[2]'
        ];

        foreach ($mapping as $type => $jsonIndex) {

           $result = $this->conn->query("
       SELECT 
        JSON_UNQUOTE(JSON_EXTRACT(page_flow, '$jsonIndex')) AS name,
        country,
        state,
        city,
        COUNT(*) as total_clicks
     FROM page_clicks
     WHERE page_url = 'entrance-exams.php'
     AND JSON_UNQUOTE(JSON_EXTRACT(page_flow, '$[0]')) 
        IN ('Post Graduate','Under Graduate','Competitive exam for job')
     AND JSON_EXTRACT(page_flow, '$jsonIndex') IS NOT NULL
     GROUP BY name, country, state, city
     ORDER BY total_clicks DESC
");

            while ($row = $result->fetch_assoc()) {

                if (!empty($row['name'])) {
                    $data[$type][] = [
                        'name' => $row['name'],
                        'clicks' => $row['total_clicks'],
                        'highlight' => $this->isHighlight($row['total_clicks'])
                    ];
                }
            }
        }

        return $data;
    }

   if ($formType === 'scholarship') {

    $mapping = [
        'scholarship_type' => '$[0]',
        'class'            => '$[1]'
    ];

    foreach ($mapping as $type => $jsonIndex) {

        $result = $this->conn->query("
            SELECT 
                JSON_UNQUOTE(JSON_EXTRACT(page_flow, '$jsonIndex')) AS name,
                COUNT(*) as total_clicks
            FROM page_clicks
            WHERE page_url = 'oldscholarships1.php'

            -- ✅ EXCLUDE THESE PARENT FLOWS
            AND LOWER(JSON_UNQUOTE(JSON_EXTRACT(page_flow, '$[0]'))) 
                NOT IN ('scholarship', 'persona_selection')

            AND JSON_EXTRACT(page_flow, '$jsonIndex') IS NOT NULL
            GROUP BY name
            ORDER BY total_clicks DESC
        ");

        while ($row = $result->fetch_assoc()) {

            if (!empty($row['name'])) {
                $data[$type][] = [
                    'name' => $row['name'],
                    'clicks' => $row['total_clicks'],
                    'highlight' => $this->isHighlight($row['total_clicks'])
                ];
            }
        }
    }

    return $data;
  }

  if ($formType === 'weakness_follow') {

    $mapping = [
        'career_selection' => '$[1]',
        'emotional_area' => '$[1]',
        'study_area'     => '$[1]'
    ];

    foreach ($mapping as $parent => $jsonIndex) {
   $result = $this->conn->query("
    SELECT 
        JSON_UNQUOTE(JSON_EXTRACT(page_flow, '$[1]')) AS name,
        COUNT(*) as total_clicks
    FROM page_clicks
    WHERE page_url = 'understand_your_strength_weakness.php'
    AND JSON_UNQUOTE(JSON_EXTRACT(page_flow, '$[0]')) = '$parent'
    GROUP BY name
    ORDER BY total_clicks DESC
    ");
  while ($row = $result->fetch_assoc()) {

            if (!empty($row['name'])) {
                $data[$parent][] = [
                    'name' => $row['name'],
                    'clicks' => $row['total_clicks'],
                    'highlight' => $this->isHighlight($row['total_clicks'])
                ];
            }
        }
    }
            //  echo '<pre>'; print_r($data);       

    return $data;
  }
   if ($formType === 'resource') {

    // ============================
    // 🎥 YOUTUBE (INDEX 2)
    // ============================
    $result = $this->conn->query("
        SELECT 
            JSON_UNQUOTE(JSON_EXTRACT(page_flow, '$[2]')) AS name,
            COUNT(*) as total_clicks
        FROM page_clicks
        WHERE parent_page = 'YouTube'
        AND JSON_UNQUOTE(JSON_EXTRACT(page_flow, '$[0]')) = 'YouTube'
        GROUP BY name
        ORDER BY total_clicks DESC
    ");

    while ($row = $result->fetch_assoc()) {
        if (!empty($row['name'])) {
            $data['videos'][] = [
                'name' => $row['name'],   // Arts
                'clicks' => $row['total_clicks'],
                'highlight' => $this->isHighlight($row['total_clicks'])
            ];
        }
    }

    // ============================
    // 📄 ARTICLES (PDF CLICK)
    // ============================
  $result = $this->conn->query("
    SELECT 
        JSON_UNQUOTE(JSON_EXTRACT(page_flow, '$[1]')) AS name,
        COUNT(*) as total_clicks
    FROM page_clicks
    WHERE TRIM(LOWER(parent_page)) = 'career collateral'
    AND TRIM(LOWER(JSON_UNQUOTE(JSON_EXTRACT(page_flow, '$[0]')))) = 'career collateral'
    GROUP BY name
    ORDER BY total_clicks DESC
  ");

    while ($row = $result->fetch_assoc()) {
        if (!empty($row['name'])) {
            $data['articles'][] = [
                'name' => $row['name'],
                'clicks' => $row['total_clicks'],
                'highlight' => $this->isHighlight($row['total_clicks'])
            ];
        }
    }

    // ============================
    // 🛠 TOOLS
    // ============================
    $result = $this->conn->query("
        SELECT 
            JSON_UNQUOTE(JSON_EXTRACT(page_flow, '$[1]')) AS name,
            COUNT(*) as total_clicks
        FROM page_clicks
        WHERE page_url = 'resources.php'
        AND JSON_UNQUOTE(JSON_EXTRACT(page_flow, '$[0]')) = 'Tools'
        GROUP BY name
        ORDER BY total_clicks DESC
    ");

    while ($row = $result->fetch_assoc()) {
        if (!empty($row['name'])) {
            $data['tools'][] = [
                'name' => $row['name'],
                'clicks' => $row['total_clicks'],
                'highlight' => $this->isHighlight($row['total_clicks'])
            ];
        }
    }

    return $data;
  }

   if ($formType === 'career') {

    // ============================
    // 🎓 CAREER PATH (FLOW)
    // ============================
    $result = $this->conn->query("
        SELECT 
            JSON_UNQUOTE(JSON_EXTRACT(page_flow, '$[1]')) AS name,
            COUNT(*) as total_clicks
        FROM page_clicks
        WHERE parent_page = 'car1'
        GROUP BY name
        ORDER BY total_clicks DESC
    ");

    while ($row = $result->fetch_assoc()) {
        if (!empty($row['name'])) {
            $data['career_paths'][] = [
                'name' => $row['name'],
                'clicks' => $row['total_clicks'],
                'highlight' => $this->isHighlight($row['total_clicks'])
            ];
        }
    }

    // ============================
    // 📄 CAREER DETAILS PAGE
    // ============================
    $result = $this->conn->query("
        SELECT 
            JSON_UNQUOTE(JSON_EXTRACT(page_flow, '$[1]')) AS name,
            COUNT(*) as total_clicks
        FROM page_clicks
        WHERE parent_page = 'car2'
        GROUP BY name
        ORDER BY total_clicks DESC
    ");

    while ($row = $result->fetch_assoc()) {
        if (!empty($row['name'])) {
            $data['career_details'][] = [
                'name' => $row['name'],
                'clicks' => $row['total_clicks'],
                'highlight' => $this->isHighlight($row['total_clicks'])
            ];
        }
    }

    // ============================
    // 🔍 CAREER SEARCH / DISCOVERY
    // ============================
    $result = $this->conn->query("
        SELECT 
            JSON_UNQUOTE(JSON_EXTRACT(page_flow, '$[1]')) AS name,
            COUNT(*) as total_clicks
        FROM page_clicks
        WHERE parent_page = 'car3'
        GROUP BY name
        ORDER BY total_clicks DESC
    ");

    while ($row = $result->fetch_assoc()) {
        if (!empty($row['name'])) {
            $data['career_search'][] = [
                'name' => $row['name'],
                'clicks' => $row['total_clicks'],
                'highlight' => $this->isHighlight($row['total_clicks'])
            ];
        }
    }

    return $data;
  }
    // ✅ DEFAULT (unchanged)
     $result = $this->conn->query("
        SELECT click_type, item_name, SUM(click_count) as total_clicks
        FROM form_click_summary 
        WHERE form_type = '$formType'
        GROUP BY click_type, item_name
        ORDER BY click_type, total_clicks DESC
    ");

    while ($row = $result->fetch_assoc()) {
        $data[$row['click_type']][] = [
            'name' => $row['item_name'],
            'clicks' => $row['total_clicks'],
            'highlight' => $this->isHighlight($row['total_clicks'])
        ];
    }

    return $data;
}

                    

                    private function isHighlight($clicks) {

                        if ($clicks >= 100) return 'high';

                        if ($clicks >= 50) return 'medium';

                        if ($clicks >= 20) return 'low';

                        return 'normal';

                    }

                    

                    private function getAllFormData() {

                        $result = $this->conn->query("

                            SELECT form_type, click_type, COUNT(*) as count 

                            FROM form_click_summary 

                            GROUP BY form_type, click_type

                            ORDER BY form_type, click_type

                        ");

                        

                        $data = [];

                        while ($row = $result->fetch_assoc()) {

                            $data[] = $row;

                        }

                        return $data;

                    }

                    

private function getTopHighlights() {

    $highlights = [];

    // ===============================
    // 🎓 COLLEGE
    // ===============================

    // Government (Institute)
    $q1 = $this->conn->query("
        SELECT COUNT(*) as click_count
        FROM page_clicks
        WHERE page_url = 'college-chnge.php'
        AND JSON_UNQUOTE(JSON_EXTRACT(page_flow, '$[0]')) = 'Government'
    ");

    // Odisha (State)
    $q2 = $this->conn->query("
        SELECT COUNT(*) as click_count
        FROM page_clicks
        WHERE page_url = 'college-chnge.php'
        AND JSON_UNQUOTE(JSON_EXTRACT(page_flow, '$[2]')) = 'Odisha'
    ");

    // Science Areas
    $q3 = $this->conn->query("
        SELECT COUNT(*) as click_count
        FROM page_clicks
        WHERE page_url = 'college-chnge.php'
        AND JSON_UNQUOTE(JSON_EXTRACT(page_flow, '$[1]')) = 'Science Areas'
    ");

    // Arts Areas
    $q4 = $this->conn->query("
        SELECT COUNT(*) as click_count
        FROM page_clicks
        WHERE page_url = 'college-chnge.php'
        AND JSON_UNQUOTE(JSON_EXTRACT(page_flow, '$[1]')) = 'Arts Areas'
    ");

    // ===============================
    // 📝 ENTRANCE EXAM
    // ===============================
    $q5 = $this->conn->query("
        SELECT COUNT(*) as click_count
        FROM page_clicks
        WHERE page_url = 'entrance-exams.php'
        AND JSON_UNQUOTE(JSON_EXTRACT(page_flow, '$[2]')) = 'Odisha'
    ");

    // ===============================
    // 🎓 SCHOLARSHIP
    // ===============================
    $q6 = $this->conn->query("
        SELECT COUNT(*) as click_count
        FROM page_clicks
        WHERE page_url = 'oldscholarships1.php'
        AND JSON_UNQUOTE(JSON_EXTRACT(page_flow, '$[0]')) = 'State'
    ");

    // ===============================
    // ✅ ORDER SET HERE (IMPORTANT)
    // ===============================

    // Row 1
    $highlights[] = [
        'form_type' => 'College',
        'click_type' => 'institute',
        'item_name' => 'Government',
        'click_count' => $q1->fetch_assoc()['click_count']
    ];

    $highlights[] = [
        'form_type' => 'College',
        'click_type' => 'state',
        'item_name' => 'Odisha',
        'click_count' => $q2->fetch_assoc()['click_count']
    ];

    $highlights[] = [
        'form_type' => 'Scholarship',
        'click_type' => 'scholarship_type',
        'item_name' => 'State',
        'click_count' => $q6->fetch_assoc()['click_count']
    ];

    // Row 2
    $highlights[] = [
        'form_type' => 'Examination',
        'click_type' => 'location',
        'item_name' => 'Odisha',
        'click_count' => $q5->fetch_assoc()['click_count']
    ];

    $highlights[] = [
        'form_type' => 'College',
        'click_type' => 'domain',
        'item_name' => 'Science Areas',
        'click_count' => $q3->fetch_assoc()['click_count']
    ];

    $highlights[] = [
        'form_type' => 'College',
        'click_type' => 'domain',
        'item_name' => 'Arts Areas',
        'click_count' => $q4->fetch_assoc()['click_count']
    ];

    return $highlights;
}
                    

                    private function getTotalStats() {

                        $total_result = $this->conn->query("SELECT COUNT(*) as total FROM form_click_summary");

                        $total_records = $total_result ? $total_result->fetch_assoc()['total'] : 0;

                        

                        // Since we don't have created_at, we'll calculate today's clicks differently

                        // For now, we'll set today's clicks to 0 or use a different approach

                        $today_clicks = 0; // Default value since we can't track by date

                        

                        return [

                            'last_updated' => date('M j, Y H:i:s'),

                            'total_records' => $total_records,

                            'total_clicks' => $this->getTotalClicks(),

                            'today_clicks' => $today_clicks,

                            'unique_items' => $this->getUniqueItemsCount()

                        ];

                    }

                    

                    private function getTotalClicks() {

                        $result = $this->conn->query("SELECT SUM(click_count) as total FROM form_click_summary");

                        return $result ? $result->fetch_assoc()['total'] : 0;

                    }

                    

                    private function getUniqueItemsCount() {

                        $result = $this->conn->query("SELECT COUNT(DISTINCT CONCAT(form_type, '_', click_type, '_', item_id)) as unique_count FROM form_click_summary");

                        return $result ? $result->fetch_assoc()['unique_count'] : 0;

                    }

                }

                  

                  // Initialize and fetch all data

                  $analytics = new FormAnalyticsData($active_conn);

                  $data = $analytics->getAllAnalyticsData();

                  

                  // Enhanced form configurations
  $formConfigs = [

                    'college' => [

                        'title' => t('college_search_analytics'),

                        'icon' => 'house-fill',

                        'color' => 'primary',

                        'bg_color' => '#e3f2fd',

                        'sections' => [

                            'institute' => ['title' => t('institute_types'), 'icon' => 'house-door', 'description' => t('government_vs_private')],

                            'domain' => ['title' => t('study_domains'), 'icon' => 'globe', 'description' => t('popular_academic_fields')],

                            'state' => ['title' => t('state_preferences'), 'icon' => 'geo-alt', 'description' => t('geographical_preferences')]

                        ]

                    ],

                    'examination' => [

                        'title' => t('examination_search_analytics'), 

                        'icon' => 'pencil-square',

                        'color' => 'warning',

                        'bg_color' => '#fff3cd',

                        'sections' => [

                            'exam_type' => ['title' => t('exam_types'), 'icon' => 'clipboard-check', 'description' => t('ug_pg_competitive')],

                            'qualification' => ['title' => t('qualifications'), 'icon' => 'award', 'description' => t('educational_levels')],

                            'location' => ['title' => t('locations'), 'icon' => 'pin-map', 'description' => t('exam_center_preferences')]

                        ]

                    ],

                    'scholarship' => [

                        'title' => t('scholarship_search_analytics'),

                        'icon' => 'wallet2', 

                        'color' => 'success',

                        'bg_color' => '#d1eddc',

                        'sections' => [

                            'scholarship_type' => ['title' => t('scholarship_types'), 'icon' => 'cash-coin', 'description' => t('central_state_private')],

                            'class' => ['title' => t('academic_levels'), 'icon' => 'funnel', 'description' => t('class_based_searches')]

                        ]

                    ],

                    'weakness' => [

                        'title' => t('understand_your_strength_and_weakness'),

                        'icon' => 'heart-pulse',

                        'color' => 'danger',

                        'bg_color' => '#f8d7da',

                        'sections' => [

                            'emotional_area' => ['title' => t('emotional_support'), 'icon' => 'heart', 'description' => t('emotional_coping_strategies')],

                            'study_area' => ['title' => t('academic_support'), 'icon' => 'book', 'description' => t('study_improvement_areas')],

                            'career_selection' => ['title' => t('career_guidance'), 'icon' => 'briefcase', 'description' => t('career_preference_selections')]

                        ]

                    ],
                    
       'resource' => [
    'title' => 'Resource Analytics',
    'icon' => 'collection',
    'color' => 'info',
    'bg_color' => '#d1ecf1',
    'sections' => [
        'videos' => [
            'title' => 'Youtube',
            'icon' => 'play-circle',
            'description' => 'User interaction with videos'
        ],
        'articles' => [
            'title' => 'Career collateral',
            'icon' => 'file-text',
            'description' => 'User interaction with articles'
        ],
        // 'tools' => [
        //     'title' => 'Tools & Materials',
        //     'icon' => 'tools',
        //     'description' => 'User interaction with tools/resources'
        // ]
    ]
   ],
   'career' => [
    'title' => 'Career Analytics',
    'icon' => 'briefcase',
    'color' => 'primary',
    'bg_color' => '#cce5ff',
    'sections' => [
        'career_paths' => [
            'title' => 'Stream',
            'icon' => 'map',
            'description' => 'User interaction with career journeys'
        ],
        'career_details' => [
            'title' => 'Career Details',
            'icon' => 'info-circle',
            'description' => 'User interaction with career detail pages'
        ],
        'career_search' => [
            'title' => 'Career Search',
            'icon' => 'search',
            'description' => 'User search and discovery of careers'
        ],
        // Optional
        // 'career_compare' => [
        //     'title' => 'Career Compare',
        //     'icon' => 'shuffle',
        //     'description' => 'User comparing different careers'
        // ]
    ]
   ],

  ];
  ?>



                <!-- ============================================= -->

                <!-- click track dashboard -->

                <!-- ============================================= -->

                <div class="container-fluid py-3">

                <!-- Enhanced Header with Quick Stats - FINAL FIXED VERSION -->

                <div class="row mb-4">

                    <div class="col-12">

                        <div class="section-header">

                            <div class="row align-items-center">

                                <div class="col-md-8">

                                    <h2 class="h4 fw-bold mb-2 text-white">

                                        <i class="bi bi-speedometer2 me-2"></i><?= t('analytics_dashboard') ?>

                                    </h2>

                                    <p class="mb-0 text-white opacity-90"><?= t('real_time_insights') ?></p>

                                </div>

                                <div class="col-md-4 text-end">

                                    <!-- RECOMMENDED FIX: Glass morphism design -->

                                    <div class="glass-morphism rounded p-3 d-inline-block text-center">

                                        <div class="h3 fw-bold mb-1 text-white"><?= number_format($data['totals']['total_clicks']) ?></div>

                                        <small class="text-white opacity-90 fw-medium"><?= t('total_interactions') ?></small>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                

                

                    <!-- Quick Stats Bar -->

                    <!--<div class="quick-stats mb-4">-->

                    <!--    <div class="stat-item">-->

                    <!--        <div class="small text-muted mb-1"><?= t('total_records') ?></div>-->

                    <!--        <div class="h5 fw-bold text-primary mb-0"><?= number_format($data['totals']['total_records']) ?></div>-->

                    <!--    </div>-->

                    <!--    <div class="stat-item" style="border-left-color: var(--bs-success);">-->

                    <!--        <div class="small text-muted mb-1"><?= t('unique_items') ?></div>-->

                    <!--        <div class="h5 fw-bold text-success mb-0"><?= number_format($data['totals']['unique_items']) ?></div>-->

                    <!--    </div>-->

                    <!--    <div class="stat-item" style="border-left-color: var(--bs-warning);">-->

                    <!--        <div class="small text-muted mb-1"><?= t('active_tracking') ?></div>-->

                    <!--        <div class="h5 fw-bold text-warning mb-0"><?= count($data['all_data']) ?></div>-->

                    <!--        <small class="text-muted"><?= t('categories') ?></small>-->

                    <!--    </div>-->

                    <!--    <div class="stat-item" style="border-left-color: var(--bs-info);">-->

                    <!--        <div class="small text-muted mb-1"><?= t('last_updated') ?></div>-->

                    <!--        <div class="h6 fw-bold text-info mb-0"><?= $data['totals']['last_updated'] ?></div>-->

                    <!--    </div>-->

                    <!--</div>-->

                

                <!-- Enhanced Top Highlights Section -->

                <?php if(!empty($data['highlights'])): ?>

                <div class="highlight-section mb-4">

                    <div class="d-flex align-items-center justify-content-between mb-3">

                        <h4 class="fw-bold mb-0 text-dark">

                            <i class="bi bi-star-fill me-2 text-warning"></i><?= t('top_performing_items') ?>

                        </h4>

                        <span class="trend-indicator">

                            <i class="bi bi-graph-up me-1"></i><?= t('most_popular') ?>

                        </span>

                    </div>

                    <div class="row g-3">

                        <?php foreach(array_slice($data['highlights'], 0, 6) as $highlight): ?>

                        <div class="col-xl-4 col-lg-6">

                            <div class="highlight-card p-3 bg-white rounded-3 border-0 shadow-sm h-100">

                                <div class="d-flex justify-content-between align-items-start mb-3">

                                    <span class="fw-bold text-dark fs-6 lh-sm"><?= htmlspecialchars($highlight['item_name']) ?></span>

                                    <span class="badge bg-danger fs-6 px-2 py-1"><?= number_format($highlight['click_count']) ?></span>

                                </div>

                                <div class="d-flex justify-content-between align-items-center mt-auto">

                                    <small class="text-muted fs-6">

                                        <?= ucfirst($highlight['form_type']) ?> • <?= str_replace('_', ' ', $highlight['click_type']) ?>

                                    </small>

                                    <i class="bi bi-arrow-up-right text-success fs-5"></i>

                                </div>

                            </div>

                        </div>

                        <?php endforeach; ?>

                    </div>

                </div>

                <?php endif; ?>

                

                

                

                    <!-- Main Analytics Grid -->

                    <?php foreach($formConfigs as $formKey => $config): ?>

                    <div class="form-section mb-4">

                        <!-- Enhanced Section Header -->

                        <div class="d-flex align-items-center justify-content-between mb-3 p-3 rounded" style="background: <?= $config['bg_color'] ?>;">

                            <div>

                                <h4 class="fw-bold mb-1 text-dark">

                                    <i class="bi bi-<?= $config['icon'] ?> me-2 text-<?= $config['color'] ?>"></i>

                                    <?= $config['title'] ?>

                                </h4>

                                <p class="text-muted mb-0 small"><?= t('complete_breakdown') ?></p>

                            </div>

                            <?php

                            $totalClicks = 0;

                            $totalItems = 0;

                            foreach($config['sections'] as $sectionKey => $section) {

                                $totalItems += count($data[$formKey][$sectionKey] ?? []);

                                if(isset($data[$formKey][$sectionKey])) {

                                    foreach($data[$formKey][$sectionKey] as $item) {

                                        $totalClicks += $item['clicks'];

                                    }

                                }

                            }

                            ?>

                            <div class="text-end">

                                <div class="h4 fw-bold text-<?= $config['color'] ?> mb-0"><?= number_format($totalClicks) ?></div>

                                <small class="text-muted"><?= number_format($totalItems) ?> <?= t('items') ?></small>

                            </div>

                        </div>

                

                        <!-- Data Sections -->

                        <div class="row g-3">

                            <?php foreach($config['sections'] as $sectionKey => $sectionConfig): ?>

                            <div class="col-xl-4 col-lg-6">

                                <div class="analytics-card h-100" style="border-left-color: var(--bs-<?= $config['color'] ?>);">

                                    <div class="card-header card-header-clear py-3">

                                        <div class="d-flex align-items-center justify-content-between">

                                            <div>

                                                <h6 class="mb-1 fw-bold text-dark">

                                                    <i class="bi bi-<?= $sectionConfig['icon'] ?> me-2 text-<?= $config['color'] ?>"></i>

                                                    <?= $sectionConfig['title'] ?>

                                                </h6>

                                                <small class="text-muted"><?= $sectionConfig['description'] ?></small>

                                            </div>

                                            <span class="badge bg-<?= $config['color'] ?> text-white">

                                                <?= count($data[$formKey][$sectionKey] ?? []) ?>

                                            </span>

                                        </div>

                                    </div>

                                    <div class="scroll-container">
                             
                                        <?php //echo '<pre>';print_r($data);echo $formKey . "--". $sectionKey . "--";
                                        if(!empty($data[$formKey][$sectionKey])): ?>
                                 
                                            <div class="data-grid">

                                                <?php foreach($data[$formKey][$sectionKey] as $item): ?>

                                                <div class="data-item">

                                                    <div class="data-name <?= 'highlight-' . $item['highlight'] ?>">

                                                        <?= htmlspecialchars($item['name']) ?>

                                                    </div>

                                                    <div class="data-count">

                                                        <?= number_format($item['clicks']) ?>

                                                    </div>

                                                </div>

                                                <?php endforeach; ?>

                                            </div>

                                        <?php else: ?>

                                            <div class="text-center py-4 text-muted">

                                                <i class="bi bi-inbox display-4 opacity-25 mb-3"></i>

                                                <p class="small mb-0"><?= t('no_data_available') ?></p>

                                            </div>

                                        <?php endif; ?>

                                    </div>

                                </div>

                            </div>

                            <?php endforeach; ?>

                        </div>

                    </div>

                    <?php endforeach; ?>

                </div>













                    

                </section>

            </section>

            <!-- END CONTENT -->





            <div class="chatapi-windows ">





            </div>    </div>

        <!-- END CONTAINER -->

        <!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->





        <!-- CORE JS FRAMEWORK - START --> 

        <script src="assets/js/jquery-3.4.1.min.js" type="text/javascript"></script> 

        <script src="assets/js/popper.min.js" type="text/javascript"></script> 

        <!-- <script src="assets/js/jquery.easing.min.js" type="text/javascript"></script>  -->

        <script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 

        <script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>  



        <script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js" type="text/javascript"></script> 

        <script src="assets/plugins/viewport/viewportchecker.js" type="text/javascript"></script>  

        <!-- CORE JS FRAMEWORK - END --> 





        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 

        <script src="assets/plugins/jquery-ui/smoothness/jquery-ui.min.js" type="text/javascript"></script> <script src="assets/plugins/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script><script src="assets/plugins/easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script><script src="assets/plugins/morris-chart/js/raphael-min.js" type="text/javascript"></script><script src="assets/plugins/morris-chart/js/morris.min.js" type="text/javascript"></script><script src="assets/plugins/jvectormap/jquery-jvectormap-2.0.1.min.js" type="text/javascript"></script><script src="assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script><script src="assets/plugins/gauge/gauge.min.js" type="text/javascript"></script><script src="assets/plugins/icheck/icheck.min.js" type="text/javascript"></script><script src="assets/js/dashboard.js" type="text/javascript"></script><!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 





        <!-- CORE TEMPLATE JS - START --> 

        <script src="assets/js/scripts.js" type="text/javascript"></script> 

        <!-- END CORE TEMPLATE JS - END --> 



        <!-- Sidebar Graph - START --> 

        <script src="assets/plugins/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script>

        <script src="assets/js/chart-sparkline.js" type="text/javascript"></script>

        <!-- Sidebar Graph - END --> 



























        <!-- General section box modal start -->

        <div class="modal" id="section-settings" tabindex="-1" role="dialog" aria-labelledby="ultraModal-Label" aria-hidden="true">

            <div class="modal-dialog animated bounceInDown">

                <div class="modal-content">

                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                        <h4 class="modal-title">Section Settings</h4>

                    </div>

                    <div class="modal-body">



                        Body goes here...



                    </div>

                    <div class="modal-footer">

                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>

                        <button class="btn btn-success" type="button">Save changes</button>

                    </div>

                </div>

            </div>

        </div>

        <!-- modal end -->

    </body>

</html>











<script>

function updateVisitorCount() {

            fetch('../count-visitor.php')

                .then(response => response.text())

                .then(data => {

let cleanData = data
    .replace(/<br\s*\/?>/gi, "")   // remove <br>
    .replace(/\n/g, "")            // remove line breaks
    .trim();

document.getElementById('visitor-count').innerText = cleanData + "+";
                })

                .catch(error => console.error('Error:', error));

        }



        // Update the visitor count every 5 seconds

        setInterval(updateVisitorCount, 10000);



        // Initial call to update the visitor count

        updateVisitorCount();



</script>