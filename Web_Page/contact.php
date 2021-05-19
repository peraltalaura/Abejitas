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
		<link rel="stylesheet" href="css//login_CSS.css">
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
				<h1 class="text-warning Center">ERLETE</h1>
			</li>
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
		<div class="content Center bg-warning info">
			<br><h2>HOW TO CONTACT US</h2><br>
			<div class="bg-dark text-warning RB">
				
				<div class="row">
					<div class="col-sm-4">ASSOSIATION ADDRESS:</div>
					<div class="col-sm-8">DURANGO</div>
				</div>
				
				<div class="row">
					<div class="col-sm-4"></div>
					<div class="col-sm-8"></div>
				</div>
				
				<div class="row">
					<div class="col-sm-4">
					</div>
					<div class="col-sm-8">
					</div>
				</div>
				
			</div>
		</div>
		<div class="bg-dark p-4">
			<address></address>
		</div>
	</body>
</html>																