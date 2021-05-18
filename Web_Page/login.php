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
		<Link rel="stylesheet" href="css//login_CSS.css">
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
				<a class="Center" href="index.php">HOME</a>
			</li>
			<li>
				<a class="Center" href="info.php">INFORMATION</a>
			</li>
			<li>
				<a class="Center" href="forum.php">FORUM</a>
			</li>
			<?php
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
				session_start();
				if(isset($_SESSION['memberID'])){
				?>
				<li>

					<a class="Center" href="profile.php">MY ACCOUNT</a>

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
					<a class="Center active" href="close_session.php">LOGOUT</a>
				</li>
				<?php
					} else {
				?>
				<li>
					<a class="Center active" href="login.php">LOGIN</a>
				</li>
				<?php
				}
			?>	
		</ul>
		
		<div class="container content Center bg-dark text-warning">
			<?php
				if(isset($_SESSION['memberID'])){
					printf("<div class='container Center text-warning RB'>Login successfull, Wellcome!</div>");
				} 
				if(isset($_GET['incorrect'])){
					if($_GET['incorrect']=='yes'){
						printf("<div class='container Center text-warning RB'>The email or account don't match</div>");
						} else if($_GET['incorrect']=='disable'){
						printf("<div class='container Center text-warning RB'>Your account is disabled</div>");
					}
				}
				
				if(isset($_GET['found'])){
					printf("<div class='container Center text-warning RB'>Email not found</div>");
					
				}
			?>
			<div class="container Center login">
				<h1>LOGIN</h1>
				<form class="form-group" action="search_users.php" method="post">
					<h3>E-MAIL:</h3>
					<input class="mb-2" required="required" type="email" name="mail">
					<h3>PASSWORD:</h3>
					<input class="mb-2" type="password" required="required" name="password"><br>
					<input class="text-dark bg-warning" type="submit" value="LOGIN">
				</form>
			</div>
			</div>
		<br>
		<div class="bg-dark p-4">
			<address></address>
			</div>			
			</body>
		</html>	
				