<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"><![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"><![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"><![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"><!--<![endif]-->
<head>
    <!-- Website Template designed by www.downloadwebsitetemplates.co.uk -->




    <meta charset="UTF-8">
    <title>MeetMag - Home</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="shortcut icon" href="images/meetmagicon/meetmagicon-32(2).png">
    <link rel="stylesheet" href="css/astyle.css" media="screen" type="text/css" />
    <!--[if IE]><![endif]-->
    <link rel="stylesheet" href="css/gravity-style.css">
    <script src="js/jquery.min.js"></script>

    <!--ATTENTION ROLAND : THIS IS THE JAVASCRIPT FOR DYNAMIC BUTTONS-->
    <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->



    <!-- create meeting -->
<!--     <link rel="stylesheet" type="text/css" href="css/createmeeting-default.css" />
    <link rel="stylesheet" type="text/css" href="css/createmeeting-component.css" /> -->
    <link rel="stylesheet" type="text/css" href="css/createmeeting.css" />
    <link rel="stylesheet" href="feather-webfont/feather.css">
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
    <script type="text/javascript" src="js/gmap3.js"></script>
    <script type="text/javascript" src="js/jquery-autocomplete.js"></script>
    <link rel="stylesheet" type="text/css" href="css/jquery-autocomplete.css"/>
    <body id="top">


<?php 
session_start();
if (!isset($_SESSION['email'])){
    header('Location:index.php');
}
      include_once 'inc/php/config.php';
	  include_once 'inc/php/db_functions.php';

      
      $project_id = $_GET['project_id'];
      $meeting_id = $_GET['meeting_id'];
	  $user_id = getUserID();
      
      $meeting_name = "";
      $meeting_description = "";
      $meeting_location = "";
      $meeting_start_time = "";
      $meeting_end_time = "";
      $meeting_date = "";
	  
	  $agenda_title_array = array();
	  $agenda_des_array = array();
	  $agenda_dura_array = array();
	  
	  $friend_name = array();
	  $friend_id = array();
	  
	  // Get all friends that belong to user-scalable
	  	// Get all friend_id's that belong to us
	  $friend_query = mysql_query("SELECT * from friend WHERE user_id = '" . $user_id . "'");
	  while($friend_row = mysql_fetch_array($friend_query)) {
		  array_push($friend_id, $friend_row['friend_id']);
			// Get the friends names belonging to all those ids
		  $friend_name_query = mysql_query("SELECT * from user WHERE user_id = '" . $friend_row['friend_id'] . "'");
		  while($friend_name_row = mysql_fetch_array($friend_name_query)) {
			 $full_name = $friend_name_row['first'] . " " . $friend_name_row['last'];
			 array_push($friend_name, $full_name);
		 }
	 }
	 
      if (isset($_GET['meeting_id'])) {
		//Get name
		// Get description
		// Get date
		// Get start time
		// Get end time
		// Get location
          $meeting_query = mysql_query("SELECT * from meeting WHERE meeting_id = '" . $meeting_id . "'");
          while ($meeting_row = mysql_fetch_array($meeting_query)) {
           $meeting_name = $meeting_row['meeting_name'];
           $meeting_description = $meeting_row['description'];
           $meeting_location = $meeting_row['location'];
           $meeting_start_time = $meeting_row['expect_start'];
           $meeting_end_time = $meeting_row['expect_end'];
           $meeting_date = $meeting_row['date'];
       }
	   
		// Get agendas
		  $agenda_query = mysql_query("SELECT * FROM agenda_item WHERE meeting_id = '" . $meeting_id . "'");
			while ($agenda_row = mysql_fetch_array($agenda_query)) {
				array_push($agenda_title_array, $agenda_row['name']);
				array_push($agenda_des_array, $agenda_row['description']);	  
				array_push($agenda_dura_array, $agenda_row['expected_duration']);			
		   }
   }
   ?>


   <div id="container" class="clearfix">


    <!-- First Section -->
    <div class="section bg1 clearfix">
        <!-- /nev -->   

        
        

        <div class="content">

            <div class="overlay">

                <div class="overlaycontent">

                 <h1 style="text-align:center"><img class="logo" src="img/originals/nav-logo.png"><a title="" href="#"></a></h1>
                 <h2 style="text-align:center">Meeting <strong>- Management</strong></h2>
                 


             </div>

             <div class="fullwidth">
                <div class="main" style="margin:0; width:100%; height:100% padding:0px 0; ">


                </div>
                <div class="main" ng-app="memberssss" style="width: 100%; max-width: 100%; padding: 0px 0; padding-bottom:5%;">
                    <form id="mainForm" action="/inc/php/insert_meeting.php?project_id=<?php echo $project_id; ?>" method="POST" class="cbp-mc-form">
                        <div class="cbp-mc-column" ng-controller="numMembers">
                         
                          <!-- DISPLAY PROJECT TITLE HERE -->
                          
                          <label for="last_name">Name of Meeting</label>
                          <input type="text" id="meeting_name" name="meeting_name" />
                          <label for="last_name">Meeting Description</label>
                          <input type="text" id="meeting_description" name="meeting_description" />
                          <div id="membersDiv">
                            <label for="member1">Members <a id="addMember"><span class="icon-plus"></span></a></label>
							<select name="member[member1]">
								<?php for ($i = 0; $i < count($friend_name); $i++) { ?>
									<option value="<?php echo $friend_id[$i]; ?>"><?php echo $friend_name[$i]; ?></option>
								<?php } ?>
							</select>
                        </div>
                        <div id="agendasDiv">
                            <label> Agendas<a id="addAgendaSec"><span class="icon-plus"></span></a></label>
                            <label for="agendas1"></label>
                            <input type="text" placeholder="Agenda Title" name="agendaTitle[agendaTitle1]"></input>
                            <input type="text" placeholder="Agenda Description" name="agendaDesc[agendaDesc1]"></input>
                            <input type="number" placeholder="Agenda Time (Mins)" name="agendaTime[agendaTime1]" min=0 max=59></input>
                        </label>
                    </div>
                </div>
                <div class="cbp-mc-column">
                    <label for="date">Date</label>
                    <input type="date" id="phone" name="date">
                    <label>Duration</label>
                    <label>Start time</label>
                    <input type="time" id="starttime" name="start_time">
                    <label>End time</label>
                    <input type="time" id="endtime" name="end_time">
                </div>
                <div class="cbp-mc-column">
                    <label for="address">Location</label>
                    <input type="text" id="address" name="location" size="60">
                    <div id="test" class="gmap3"></div>
                    <input id="lat" type="hidden" name="hiddenLat">
                    <input id="lng" type="hidden" name="hiddenLng">
                    <style>

                    .gmap3{
                        margin: 20px auto;
                        border: 1px dashed #C0C0C0;
                        width: 100%;
                        height: 300px;
                    }
                    </style>
                    <script type="text/javascript">
                    $(function(){
                        
                        $("#test").gmap3();
                        
                        $("#address").autocomplete({
                            source: function() {
                                $("#test").gmap3({
                                    getaddress: {
                                        address: $(this).val(),
                                        callback: function(results){
                                            if (!results) return;
                                            $("#address").autocomplete("display", results, false);
                                        }
                                    }
                                });
                            },
                            cb:{
                                cast: function(item){
                                    return item.formatted_address;
                                },
                                select: function(item) {
                                    document.getElementById("lat").value=item.geometry.location.lat();
                                    document.getElementById("lng").value=item.geometry.location.lng();
                                    $("#test").gmap3({
                                        clear: "marker",
                                        marker: {
                                            latLng: item.geometry.location
                                        },
                                        map:{
                                            options: {
                                                center: item.geometry.location,
                                                zoom : 15
                                            }
                                        }
                                    });
                                }
                            }
                        })
.focus();

});
</script>
</div>
<div class="cbp-mc-submit-wrap"><input class="cbp-mc-submit" id="createbutton" type="submit" value="Create meeting"></div>
</form>
</div>
</div>
</div>
</div>
</div>

<script type="text/javascript">
function postVar()
{
  
}
function populateFields() {

	<?php
		$temp_start = explode(" ", $meeting_start_time);
		$meeting_start_time = $temp_start[1];
		$temp_end = explode(" ", $meeting_end_time);
		$meeting_end_time = $temp_end[1];
	?>
  $('#meeting_name').val("<?php echo $meeting_name; ?>");
  $('#meeting_description').val("<?php echo $meeting_description; ?>");
  $('#phone').val("<?php echo $meeting_date; ?>");
  $('#starttime').val("<?php echo $meeting_start_time; ?>");
  $('#endtime').val("<?php echo $meeting_end_time; ?>");
  $('#address').val("<?php echo $meeting_location; ?>");
  $('#createbutton').val("Edit Meeting");
  
  var action = "/inc/php/insert_meeting.php?project_id=<?php echo $project_id; ?>&meeting_id=<?php echo $meeting_id; ?>";
  $('#mainForm').attr('action', action);
}
</script>

<script>
var i = 1;
var u = 1;
//Adds and remove new div
$(function() {

        u = $('#p_agendas p').size() + 2;

        $(document.body).on('click', '#addAgendaSec', function(){

                        var htmlCode = '<p><label for="p_agendas"> \
						<input type="text" id="AgendaTitle'+u+'" name="agendaTitle[agendaTitle'+u+']" placeholder="Agenda Title '+u+'"></input> \
						<input type="text" id="AgendaDescp'+u+'" name="agendaDesc[agendaDesc'+u+']" placeholder="Agenda Description '+u+'" > \
						<input type="number" placeholder="Agenda Time (Mins)" name="agendaTime[agendaTime'+u+']" min=0 max=59></input> \
						</input></label><a id="removeAgendaSec"> \
						<span class="icon-minus"></span></a></p>';
                        $(htmlCode).hide().appendTo('#agendasDiv').fadeIn("slow");
                        u++;
        });
        
        $(document.body).on('click', '#removeAgendaSec', function(){ 
                if( u > 2 ) {
                        $(this).parents('p').fadeOut(200, function(){ 
                                $(this).remove();
                                u--;
                        });
                }
        });

});



//Adds and remove new option
$(function() {
        i = $('#p_members p').size() + 2;
		
		<?php 
			include_once 'inc/php/config.php';
			include_once 'inc/php/db_functions.php';
		
		?>
        
        $(document.body).on('click', '#addMember', function(){
            console.log ( '#someButton was clicked' );
                var htmlCode = '<p><label for="p_members"> \
				<select name="member[member'+i+']"> \
				<?php for ($i = 0; $i < count($friend_name); $i++) { ?><option value="<?php echo $friend_id[$i]; ?>"><?php echo $friend_name[$i]; ?></option><?php } ?> \
				</select> \
				<a id="remoMember"><span class="icon-minus"> \
				</span></a></p>';
                $(htmlCode).hide().appendTo("#membersDiv").fadeIn("slow");
                i++;
        });
        
        $(document.body).on('click', '#remoMember', function(){ 
                if( i > 2 ) {
                        $(this).parents('p').fadeOut(200, function(){ 
                                $(this).remove();
                                i--;
                        });
                }

        });
});

</script>

<?php 
if (isset($_GET['meeting_id'])) {
  echo '<script type="text/javascript"> populateFields(); </script>';
  
}
?>




</body>
</html>