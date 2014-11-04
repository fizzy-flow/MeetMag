<?php
session_start();

$con = mysql_connect('localhost', 'root', 'List7Arch7tailor');
if (!$con) {
	die('Could not connect: ' . mysql_error());
}

if($_POST){
	$title = $_POST["q_Title"];
	$mID = $_POST["m_id"];
	$query = "INSERT INTO MeetMag_Example_Database.vote (vote_id, meeting_id, vote_question) VALUES (NULL, '$mID', '$title')";
	mysql_query($query);
	$subject = implode(",", $_POST["p_opt"]);

}

if(isset($_POST["p_opt"])){
	$lastID = mysql_insert_id();
	foreach($_POST["p_opt"] as $key => $text_field){
		$query = "INSERT INTO MeetMag_Example_Database.answer_options (vote_id, options, count) VALUES ('$lastID', '$text_field', 0)";
		mysql_query($query);
	}
}


//MySqli Insert Query
//$insert_row = $mysqli->query("INSERT INTO table ( captured_fields ) VALUES( $capture_field_vals )");
echo "<h2>Poll has been successfully created</h2>";
mysql_close($con);
?>