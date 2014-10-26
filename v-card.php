
<!-- V-CARD -->
<?php

require 'includes/config.php';
require 'includes/aboutPage.class.php';
require 'includes/vcard.class.php';

$profile = new AboutPage($info);

if(array_key_exists('json',$_GET)){
    $profile->generateJSON();
    exit;
}
else if(array_key_exists('vcard',$_GET)){
    $profile->downloadVcard();
    exit;
}

?>
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
    <link rel="stylesheet" href="css/style.css">

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
        <!-- Our CSS stylesheet file -->
        <link rel="stylesheet" href="assets/css/styles-friends.css" />
   
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
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
<link rel="stylesheet" type="text/css" href="css/default.css" />
<link rel="stylesheet" type="text/css" href="css/component.css" />
<script src="js/modernizr.custom.js"></script>

<!-- create project pop up -->
<link rel="stylesheet" href="css/style.css">
    <!-- Demo Styles -->
    <link href="css/popup-friends-demo.css" rel="stylesheet">

    <!-- Modal Styles -->
    <link href="css/popup-friends-modal.css" rel="stylesheet">

<!-- from the meeting page -->
<!-- <link rel="stylesheet" href="feather-webfont/feather.css"> -->


<body id="top">
        
    <ul id="gn-menu" class="gn-menu-main" style="z-index:2">
        <div id="dl-menu" class="dl-menuwrapper" style="right:30px; position:absolute; z-index:10; float:right; align-content:right">
            <button class="dl-trigger" style="padding-right: 30px;">Open Menu</button>
        </div>
        <!-- /dl-menuwrapper -->
        <li class="gn-trigger">
            <a class="gn-icon gn-icon-menu" style="height: 100%; "><span>Menu</span></a>
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
                           <a href="friends.php" class="gn-icon icon-friends-fix" style="padding-left:17px;">Friends</a>
                        </li>

                        <li>
                           <a href="index.php" class="gn-icon icon icon-logout">LogOut</a>
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
                      <h1 class="logo-header"><img class="logo" src="img/originals/nav-logo.png"><a title="" href="#"></a></h1>
                      <h2 class="logo-header">Meeting <strong>- Management</strong></h2>
                  </div>
                  <div class="fullwidth">
                    <div class="main" style="margin:0; width:100%; height:100%">
                        <div data-role="main" class="v-card-div" class="ui-content" >




           <div class="header">
                <h1 class="v-card"> <p style=" float:left; color:White;"><a href="friends.php">Back</a></p></h1> 
            </div>

 <section id="infoPage">
    
            
            <header>
            <h1>
                <img src="<?php echo $profile->photoURL()?>" alt="<?php echo $profile->fullName()?>" width="164" height="164"  />
            </h1>
                <h1><?php echo $profile->fullName()?></h1>
                <h2><?php echo $profile->tags()?></h2>
            </header>
            
            <p class="description"><?php echo nl2br($profile->description())?></p>
            <p class="company">Work: <?php echo nl2br($profile->company())?></p>
            </br>
            <p>Contact Me:</p>
            <p class="cellphone">Phone Number: <?php echo nl2br($profile->cellphone())?></p>
            <p class="email">Email: <?php echo nl2br($profile->email())?><p>

            <br/>
            
            
            <ul class="vcard">
                <li class="fn"><?php echo $profile->fullName()?></li>
                <li class="org"><?php echo $profile->company()?></li>
                <li class="tel"><?php echo $profile->cellphone()?></li>
                <li><a class="url" href="<?php echo $profile->website()?>"><?php echo $profile->website()?></a></li>
            </ul>
            
    </section>
    
    <section class="v-card" id="links">
        <a href="?vcard" class="vcard">Download as V-Card</a>
        <a href="?json" class="json">Get as a JSON feed</a>
    </section>

</div>
</div>

                  </div>
              </div>
              <!-- Footer -->
              <div class="footercont clearfix">
                <div class="footer clearfix">
                    <div id="footerright">
                        <!-- <p><a id="backtotop" title="" href="#top">Back to Top ^</a></p> -->
                    </div>
                    <div id="footerleft">
                        <!-- Social Media -->
                        <div id="socialmedia" class="clearfix">
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
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

</html>