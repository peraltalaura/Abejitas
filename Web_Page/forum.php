<!DOCTYPE html>
<html>
<head>

	<title>Forum</title>
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
	<!--<Link rel="stylesheet" href="CSS.css">-->
	<Link rel="stylesheet" href="css/index_CSS.css">
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
	<!--Start of the navigation var to go to the different pages of the web site-->
	<ul class="sidenav">
		<li>
			<h1 class="Center">ERLETE</h1>
		</li>
		<li>
			<!-- The link of HOME redirects the user to the index.php page-->
			<a class="Center" href="index.php">HOME</a>
		</li>
		<li>
			<!-- The link of INFORMATION redirects the user to the info.php page-->
			<a class="Center" href="info.php">INFORMATION</a>
		</li>
		<li>
			<!-- The link of FORUM redirects the user to the forum.php page-->
			<a class="Center active" href="forum.php">FORUM</a>
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
	<!--The content of the web page-->
	<div class="content Center">
		<h1 style="margin-top:7%">LATEST DISCUSSIONS</h1><br>
		<!--php code that makes a query of the comments of the members and displays them in the given format-->
		<?php			
		include("test_connect_db.php");
		$link=connectDataBase();
		$result=mysqli_query($link,"SELECT comment.*, member.* from comment INNER JOIN member ON member.member_id = comment.member_id");

		?>
		<?php
		while($data=mysqli_fetch_array($result)){
			printf("
				<div class='columns'>
				<div class='forumR'>
				<img style='width:40px;border-radius:5em'src='%s'>
				<span> %s </span> 
				<span> %s </span> 
				<span> %s </span> 
				</div>
				<div class='forumL'>%s
				</div>
				</div>",$data[14],$data['name'],$data['surname'],$data['comment_date'],$data['message']);
		}
		?>

		<!--It displays a textarea if a member is logged in for him to send a comment-->
		<?php
		if(isset($_SESSION['memberID'])){
			?>
			<h2>WRITE YOUR COMMENT:</h2>
			<form action="send_comment.php" method="post">
				<div class="row">
					<textarea maxlength="255" class="rounded-0" class="Center" rows="10" required="required" name='txt'></textarea>
				</div>
				<input type="submit" value="POST COMMENT" class="BRB">
			</form>
			<?php
		}else{
			?>
			<?php
			printf("<br><a class='BRB' href='login.php'>Login to comment</a>")
			?>
			<?php
		}
		?>

	</div>
	<div class="p-4">
		<address></address>
	</div>
</body>
</html>										