<?php

if($_POST){
	$q_title = $_POST["p_Title"]
    $subject = implode(",", $_POST["p_opt"]);
    echo $q_title;
}

?>