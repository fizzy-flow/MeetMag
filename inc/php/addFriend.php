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
	
	$friendEmail = $_POST['friendEmail'];
	$friend_id = "";
	
	// Get the friend's ID
	$friend_query = mysql_query("SELECT user_id FROM MeetMag_Example_Database.user WHERE email = '" . $friendEmail . "'");
	$friend_id = mysql_result($friend_query, 0);
	
	echo $friend_id;
	
	// Add our relationship to them
	$friend_query = mysql_query("INSERT INTO MeetMag_Example_Database.friend (user_id, friend_id) VALUES ('$user_id', '$friend_id')");
	echo mysql_error();
	
	// Add their relationship to user
	$friend_query = mysql_query("INSERT INTO MeetMag_Example_Database.friend (user_id, friend_id) VALUES ('$friend_id', '$user_id')");
	echo mysql_error();
	
	header('Location:../../friends.php');
?>