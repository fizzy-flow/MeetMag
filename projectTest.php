<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"><![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"><![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"><![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"><!--<![endif]-->
<head>

<?php
session_start();
 if (!isset($_SESSION['email'])){
	header('Location:index.php');
 }

include_once 'inc/php/config.php';

$results = mysql_query("SELECT * FROM project");
$row_count = mysql_num_rows($results);
?>

<!-- Website Template designed by www.downloadwebsitetemplates.co.uk -->
<meta charset="UTF-8">
<title>MeetMag- Projects</title>
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

        <script src="js/google-modernizr.custom.js"></script></head>


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

<!-- create project pop up -->

    <!-- Demo Styles -->
    <link href="css/popup-demo.css" rel="stylesheet">

    <!-- Modal Styles -->
    <link href="css/popup-modal.css" rel="stylesheet">



<body id="top">

    <ul id="gn-menu" class="gn-menu-main" style="z-index:2">


                <div id="dl-menu" class="dl-menuwrapper" style="right:30px; position:absolute; z-index:10; float:right; align-content:right">
                    <button class="dl-trigger" style="padding-right: 30px;">Open Menu</button>
                    <ul class="dl-menu" style="right: 5px; width: 200px;left: -100px;">
                        

                        <li>
                            <a href="#modal">Create a projrct</a>
                        </li>


                    </ul>
                </div><!-- /dl-menuwrapper -->

<div id="modal">
        <div class="modal-content">
            <div class="header">
                <h2 style="color:#222;">Modal Heading</h2>
            </div>
            <div class="copy">
                <p style="color: #222">
                    <form style="font-weight:bold;">
                        Project Name:
                        <input type="text" name="project name">
                        </br>Project Discription:</br>
                        <textarea rows="4" cols="100"></textarea>
                    </form>
                </p>
            </div>
            <div class="cf footer">
                <a href="#" class="btn">Close</a>
            </div>
        </div>
        <div class="overlay"></div>
    </div>


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
                                                    <a href= "homepage.php" style="margin-left: 5%"> <img src="img/homeicon.png" style="padding-right: 5%"/>Home</a>
                                                </li>

                                                <li>
                                                    <a href= "project.php" style="margin-left: 5%"><img src="img/projectsicon.png" style= "padding-right: 5%">Projects</a>
                                                </li>

                                                <li>
                                                    <a href="friends.php" style="margin-left: 5%"><img src="img/friendsicon.png" style="padding-right: 5%">Friends</a>
                                                </li>

                                                <li><a href"settings.php" class="gn-icon gn-icon-cog">Settings</a>
                                                </li>

                                                <li>
                                                    <a href="index.php"style="margin-left: 5%"><img src="img/logout.png" style="padding-right: 5%;">LogOut</a>
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
                <div class="main" style="width:100%; height:100%">

<div data-role="main" class="ui-content" style="margin-top:50px">
              <ul data-role="listview" data-inset="true">

                    <li data-role="list-divider" style="color:#1ABC9C; font-size: x-large; adding: 20px; margin-left: 90px">Projects 
                        <span class="ui-li-count" style="float: right; margin-right: 10%"><?php echo $row_count ?> </span>
                    </li> 
					<?php
					while ($row_users = mysql_fetch_array($results)) {
						$userNameQuery = mysql_query("SELECT * from user WHERE user_id = '" . $row_users['creator_id'] . "'");
						$user = mysql_fetch_assoc($userNameQuery);
						
					?>

					  <li style="margin-left:100px; margin-right:100px; margin-top:5px; margin-left:100px; margin-right:100px; margin-top:5px;/* border: solid; */border-bottom: solid;border-bottom-color: #1ABC9C;border-top: solid;border-top-color: #1ABC9C;">   
                      <h2><?php echo $row_users['project_name'] . " - " . $user['first']; ?></h2>
                               <a href="inmeeting.html"> <img src="img/view.png" style="float:right;"> </a>
                                
                      <p class="ui-li-aside" style="text-align:center;"><?php echo $row_users['description']; ?> </p>
					  <p class="ui-li-aside" style="text-align:left; padding-bottom: 2%;"> Date created: <?php echo $row_users['date_created']; ?> </p>

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

</body>
</html>