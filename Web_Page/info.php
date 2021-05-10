<!DOCTYPE html>
<html>
	<head>
		
		<title>Home</title>
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
		<Link rel="stylesheet" href="CSS.css">
		
		<style>
			body {
			font-family: 'Dancing Script', cursive;
			font-size:6vw;
			}
		</style>
	</head>
	<body class="bg-dark">
		<div class="bg-dark Center">
			<h1 class="text-warning">ERLETE</h1>
		</div>
		<nav class="navbar navbar-expand-sm bg-dark sticky-top p-4">
			<ul class="navbar-nav nav-pills flex-fill">
				<li class="nav-item flex-fill">
					<a class="nav-link dropdown-toggle text-center" href="index.php">HOME</a>
				</li>
				<li class="nav-item flex-fill actual">
					<a class="nav-link dropdown-toggle text-center" href="info.php" data-toggle="dropdown">INFORMATION</a>
					<div class="dropdown-menu bg-dark">
						<a class="dropdown-item text-warning" href="info.php#">Purpose</a>
						<a class="dropdown-item text-warning" href="info.php#">How does it work?</a>
						<a class="dropdown-item text-warning" href="info.php#">Rules</a>
						<a class="dropdown-item text-warning" href="info.php#">How to become a member</a>
						<a class="dropdown-item text-warning" href="info.php#">Contact us</a>
					</div>
				</li>
				<li class="nav-item flex-fill">
					<a class="nav-link Center" href="SD_EXAMPLE.html">FORUM</a>
				</li>
				<li class="nav-item flex-fill">
					<a class="nav-link Center" href="SD_GOALS.html">BOOKINGS</a>
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
		<div class="container Center">
			<h2>LEARN ABOUT OUR PURPOSE AND ACTIVITIES</h2>
			<div class="bg-dark text-warning RB">
				<p>Read information about how everything works and why we like being in this community, how to become a part of this and how to contact us for further information</p>
			</div>
			<a href="" type="button" class="btn btn-dark text-warning BRB">GO TO INFORMATION</a>
			<h2>SEE DIFFERENT ISSUES DISCUSSED IN OUR COMMUNITY</h2>
			<div class="bg-dark text-warning RB">
				<p>Everyone can enter and see the questions, answers and discussions of our forum</p>
				<p>Members can also participate actively in the community and post comments</p>
			</div>
			<button type="button" class="btn btn-dark text-warning BRB">GO TO FORUM</button>
			<h2>BOOK OUR EXTRACTOR AND METAL BINS</h2>
			<div class="bg-dark text-warning RB">
				<p>Only members: See de days available to book the extractor and the metalbins available to us that we provide</p>
			</div>
			<button type="button" class="btn btn-dark text-warning BRB">BOOK NOW</button>
			<h2>CONSULT YOUR PERSONAL INFORMATION</h2>
			<div class="bg-dark text-warning RB">
				<p>Only members: Have access to your personal information and be able to modify it, make a transfer, see your bookings, productions and account status at any time</p>
			</div>
			<button type="button" class="btn btn-dark text-warning BRB">YOUR ACCOUNT</button>
		</div>
		<div class="bg-dark p-4">
			<address></address>
		</div>
	</body>
</html>							