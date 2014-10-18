<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"><![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"><![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"><![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"><!--<![endif]-->
<head>
<!-- Website Template designed by www.downloadwebsitetemplates.co.uk -->
<meta charset="UTF-8">
<title>MeetMag- Friends</title>
<meta name="description" content="">
<meta name="keywords" content="">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<link rel="shortcut icon" href="images/meetmagicon/meetmagicon-32(2).png">

<link rel="stylesheet" href="css/astyle.css" media="screen" type="text/css" />
<!--[if IE]><![endif]-->
<link rel="stylesheet" href="css/gravity-style.css">
<script src="js/jquery.min.js"></script>
<script src="js/index.js"></script>
<script src="js/waypoints.min.js"></script>

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
        <link rel="stylesheet" type="text/css" href="css/vertical-ticker-style.css"/>

        
        <link rel="stylesheet" type="text/css" href="css/menustyle.css" />

        <script src="js/google-modernizr.custom.js"></script>

<!-- tabs -->
        <link rel="shortcut icon" href="../favicon.ico">
        <link rel="stylesheet" type="text/css" href="css/tab-normalize.css" />
        <link rel="stylesheet" type="text/css" href="css/tab-demo.css" />
        <link rel="stylesheet" type="text/css" href="css/tab-tabs.css" />
        <link rel="stylesheet" type="text/css" href="css/tab-tabstyles.css" />
        <script src="js/tab-modernizr.custom.js"></script>
<?php
	session_start();
	 if (!isset($_SESSION['email'])){
		header('Location:index.php');
	 }

	include_once 'inc/php/config.php';
	include_once 'inc/php/db_functions.php';

	$user_id = getUserID();

	$friend_id = array();
	$friend_name = array();
	
	// Get all friend_id's that belong to us
	$friend_query = mysql_query("SELECT * from friend WHERE user_id = '" . $user_id . "'");
	while($friend_row = mysql_fetch_array($friend_query)) {
		array_push($friend_id, $friend_row['friend_id']);
		// Get the friends names belonging to all those ids
		$friend_name_query = mysql_query("SELECT * from user WHERE user_id = '" . $friend_row['friend_id'] . "'");
		while($friend_name_row = mysql_fetch_array($friend_name_query)) {
			$full_name = $friend_name_row['first'] . " " . $friend_name_row['last'];
			array_push($friend_name, $full_name);
		}
	}
	
	// Get the groups that this user created
	$group_id = array(); 
	$group_name = array();
	
	echo "hi";
	echo $user_id;
	
	$group_query = mysql_query("SELECT * from groups WHERE creator_id = '" . $user_id . "'");
	if (!$group_query) {
		die('Invalid' . mysql_error());
	}
	echo "SELECT * from group WHERE creator_id =";
	while ($group_row = mysql_fetch_array($group_query)) {
		echo "third";
		array_push($group_id, $group_row['group_id']);
		array_push($group_name, $group_row['group_name']);
	}
	
?>
		
 </head>


<!-- action menu (top Left) -->

        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Responsive Multi-Level Menu - Demo 2</title>
        <meta name="description" content="Responsive Multi-Level Menu: Space-saving drop-down menu with subtle effects" />
        <meta name="keywords" content="multi-level menu, mobile menu, responsive, space-saving, drop-down menu, css, jquery" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/default.css" />
        <link rel="stylesheet" type="text/css" href="css/component.css" />
        <script src="js/modernizr.custom.js"></script>



<body id="top">

    <ul id="gn-menu" class="gn-menu-main" style="z-index:2">


                <div id="dl-menu" class="dl-menuwrapper" style="right:30px; position:absolute; z-index:10; float:right; align-content:right">
                    <button class="dl-trigger" style="padding-right: 30px;">Open Menu</button>
                    <ul class="dl-menu" style="right: 5px; width: 200px;left: -100px;">
                        
                        <li>
                            <a href="#">Add Friends</a>
                            
                        </li>
                        <li>
                            <a href="#">Create Group</a>
                            
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
                                                    <a href= "homepage.html"> <img src="img/homeicon.png"/>Home</a>
                                                </li>

                                                <li>
                                                    <a href= "project.html"> <img src="img/projectsicon.png"/>Projects</a>
                                                </li>

                                                <li>
                                                    <a href="friends.html"> <img src="img/friendsicon.png"/>Friends</a>
                                                </li>

                                                <li><a href"settings.html" class="gn-icon gn-icon-cog">Settings</a>
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
                    <!-- /nev -->   

            
  

        <div class="content">

            <div class="overlay">

        <div class="overlaycontent">

          <h1 style="text-align:center"><img class="logo" src="img/originals/nav-logo.png"><a title="" href="#"></a></h1>
                    <h2 style="text-align:center">Meeting <strong>- Management</strong></h2>
                   


        </div>








            <div class="fullwidth">
                <div class="main" style="margin:0; width:100%; height:100%">

<div data-role="main" class="ui-content" style="margin-top:50px">
                        <section>
                <div class="tabs tabs-style-bar">
                    <nav>
                        <ul>
                            <li><a href="#Friends" class="icon icon-home"><span> Friends</span></a></li>
                            <li><a href="#Groups" class="icon icon-box"><span>Groups</span></a></li>

                        </ul>
                    </nav>
                    <div class="content-wrap">
                <section id="Friends">
                <ul data-role="listview" data-inset="true">

                    <li data-role="list-divider" style=" color: #1ABC9C; font-size: x-large; padding: 20px; margin-left: 90px">Friends 
                        <span class="ui-li-count" style="float: right; margin-right: 10%"> <?php echo count($friend_id); ?> </span>
                    </li> 

					<?php 
						for ($i = 0; $i < count($friend_id); $i++) {					
					?>
                    <li style="margin-left:100px; margin-right:100px; margin-top:5px; margin-left:100px; margin-right:100px; margin-top:5px;/* border: solid; */border-bottom: solid;border-bottom-color: #1ABC9C;border-top: solid;border-top-color: #1ABC9C;" data-icon=""><a href="#">  

                      <h2> <?php echo $friend_name[$i]; ?> </h2>
                    </li> 
					<?php
						}
					?>
				</ul>
          </section>

          <section id="Groups">

                <ul data-role="listview" data-inset="true">

                    <li data-role="list-divider" style=" color: #1ABC9C; font-size: x-large; padding: 20px; margin-left: 90px">Groups 
                        <span class="ui-li-count" style="float: right; margin-right: 10%"> <?php echo count($group_id); ?> </span>
                    </li> 

                   	<?php 
						for ($i = 0;  $i < count($group_id); $i++) {
					?>
					<li style="margin-left:100px; margin-right:100px; margin-top:5px; margin-left:100px; margin-right:100px; margin-top:5px;/* border: solid; */border-bottom: solid;border-bottom-color: #1ABC9C;border-top: solid;border-top-color: #1ABC9C;" data-icon=""><a href="#">  

                      <h2> <?php echo $group_name[$i]; ?> </h2>
			
                    </li> 
					<?php 
						}
					?>
              </ul>

          </section>
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



<!-- action menu -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
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