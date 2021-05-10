<!DOCTYPE html>
<html>
	<head>
		
		<title>Bookings</title>
		<link rel="preconnect" href="https://fonts.gstatic.com"><link>
		<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap" rel="stylesheet"></link>
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
		<!--<Link rel="stylesheet" href="CSS.css">-->

		<!-- Full Calendar links -->
		<link href='fullcalendar/main.css' rel='stylesheet' />
	    <script src='fullcalendar/main.js'></script>
	    <script>

	      document.addEventListener('DOMContentLoaded', function() {
	        var calendarEl = document.getElementById('calendar');
	        var calendar = new FullCalendar.Calendar(calendarEl, {
	          initialView: 'dayGridMonth'
	        });
	        calendar.render();
	      });
	    </script>

			<style>
				body {
				font-family: 'Dancing Script', cursive;
				}
			</style>

		</style>
	</head>
	<body class="bg-dark">
		<div class="bg-dark Center">
			<h1 class="text-warning">ERLETE</h1>
		</div>
		<nav class="navbar navbar-expand-sm bg-dark sticky-top p-4">
			<ul class="navbar-nav nav-pills flex-fill">
				<li class="nav-item flex-fill">
					<a class="nav-link dropdown-toggle text-center" href="index.php" data-toggle="dropdown">HOME</a>
					<div class="dropdown-menu bg-dark">
						<a class="dropdown-item text-warning" href="index.php#">Purpose</a>
						<a class="dropdown-item text-warning" href="index.php#">How does it work?</a>
						<a class="dropdown-item text-warning" href="index.php#">Rules</a>
						<a class="dropdown-item text-warning" href="index.php#">How to become a member</a>
						<a class="dropdown-item text-warning" href="index.php#">Contact us</a>
					</div>
				</li>
				<li class="nav-item flex-fill">
					<a class="nav-link dropdown-toggle text-center" href="info.php">INFORMATION</a>
				</li>
				<li class="nav-item flex-fill">
					<a class="nav-link Center" href="SD_EXAMPLE.html">FORUM</a>
				</li>
				<li class="nav-item flex-fill actual">
					<a class="nav-link Center" href="">BOOKINGS</a>
				</li>
				<li class="nav-item flex-fill">
					<a class="nav-link Center" href="SD_EXAMPLE2.html">MY ACCOUNT</a>
				</li>
				<?php
					session_start();
					if(isset($_SESSION['globaluser'])){
					?>
					<li class="nav-item flex-fill">
						<a class="nav-link Center" href="close_session.php">LOGOUT</a>
					</li>
					<?php
						} else {
					?>
					<li class="nav-item flex-fill">
						<a class="nav-link Center" href="login.php">LOGIN</a>
					</li>
					<?php
					}
				?>	
			</ul>
		</nav>
		<?php
			if(isset($_SESSION['globaluser'])){
				$user=$_SESSION['globaluser'];	
				print("<div class='container bg-dark text-white' style='border-radius:2vw;padding:3vw;margin:auto;width:50%;margin-top:5%;text-align:center;box-shadow: 10px 5px 5px 5px rgba(0, 0, 0, 0.5)'>
				<h2 class='display-4 text-white'>Welcome: $user</h2><br></div>");	
			}
			
			if(isset($_GET['icorrect'])){
				if($_GE['incorrect']=="yes"){
					printf("<p class='text-danger'>WRONG DATA INTRODUCED</p>");
				}
			}
			
		?>
		<div class="container Center bg-warning" style="box-shadow: 0px 0px 50px 0px rgb(255, 204, 0)">
			<div id='calendar'></div>
		</div>
		<div class="bg-dark p-4">
			<address></address>
		</div>
	</body>
</html>			