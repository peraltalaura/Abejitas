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
		<!--<Link rel="stylesheet" href="CSS.css">-->
		
		<!-- Full Calendar links -->
		<link href='fullcalendar/main.css' rel='stylesheet'/>
		<Link rel="stylesheet" href="css/login_CSS.css">
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
			h1 {
			font-family: 'Dancing Script', cursive;
			}
			body {
			font-family: 'Lato', sans-serif;
			}
		</style>
		
	</style>
</head>
<body class="bg-dark">
	<ul class="sidenav">
		<li>
			<h1 class="text-warning Center">ERLETE</h1>
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
		<li>
			<a class="Center" href="my_account.php">MY ACCOUNT</a>
		</li>
		<?php
			session_start();
			if(isset($_SESSION['globaluser'])){
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
	
	<div class="content text-warning">
		<h2 class="Center mt-4">BOOK OUR EXTRACTOR</h2>
		<div id='calendar'></div>
		<h2 class="Center mt-4">CONSULT THE AVAILABILITY OF OUR METAL BINS</h2>
	</div>
	<div class="bg-dark p-4">
		<address></address>
	</div>
</body>
</html>					