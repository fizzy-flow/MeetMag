<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"><![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"><![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"><![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"><!--<![endif]-->
<head>
  <!-- Website Template designed by www.downloadwebsitetemplates.co.uk -->
  <meta charset="UTF-8">
  <title>MeetMag - Meeting</title>
  <link rel="shortcut icon" href="images/meetmagicon/meetmagicon-32(2).png">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="css/astyle.css" media="screen" type="text/css" />
  <!--[if IE]><![endif]-->
  <link rel="stylesheet" href="css/gravity-style.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/index.js"></script>
  <script src="js/waypoints.min.js"></script>
  <script src="js/countdown.js"></script>
  <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
  <script src="js/gmap.js"></script>
  <script src="js/scripts.js"></script>
  <script src="js/jquery.form.js"></script>
  <link rel="stylesheet" href="feather-webfont/feather.css">
  <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
  <!-- /nev -->
  <meta name="author" content="Codrops" />
<!--   <link rel="shortcut icon" href="../favicon.ico"> -->

  <link rel="stylesheet" type="text/css" href="css/google.css" />
<!--   <link rel="stylesheet" type="text/css" href="css/google-normalize.css" />
  <link rel="stylesheet" type="text/css" href="css/google-style.css" />
  <link rel="stylesheet" type="text/css" href="css/google-component.css" /> -->
  <link rel="stylesheet" type="text/css" href="css/menustyle.css" />
  <script src="js/google-modernizr.custom.js"></script>
  
  <?php
  session_start();
  
  include_once 'inc/php/config.php';
  include_once 'inc/php/db_functions.php';
  
	//Check if user is logged in
  if (!isset($_SESSION['email'])){
    header('Locaton:index.php');
  }
  
	// Get the user ID
  $user_id = getUserID();
  
	// Get the meeting ID
  $meeting_id = $_GET['meeting_id'];
  
	//Get the project ID
  $project_id = $_GET['project_id'];
  
	// Get the creator ID
  $meeting_query = mysql_query("SELECT * FROM meeting WHERE meeting_id = '" . $meeting_id . "'");
  $num_rows = mysql_num_rows($meeting_query);
  
	// Meeting does not exist
  if ($num_rows < 1) {	
    header('Location:homepage.php');
  }
  
	// Set up variables
  $description = "";
  $meeting_name = "";
  $date = "";
  $start = "";
  $end = "";
  $location = "";
  $lat = "";
  $lng = "";
  $project_name = "";
  $meeting_started = "";
  $meeting_ended = "";
  $creator_id = "";
	$duration = ""; // The difference between start and end
	$hours = "";
	$mins = "";
	$seconds = 0;
	
	// Calculate duration
	$to_time = strtotime($end);
	$from_time = strtotime($start);
	$duration = round(abs($to_time - $from_time) / 60,2);
	$hours = abs($duration / 60);
	$mins = abs($duration % 60);
	
	$project_query = mysql_query("SELECT project_name FROM project WHERE project_id = '" . $project_id . "'");
	$project_name = mysql_result($project_query, 0);
	
 $location_query = mysql_query("SELECT location FROM project WHERE meeting_id = '" . $meeting_id . "'");
 $location_name = mysql_result($location_query, 0);

 $lat_query = mysql_query("SELECT lat FROM project WHERE meeting_id = '" . $meeting_id . "'");
 $lat_name = mysql_result($lat_query, 0);

 $lng_query = mysql_query("SELECT lon FROM project WHERE meeting_id = '" . $meeting_id . "'");
 $lng_name = mysql_result($lng_query, 0);

 $agenda_name_array = array();
 $agenda_desc_array = array();
 $agenda_duration_array = array();
 
 $member_name_array = array();
 $member_id_array = array();
 
	  // Get agenda variables
 $agenda_query = mysql_query("SELECT * FROM agenda_item WHERE meeting_id = '" . $meeting_id . "'");
 while($agenda_row = mysql_fetch_array($agenda_query)) {
   array_push($agenda_name_array, $agenda_row['name']);
   array_push($agenda_desc_array, $agenda_row['description']);
   array_push($agenda_duration_array, $agenda_row['expected_duration']);
 }
 
	// Insert variables
 while ($meeting_row = mysql_fetch_array($meeting_query)) {
  $description = $meeting_row['description'];
  $meeting_name = $meeting_row['meeting_name'];
  $date = $meeting_row['date'];
  $start = $meeting_row['expect_start'];
  $end = $meeting_row['expect_end'];
  $location = $meeting_row['location'];
  $creator_id = $meeting_row['creator_id'];
  $lat = $meeting_row['lat'];
  $lng = $meeting_row['lon'];
  $meeting_started = $meeting_row['actual_start'];
  $meeting_ended = $meeting_row['actual_end'];
}

	// Get members who are in meeting - ID
$attendance_query = mysql_query("SELECT * FROM attendance WHERE meeting_id = '$meeting_id'");
while ($attendance_row = mysql_fetch_array($attendance_query)) {
  array_push($member_id_array, $attendance_row['user_id']);
  echo $attendance_row['user_id'];
}

	// Get memeber who are in meeting - NAME
for ($i = 0; $i < count($member_id_array); $i++) {
  $name_query = mysql_query("SELECT * FROM user where user_id = '$member_id_array[$i]'");
  while ($name_row = mysql_fetch_array($name_query)) {
   $full_name = $name_row['first'] . " " . $name_row['last'];
   array_push($member_name_array, $full_name);
 }
}

?>
</head>

<body id="top">

  <ul id="gn-menu" class="gn-menu-main" style="z-index:2">
  <h1 class="nav-title"> Menu </h1>
    <li class="gn-trigger">
      <a class="gn-icon gn-icon-menu"><span>Menu</span></a>

      <nav class="gn-menu-wrapper">
        <div class="gn-scroller">
          <ul class="gn-menu"  >
                        <li>
                           <a href="homepage.php" class="gn-icon icon icon-home">Home</a>
                        </li>

                        <li>
                           <a href="project.php" class="gn-icon icon icon-projects">Projects</a>
                        </li>

                        <li>
                           <a href="friends.php" class="gn-icon icon-friends-fix" style="padding-left:27px;">Friends</a>
                        </li>

                        <li>
                           <a href="index.php" class="gn-icon icon icon-logout">LogOut</a>
                        </li>
                    </ul>
        </div><!-- /gn-scroller -->
      </nav>


    </li>

  </ul>
  <div id="container" class="clearfix">


    <!-- First Section -->
    <div class="section bg1 clearfix">
      <!-- /nev -->  
      <div class="content">

        <div class="overlay">

          <div class="overlaycontent">

           <h1><a title="" href="#"><strong> <?php echo $meeting_name; ?></strong></a></h1>
           <h2><strong><?php echo $project_name; ?> </strong></h2>
         </div>
         <div class="fullwidth">
          <div class="main">


           <!-- Countdown Timer -->
           <div id="countdowncont" class="clearfix">
            <ul id="countdown">
              <li>
                <span class="hours">00</span>
                <p>Hours</p>
              </li>
              <li class="clearbox">
                <span class="minutes">00</span>
                <p>Minutes</p>
              </li>
              <li>
                <span class="seconds">00</span>
                <p>Seconds</p>
              </li>
              <?php if($user_id == $creator_id && $meeting_started === NULL) {
               echo "<li>";
               ?>
               <a href='inc/php/startMeeting.php?meeting_id=<?php echo $meeting_id; ?>&project_id=<?php echo $project_id; ?>'><input id='endMeeting' type='button' value='Start Meeting'/></a>
               <?php
               echo "</li>";
             }
             ?>
           </ul>
         </div>
         <hr />
         <!-- Percentage Bar -->
         <h3><strong> Agenda Progress</strong></h3>
         <div class="percentagebar clearfix">
          <ul>
           <li><div class="expand percent"></div></li>
         </ul>
       </div>
       <!-- Agenda Section -->
       <div class="demo">
         <ul>
          <?php for ($i = 0; $i < count($agenda_desc_array); $i++) { ?>
          <li data-title="<?php echo $agenda_name_array[$i] ?>" data-featured="true" class="">
           <p>Duration: <?php echo $agenda_duration_array[$i] ?> mins</p>
           <p><?php echo $agenda_desc_array[$i] ?></p>
         </li>
         <?php } ?>
       </ul>
     </div>
     <?php if($user_id == $creator_id && !empty($meeting_started) && empty($meeting_ended)) {
       ?>
       <a href='inc/php/endMeeting.php?meeting_id=<?php echo $meeting_id; ?>&project_id=<?php echo $project_id; ?>'><input id='endMeeting' type='button' value='End Meeting'/></a>
       <?php
     }
     ?>
     <hr />
     <!-- Meeting Description Section -->
     <h2><strong> Description</strong></h2>
     <p> <?php echo $description; ?> <p>
      <hr />
      <!-- Memeber Section -->
      <h2><strong> Members</strong></h2>
      <ol class="rectangle-list">
        <?php for($i = 0; $i < count($member_name_array); $i++) { ?>
        <li><a href=""><?php echo $member_name_array[$i]; ?></a></li>
        <?php } ?>
      </ol>
      <hr/>
      <h2><strong> Questions</strong></h2>
      <!-- Voting Section -->
      <script>
      var i = 1;
      var createPoll = true;


//Adds and remove new div
$(function() {
  var pollDiv = $('#addPollDiv');
  var u = $('#p_div div').size();

  $(document.body).on('click', '#addPollDiv', function(){
    if (createPoll) {
      var htmlCode = '<h2 id="voteLink"><a id="addScnt">Add Voting Options</a></h2><div id="p_div"><form class="cbp-mc-form" id="test" method="post" action="inc/php/process.php"><p><input type="text" name="q_Title" id="q_title" placeholder="Question Title" size="20"></p><p><label for="p_scnts"><div id="addOpt"><input type="text" id="p_scnt" size="20" name="p_opt[]" value="" placeholder="Option 1" /></label></p></div><input type="hidden" name="m_id" value="<?php echo $meeting_id ?>"><input id="removePoll" class="button" type="submit" value="Submit"></form></input><input id="removePoll" type="button" value="Remove Poll"></input></div>';
      $(htmlCode).hide().appendTo("#createPoll").fadeIn("slow");
            /*$('#test').ajaxForm(function() { 
                alert("Thank you for your comment!"); 
              }); */
  var options = { 
        target:        '#success_div',   // target element(s) to be updated with server response 
        success:       showResponse  // post-submit callback 
      }; 
    // pre-submit callback 

    $('#test').submit(function() { 
    // submit the form 
    $(this).ajaxSubmit(options); 
    // return false to prevent normal browser submit and page navigation 

    return false;
  });

    createPoll = false;
  };
});

$(document.body).on('click', '#removePoll', function(){ 
  $("#p_div").fadeOut(300, function(){ 
    $(this).remove();
  });
  $("#voteLink").fadeOut(300, function(){ 
    $(this).remove();
  });
  i = 2;
  createPoll = true;

});

});

//Adds and remove new option
$(function() {
  i = $('#p_scents p').size() + 2;
  
  $(document.body).on('click', '#addScnt', function(){
    var htmlCode = '<p><label for="p_scnts"><input type="text" id="p_scnt" size="20" name="p_opt[]" value="" placeholder="Option '+i+'" /></input><a id="remScnt"><span class="icon-circle-minus"></span></a></label></p>';
    $(htmlCode).hide().appendTo("#addOpt").fadeIn("slow");
    i++;
  });
  
  $(document.body).on('click', '#remScnt', function(){ 
    if( i > 2 ) {
      $(this).parents('p').fadeOut(200, function(){ 
        $(this).remove();
        i--;
      });
    }

  });
});
function showRequest(formData, jqForm, options) { 
  var queryString = $.param(formData); 
  alert('About to submit: \n\n' + queryString); 
  return true; 
} 

// post-submit callback 
function showResponse(responseText, statusText, xhr, $form)  {
  "<h2>Your poll has been successfull</h2>";
} 
</script>
<div id="createPoll">
  <h2><a id="addPollDiv">Add new poll</a></h2>
</div>
<div id="pollResultsDiv">
</div>
<div id="success_div">
</div>

<?php
$vote_id_array = array();

$vote_question_array = array();

    // Get agenda variables
$vote_query = mysql_query("SELECT * FROM vote WHERE meeting_id = '" . $meeting_id . "'");
while($vote_row = mysql_fetch_array($vote_query)) {
 array_push($vote_id_array, $vote_row['vote_id']);
 array_push($vote_question_array, $vote_row['vote_question']);
}
foreach($vote_id_array as $val) {
  $opt_query = mysql_query("SELECT * FROM answer_options WHERE vote_id = '" . $val . "'");
}

$i = 0;
?>

<?php foreach($vote_id_array as $val) { ?>
<h2><?php echo $vote_question_array[$i] ?></h2>
<div id="voting">

  <?php
  $vote_opt_array = array();
  $opt_query = mysql_query("SELECT * FROM answer_options WHERE vote_id = '" . $val . "'"); 
  while($opt_row = mysql_fetch_array($opt_query)) {
    array_push($vote_opt_array, $opt_row['options']);
  }
  ?>
  <?php for ($u = 0; $u < count($vote_opt_array); $u++) { 
    $vote_count_query = mysql_query("SELECT count FROM answer_options WHERE options = '" . $vote_opt_array[$u] . "'"); 
    $vote_count = mysql_result($vote_count_query, 0);
    $dis_count = $vote_count*50 + 250 . "px";
    ?>
    <div style="width :<?php echo $dis_count; ?>";><span><?php echo $vote_count ?></span><a href="">Vote</a><?php echo $vote_opt_array[$u]; ?></div>
    <?php 
  } 
  ?>
</div>
<?php 
unset($vote_opt_array);
$i++;} ?>

<script>
$("#voting div a").click(function() {
  $(this).parent().animate({
    width: '+=5%'
  }, 500);
  $(this).prev().html(parseInt($(this).prev().html()) + 1);
  return false;
});
</script>
<hr/>
</div>
</div>
</div>
</div>
<!-- Second Section -->
<div class="section bg2 clearfix">
  <div class="content">
    <div class="overlay">
    </div>
    <div class="fullwidth">
      <div class="main">
       <h3>Meeting 1<strong>  Location</strong></h3>
       <p>Location Notes : <?php echo $location; ?></p>
       <div class="goomap">
         <script>
         
         $(document).ready(function() { 
          var t = "<?php echo $end; ?>".split(/[- :]/);
          var d = new Date(t[0], t[1]-1, t[2], t[3], t[4], t[5]);
          var formattedDate = (d.toString()).slice(4, 25);
          $("#countdown").countdown({
            date: formattedDate, /** Enter new date here **/
            format: "on"
          },
          function() {
    // callback function
  });
          $('#googlemap')
    //-27.495126,153.011998
    .gmap3( { action:'init', options:{ center:[<?php echo $lat ?>,<?php echo $lng ?>], zoom: 14, minZoom: 8, maxZoom: 18, mapTypeId: google.maps.MapTypeId.MAP, mapTypeControl: true, navigationControl: true, streetViewControl: true, scrollwheel: true } },
      { action: 'addMarkers',
      markers:[ {lat: <?php echo $lat ?>, lng: <?php echo $lng ?>, data:'<p style="color: black; font-size: 150%; font-weight: bold;"><?php echo $location ?></p>' }],
      marker:{
        options: { draggable: false },
        events:{
          mouseover: function(marker, event, data){
            var map = $(this).gmap3('get'),
            infowindow = $(this).gmap3({action:'get', name:'infowindow'});
            if (infowindow){
              infowindow.open(map, marker);
              infowindow.setContent(data);
            } else {
              $(this).gmap3({action:'addinfowindow', anchor:marker, options:{content: data}});
            }
          },
          mouseout: function(){
            var infowindow = $(this).gmap3({action:'get', name:'infowindow'});
            if (infowindow){
              infowindow.close();
            }
          }
        }
      }
    }
    );
},"autofit" );
</script>
<div id="googlemap" class="gmap3"></div>
</div>
</div>
</div>
</div>
</div>
<!-- Footer -->
<div class="footercont clearfix">
  <div class="footer clearfix">
   <div id="footerright">
    <p><a id="backtotop" title="" href="#top">Back to Top ^</a></p>
  </div>
  <div id="footerleft">
    <!-- Social Media -->
    <div id="socialmedia" class="clearfix">
    </div>
  </div>
</div>
</div>

</div>

<!-- /nev -->
<script src="js/google-classie.js"></script>
<script src="js/google-gnmenu.js"></script>
<script>
new gnMenu( document.getElementById( 'gn-menu' ) );
</script>
</body>
</html>