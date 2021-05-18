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
	<script src='fullcalendar/main.js'></script>

	<!--link for jqueryui custom-->
	<link rel="stylesheet" href="jquery/jquery-ui.min.css">
	<script src="jquery/external/jquery/jquery.js"></script>
	<script src="jquery/jquery-ui.min.js"></script>

	<Link rel="stylesheet" href="css//account_CSS.css">

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
		$( function() {
			var dateFormat = "mm/dd/yy",
			from = $( "#from" )
			.datepicker({
				defaultDate: "+1w",
				changeMonth: true,
				numberOfMonths: 3
			})
			.on( "change", function() {
				to.datepicker( "option", "minDate", getDate( this ) );
			}),
			to = $( "#to" ).datepicker({
				defaultDate: "+1w",
				changeMonth: true,
				numberOfMonths: 3
			})
			.on( "change", function() {
				from.datepicker( "option", "maxDate", getDate( this ) );
			});
			
			function getDate( element ) {
				var date;
				try {
					date = $.datepicker.parseDate( dateFormat, element.value );
				} catch( error ) {
					date = null;
				}
				
				return date;
			}
		} );
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
	
	<div class="content text-warning">
		<h2 class="Center mt-4">BOOK OUR EXTRACTOR</h2>
		<div id='calendar'></div>
		<form class="form-group mt-4 content Center" action="book.php" method="post">
			<div class="row RBY pt-4 pb-4">
				<div class="col-sm-6" style="text-align:center">
					Select entry date:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="from" type="text" required="required" name="entry">
				</div>
				<div class="col-sm-6" style="text-align:center">
					Select exit date:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="to" type="text" required="required" name="exit">
				</div>
			</div>
			<BR>
			<div class="Center">
				<input class="BRBY" type="submit" value="BOOK">
			</div>
		</form>
		
		<h2 class="Center mt-4">CONSULT THE AVAILABILITY OF OUR METAL BINS</h2>
		<br>
		<?php		
		include("test_connect_db.php");
		$link=connectDataBase();
		$result=mysqli_query($link,"SELECT * FROM metalbin");
		?>
		<div class="table-responsive">
			<table class="table bg-dark text-warning Center">
				<tr>
					<th>METAL BIN</th>
					<th>CAPACITY</th>
					<th>AVAILABILITY</th>
					<th>DATE AVAILABLE</th>
				</tr>
				<?php
				while($data=mysqli_fetch_array($result)){
					if($data[2]==1){
						printf("<tr><td>%d</td><td>%d KG</td><td>available</td><td>NOW</td></tr>",$data[0],$data[1]);
					} else {
						printf("<tr><td>%d</td><td>%d KG</td><td>occupied</td><td>%s</td></tr>",$data[0],$data[1],$data[3]);
					}
				}
				?>
			</table>
		</div>
	</div>
	<div class="bg-dark p-4">
		<address></address>
	</div>
</body>
</html>									