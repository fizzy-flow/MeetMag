<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"><![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"><![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"><![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"><!--<![endif]-->
<head>
<!-- Website Template designed by www.downloadwebsitetemplates.co.uk -->




<meta charset="UTF-8">
<title>MeetMag - Home</title>
<meta name="description" content="">
<meta name="keywords" content="">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<link rel="shortcut icon" href="images/meetmagicon/meetmagicon-32(2).png">
<link rel="stylesheet" href="css/astyle.css" media="screen" type="text/css" />
<!--[if IE]><![endif]-->
<link rel="stylesheet" href="css/gravity-style.css">
<script src="js/jquery.min.js"></script>

<!--ATTENTION ROLAND : THIS IS THE JAVASCRIPT FOR DYNAMIC BUTTONS-->
<script src="js/createMeeting.js"></script>
<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->



<!-- create meeting -->
        <link rel="stylesheet" type="text/css" href="css/createmeeting-default.css" />
        <link rel="stylesheet" type="text/css" href="css/createmeeting-component.css" />
        <link rel="stylesheet" href="feather-webfont/feather.css">
        <script src="js/createmeeting-modernizr.custom.js"></script>
		<script src="jquery-1.11.1.min.js"></script>
        <script src="js/createmeeting-blah.js"></script>
        <script src="js/createmeeting-time.js"></script>
        <script src="js/createmeeting-agendadesc.js"></script>

<body id="top">


<?php 
	session_start();
	 if (!isset($_SESSION['email'])){
		header('Location:index.php');
	 }
	include_once 'inc/php/config.php';
	
	$project_id = $_GET['project'];
	$meeting_id = $_GET['meeting_id'];
	
	$meeting_name = "";
	$meeting_description = "";
	$meeting_location = "";
	$meeting_start_time = "";
	$meeting_end_time = "";
	$meeting_date = "";
	
	if (isset($_GET['meeting_id'])) {
		//Get name
		// Get description
		// Get date
		// Get start time
		// Get end time
		// Get location
		$meeting_query = mysql_query("SELECT * from meeting WHERE meeting_id = '" . $meeting_id . "'");
		while ($meeting_row = mysql_fetch_array($meeting_query)) {
			$meeting_name = $meeting_row['meeting_name'];
			$meeting_description = $meeting_row['description'];
			$meeting_location = $meeting_row['location'];
			$meeting_start_time = $meeting_row['expect_start'];
			$meeting_end_time = $meeting_row['expect_end'];
			$meeting_date = $meeting_row['date'];
		}
		
	}
?>


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
                <div class="main" style="margin:0; width:100%; height:100% padding:0px 0; ">


				</div>
                <div class="main" ng-app="memberssss" style="width: 100%; max-width: 100%; padding: 0px 0; padding-bottom:5%;">
                <form action="/inc/php/insert_meeting.php?project=<?php echo $project_id; ?>" method="POST" class="cbp-mc-form">
                    <div class="cbp-mc-column" ng-controller="numMembers">
					
						<!-- DISPLAY PROJECT TITLE HERE -->
						
                        <label for="last_name">Name of Meeting</label>
                        <input type="text" id="meeting_name" name="meeting_name" />
                        <label for="last_name">Meeting Description</label>
                        <input type="text" id="meeting_description" name="meeting_description" />
                        <div id="membersDiv">
                        <label for="member1">Members <a id="addMember"><span class="icon-plus"></span></a></label>
                        <input type="text" id="member1" name="member1" placeholder="Member 1"/>
                        </div>
                        <div id="agendasDiv">
                        <label> Agendas<a id="addAgendaSec"><span class="icon-plus"></span></a></label>
                        <label for="agendas1"></label>
                        <input class="input" type="text" placeholder="Agenda Title"></input>
                        <input type="text" placeholder="Agenda Description" ></input>
                        </label>
                        </div>
                        <label for="agenda">Estimation Time</label>
                        <table ng-repeat-end>
                            <tr>              
                                <td>Minute(s): <input type="number" id="{{'agenda'+$index+'Minutes'}}" min=0 max=59></td>
                            </tr>
                        </table>
                    </div>
                    <div class="cbp-mc-column">
                        <label for="date">Date</label>
                        <input type="date" id="phone" name="date">
                        <label>Duration</label>
                        <label>Start time</label>
                        <input type="time" id="starttime" name="start_time">
                        <label>End time</label>
                        <input type="time" id="endtime" name="end_time">
                    </div>
                    <div class="cbp-mc-column">
                        <label for="location">Location</label>
                        <input type="text" id="location" name="location">
          
                    </div>
                    <div class="cbp-mc-submit-wrap"><input class="cbp-mc-submit" id="createbutton" type="submit" value="Create meeting"/></div>
                </form>
            </div>
            </div>
        </div>
    </div>
 </div>
 
 <script type="text/javascript">
	function populateFields() {
		$('#meeting_name').val("<?php echo $meeting_name; ?>");
		$('#meeting_description').val("<?php echo $meeting_description; ?>");
		$('#phone').val("<?php echo $meeting_date; ?>");
		$('#starttime').val("<?php echo $meeting_start_time; ?>");
		$('#endtime').val("<?php echo $meeting_end_time; ?>");
		$('#location').val("<?php echo $meeting_location; ?>");
		$('#createbutton').val("Edit Meeting");
	}
 </script>
 
 <?php 
	if (isset($_GET['meeting_id'])) {
		echo '<script type="text/javascript"> populateFields(); </script>';
	}
 ?>
 



</body>
</html>