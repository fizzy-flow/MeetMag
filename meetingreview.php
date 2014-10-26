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
  <script src="js/jquery.min.js"></script>
  <script src="js/reviewindex.js"></script>
  <script src="js/waypoints.min.js"></script>
  <script src="js/countdown.js"></script>
  <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
  <script src="js/gmap.js"></script>
  <script src="js/scripts.js"></script>
  <script src="js/createPoll.js"></script>
  <link rel="stylesheet" href="feather-webfont/feather.css">
  <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
  <!-- /nev -->
  <meta name="author" content="Codrops" />
  <link rel="shortcut icon" href="../favicon.ico">
  <link rel="stylesheet" type="text/css" href="css/google-normalize.css" />
  <link rel="stylesheet" type="text/css" href="css/google-style.css" />
  <link rel="stylesheet" type="text/css" href="css/google-component.css" />
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
  $project_id = $_GET['project'];
  
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
  $project_name = "";
	$duration = ""; // The difference between start and end
	$hours = "";
	$mins = "";
	$seconds = 0;
	
	$project_query = mysql_query("SELECT project_name FROM project WHERE project_id = '" . $project_id . "'");
	$project_name = mysql_result($project_query, 0);
	
	// Insert variables
	while ($meeting_row = mysql_fetch_array($meeting_query)) {
		$description = $meeting_row['description'];
		$meeting_name = $meeting_row['meeting_name'];
		$date = $meeting_row['date'];
		$start = $meeting_row['expect_start'];
		$end = $meeting_row['expect_end'];
		$location = $meeting_row['location'];
	}
	
	// Calculate duration
	$to_time = strtotime($end);
	$from_time = strtotime($start);
	$duration = round(abs($to_time - $from_time) / 60,2);
	
	$hours = abs($duration / 60);
	$mins = abs($duration % 60);

  ?>
  
</head>

