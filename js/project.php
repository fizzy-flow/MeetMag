<!DOCTYPE html>

<?php
include_once 'inc/php/config.php';

$results = mysql_query("SELECT * FROM project");
$row_count = mysql_num_rows($results);

echo $row_count;

while ($row_users = mysql_fetch_array($results)) {
    //output a row here
    echo $row_users['project_name'];
}

echo "BLA BLA BLA";

?>


<html ng-app="test">


	<head>
			<link rel="stylesheet" href="css/style.css">
	<!-- /nev -->
		    <meta name="author" content="Codrops" />
		    <link rel="shortcut icon" href="../favicon.ico">
		    <link rel="stylesheet" type="text/css" href="css/google-normalize.css" />
		    <link rel="stylesheet" type="text/css" href="css/google-style.css" />
		    <link rel="stylesheet" type="text/css" href="css/google-component.css" />
		    <link rel="stylesheet" type="text/css" href="css/menustyle.css" />
		    <script src="js/google-modernizr.custom.js"></script>
	<!-- friends tbas -->
		    <meta name="viewport" content="width=device-width, initial-scale=1">
		    <link rel="stylesheet" href="css/friends-jquery.mobile-1.4.2.css">
		    <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
		    <script src="js/friends-jquery.mobile-1.4.2.js"></script>
	<!--  Project page tabs-->
			<script src="js/project-angular.min.js"></script>
			<script src="js/Project-Pitch.js"></script>
			<script src="js/ui-bootstrap-0.11.0.min.js"></script>
			<link rel="stylesheet" href="css/style.css">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	</head>


<body ng-controller="testCtrl" style="background:#74818e">
<!-- project tabs-->
      <div data-role="page" data-theme="b">


		<div data-role="main" class="ui-content" style="margin-top:50px">
              <ul data-role="listview" data-inset="true">

                    <li data-role="list-divider">Projects 
                        <span class="ui-li-count"> 6 </span>
                    </li> 

                    <li style="margin-left:10px; margin-right:10px; margin-top:5px">   
                      <h2>Faisal Al Siddiqi</h2>
                      <p>Faisal wants to participate the meeting with the client</p>
								<button type="button" style="width:50px; display: inline-block; float:right">S</button>
								<button type="button" style="width:50px; display: inline-block; float:right">E</button>
								<button type="button" style="width:50px;display: inline-block; float:right">D</button>
								
                      <p class="ui-li-aside">10:00 pm</p>
                    </li>
                    <li style="margin-left:10px; margin-right:10px; margin-top:5px">   
                      <h2>Roland du Toit</h2>
                      <p>Roland is negotiating with the client</p>
								<button type="button" style="width:50px; display: inline-block; float:right">S</button>
								<button type="button" style="width:50px; display: inline-block; float:right">E</button>
								<button type="button" style="width:50px;display: inline-block; float:right">D</button>
								
                      <p class="ui-li-aside">10:00 pm</p>
                    </li>


              	  <li style="margin-left:10px; margin-right:10px; margin-top:5px"> 
                      <h2>Gary Foo Ming Rui</h2>
                      <p>Gary has decided to change his name into Gary because he felt it's a cool name </p>
								<button type="button" style="width:50px; display: inline-block; float:right">S</button>
								<button type="button" style="width:50px; display: inline-block; float:right">E</button>
								<button type="button" style="width:50px;display: inline-block; float:right">D</button>
                      <p class="ui-li-aside">9:55 am</p>
                    </li>

                    <li style="margin-left:10px; margin-right:10px; margin-top:5px"> 
                      <h2>Aditya Rahardi</h2>
                      <p>Aditya has developed unknown super power</p>
								<button type="button" style="width:50px; display: inline-block; float:right">S</button>
								<button type="button" style="width:50px; display: inline-block; float:right">E</button>
								<button type="button" style="width:50px;display: inline-block; float:right">D</button>
                      <p class="ui-li-aside">15:10 am</p>
                    </li>

                    <li style="margin-left:10px; margin-right:10px; margin-top:5px">
                      <h2>Tengzheng Wang</h2>
                      <p>Tengzheng hold a discussion group with the team </p>
								<button type="button" style="width:50px; display: inline-block; float:right">S</button>
								<button type="button" style="width:50px; display: inline-block; float:right">E</button>
								<button type="button" style="width:50px;display: inline-block; float:right">D</button>
                      <p class="ui-li-aside">16:15 am</p>
                    </li>
              	  
                  <li style="margin-left:10px; margin-right:10px; margin-top:5px">
                      <h2>Juntian Tao</h2>
                      <p>Juntian writes a note</p>
								<button type="button" style="width:50px; display: inline-block; float:right">S</button>
								<button type="button" style="width:50px; display: inline-block; float:right">E</button>
								<button type="button" style="width:50px;display: inline-block; float:right">D</button>
                      <p class="ui-li-aside">12:30 am</p>
                    </li>
              </ul>
          </div>


      </div> 

		<div id="container">

		    <div class="navigation">

		        <ul id="gn-menu" class="gn-menu-main">
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
													<a href= "Homepage.html"> <img src="img/homeicon.png"/>Home</a>
												</li>
												<li>
													<a href= "Project.html"> <img src="img/projectsicon.png"/>Projects</a>
												</li>
												<li>
													<a href="Friends.html"> <img src="img/friendsicon.png"/>Friends</a>
												</li>
												<li><a href"Settings.html" class="gn-icon gn-icon-cog">Settings</a></li>
											</ul>
		                      </div>
<!-- /gn-scroller -->
		                  </nav>
		            </li>
		        </ul>
		    </div> <!-- NAV DIV -->

		</div> <!-- CONTIANER DIV-->

<!-- /nev -->
		    <script src="js/google-classie.js"></script>
		    <script src="js/google-gnmenu.js"></script>
		    <script>
		      new gnMenu( document.getElementById( 'gn-menu' ) );
		    </script>


</body>
</html>