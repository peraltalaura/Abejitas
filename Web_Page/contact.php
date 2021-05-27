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

	<!--link for jqueryui custom-->
	<link rel="stylesheet" href="jquery/jquery-ui.min.css">
	<script src="jquery/external/jquery/jquery.js"></script>
	<script src="jquery/jquery-ui.min.js"></script>

	<link rel="stylesheet" href="css/index_CSS.css">
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
<body>	
	<h1 class="erlete">ERLETE</h1>
	<!--menu of the web page that is explaned in the other pages of the web page-->
	<ul class="sidenav">
		<li>
			<a class="Center" href="index.php">HOME</a>
		</li>
		<li>
			<a class="Center" href="info.php">INFORMATION</a>
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
			<li>
				<a class="Center" href="close_session.php">LOGOUT</a>
			</li>
			<?php
		} else {
			?>
			<!--If the user isn't logged it redirects the user to the login.php-->
			<li>
				<a class="Center" href="login.php">LOGIN</a>
			</li>
			<?php
		}
		?>	
	</ul>
	<!--End of menu web page-->
	<div class="content Center addMargin">
		<h1>Contact us</h1>
		<div class="columns Center">
			<div class="RB">
				<h2>NOT A MEMBER YET?</h2>
				<p>If you are interested in our activity and assotiation feel free to come by whenever you want. Our members will be kind and willing to help you</p>
				<p>You can talk to our administrator, call him or send him an email if you want to become a part of this community, he will make an account and send you the autogenerated password for you to enter your account the first time</p>
			</div>
			<div class="RB">
				<h2>ALREADY A MEMBER?</h2>
				<p>If you already are a part of our assosiation be free to come by or talk to our members or administrator from the forum, email, phone or in our dependencies if you have any problems or suggestions</p>
			</div>
		</div>
		<div class="RB">
			<h2>WHERE TO FIND US</h2>
			<p>ASSOSIATION ADDRESS: San Juan Plaza 1</p>
			<p>CITY: Axpe</p>
			<p>PROVINCE: Bizkaia</p>
			<p>POST CODE: 48291</p>
		</div>
	</div>

	<div class="p-4">
		<address></address>
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