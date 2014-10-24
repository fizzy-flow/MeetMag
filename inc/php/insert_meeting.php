<?php
session_start();

$con = mysql_connect('localhost', 'root', 'List7Arch7tailor');
if (!$con) {
    die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully';

	$user_id_query = mysql_query("SELECT user_id FROM MeetMag_Example_Database.user WHERE email = '" . $_SESSION['email'] . "'");
	$user_id = mysql_result($user_id_query, 0);

	$project_id = $_GET['project_id'];
	$name = $_POST['meeting_name'];
	$description = $_POST['meeting_description'];
	$location = $_POST['location'];
	$date = $_POST['date'];
	$start_time = $date . " " .$_POST['start_time'];
	$end_time = $date . " " . $_POST['end_time'];
	$meeting_id = $_GET['meeting_id'];
	
	echo "PRoject_id = " . $project_id;
	

if (!isset($_GET['meeting_id'])) {
	// Insert values into meeting table
	$query = "INSERT INTO MeetMag_Example_Database.meeting (meeting_id, meeting_name, description, date, location, expect_start, expect_end, actual_start, actual_end, creator_id) VALUES (NULL, '$name', '$description', '$date', '$location', '$start_time' , '$end_time' , NULL, NULL, $user_id)";
	mysql_query($query);

	// Loop through meeting table to find last meeting_id
	$query = "SELECT MAX(meeting_id) FROM MeetMag_Example_Database.meeting";
	$meeting_id = mysql_insert_id();


	// Get project_id's creator
	$query = "SELECT creator_id FROM MeetMag_Example_Database.project WHERE project_id = '" . $project_id . "'";
	$creator_id = mysql_result($query, 0);

	// Insert into project_contains_meeting
	$query = "INSERT INTO MeetMag_Example_Database.project_contains_meeting (project_id, meeting_id, admin_id) VALUES ('$project_id', '$meeting_id', '$user_id')";
	mysql_query($query);

	// Make sure the creator will attend the meeting
	$query = "INSERT INTO MeetMag_Example_Database.attendance (meeting_id, user_id, accepted, attended) VALUES ('$meeting_id', '$user_id', '1', NULL)";
	mysql_query($query);

	//Show the new meeting in newsfeed
	$query = "INSERT INTO MeetMag_Example_Database.newsfeed (newsfeed_id, meeting_id, message) VALUES (NULL, '$meeting_id', 'You are invited to meeting $name')";
	mysql_query($query);
	echo mysql_errno($con) . ": " . mysql_error($con). "\n";
	
	//Meeting is being updated rather than created
} else {
	echo "attempting to update";
	$update_query = mysql_query("UPDATE MeetMag_Example_Database.meeting SET meeting_name = '$name', description = '" . $description . "', date =  '" . $date . "', location = '" . $location . "', expect_start = '" . $start_time . "', expect_end = '" . $end_time . "' WHERE meeting_id = '" . $meeting_id . "'");
}	

mysql_close($con);
	
	
	
header("Location:../../meeting.php?project_id=" . $project_id);
	// Send error back to previous page 
 ?>