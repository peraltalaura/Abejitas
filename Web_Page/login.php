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
				<li class="nav-item flex-fill">
					<a class="nav-link dropdown-toggle text-center" href="info.php">INFORMATION</a>
					
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
					<li class="nav-item flex-fill actual">
						<a class="nav-link Center" href="close_session.php">LOGOUT</a>
					</li>
					<?php
						
						} else {
					?>
					<li class="nav-item flex-fill actual">
						<a class="nav-link Center" href="close_session.php">LOGOUT</a>
					</li>
					<?php
					}
				?>	
			</ul>
		</nav>
		<div class="container bg-dark text-warning RB Center login">
			<h2>LOGIN</h2>
			<form class="form-group" action="search_users.php" method="post">
				<h3>NAME:</h3>
				<input type="text" name="user"><br>
				<h3>PASSWORD:</h3>
				<input class="mb-4" type="password" name="password"><br>
				<input class="text-dark bg-warning" type="submit" value="LOGIN">
			</form>
		</div>
		<div class="bg-dark p-4">
			<address></address>
		</div>
	</body>
</html>			