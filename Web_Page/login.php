<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		
		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<Link rel="stylesheet" href="CSS.css"></Link>
		<link rel="icon"  type="image/jpg" href="images/bee-icon.jpg"></link>
	</head>
	<body class="bg-warning">
		<div class="bg-dark Center">
			<h1 class="display-1 text-warning">ERLETE</h1>
		</div>
		<nav class="navbar navbar-expand-sm bg-dark sticky-top p-4">
			<ul class="navbar-nav nav-pills flex-fill">
				<li class="nav-item flex-fill">
					<a class="nav-link bg-dark text-warning Center" href="home.php">HOME</a>
				</li>
				<li class="nav-item dropdown flex-fill">
					<a class="nav-link dropdown-toggle text-warning text-center" href="home.php" data-toggle="dropdown">INFORMATION</a>
					<div class="dropdown-menu bg-dark">
						<a class="dropdown-item text-warning" href="home.php#">Purpose</a>
						<a class="dropdown-item text-warning" href="home.php#">How does it work?</a>
						<a class="dropdown-item text-warning" href="home.php#">Rules</a>
						<a class="dropdown-item text-warning" href="home.php#">How to become a member</a>
						<a class="dropdown-item text-warning" href="home.php#">Contact us</a>
					</div>
				</li>
				<li class="nav-item flex-fill">
					<a class="nav-link text-warning Center" href="SD_EXAMPLE.html">FORUM</a>
				</li>
				<li class="nav-item flex-fill">
					<a class="nav-link text-warning Center" href="SD_GOALS.html">BOOKINGS</a>
				</li>
				<li class="nav-item flex-fill">
					<a class="nav-link text-warning Center" href="SD_EXAMPLE2.html">MY ACCOUNT</a>
				</li>
				<li class="nav-item flex-fill">
					<a class="nav-link text-dark bg-warning active Center" href="login.php">LOGIN</a>
				</li>
			</ul>
		</nav>
		<div class="Center" style="width:50%; margin:auto">
			<div class="container bg-dark text-warning RB">
				<h2 class="display-3">LOGIN</h2><br>
				<form action="search_users.php" method="post">
					<b>NAME:</b><br><br>
					<input type="text" name="user"><br><br>
					<b>PASSWORD:</b><br><br>
					<input type="password" name="password"><br><br>
					<input class="text-dark bg-warning p-3" type="submit" value="LOGIN">
				</form>
			</div>
		</div>
		<div class="bg-dark p-4">
			<address></address>
		</div>
	</body>
</html>			