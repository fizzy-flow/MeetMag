<?php 
include 'config.php'; // Connects to the database

// Checks if a field exists within the user table
// eg. checkUserTable("first", "Roland")
// would return -1 if it failed (because "first" isn't a column)
// 		 return 0 if "Roland" doesn't exist
//		 return > 1 (or 1 exactly) if "Roland" exists
function checkUserTable($name, $value) {
		$query = "SELECT * FROM user WHERE " . $name . " = '" . $value . "'";
		$result = mysql_query($query);
		
		// Query failed
		if (!$result) {
			return -1;
		} else {
			return mysql_num_rows($result);
		}
	}
	
function getUserID() {
$user_id_query = mysql_query("SELECT user_id FROM user WHERE email = '" . $_SESSION['email'] . "'");
$user_id = mysql_result($user_id_query, 0);
return $user_id;
}
?>