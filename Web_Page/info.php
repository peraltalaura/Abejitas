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
			font-size:5vw;
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
				<a class="Center active" href="info.php">INFORMATION</a>
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
		<div class="content Center bg-warning info">
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
			<div class="bg-dark text-warning RB text-left">
				<ol>
					<li>To make use of our services you must become a member</li>
					<li>The membership has an annual fee of 30€</li>
					<li>Members must pay a fee of 0.25 cents per kg of honey they produce</li>
					<li>It is also important to make a good use of the material and installations</li>
					<li>You must also have a respectful attitude towards the rest of the members</li>
				</ol>
			</div>
		</div>
		<div class="bg-dark p-4">
			<address></address>
		</div>
	</body>
</html>									