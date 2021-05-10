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
					<a class="nav-link text-center" href="index.php">HOME</a>
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
					<a class="nav-link Center" href="bookings.php">BOOKINGS</a>
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
			<br><h2>GENERAL INFORMATION</h2><br>
			<div class="bg-dark text-warning RB">
				<p>In 2018 some small beekeepers from the area of Durango founded “Erlete”. 
					An association whose main goal is to provide members with an appropriate 
				installation to extract and bottle the honey from their bees.</p>
			</div>
			<br><h2>PURPOSE</h2><br>
			<div class="bg-dark text-warning RB">
				<p>Knowing how important it is to have a significant population of bees to 
					guarantee good pollination of plants and crops of a territory, the city
					council of Atxondo, lent to Erlete a room next to the court hall in Axpe.</p>
					<p>When harvesting time arrives, beekeepers bring their beehives, use the 
					centrifuge extractor, and put the honey to rest in some big metal bins.
					Two weeks later the honey is ready to be bottled.</p><br>
			</div>
			<br><h2>WHAT CAN YOU DO BECOMING A MEMEBER?</h2><br>
			<div class="bg-dark text-warning RB">
				<p>You can bring your hives to our facilities to use our machinery 
					(we have several centrifugal extractors), to be able to extract the 
				honey from the hives, and deposit it in large metal containers.</p><br>
				<p>We also have a large warehouse where you can leave the honey deposited
				for two weeks until it is ready to be bottled.</p><br>
			</div>
			<br><h2>HOW DOES THIS ASSOSIATION WORK?</h2><br>
			<div class="bg-dark text-warning RB">
				<p>The process is simple, if you want to use our facilities the first 
				thing you should do is contact us so you can become a member.</p><br>
				<p>Once our administrator creates your account you will be inside our 
					database, and the program administrator will send you a default
				password for you to login in the webpage.</p><br>
				<p>*We highly recommend to change the password the first time you login.</p><br>
			</div>
			<a type="button" class="btn btn-dark text-warning BRB">BECOME A MEMBER</a>
			<br><h2>RULES: HOW TO MANTAIN A POSITIVE COMMUNITY</h2><br>
			<div class="bg-dark text-warning RB text-left" style="font-size:1.7em">
				<ol>
					<li>To make use of our services you must become a member</li><br>
					<li>The membership has an annual fee of 30€</li><br>
					<li>Members must pay a fee of 0.25 cents per kg of honey they produce</li><br>
					<li>It is also important to make a good use of the material and installations</li><br>
					<li>You must also have a respectful attitude towards the rest of the members</li><br>
				</ol>
			</div>
		</div>
		<div class="bg-dark p-4">
			<address></address>
		</div>
	</body>
</html>									