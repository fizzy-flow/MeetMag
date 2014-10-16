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


<script src="js/gmap.js"></script>
<script src="js/scripts.js"></script>
<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->





        <title>Login and Registration Form with HTML5 and CSS3</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="MeetMag Login & Signup Page" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/animate-custom.css" />






<?php
include_once 'inc/php/config.php';
include_once 'inc/php/functions.php';
include_once 'inc/php/db_functions.php';

//setup some variables/arrays
$action = array();
$action['result'] = null;

$text = array();

//check if the form has been submitted
if(isset($_POST['signup'])){

    //cleanup the variables
    //prevent mysql injection
    $firstName = mysql_real_escape_string($_POST['firstnamesignup']);
    $lastName = mysql_real_escape_string($_POST['lastnamesignup']);
    $password = mysql_real_escape_string($_POST['passwordsignup']);
    $emailsignup = mysql_real_escape_string($_POST['emailsignup']);
    $phone_num = mysql_real_escape_string($_POST['pnosignup']);
    
    //quick/simple validation
    //if(empty($firstName)){ $action['result'] = 'error'; array_push($text,'You forgot your firstName'); }
    //if(empty($lastName)){ $action['result'] = 'error'; array_push($text,'You forgot your lastName'); }
    //if(empty($password)){ $action['result'] = 'error'; array_push($text,'You forgot your password'); }
    //if(empty($emailsignup)){ $action['result'] = 'error'; array_push($text,'You forgot your emailsignup'); }
    
    // ----- Validate input fields here -----

   
<?= show_errors($action); ?>

<body>




            <!-- First Section -->
    
<div class="section bg1 clearfix">         
    <div class="content">

        <div class="overlay">

                <div class="overlaycontent" style="padding: 10px 0">

                  <h1 style="text-align:center; margin-top: 2%;">
                    <img class="logo" src="img/originals/nav-logo.png"><a title="" href="#"></a>
                  </h1>
                    <h2 style="text-align:center; margin-bottom: 2%;">Meeting <strong>- Management</strong>
                    </h2>
                </div>
            <div class="fullwidth">

                <header>
                    <h1 style="color:#5ac9b2">Welcome to Meetmag!</span></h1>
                </header>
                <section>               
                    <div>
                        <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                        <a class="hiddenanchor" id="toregister"></a>
                        <a class="hiddenanchor" id="tologin"></a>
                        <div id="wrapper">
                            <div id="login" class="animate form">
                                <form method="post" autocomplete="on" action="login.php"> 
                                    <h1>Log in</h1> 
                                    <p> 
                                        <label for="loginemail" class="loginemail" data-icon="u" > Your email</label>
                                        <input id="loginemail" name="loginemail" required="required" type="text" placeholder="mymail@mail.com"/>
                                    </p>
                                    <p> 
                                        <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                        <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                                    </p>
                                    <p class="keeplogin"> 
                                        <input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
                                        <label for="loginkeeping">Keep me logged in</label>
                                    </p>
                                    <p class="login button"> 
                                        <input type="submit" value="Login" name="submit" /> 
                                    </p>
                                    <p class="change_link">
                                        Not a member yet ?
                                        <a href="#toregister" class="to_register">Join us</a>
                                    </p>
                                </form>
                            </div>

                            <div id="register" class="animate form">
                                <form  action="" method="post" autocomplete="on"> 
                                    <h1> Sign up </h1>
                                    <p> 
                                        <label for="firstnamesignup" class="fname" data-icon="u">Your first name</label>
                                        <input id="firstnamesignup" name="firstnamesignup" required="required" type="text" placeholder="John" />
                                    </p>
                                    <p> 
                                        <label for="lastnamesignup" class="lname" data-icon="u">Your last name</label>
                                        <input id="lastnamesignup" name="lastnamesignup" required="required" type="text" placeholder="Smith" />
                                    </p>
                                    <p> 
                                        <label for="emailsignup" class="youmail" data-icon="e" > Your email signup</label>
                                        <input id="emailsignup" name="emailsignup" required="required" type="emailsignup" placeholder="mysupermail@mail.com"/> 
                                    </p>
                                    <p> 
                                        <label for="pnosignup" class="pno" data-icon="e" > Your phone number</label>
                                        <input id="pnosignup" name="pnosignup" required="required" type="pnosignup" placeholder="04xxxxxxxx"/> 
                                    </p>
                                    <p> 
                                        <label for="passwordsignup" class="youpasswd" data-icon="p">Your password </label>
                                        <input id="passwordsignup" name="passwordsignup" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                    </p>
                                    <p> 
                                        <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Please confirm your password </label>
                                        <input id="passwordsignup_confirm" name="passwordsignup_confirm" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                    </p>
                                    <p class="signin button"> 
                                        <input type="submit" value="Sign up" name="signup" />
                                        
                                    </p>
                                    <p class="change_link">  
                                        Already a member ?
                                        <a href="#tologin" class="to_register"> Go and log in </a>
                                    </p>
                                </form>
                            </div>
                            
                        </div>
                    </div>  
                </section>

            </div>
        </div>
    </div>
</div>


</body>
</html>