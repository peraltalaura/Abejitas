<!DOCTYPE html>
<html>
<head>		
	<title>Bookings</title>
	<link rel="preconnect" href="https://fonts.gstatic.com"><link>
	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=Lato&display=swap" rel="stylesheet">
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

	<!--link for jqueryui custom-->
	<link rel="stylesheet" href="jquery/jquery-ui.min.css">
	<script src="jquery/external/jquery/jquery.js"></script>
	<script src="jquery/jquery-ui.min.js"></script>
	<!--<Link rel="stylesheet" href="CSS.css">-->
	<Link rel="stylesheet" href="css/index_CSS.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
			
			$(function () {
				$(".datepicker").datepicker();
			});
		</script>
		<style>
			h1 {
				font-family: 'Dancing Script', cursive;
			}
			body {
				font-family: 'Lato', sans-serif;
			}
		</style>	
	</head>
	<body>
		<ul class="sidenav">
			<li>
				<h1 class="Center">ERLETE</h1>
			</li>
			<li>
				<a class="Center" href="index.php">HOME</a>
			</li>
			<li>
				<a class="Center" href="info.php">INFORMATION</a>
			</li>
			<li>
				<a class="Center" href="forum.php">FORUM</a>
			</li>
			<li>
				<a class="Center" href="bookings.php">BOOKINGS</a>
			</li>
			<?php
			session_start();
			if(isset($_SESSION['memberID'])){
				?>
				<li>
					<a class="Center" href="profile.php?account=prof">MY ACCOUNT</a>
				</li>
				<?php
			} else {
				?>
				<li>
					<a class="Center" href="login.php">MY ACCOUNT</a>
				</li>
				<?php
			}
			?>
			<?php
			if(isset($_SESSION['memberID'])){
				?>
				<li>
					<a class="Center" href="close_session.php">LOGOUT</a>
				</li>
				<?php
			} else {
				?>
				<li>
					<a class="Center" href="login.php">LOGIN</a>
				</li>
				<?php
			}
			?>	
		</ul>


		<div class="content Center">
			<h1>BOOK OUR EXTRACTOR</h1>
			<h2 class="Center mt-4">CONSULT THE AVAILABILITY OF OUR METAL BINS</h2>
			<br>
			<?php		
			include("test_connect_db.php");
			$link=connectDataBase();
			$result=mysqli_query($link,"SELECT * FROM metalbin");
			?>
			<div class="table-responsive">
				<table class="table table-hover Center text-light">
					<tr style='background-color: rgb(0, 0, 0,0.8);'>
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
			<h2 class="Center mt-4">CONSULT THE AVAILABILITY OF OUR EXTRACTOR</h2>
			<div id='calendar'></div>

			<form class="form-group mt-4 content Center" action="book.php" method="post">
				<H2>BOOK THE EXTRACTOR</H2>
				<div class="columns">
				<div class="RB">
					<label>Select entry date:</label>
						<input class="datepicker" id="from" type="text" required="required" name="entry" autocomplete="off">
					</div>
					<div class="RB">
					<label>Select exit date:
					</label>
					
						<input class="datepicker" id="to" type="text" required="required" name="exit" autocomplete="off">
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
	</body>
	</html>									
