<?php
session_start();

//Check if user is logged in
 if (!isset($_SESSION['email'])){
	header('Location:../../index.php');
 }

 
include_once 'config.php';
include_once 'db_functions.php';


// Check if admin
$user_id = getUserID();
$meeting_id = $_GET['meeting_id'];
$project_id = $_GET['project'];
$meeting_name = "";
$meeting_date = "";

$creator_id_query = mysql_query("SELECT * from meeting WHERE meeting_id = '" . $meeting_id . "'");
while ($creator_id_row = mysql_fetch_array($creator_id_query)) {
	if ($creator_id_row['creator_id'] == $user_id) {
		$meeting_name = $creator_id_row['meeting_name'];
		$meeting_date = $creator_id_row['date'];
		
		$newsfeed_message = "Meeting: " . $meeting_name . " cancelled. The meeting was scheduled on: " . $meeting_date;
		$delete_query = mysql_query("DELETE FROM meeting WHERE meeting_id = '" .  $meeting_id . "'");
		
		
		
		$newsfeed_query = mysql_query("INSERT INTO newsfeed (newsfeed_id, meeting_id, message) VALUES (NULL, '$meeting_id', '$newsfeed_message')");
		echo mysql_error();
	}
	header('Location:../../meeting.php?project=' . $project_id);
}
?>
