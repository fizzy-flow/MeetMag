<?php
session_start();

$con = mysql_connect('localhost', 'root', 'List7Arch7tailor');
if (!$con) {
    die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully';


$user_id_query = mysql_query("SELECT user_id FROM MeetMag_Example_Database.user WHERE email = '" . $_SESSION['email'] . "'");
$user_id = mysql_result($user_id_query, 0);

$project_id = $_GET['project'];
$name = $_POST['meeting_name'];
$description = $_POST['meeting_description'];
$location = $_POST['location'];
$date = $_POST['date'];
$start_time = $date . " " .$_POST['start_time'];
$end_time = $date . " " . $_POST['end_time'];

// Insert values into meeting table
$query = "INSERT INTO MeetMag_Example_Database.meeting (meeting_id, meeting_name, description, date, location, expect_start, expect_end, actual_start, actual_end, creator_id) VALUES (NULL, '$name', '$description', '$date', '$location', '$start_time' , '$end_time' , NULL, NULL, $user_id)";
mysql_query($query);
echo mysql_errno($con) . ": " . mysql_error($con). "\n";

// Loop through meeting table to find last meeting_id
$query = "SELECT MAX(meeting_id) FROM MeetMag_Example_Database.meeting";
$meeting_id = mysql_insert_id();

echo "ERROR FROM TRYING TO GET MEETING_ID";
echo mysql_errno($con) . ": " . mysql_error($con). "\n";
echo "<br><br><br>";
echo $meeting_id;

// Get project_id's creator
$query = "SELECT creator_id FROM MeetMag_Example_Database.project WHERE project_id = '" . $project_id . "'";
$creator_id = mysql_result($query, 0);
echo $creator_id;
echo "ERROR FROM TRYING TO GET CREATOR_ID";
echo mysql_errno($con) . ": " . mysql_error($con). "\n";
echo "<br><br><br>" . $creator_id;

// Insert into project_contains_meeting
$query = "INSERT INTO MeetMag_Example_Database.project_contains_meeting (project_id, meeting_id, admin_id) VALUES ('$project_id', '$meeting_id', '$user_id')";
mysql_query($query);
echo "ERROR FROM TRYING TO INSERT PROJECT_CONTAINS_MEETING";
echo mysql_errno($con) . ": " . mysql_error($con). "\n";


mysql_close($con);
	
	
	
header("Location:../../meeting.php?project=" . $project_id);
	// Send error back to previous page 
 ?>