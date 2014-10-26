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
	$meeting_id = $_GET['meeting_id'];
	$name = $_POST['meeting_name'];
	$description = $_POST['meeting_description'];
	$location = $_POST['location'];
	$date = $_POST['date'];
	$start_time = $date . " " .$_POST['start_time'];
	$end_time = $date . " " . $_POST['end_time'];
	$lat = $_POST['hiddenLat'];
	$lon = $_POST['hiddenLng'];
	
	
	$agendaTitle = $_POST['agendaTitle'];
	$agendaDesc = $_POST['agendaDesc'];
	$agendaTime = $_POST['agendaTime'];
	$member = $_POST['member'];
	
	$agendaTitle_array = array();
	$agendaDesc_array = array();
	$agendaTime_array = array();
	$member_array = array();
	
	foreach ($agendaTitle as $t) {
		array_push($agendaTitle_array, $t);
	}
	
	foreach ($agendaDesc as $d) {
		array_push($agendaDesc_array, $d);
	}
	
	foreach ($member as $m) {
		array_push($member_array, $m);
	}
	
	
	foreach ($agendaTime as $t) {
		array_push($agendaTime_array, $t);
	}
	
	echo $start_time;
	echo "<br>";
	echo $end_time;
	echo "<br>";
	echo $date;
	echo "<br>";
	echo $lat;
	echo "<br>";
	echo $lon;
	
	echo "<br> attempting to get friend ids";
	for ($i = 0; $i < count($member_array); $i++) {
		echo "<br>";
		echo $member_array[$i];
	}
	
if (empty($_GET['meeting_id'])) {
	// Insert values into meeting table
	$query = "INSERT INTO MeetMag_Example_Database.meeting (meeting_id, meeting_name, description, date, location, expect_start, expect_end, actual_start, actual_end, creator_id, lat, lon) VALUES (NULL, '$name', '$description', '$date', '$location', '$start_time' , '$end_time' , NULL, NULL, '$user_id', '$lat', '$lon')";
	mysql_query($query);
	echo "Attempting to insert into meeting table <br>";
	echo mysql_error();

	// Loop through meeting table to find last meeting_id
	$query = "SELECT MAX(meeting_id) FROM MeetMag_Example_Database.meeting";
	$meeting_id = mysql_insert_id();
	echo "Attempting to loop through meeting table to find last meeting id <br>";
	echo mysql_error();


	// Get project_id's creator
	$query = "SELECT creator_id FROM MeetMag_Example_Database.project WHERE project_id = '" . $project_id . "'";
	$creator_id = mysql_result($query, 0);
	echo "Attempting to get project_id's creator <br>";
	echo mysql_error();
	

	// Insert into project_contains_meeting
	$query = "INSERT INTO MeetMag_Example_Database.project_contains_meeting (project_id, meeting_id, admin_id) VALUES ('$project_id', '$meeting_id', '$user_id')";
	mysql_query($query);
	echo "Attempting to insert into project_contains meeting <br>";
	echo mysql_error();

	// Make sure the creator will attend the meeting
	$query = "INSERT INTO MeetMag_Example_Database.attendance (meeting_id, user_id, accepted, attended) VALUES ('$meeting_id', '$user_id', '1', NULL)";
	mysql_query($query);
	echo "Attempting to insert creator into attendance <br>";
	echo mysql_error();
	
	echo "Attempting to insert all the friends into attendance <br>";
	echo mysql_error();
	
	for ($i = 0; $i < count($member_array); $i++) {
		$query = "INSERT INTO MeetMag_Example_Database.attendance (meeting_id, user_id, accepted, attended) VALUES ('$meeting_id', '$member_array[$i]', '1', NULL)";
		mysql_query($query);
		echo mysql_error();
		$query = mysql_query("SELECT project_id FROM MeetMag_Example_Database.project_id WHERE user_id = '$member_array[$i]'");

		// Not found already in database
		if(!$query || !mysql_num_rows($query)) {
			mysql_query("INSERT INTO MeetMag_Example_Database.project_membership (project_id, user_id) VALUES ('$project_id', '$member_array[$i]')");
		} 

	
	}

	//Show the new meeting in newsfeed
	$query = "INSERT INTO MeetMag_Example_Database.newsfeed (newsfeed_id, meeting_id, message) VALUES (NULL, '$meeting_id', 'You are invited to meeting $name')";
	mysql_query($query);
	echo "<br>";
	echo "Attempting to insert into newsfeed <br>";
	echo mysql_error();
	
	//insert agendas
	for ($i = 0; $i < count($agendaDesc_array); $i++) {
		$agendaQuery = mysql_query("INSERT INTO MeetMag_Example_Database.agenda_item (meeting_id, name, description, expected_duration, actual_duration) VALUES ('$meeting_id', '$agendaTitle_array[$i]', '$agendaDesc_array[$i]', '$agendaTime_array[$i]', NULL)");
		echo mysql_error();
	}
	
	// MEETING BEING UPDATED
} else {
	$meeting_id = $_GET['meeting_id'];
	echo "attempting to update";
	$update_query = mysql_query("UPDATE MeetMag_Example_Database.meeting SET meeting_name = '$name', description = '$description', date = '$date', location = '$location', expect_start = '$start_time', expect_end = '$end_time', lat = '$lat', lon = '$lon' WHERE meeting_id = $meeting_id");
	echo mysql_error();
	
	//Show the new meeting in newsfeed
	$project_query = mysql_query("SELECT project_name FROM MeetMag_Example_Database.project WHERE project_id = '" . $project_id . "'");
	$project_name = mysql_result($project_query, 0);
	echo mysql_error();
	echo $project_name;
	
	
	// Update newsfeed

	$query = "INSERT INTO MeetMag_Example_Database.newsfeed (newsfeed_id, meeting_id, message) VALUES (NULL, '$meeting_id', 'Meeting $name was changed in project $project_name')";
	mysql_query($query);
	

}	

mysql_close($con);
	
	
	echo $project_id;
	header("Location:../../meeting.php?project_id=" . $project_id);
	// Send error back to previous page $
 ?>