<?php
session_start();
if (!isset($_SESSION['email'])){
    header('Location:index.php');
}

$con = mysql_connect('localhost', 'root', 'List7Arch7tailor');
if (!$con) {
    die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully';

// Grab variables from URL
$project_id = $_GET['project_id'];
$meeting_id = $_GET['meeting_id'];


// Get user ID
$user_id_query = mysql_query("SELECT user_id FROM MeetMag_Example_Database.user WHERE email = '" . $_SESSION['email'] . "'");
$user_id = mysql_result($user_id_query, 0);

// Get creator ID
$query = mysql_query("SELECT creator_id FROM MeetMag_Example_Database.meeting WHERE meeting_id = '" . $meeting_id . "'");
$creator_id = mysql_result($query, 0);

// If they try to start the meeting without being the meeting creator
if (!$creator_id == $user_id) {
    header('Location:index.php');
} else {
	// Start the meeting
	date_default_timezone_set("Australia/Brisbane");
	$date = date('Y-m-d H:i:s');
	echo $date;
	$start_query = mysql_query("UPDATE MeetMag_Example_Database.meeting SET actual_start = '$date' WHERE meeting_id = '$meeting_id'");
	echo mysql_error();
	
	header("Location:http://deco3801-12.uqcloud.net/inmeeting.php?meeting_id=$meeting_id&project_id=$project_id");
}
?>
