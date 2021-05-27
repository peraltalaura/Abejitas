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

	<!--<Link rel="stylesheet" href="CSS.css">-->
	<Link rel="stylesheet" href="css/index_CSS.css">

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
			<a class="Center active" href="index.php">HOME</a>
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
	<div id='index' class="content Center addMargin">
		<h1>Wellcome to Erletes site</h1>
		<div class="columns">
			<div class="RB">
				<h2>LEARN ABOUT OUR PURPOSE AND ACTIVITIES</h2>
				<p>Read information about how everything works and why we like being in this community, how to become a part of this and how to contact us for further information</p>
				<a href="info.php" class="BRB Center">GO TO INFORMATION</a>

			</div>
			
			<div class="RB">
				<h2>SEE DIFFERENT ISSUES DISCUSSED IN OUR COMMUNITY</h2>
				<p>Everyone can enter and see the questions, answers and discussions of our forum, where members can also participate actively by posting comments.</p>
				<a href="forum.php" class="BRB Center" >GO TO FORUM</a>
			</div>
		</div>
		<div class="columns">
			<div class="RB ">
				<h2>BOOK OUR EXTRACTOR AND METAL BINS</h2>
				<p>Only members: See de days available to book the extractor and the metalbins available to us that we provide</p>
				<!--This php code changes the page where the link will lead the user depending if it has logged in or not-->
				<a class="BRB Center" href="forum.php" 
				<?php if(isset($_SESSION['memberID'])){
					printf("href='bookings.php'");
				}else{
					printf("href='login.php'");
				}?>
				>BOOK NOW</a>
			</div>
			
			<div class="RB ">
				<h2>CONSULT YOUR PERSONAL INFORMATION</h2>
				<p>Only members: Have access to your personal information and be able to modify it, make a transfer, see your bookings, productions and account status at any time</p>
				<!--This php code changes the page where the link will lead the user depending if it has logged in or not-->
				<a class="BRB Center" href="forum.php" 
				<?php 
				if(isset($_SESSION['memberID'])){
					printf("href='profile.php?account=prof'>YOUR ACCOUNT</a>");
				}else{
					printf("href='login.php'>YOUR ACCOUNT</a>");
				}?>
			</div>
			
		</div>
		<br>
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