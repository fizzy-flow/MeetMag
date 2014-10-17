<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"><![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"><![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"><![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"><!--<![endif]-->
<head>
<!-- Website Template designed by www.downloadwebsitetemplates.co.uk -->
<meta charset="UTF-8">
<title>Welcome to Meeting Page</title>
<meta name="-Description" content="">
<meta name="keywords" content="">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="stylesheet" href="css/mpastyle.css" media="screen" type="text/css" />
<link rel="stylesheet" href="feather-webfont/feather.css">
<!--[if IE]><![endif]-->
<link rel="stylesheet" href="css/mpstyle.css">
<script src="js/jquery.min.js"></script>
<script src="js/mpindex.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/countdown.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="js/gmap.js"></script>
<script src="js/scripts.js"></script>
<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

<!-- /nev -->
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico">
        <link rel="stylesheet" type="text/css" href="css/google-normalize.css" />
        <link rel="stylesheet" type="text/css" href="css/google-style.css" />
        <link rel="stylesheet" type="text/css" href="css/google-component.css" />


        
        <link rel="stylesheet" type="text/css" href="css/menustyle.css" />

        <script src="js/google-modernizr.custom.js"></script>
<!-- action menu (top Left) -->

        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Responsive Multi-Level Menu - Demo 2</title>
        <meta name="description" content="Responsive Multi-Level Menu: Space-saving drop-down menu with subtle effects" />
        <meta name="keywords" content="multi-level menu, mobile menu, responsive, space-saving, drop-down menu, css, jquery" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 

        <link rel="stylesheet" type="text/css" href="css/component.css" />
        <script src="js/modernizr.custom.js"></script>


<?php
session_start();
 if (!isset($_SESSION['email'])){
	header('Location:index.php');
 }

include_once 'inc/php/config.php';

$project_id = $_GET['project'];
$project_name = "";
$project_description = "";

$current_meeting_names = array();
$current_meeting_description = array();
$current_meeting_id = array();

$past_meeting_names = array();
$past_meeting_description = array();
$past_meeting_id = array();


$project_query = mysql_query("SELECT * from project where project_id = '" . $project_id . "'");
while($project_row = mysql_fetch_array($project_query)) {
	$project_name = $project_row['project_name'];
	$project_description = $project_row['description'];
}


$project_contains_meeting_query = mysql_query("SELECT * from project_contains_meeting WHERE project_id = '" . $project_id . "'");
while($project_contains_meeting_row = mysql_fetch_array($project_contains_meeting_query)) {
	$meeting_query = mysql_query("SELECT * from meeting WHERE meeting_id = '" . $project_contains_meeting_row['meeting_id'] . "'");
	while ($meeting_query_row = mysql_fetch_array($meeting_query)) {
		// Check if it is future meeting
		if ($meeting_query_row['actual_end'] === NULL) { // Future meeting
			array_push($current_meeting_names, $meeting_query_row['meeting_name']);
			array_push($current_meeting_description, $meeting_query_row['description']);
			array_push($current_meeting_id, $meeting_query_row['meeting_id']);
		} else {										 // Past meetings
			array_push($past_meeting_names, $meeting_query_row['meeting_name']);
			array_push($past_meeting_description, $meeting_query_row['description']);
			array_push($past_meeting_id, $meeting_query_row['meeting_id']);
		}
	}
}


?>


</head>
<body id="top">
	    <ul id="gn-menu" class="gn-menu-main" style="z-index:2">


                <div id="dl-menu" class="dl-menuwrapper" style="right:30px; position:absolute; z-index:10; float:right; align-content:right">
                    <button class="dl-trigger" style="padding-right: 30px;">Open Menu</button>
                    <ul class="dl-menu" style="right: 5px; width: 200px;left: -100px;">
                        
                        <li>
                            <a href="createmeeting.php?project=<?php echo $project_id; ?>">Create Meeting</a>
                            
                        </li>



                    </ul>
                </div><!-- /dl-menuwrapper -->




                    <li class="gn-trigger">
                            <a class="gn-icon gn-icon-menu"><span>Menu</span></a>

                                <nav class="gn-menu-wrapper">
                                        <div class="gn-scroller">
                                            <ul class="gn-menu">
                                                <li class="gn-search-item">
                                                    <input placeholder="Search" type="search" class="gn-search">
                                                    <a class="gn-icon gn-icon-search"><span>Search</span></a>
                                                </li>
                                            <!-- <li><a class="gn-icon gn-icon-cog">Home</a></li> (just incase)--> 
                                                <li>
                                                    <a href= "homepage.php"> <img src="img/homeicon.png"/>Home</a>
                                                </li>

                                                <li>
                                                    <a href= "project.php"> <img src="img/projectsicon.png"/>Projects</a>
                                                </li>

                                                <li>
                                                    <a href="friends.php"> <img src="img/friendsicon.png"/>Friends</a>
                                                </li>

                                                <li><a href"settings.php" class="gn-icon gn-icon-cog">Settings</a>
                                                </li>

                                                <li>
                                                    <a href="index.php"> <img src="img/logout.png"/>LogOut</a>
                                                </li>


                                            </ul>
                                        </div><!-- /gn-scroller -->
                                </nav>


                    </li>

            </ul>



<div id="container" class="clearfix">
    <!-- First Section -->
    <div class="section bg1 clearfix">
        <div class="content">
            <div class="overlay">
				<div class="overlaycontent">
					<h1><a title="" href="#"><strong> <?php echo $project_name; ?> </strong></a></h1>
                    <h2><strong>Meetings</strong></h2>
				</div>
            </div>
            <div class="fullwidth">
                <div class="main">
                    <!-- Meeting -Description Section -->
                    <h2> <?php echo $project_name; ?> <strong>Description</strong></h2>
                    <p> <?php echo $project_description; ?> <p>
                    <hr />
				</div>
    <!-- Agenda Section -->
    <div class="demo" style="z-index:1">
        <div class="csAccordion__title">Upcoming Meetings</div>
                <ul>
					<?php
					for ($i = 0; $i < count($current_meeting_names); $i++) {
					?>
						<li data-title=" <?php echo $current_meeting_names[$i]; ?>" data-featured="true" class="">     
							<p> <?php echo $current_meeting_description[$i]; ?> </p>
							<a href=""><span class="icon-play"></span></a>
							<a href=""><span class="icon-cog"></span></a>
							<a href=""><span class="icon-cross"></span></a>		
						</li>
					<?php
						}
					?>
                </ul>
            </div>
            <div class="demo" style="z-index:1">
                <div class="csAccordion__title">Past Meetings</div>
                <ul>
                    <?php
					for ($i = 0; $i < count($past_meeting_names); $i++) {
					?>
						<li data-title=" <?php echo $past_meeting_names[$i]; ?>" data-featured="true" class="">     
							<p> <?php echo $past_meeting_description[$i]; ?> </p>
							<a href=""><span class="icon-eye"></span></a>
						</li>
					<?php
						}
					?>
                </ul>
            </div>

    <!-- Footer -->
    <div class="footercont clearfix">
        <div class="footer clearfix">
			<div id="footerright">
                <p><a id="backtotop" title="" href="#top">Back to Top ^</a></p>
            </div>
			<div id="footerleft">
                <!-- Social Media -->
                <div id="socialmedia" class="clearfix">
                </div>
			</div>
        </div>
    </div>
</div>
<!-- /nev -->
        <script src="js/google-classie.js"></script>
        <script src="js/google-gnmenu.js"></script>
        <script>
            new gnMenu( document.getElementById( 'gn-menu' ) );
        </script>


<!-- action menu -->
        <script src="js/jquery.dlmenu.js"></script>
        <script>
            $(function() {
                $( '#dl-menu' ).dlmenu({
                    animationClasses : { classin : 'dl-animate-in-2', classout : 'dl-animate-out-2' }
                });
            });
        </script>

        <script src="js/tab-cbpFWTabs.js"></script>
        <script>
            (function() {

                [].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
                    new CBPFWTabs( el );
                });

            })();
        </script>
</body>
</html>