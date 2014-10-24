<?php
$feed_url = 'http://blogoola.com/blog/feed/';
$content = file_get_contents($feed_url);
$x = new SimpleXmlElement($content);
$feedData = '';
$date = date("Y-m-d H:i:s");
 
//output
foreach(qID in questions) {
    $feedData .= '<h2><span id="question">Voting Question Title</span></h2><div id="voting">';
    foreach(optionID in options) {
    	$feedData .= '<div><span>0</span><a href="">Vote</a>OptionTitle</div>';
    }
    $feedData .= "</div>";
}
 
echo $feedData;
?>