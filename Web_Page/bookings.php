<!DOCTYPE html>
<html>
<head>		
	<title>Bookings</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--links of google fonts-->
	<link rel="preconnect" href="https://fonts.gstatic.com"><link>
	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=Lato&display=swap" rel="stylesheet">
	<!--changes the icon of the page-->
	<link rel="icon"  type="image/jpg" href="images/bee-icon.jpg">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	
	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Full Calendar links -->
	<link href='fullcalendar/main.css' rel='stylesheet'/>
	<script src='fullcalendar/main.js'></script>

	<!--link for jquery ui custom-->
	<link rel="stylesheet" href="jquery/jquery-ui.min.css">
	<script src="jquery/external/jquery/jquery.js"></script>
	<script src="jquery/jquery-ui.min.js"></script>
	
	<Link rel="stylesheet" href="css/index_CSS.css">
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			var calendarEl = document.getElementById('calendar');
			var calendar = new FullCalendar.Calendar(calendarEl, {
				initialView: 'dayGridMonth',
				events: 'events.php',
			});
			calendar.render();
		});
	</script>
	<script>
		$.datepicker.regional[ "eng" ] = {
			closeText: "Done",
			prevText: "Prev",
			nextText: "Next",
			currentText: "Today",
			monthNames: [ "January","February","March","April","May","June",
			"July","August","September","October","November","December" ],
			monthNamesShort: [ "Jan", "Feb", "Mar", "Apr", "May", "Jun",
			"Jul", "Aug", "Sep", "Oct", "Nov", "Dec" ],
			dayNames: [ "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday" ],
			dayNamesShort: [ "Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat" ],
			dayNamesMin: [ "Su","Mo","Tu","We","Th","Fr","Sa" ],
			weekHeader: "Wk",
			dateFormat: "yy-mm-dd",
			firstDay: 1,
			isRTL: false,
			showMonthAfterYear: false,
			minDate: new Date(),
			yearSuffix: "" };
			
			$.datepicker.setDefaults($.datepicker.regional['eng']);
			
			$(function() {
				$(".datepicker").datepicker();
			});
		</script>
		
		
		<style>
			/*Style for the fonts used in the page*/
			h1 {
				font-family: 'Dancing Script', cursive;
			}
			body {
				font-family: 'Lato', sans-serif;
			}
		</style>	
	</head>
	<body>
		<h1 class="Center erlete">ERLETE</h1>
		<!--menu of the web page that is explaned in the other pages of the web page-->
		<ul class="sidenav">
			<li>
				<a class="Center" href="index.php">HOME</a>
			</li>
			<li>
				<a class="Center" href="info.php">INFORMATION</a>
			</li>
			<li>
				<a class="Center" href="forum.php">FORUM</a>
			</li>
			<!--it starts the session and changes the links depending if the user is logged in or not for the bookings page-->
			<?php
			session_start();
			/*Global variable where the member id is saved to do the querys*/
			if(isset($_SESSION['memberID'])){
				?>
				<li>
					<!-- The link of BOOKINGS redirects the user to the bookings.php page-->
					<a class="Center active" href="bookings.php">BOOKINGS</a>
				</li>
				<?php
			} else {
				?>
				<li>
					<!-- The link redirects the user to the login.php page-->
					<a class="Center" href="login.php">BOOKINGS</a>
				</li>
				<?php
			}
			?>
			<!--it starts the session and changes the links depending if the user is logged in or not for the profile page-->
			<?php
			if(isset($_SESSION['memberID'])){
				?>
				<li>
					<!-- The link of MY ACCOUNT redirects the user to the profile.php page in the profile section-->
					<a class="Center" href="profile.php?account=prof">MY ACCOUNT</a>
				</li>
				<?php
			} else {
				?>
				<li>
					<!-- The link redirects the user to the login.php page-->
					<a class="Center" href="login.php">MY ACCOUNT</a>
				</li>
				<?php
			}
			?>
			<!--it starts the session and changes the links depending if the user is logged in or not-->
			<?php
			if(isset($_SESSION['memberID'])){
				?>
				<!--If the user is logged in it redirects the user to the close_session.php to log out-->
				<li class="nav-item flex-fill">
					<a class="nav-link Center" href="close_session.php">LOGOUT</a>
				</li>
				<?php
			} else {
				?>
				<!--If the user isn't logged it redirects the user to the login.php-->
				<li class="nav-item flex-fill">
					<a class="nav-link Center" href="login.php">LOGIN</a>
				</li>
				<?php
			}
			?>	
		</ul>
		<!--End of menu web page-->
		<!--The content of the web page-->
		<div class="content Center addMargin">
			<h1>Book our extractor</h1>
			<h2 class="Center mt-4 mb-4">Check if our metalbins are available</h2>
			<br>
			<!--The php code is used to make a query and extract the information about the metalbins, the capacity and when they will be available, and display it in a table-->
			<?php		
			include("test_connect_db.php");
			$link=connectDataBase();
			$result=mysqli_query($link,"SELECT * FROM metalbin");
			?>
			<div class="table-responsive">
				<table class="table Center text-light">
					<tr style='background-color: rgb(0, 0, 0,0.8);margin:1em'>
						<th>METAL BIN</th>
						<th>CAPACITY</th>
						<th>AVAILABILITY</th>
						<th>DATE AVAILABLE</th>
					</tr>
					<?php
					while($data=mysqli_fetch_array($result)){
						if($data[2]==1){
							printf("<tr style='background-color: rgb(0, 0, 0,0.8);'><td>%d</td><td>%d KG</td><td>available</td><td>NOW</td></tr>",$data[0],$data[1]);
						} else {
							printf("<tr style='background-color: rgb(0, 0, 0,0.8);'><td>%d</td><td>%d KG</td><td>occupied</td><td>%s</td></tr>",$data[0],$data[1],$data[3]);
						}
					}
					?>
				</table>
			</div>
			<h2 class="Center mt-4 mb-4">Check if your date is available</h2>
			<!--Displays the fullcalendar with the dates that are booked and it shows which member has booked them-->
			<div id='calendar'></div>
			<!--Form to book the extractor which asks for the entry and exit date. Then sends the form to the book.php file, which makes the according checks-->
			<a id="bookExt" class="BRB">Book the extractor</a>
			<form  id="bookForm" class="form-group mt-4 content" action="book.php" method="post" style="display:none">
				<div class="columns">
					<div class="RB">
						<label>Select entry date:
							<input class="datepicker" id="from" type="text" required="required" name="entry" autocomplete="off"></label>
						</div>
						<div class="RB">
							<label>Select exit date:
								<input class="datepicker" id="to" type="text" required="required" name="exit" autocomplete="off"></label>
							</div>
						</div>
						<BR>
						<div class="Center">
							<input class="BRB" type="submit" value="BOOK">
						</div>
					</form>
					
				</div>
				<div class="p-4">
					<address></address>
				</div>
				<script>
					/*Function to show or hide the sidenav when the mouse is clicked*/
					$('.erlete').click(function(){
						$(".sidenav").toggle("900");
						$(".erlete").toggleClass("fullW",500);
						$(".content").toggleClass("addMargin",500);
					});
				</script>
				<script>
					/*Function to show or hide the sidenav when the mouse is clicked*/
					$('#bookExt').click(function(){
						$("#bookForm").toggle("1000");
					});
				</script>
			</body>
			</html>									