<body id="top">

  <ul id="gn-menu" class="gn-menu-main" style="z-index:2">

    <li class="gn-trigger">
      <a class="gn-icon gn-icon-menu"><span>Menu</span></a>

      <nav class="gn-menu-wrapper">
        <div class="gn-scroller">
          <ul class="gn-menu">
            <li class="gn-search-item">
              <input placeholder="Search" type="search" class="gn-search">
              <a class="gn-icon gn-icon-search"><span>Search</span></a>
            </li>
            <!-- <li><a class="gn-icon gn-icon-cog">Home</a></li> (just incase)--> 
            <li>
              <a href= "homepage.php"> <img src="img/homeicon.png"/>Home</a>
            </li>

            <li>
              <a href= "project.php"> <img src="img/projectsicon.png"/>Projects</a>
            </li>

            <li>
              <a href="friends.php"> <img src="img/friendsicon.png"/>Friends</a>
            </li>

            <li><a href="settings.php" class="gn-icon gn-icon-cog">Settings</a>
            </li>

            <li>
              <a href="index.php"> <img src="img/logout.png"/>LogOut</a>
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

           <h1><strong> <?php echo $meeting_name; ?></strong> Review</h1>
           <h2><strong><?php echo $project_name; ?> </strong></h2>
         </div>
         <div class="fullwidth">
          <div class="main">
            <!-- Meeting Date -->
            <div id="countdowncont" class="clearfix">
              <h2>Meeting<strong> Date</strong></h2>
              <ul id="timer">
                <li class="clearbox">
                  <span>24 Sept 2014</span>
                </li>
              </ul>
            </div>
            <hr/>
            <!-- Meeting Description Section -->
            <h2>Meeting<strong> Description</strong></h2>
            <p> <?php echo $description; ?> <p>
              <hr />
              <!-- Percentage Bar -->
              <h3>Meeting<strong> Completion</strong></h3>
              <div class="percentagebar clearfix">
                <ul>
                 <li><div class="expand percent"></div></li>
               </ul>
             </div>
             <hr />
             <!-- Meeting Review Section -->
             <h2>Meeting<strong> Time Statistics</strong></h2>
             <p>Expected Start Time</p>
             <div id="countdowncont" class="clearfix">
              <ul id="countdown">
                <li>
                  <span>00</span>
                  <p>Hours</p>
                </li>
                <li class="clearbox">
                  <span>00</span>
                  <p>Minutes</p>
                </li>
                <li>
                  <span>00</span>
                  <p>Seconds</p>
                </li>
              </ul>
            </div>
            <p>Expected End Time</p>
             <div id="countdowncont" class="clearfix">
              <ul id="countdown">
                <li>
                  <span>00</span>
                  <p>Hours</p>
                </li>
                <li class="clearbox">
                  <span>00</span>
                  <p>Minutes</p>
                </li>
                <li>
                  <span>00</span>
                  <p>Seconds</p>
                </li>
              </ul>
            </div>
            <hr />
            <p>Actual Start Time</p>
             <div id="countdowncont" class="clearfix">
              <ul id="countdown">
                <li>
                  <span>00</span>
                  <p>Hours</p>
                </li>
                <li class="clearbox">
                  <span>00</span>
                  <p>Minutes</p>
                </li>
                <li>
                  <span>00</span>
                  <p>Seconds</p>
                </li>
              </ul>
            </div>
            <p>Actual End Time</p>
             <div id="countdowncont" class="clearfix">
              <ul id="countdown">
                <li>
                  <span>00</span>
                  <p>Hours</p>
                </li>
                <li class="clearbox">
                  <span>00</span>
                  <p>Minutes</p>
                </li>
                <li>
                  <span>00</span>
                  <p>Seconds</p>
                </li>
              </ul>
            </div>
            <hr />
            <!-- Memeber Section -->
            <h2>Members<strong> Attended</strong></h2>
            <ol class="rectangle-list">
              <li><a href="">Member #1</a></li>
              <li><a href="">Member #2</a></li>
              <li><a href="">Member #3</a></li>
              <li><a href="">Member #4</a></li>
              <li><a href="">Member #5</a></li>                       
            </ol>
            <hr/>
            <h2><strong> Questions</strong></h2>
            <!-- Voting Section -->
            <div id="createPoll">
              <h2><a id="addPollDiv">Add new poll</a></h2>
            </div>
            <div id="pollResultsDiv">
            </div>
            <h2>What is your favorite server side language?</h2>
            <div id="voting">

              <div><span>0</span> PHP</div>
              <div><span>0</span> Ruby</div>
              <div><span>0</span> Java</div>
              <div><span>0</span> ASP</div>
              <div><span>0</span> Perl</div>
            </div>
            <hr/>
          </div>
        </div>
      </div>
    </div>
    <!-- Agenda Section -->
    <div class="demo">
      <ul>
        <li data-title="Agenda 1" data-featured="true" class="">
          <p>Discuss issues with Product A</p>
        </li>
        <li data-title="Agenda 2">
          <p>Discuss Implementation of Agenda 2
          </p>
        </li>
        <li data-title="Agenda 3">
          <p>Discuss distribution of Products A</p>
        </li>
        <li data-title="Agenda 4">
          <p>Discuss employee benefits; Buying everyone cronuts on employee day</p>
        </li>
      </ul>
    </div>
    <!-- Second Section -->
    <div class="section bg2 clearfix">
      <div class="content">
        <div class="overlay">
          <div class="overlaycontent">
           <h3>"May the odds ever be in our favor"</h3>
         </div>
       </div>
       <div class="fullwidth">
        <div class="main">
         <h3>Meeting 1<strong>  Location</strong></h3>
         <p>Location Notes : </p>
         <div class="goomap">
          <script>

          $(document).ready(function() { 
            $('#googlemap')
    //-27.495126,153.011998
    .gmap3( { action:'init', options:{ center:[-27.495126,153.011998], zoom: 14, minZoom: 8, maxZoom: 18, mapTypeId: google.maps.MapTypeId.MAP, mapTypeControl: true, navigationControl: true, streetViewControl: true, scrollwheel: true } },
      { action: 'addMarkers',
      markers:[ {lat: -27.495126, lng: 153.011998, data:'University of Queensland' }],
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