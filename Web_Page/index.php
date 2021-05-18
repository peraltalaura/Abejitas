<!DOCTYPE html>
<html>
<head>
	
	<title>Home</title>
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
	<Link rel="stylesheet" href="css//index_CSS.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		h1 {
			font-family: 'Dancing Script', cursive;
		}
		body {
			font-family: 'Lato', sans-serif;
		}
	</style>
</head>
<body class="bg-dark">	
	<ul class="sidenav">
		<li>
			<a class="Center active" href="index.php">HOME</a>
		</li>
		<li>
			<a class="Center" href="info.php">INFORMATION</a>
		</li>
		<li>
			<a class="Center" href="forum.php">FORUM</a>
		</li>
		<?php
		session_start();
		if(isset($_SESSION['memberID'])){
			?>
			<li>
				<a class="Center" href="bookings.php">BOOKINGS</a>
			</li>
			<?php
		} else {
			?>
			<li>
				<a class="Center" href="login.php">BOOKINGS</a>
			</li>
			<?php
		}
		?>
		<?php
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
	
	<div class="content Center bg-warning">
		<div id="title" class="Center text-warning bg-dark">
			<h1>ERLETE</h1>
		</div>
		<h2>LEARN ABOUT OUR PURPOSE AND ACTIVITIES</h2>
		<div class="bg-dark text-warning RB">
			<p>Read information about how everything works and why we like being in this community, how to become a part of this and how to contact us for further information</p>
		</div>
		<a href="info.php" type="button" class="btn btn-dark text-warning BRB">GO TO INFORMATION</a>
		<h2>SEE DIFFERENT ISSUES DISCUSSED IN OUR COMMUNITY</h2>
		<div class="bg-dark text-warning RB">
			<p>Everyone can enter and see the questions, answers and discussions of our forum</p>
			<p>Members can also participate actively in the community and post comments</p>
		</div>
		<a type="button" class="btn btn-dark text-warning BRB" href="forum.php">GO TO FORUM</a>
		<h2>BOOK OUR EXTRACTOR AND METAL BINS</h2>
		<div class="bg-dark text-warning RB">
			<p>Only members: See de days available to book the extractor and the metalbins available to us that we provide</p>
		</div>
		<a type="button" class="btn btn-dark text-warning BRB" 
		<?php if(isset($_SESSION['memberID'])){
			printf("href='bookings.php'");
		}else{
			printf("href='login.php'");
		}?>
		>BOOK NOW</a>
		<h2>CONSULT YOUR PERSONAL INFORMATION</h2>
		<div class="bg-dark text-warning RB">
			<p>Only members: Have access to your personal information and be able to modify it, make a transfer, see your bookings, productions and account status at any time</p>
		</div>
		<a type="button" class="btn btn-dark text-warning BRB" 
		<?php if(isset($_SESSION['memberID'])){

			printf("href='bookings.php'");
		}else{
			printf("href='login.php'");
		}?>
		>YOUR ACCOUNT</a>
	</div>
	
	<div class="bg-dark p-4">
		<address></address>
	</div>
</body>
</html>																