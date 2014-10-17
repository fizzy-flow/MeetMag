<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Login and Registration Form with HTML5 and CSS3</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="MeetMag Login & Signup Page" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
    </head>

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

<<<<<<< HEAD
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

 ?>  
=======
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

	if (checkUserTable("email", $emailsignup) > 0) { // Can't have an existing email - found in db_function.php
		$action['result'] = 'error';
		$text = "Email $emailsignup already exists!";
	} elseif (!ctype_digit($phone_num) && strlen($phone_num) > 7) { // Check if it is all digits - found in functions.php
		$action['result'] = 'error';
		$text = "Invalid phone number!";
	} elseif (strlen($password) < 6) { // Check if password is > 6 characters found in functions.php
		$action['result'] = 'error';
		$text = "Password must be atleast 6 characters long!";
	}
	
	if($action['result'] != 'error'){

		//$password = md5($password);
			
		//add to the database
		$add = mysql_query("INSERT INTO `user` (user_id, email, phone_num, password, first, last) VALUES(NULL, '$emailsignup','$phone_num','$password','$firstName','$lastName')");
		
		if($add){
			/*
			//get the new user id
			$userid = mysql_insert_id();
			
			//create a random key
			$key = $firstName . $lastName . $emailsignup . date('mY');
			$key = md5($key);
			
			//add confirm row
			$confirm = mysql_query("INSERT INTO `confirm` VALUES(NULL,'$lastName','$key','$emailsignup')");	
			
			if($confirm){
			
				//include the swift class
				include_once 'inc/php/swift/swift_required.php';
			
				//put info into an array to send to the function
				$info = array(
					'firstName' => $firstName,
					'lastName' => $lastName,
					'emailsignup' => $emailsignup,
					'key' => $key);
			
				//send the emailsignup
				if(send_emailsignup($info)){
								
					//emailsignup sent`````````````````````````````````````````````````````````````````````````````````````````````````````````````````
					$action['result'] = 'success';
					array_push($text,'Thanks for signing up. Please check your emailsignup for confirmation!');
				
				}else{
					
					$action['result'] = 'error';
					array_push($text,'Could not send confirm emailsignup');
				
				}
			
			}else{
				
				$action['result'] = 'error';
				array_push($text,'Confirm row was not added to the database. Reason: ' . mysql_error());
				
			}
			*/
		
		// Redirect to homepage
		header('Location:index.php#tologin');
			
		}else{
		
			$action['result'] = 'error';
			array_push($text,'User could not be added to the database. Reason: ' . mysql_error());
		
		}
	
	}
	$action['text'] = $text;
}

?>
>>>>>>> 75fb6984824e27adbd7ce0c373f9abccc44cbf72
<?= show_errors($action); ?>
    <body>
        <div class="container">
            <header>
                <h1>Welcome to Meetmag!</span></h1>
            </header>
            <section>				
                <div id="container_demo" >
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
    </body>
</html>