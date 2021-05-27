<!DOCTYPE html>
<html>
<head>	
	<!--changes the name of the page-->
	<title>Information</title>
	<!--links of google fonts-->
	<link rel="preconnect" href="https://fonts.gstatic.com"><link>
	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=Lato&display=swap" rel="stylesheet">
	<!--changes the icon of the page-->
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
	<Link rel="stylesheet" href="css/index_CSS.css">

	<!--link for jqueryui custom-->
	<link rel="stylesheet" href="jquery/jquery-ui.min.css">
	<script src="jquery/external/jquery/jquery.js"></script>
	<script src="jquery/jquery-ui.min.js"></script>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
	/*Style for the fonts used in the page*/
	h1 {
		font-family: 'Dancing Script', cursive;
	}
	body {
		font-family: 'Lato', sans-serif;
	}
</style>
</head>
<body>
	<h1 class="erlete">ERLETE</h1>
	<!--menu of the web page that is explaned in the other pages of the web page-->
	<ul class="sidenav">
		<li>
			<a class="Center" href="index.php">HOME</a>
		</li>
		<li>
			<a class="Center active" href="info.php">INFORMATION</a>
		</li>
		<li>
			<a class="Center" href="forum.php">FORUM</a>
		</li>
		<!--it starts the session and changes the links depending if the user is logged in or not for the bookings page-->
		<?php
		session_start();
		/*Global variable where the member id is saved to do the querys*/
		if(isset($_SESSION['memberID'])){
			?>
			<li>
				<!-- The link of BOOKINGS redirects the user to the bookings.php page-->
				<a class="Center" href="bookings.php">BOOKINGS</a>
			</li>
			<?php
		} else {
			?>
			<li>
				<!-- The link redirects the user to the login.php page-->
				<a class="Center" href="login.php">BOOKINGS</a>
			</li>
			<?php
		}
		?>
		<!--it starts the session and changes the links depending if the user is logged in or not for the profile page-->
		<?php
		if(isset($_SESSION['memberID'])){
			?>
			<li>
				<!-- The link of MY ACCOUNT redirects the user to the profile.php page in the profile section-->
				<a class="Center" href="profile.php?account=prof">MY ACCOUNT</a>
			</li>
			<?php
		} else {
			?>
			<li>
				<!-- The link redirects the user to the login.php page-->
				<a class="Center" href="login.php">MY ACCOUNT</a>
			</li>
			<?php
		}
		?>
		<!--it starts the session and changes the links depending if the user is logged in or not-->
		<?php
		if(isset($_SESSION['memberID'])){
			?>
			<!--If the user is logged in it redirects the user to the close_session.php to log out-->
			<li class="nav-item flex-fill">
				<a class="nav-link Center" href="close_session.php">LOGOUT</a>
			</li>
			<?php
		} else {
			?>
			<!--If the user isn't logged it redirects the user to the login.php-->
			<li class="nav-item flex-fill">
				<a class="nav-link Center" href="login.php">LOGIN</a>
			</li>
			<?php
		}
		?>	
	</ul>
	<!--End of menu web page-->
	<!--The content of the web page-->
	<div id="info" class="content Center addMargin">
		<BR>
		<h1>Learn about our community</h1><br>
		<div class="columns">	
			<div class="RB">
				<h2>GENERAL INFORMATION</h2>
				<p>In 2018 some small beekeepers from the area of Durango founded “Erlete”. 
					An association whose main goal is to provide members with an appropriate 
				installation to extract and bottle the honey from their bees.</p>
			</div>
			
			<div class="RB">
				<h2>PURPOSE</h2>
				<p>Knowing how important it is to have a significant population of bees to 
					guarantee good pollination of plants and crops of a territory, the city
					council of Atxondo, lent to Erlete a room next to the court hall in Axpe.<br><br>
					When harvesting time arrives, beekeepers bring their beehives, use the 
					centrifuge extractor, and put the honey to rest in some big metal bins.
				Two weeks later the honey is ready to be bottled.</p>
			</div>
		</div>
		<div class="columns">
			<div class="RB">
				<h2>WHAT CAN YOU DO BECOMING A MEMEBER?</h2>
				<p>You can bring your hives to our facilities to use our machinery 
					(we have several centrifugal extractors), to be able to extract the 
					honey from the hives, and deposit it in large metal containers.<br><br>
					We also have a large warehouse where you can leave the honey deposited
				for two weeks until it is ready to be bottled.</p>
			</div>
			
			<div class="RB">
				<h2>HOW DOES THIS ASSOSIATION WORK?</h2>
				<p>The process is simple, if you want to use our facilities the first 
					thing you should do is contact us so you can become a member.<br><br>
					Once our administrator creates your account you will be inside our 
					database, and the program administrator will send you a default
					password for you to login in the webpage.<br><br>
				*We highly recommend to change the password the first time you login.</p><br>
			</div>
		</div>
		<div class="RB">
			<h2>RULES: HOW TO MANTAIN A POSITIVE COMMUNITY</h2>
			<ol>
				<li>To make use of our services you must become a member</li>
				<li>The membership has an annual fee of 30€</li>
				<li>Members must pay a fee of 0.25 cents per kg of honey they produce</li>
				<li>It is also important to make a good use of the material and installations</li>
				<li>You must also have a respectful attitude towards the rest of the members</li>
			</ol>
		</div>
		
		<div class="Center">
			<h2 class="text-light">Opening of Erlete</h2><br>
			<iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/9lqKwL2hKRM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div><br>
		<a class="BRB Center" href="contact.php">BECOME A MEMBER</a>
	</div>
	<script>
		/*Function to show or hide the sidenav when the mouse is clicked*/
		$('.erlete').click(function(){
			$(".sidenav").toggle("900");
			$(".erlete").toggleClass("fullW",500);
			$(".content").toggleClass("addMargin",500);
		});
	</script>
</body>
</html>															