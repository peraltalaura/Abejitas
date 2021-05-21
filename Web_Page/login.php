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
			}
			body {
			font-family: 'Lato', sans-serif;
			}
		</style>
	</head>
	<body class="bg-warning Center">
		
			<?php
				/*if(isset($_SESSION['memberID'])){
					printf("<div class='container Center text-warning RB'>Login successfull, Wellcome!</div>");
				} 
				if(isset($_GET['incorrect'])){
					if($_GET['incorrect']=='yes'){
						printf("<div class='container Center text-warning RB'>The email or account don't match</div>");
						} else if($_GET['incorrect']=='disable'){
						printf("<div class='container Center text-warning RB'>Your account is disabled</div>");
					}
				}
				
				if(isset($_GET['found'])){
					printf("<div class='container Center text-warning RB'>Email not found</div>");
					
				}*/
			?>
			<div class="Center bg-dark text-warning RB pt-4 pb-4">
				<h1>LOGIN</h1>
				<form class="form-group form-group-sm Center" action="search_users.php" method="post">
					<h2>E-MAIL:</h2>
					<input class="mb-2" required="required" type="email" name="mail">
					<h2>PASSWORD:</h2>
					<input class="mb-2" type="password" required="required" name="password"><br>
					<input class="BRBY" type="submit" value="LOGIN">
				</form>
			</div>	
			<a href="index.php" class="BRB bg-dark">RETURN</a>		
			</body>
		</html>	
				