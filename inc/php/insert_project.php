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

	$user_id_query = mysql_query("SELECT user_id FROM MeetMag_Example_Database.user WHERE email = '" . $_SESSION['email'] . "'");
	$user_id = mysql_result($user_id_query, 0);
	
	$project_name = $_POST['projectName'];
	$project_desc = $_POST['projectDesc'];
	echo $project_desc;
	
	$date = date('Y-m-d');

	// Insert into the project table
	$project_query = mysql_query("INSERT INTO MeetMag_Example_Database.project (project_id, project_name, description, date_created, expect_end_date, actual_end_date, creator_id) VALUES (NULL, '$project_name', '$project_desc', '$date', 2050-12-12, NULL, '$user_id')");
	echo mysql_error();
	
	// Make sure current user is associated with that project
	$project_id = mysql_insert_id();
	$membership_query = mysql_query("INSERT INTO MeetMag_Example_Database.project_membership (project_id, user_id) VALUES ('$project_id', '$user_id')");
	
	header('Location:../../project.php');

?>