<!DOCTYPE html>
<html>
<head>	
	<title>Home</title>
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
	<Link rel="stylesheet" href="css/login_CSS.css">
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
<body class="Center">
	<!-- 
		This messages will only be displayed when the information introduced is wrong or the account is disabled
		PHP code which checks if the incorrect variable has been returned and exists: 
			if the value of it is yes it tells the user that the email and account don't match
			if the value is disable it tells the user that the account has been disabled by the administrator
	-->
	<?php 
	if(isset($_GET['incorrect'])){
		if($_GET['incorrect']=='yes'){
			printf("<div class='container Center RB'>The email or account don't match</div><br>");
		} else if($_GET['incorrect']=='disable'){
			printf("<div class='container Center RB'>Your account is disabled</div><br>");
		}
	}
	/*
		PHP code which checks if the found variable has been returned and exists:
			if it does, it tells the user that the email hasn't been found
	*/
	if(isset($_GET['found'])){
		printf("<div class='container Center RB'>Email not found</div><br>");

	}
	?>
	<div class="Center RB pt-4 pb-4">
		<h1>SIGN IN</h1>
		<!-- A form which asks the user for the email and password of the member account and then sends the information to the search_users.php-->
		<form class="form-group form-group-sm Center" action="search_users.php" method="post">
			<LABEL>E-MAIL:<br>
				<input class="mb-2" required="required" type="email" name="mail" autocomplete="no"></LABEL>
				<LABEL>PASSWORD:<br>
					<input type="password" required="required" name="password" autocomplete="no"></LABEL>
					<input class="BRB" type="submit" value="LOGIN">
				</form>
				<!-- The link of contact us redirects the user to the contact.php page-->
				<b>You don't have an account?</b><a class="mt-4 mb-4 BRB" href="contact.php"> Contact us</a>
				<!-- The link return redirects the user to the index.php page-->
				<a href="index.php" class="BRB">RETURN</a>
				<br>	
			</div>	
		</body>
		</html>	
