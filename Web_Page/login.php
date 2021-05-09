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
					<a class="nav-link dropdown-toggle text-center" href="home.php">HOME</a>
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
		<div class="bg-dark text-warning RB Center" style="box-shadow:0px 0px 50px 0px rgb(255, 204, 0);margin:10vw">
			<h1>LOGIN</h1><br>
			<form class="form-group" action="search_users.php" method="post">
				<h2>NAME:</h2>
				<input type="text" name="user"><br><br>
				<h2>PASSWORD:</h2>
				<input type="password" name="password"><br><br>
				<input class="text-dark bg-warning p-3" type="submit" value="LOGIN">
			</form>
		</div>
		<div class="bg-dark p-4">
			<address></address>
		</div>
	</body>
</html>			