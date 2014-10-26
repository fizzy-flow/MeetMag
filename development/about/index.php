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
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="description" content="Online info page of <?php echo $profile->fullName()?>. Learn more about me and download a vCard." />

        <title>User Profile MeetMAG</title>
        
        <!-- Our CSS stylesheet file -->
        <link rel="stylesheet" href="assets/css/styles-friends.css" />
        
        <!--[if lt IE 9]>
          <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
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
<!-- create project pop up -->

    <!-- Demo Styles -->
    <link href="css/popup-demo.css" rel="stylesheet">

    <!-- Modal Styles -->
    <link href="css/popup-friends-modal.css" rel="stylesheet">

<!-- from the meeting page -->
<link rel="stylesheet" href="feather-webfont/feather.css">


    
    <body>

            <div class="header">
                <h1 class="v-card"><?php echo $profile->fullName()?> <p style=" float:right; color:White;"><a href="#" style="color:White;">CLOSE</a></p></h1> 
            </div>

 <section id="infoPage">
    
            <p>
                <img src="<?php echo $profile->photoURL()?>" alt="<?php echo $profile->fullName()?>" width="164" height="164" style="margin-top:20px;" />
            </p>
            <header>
                <h1 class="v-card"><?php echo $profile->fullName()?></h1>
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
    
    <section id="links">
        <a href="?vcard" class="vcard">Download as V-Card</a>
        <a href="?json" class="json">Get as a JSON feed</a>
    </section>
        



    
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
                        <span class="ui-li-count" style="float: right; margin-right: 10%"> 6 </span>
                    </li> 

                    <li style="margin-top:5px; margin-top:5px;/* border: solid; */border-bottom: solid;border-bottom-color: #1ABC9C;border-top: solid;border-top-color: #1ABC9C;" data-icon=""><a href="#modal">  

                      <h2>Faisal Al Siddiqi</h2>
                      <p>Faisal wants to participate the meeting with the client</p></a>
                    </li> 

                    <li style="margin-top:5px; margin-top:5px;/* border: solid; */border-bottom: solid;border-bottom-color: #1ABC9C;border-top: solid;border-top-color: #1ABC9C;" data-icon=""><a href="#">  

                      <h2>Roland du Toit</h2>
                      <p>Roland is negotiating with the client</p></a>
                    </li>

                    <li style="margin-top:5px; margin-top:5px;/* border: solid; */border-bottom: solid;border-bottom-color: #1ABC9C;border-top: solid;border-top-color: #1ABC9C;" data-icon=""><a href="#">  

                      <h2>Gary Foo Ming Rui</h2>
                      <p>Gary has decided to change his name into Gary because he felt it's a cool name </p></a>
                    </li>

                    <li style="margin-top:5px; margin-top:5px;/* border: solid; */border-bottom: solid;border-bottom-color: #1ABC9C;border-top: solid;border-top-color: #1ABC9C;" data-icon=""><a href="#"> 

                      <h2>Aditya Rahardi</h2>
                      <p>Aditya has developed unknown super power</p></a>
                    </li>

                    <li style="margin-top:5px; margin-top:5px;/* border: solid; */border-bottom: solid;border-bottom-color: #1ABC9C;border-top: solid;border-top-color: #1ABC9C;" data-icon=""><a href="#">  

                      <h2>Tengzheng Wang</h2>
                      <p>Tengzheng hold a discussion group with the team </p></a>
                    </li>

                    <li style="margin-top:5px; margin-top:5px;/* border: solid; */border-bottom: solid;border-bottom-color: #1ABC9C;border-top: solid;border-top-color: #1ABC9C;" data-icon=""><a href="#">  

                      <h2>Juntian Tao</h2>
                      <p>Juntian writes a note</p></a>
                    </li>

                    
              </ul>
          </section>

          <section id="Groups">

                <ul data-role="listview" data-inset="true">

                    <li data-role="list-divider" style=" color: #1ABC9C; font-size: x-large; padding: 20px; margin-left: 90px">Groups 
                        <span class="ui-li-count" style="float: right; margin-right: 10%"> 5 </span>
                    </li> 


                    <li style="margin-left:100px; margin-right:100px; margin-top:5px; margin-left:100px; margin-right:100px; margin-top:5px;/* border: solid; */border-bottom: solid;border-bottom-color: #1ABC9C;border-top: solid;border-top-color: #1ABC9C;" data-icon=""><a href="#">  

                      <h2>Group 1</h2>
                      <p>Faisal wants to participate the meeting with the client</p></a>
                    </li> 

                    <li style="margin-left:100px; margin-right:100px; margin-top:5px; margin-left:100px; margin-right:100px; margin-top:5px;/* border: solid; */border-bottom: solid;border-bottom-color: #1ABC9C;border-top: solid;border-top-color: #1ABC9C;" data-icon=""><a href="#">  

                      <h2>Group 2</h2>
                      <p>Roland is negotiating with the client</p></a>
                    </li>

                    <li style="margin-left:100px; margin-right:100px; margin-top:5px; margin-left:100px; margin-right:100px; margin-top:5px;/* border: solid; */border-bottom: solid;border-bottom-color: #1ABC9C;border-top: solid;border-top-color: #1ABC9C;" data-icon=""><a href="#">  

                      <h2>Group 3</h2>
                      <p>Gary has decided to change his name into Gary because he felt it's a cool name </p></a>
                    </li>

                     <li style="margin-left:100px; margin-right:100px; margin-top:5px; margin-left:100px; margin-right:100px; margin-top:5px;/* border: solid; */border-bottom: solid;border-bottom-color: #1ABC9C;border-top: solid;border-top-color: #1ABC9C;" data-icon=""><a href="#">  

                      <h2>Group 4</h2>
                      <p>Gary has decided to change his name into Gary because he felt it's a cool name </p></a>
                    </li>

                    <li style="margin-left:100px; margin-right:100px; margin-top:5px; margin-left:100px; margin-right:100px; margin-top:5px;/* border: solid; */border-bottom: solid;border-bottom-color: #1ABC9C;border-top: solid;border-top-color: #1ABC9C;" data-icon=""><a href="#">  

                      <h2>Group 5</h2>
                      <p>Gary has decided to change his name into Gary because he felt it's a cool name </p></a>
                    </li>



                    
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
