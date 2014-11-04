<?php
session_start();

$con = mysql_connect('localhost', 'root', 'List7Arch7tailor');
if (!$con) {
	die('Could not connect: ' . mysql_error());
}

if($_POST){
    $subject = implode(",", $_POST["vote"]);
    echo $subject;
}

//MySqli Insert Query
//$insert_row = $mysqli->query("INSERT INTO table ( captured_fields ) VALUES( $capture_field_vals )");
mysql_close($con);
?>