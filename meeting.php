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
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/gravity-style.css">
<!--[if IE]><![endif]-->
<link rel="stylesheet" href="css/mpstyle.css">
<script src="js/jquery.min.js"></script>
<script src="js/mpindex.js"></script>
<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!-- /nev -->
        <meta name="author" content="Codrops" />
        <link rel="stylesheet" type="text/css" href="css/google.css" />
        <!--         <link rel="shortcut icon" href="../favicon.ico">
        <link rel="stylesheet" type="text/css" href="css/google-normalize.css" />
        <link rel="stylesheet" type="text/css" href="css/google-style.css" />
        <link rel="stylesheet" type="text/css" href="css/google-component.css" /> -->
        <link rel="stylesheet" type="text/css" href="css/menustyle.css" />
        <script src="js/google-modernizr.custom.js"></script>

        <link rel="stylesheet" type="text/css" href="css/component.css" />
        <script src="js/modernizr.custom.js"></script>
<?php
        session_start();
         if (!isset($_SESSION['email'])){
        	header('Location:index.php');
         }
        include_once 'inc/php/config.php';
        $project_id = $_GET['project_id'];
        $project_name = "";
        $project_description = "";
        $current_meeting_names = array();
        $current_meeting_description = array();
        $current_meeting_id = array();
        $current_meeting_location = array();
        $current_meeting_datetime = array();
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
                    array_push($current_meeting_location, $meeting_query_row['location']);
                    array_push($current_meeting_datetime, $meeting_query_row['expect_start']);
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
        <h1 class="nav-title"> Menu </h1>
                <div id="dl-menu" class="dl-menuwrapper" style="right:30px; position:absolute; z-index:10; float:right; align-content:right">
                    <button class="dl-trigger" style="padding-right: 30px;">Open Menu</button>
                    <ul class="dl-menu" style="right: 5px; width: 200px;left: -100px;">      
                        <li>
                            <a href="createmeeting.php?project_id=<?php echo $project_id; ?>">Create Meeting</a>
                        </li>
                    </ul>
                </div><!-- /dl-menuwrapper -->
                    <li class="gn-trigger">
                        <a class="gn-icon gn-icon-menu"><span>Menu</span></a>
                            <nav class="gn-menu-wrapper">
                                    <div class="gn-scroller">
                                        <ul class="gn-menu"  >
                                            <li>
                                               <a href="homepage.php" class="gn-icon icon icon-home">Home</a>
                                            </li>
                                            <li>
                                               <a href="project.php" class="gn-icon icon icon-projects">Projects</a>
                                            </li>
                                            <li>
                                               <a href="friends.php" class="gn-icon icon-friends">Friends</a>
                                            </li>
                                            <li>
                                               <a href="index.php" class="gn-icon icon icon-logout">LogOut</a>
                                            </li>
                                        </ul>
                                    </div>
<!-- /gn-scroller -->
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
                    <li data-title="<?php echo $current_meeting_names[$i]; ?>" data-subtitle="<?php echo $current_meeting_location[$i]; ?>, <?php echo $current_meeting_datetime[$i]; ?>" data-featured="true" class="">
							<p> <?php echo $current_meeting_description[$i]; ?> </p>
							<a href=<?php echo "http://deco3801-12.uqcloud.net/inmeeting.php?meeting_id=" . $current_meeting_id[$i] . "&project_id=" . $project_id; ?>><span class="icon-play"></span></a>
							<a href=<?php echo "http://deco3801-12.uqcloud.net/createmeeting.php?meeting_id=" . $current_meeting_id[$i] . "&project_id=" . $project_id; ?> ><span class="icon-cog"></span></a>
							<a onclick='<?php echo "confirmDelete(" . $current_meeting_id[$i] . "," . $project_id . ")"; ?>' href="#"><span class="icon-cross"></span></a>
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
						<li data-title="<?php echo $past_meeting_names[$i]; ?>" data-subtitle="" data-featured="true" class="">     
							<p> <?php echo $past_meeting_description[$i]; ?> </p>
							<a href="<?php echo "http://deco3801-12.uqcloud.net/inmeeting.php?meeting_id=" . $past_meeting_id[$i] . "&project_id=" . $project_id; ?>"><span class="icon-eye"></span></a>
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
        
<!-- whats the use of this script?? -->
        <script>
            (function() {

                [].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
                    new CBPFWTabs( el );
                });

            })();
        </script>
<!-- confirm Delete script-->
		<script>
			function confirmDelete(meeting_id, project_id) {
				if (confirm("Delete meeting?") == true) {
					// Delete goes here
					window.location.href = "http://deco3801-12.uqcloud.net/inc/php/delete_meeting.php?meeting_id=" + meeting_id  + "&project_id=" + project_id;
				} 
			}
		</script>
</body>
</html>