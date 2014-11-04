<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"><![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"><![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"><![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"><!--<![endif]-->
<head>
<!-- Website Template designed by www.downloadwebsitetemplates.co.uk -->
<?php
session_start();
 if (!isset($_SESSION['email'])){
	header('Location:index.php');
 }

include_once 'inc/php/config.php';
// Holds the amount of newsfeed items to show
$newsfeed_limit = 10;
$user_id_query = mysql_query("SELECT user_id FROM user WHERE email = '" . $_SESSION['email'] . "'");
$user_id = mysql_result($user_id_query, 0);
$meeting_name_array = array();
$message_array = array();
$attendance_query = mysql_query("SELECT meeting_id FROM attendance WHERE user_id = '" . $user_id . "'");
while($attendance_row = mysql_fetch_array($attendance_query)) {
	$meeting_name_query = mysql_query("SELECT meeting_name FROM meeting WHERE meeting_id = '" . $attendance_row['meeting_id'] . "'");
	while ($meeting_row = mysql_fetch_array($meeting_name_query)) {
		array_push($meeting_name_array, $meeting_row['meeting_name']);
	}

	$message_query = mysql_query("SELECT message FROM newsfeed WHERE meeting_id = '" . $attendance_row['meeting_id'] . "'");
	while ($message_row = mysql_fetch_array($message_query)) {
		array_push($message_array, $message_row['message']);
	}
}
?>

<meta charset="UTF-8">
<title>MeetMag - Home</title>
<meta name="description" content="">
<meta name="Meeting, management, university of queesnland, UQ, DECO3801, MeetMag, Meetrix" content="">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="MeetMag" content="Codrops" />

<link rel="stylesheet" type="text/css" href="css/menustyle.css" />

<link rel="stylesheet" type="text/css" href="css/google.css" />
<!-- <link rel="stylesheet" type="text/css" href="css/google-normalize.css" />
<link rel="stylesheet" type="text/css" href="css/google-style.css" />
<link rel="stylesheet" type="text/css" href="css/google-component.css" /> -->

<link rel="stylesheet" type="text/css" href="css/vertical-ticker-style.css"/>
<link rel="shortcut icon" href="images/meetmagicon/meetmagicon-32(2).png">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/astyle.css" media="screen" type="text/css" />
<!--[if IE]><![endif]-->
<link rel="stylesheet" href="css/gravity-style.css">


<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!-- /nev -->
<script src="js/google-modernizr.custom.js"></script></head>

<body id="top">

    <ul id="gn-menu" class="gn-menu-main" style="z-index:2">
    <h1 class="nav-title"> Menu </h1>
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
                           <a href="friends.php" class="gn-icon icon-project-fix">Friends</a>
                        </li>
                        <li>
                           <a href="index.php" class="gn-icon icon icon-logout">LogOut</a>
                        </li>
                    </ul>
                        </div>
                </nav>
        </li>
    </ul>
<div id="container" class="clearfix">


<!-- First Section -->
<div class="section bg1 clearfix">
<!-- /nev -->   
    <div class="content">
        <div class="overlay">
				<div class="overlaycontent">
					<h1 style="text-align:center"><img class="logo" src="img/originals/nav-logo.png"><a title="" href="#"></a></h1>
                    <h2 style="text-align:center">Meeting <strong>- Management</strong></h2>
				</div>
            <div class="fullwidth">
                <div class="main" style="margin:0; width:100%; height:100%">

<!-- news Feed -->
                
                    <div id="wrapper" style="height:100%">
                        <ul id="vertical-ticker" style="overflow:auto; width:100%; height:100%">
            				<?php
            					for ($i = 0; $i < count($message_array); $i++) {
            						if ($i == $newsfeed_limit) {
            							break;
            						}
            				?>
            				
            				<li>
            				<h4> <?php echo $meeting_name_array[$i]; ?> </h4>
            			    <p style="color:white; font-size:medium"> <?php echo $message_array[$i]; ?> </p>
                            </li>
            				<?php
            				}	
            				?>
            			</ul>
                    </div>

            	</div>
            </div>
        </div>
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


</body>
</html>